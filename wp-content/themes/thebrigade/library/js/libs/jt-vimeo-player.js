/*  Jason Tordsen's amazing Vimeo video player -
*   Dependencies:[ jQuery ]
*/

function VimeoPlayer(_el){
  var VimeoPlayer = {
    el:_el,
    init:function(){
      var _t = this;

      _t.iframe = _t.el.find("iframe")[0];
      _t.player = $f( _t.iframe );

      _t.player.addEvent('ready', function(){
        console.log("ready");

        _t.player.addEvent('play', function(){  _t.onPlay(); });
        _t.player.addEvent('pause', function(){  _t.onPause(); });
        _t.player.addEvent('finish', function(){  _t.onFinish(); });
        _t.player.addEvent('playProgress', function(_data,id){  _t.onPlayProgress(_data,id); });

        _t.poster = _t.el.find("div.poster").eq(0);
        _t.poster.on("click", function(){ _t.play(); });
      });
    },
    play:function(){
      this.player.api("play");
    },
    pause:function(){
      this.player.api("pause");
    },
    stop:function(){
      this.player.api("unload");
      this.el.removeClass("playing");
    },
    onPlay:function(){
      console.log('playing');
      this.el.trigger("playing");
      if( !this.el.hasClass("playing") ) this.el.addClass("playing");
    },
    onPause:function(){
      console.log('paused');
      this.el.trigger("paused");
    },
    onFinish:function(){
      console.log('finished');
      this.el.trigger("finished");
    },
    onPlayProgress:function(data, id){
      // console.log(data.seconds + 's played');
    },
    addEvent:function( _event, _callback ){
      var _t = this; _t.el.on( _event, function(){ _callback(_t) } );
    }
  };

  return VimeoPlayer;
}