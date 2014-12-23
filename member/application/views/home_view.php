<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link href="<?= base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>css/home.css" rel="stylesheet" type="text/css" />


        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="navbar">
            <input class="span2" type="text" placeholder="Email">
            <input class="span2" type="password" placeholder="Password">
            <a href="<?= base_url(); ?>index.php/member/40" class="btn">Sign in</a>
        </div>

        <? $this->load->view("header_view"); ?>

        <div class="container">
            <div class="hero-unit">
                <h1>PROJECT-SPECIFIC</h1>
                <h1>WORLD-CLASS</h1>
                <h1>WORK-LIKE-HELL</h1>
                <h1>TALENT.</h1>
                <p>The Brigade is about pure, innovative creative firepower, uninhibited by time and space or other quaint ideas about the impossible. For every project – be it a commercial, brand development, mobile app, or developing never-before-seen tech and tools – we stop at nothing to provide the best team for the job.We assemble tailor-made troupes, pulled from our small army of A-list digital artists from around the globe. Custom-curated for every project, we pioneer digital solutions at the forefront of technology, culture, and design. United under the banner of The Brigade, we collaborate to meet every challenge with only the best the world has to offer. Strap in, and find out how.</p>
                <h2>THE BRIGADE. <span class="accent-orange">BRINGING IT TOGETHER.</span></h2>
            </div>
        </div> <!-- /container -->

        <? $this->load->view("footer_view"); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','<?php echo GA_ACCOUNT; ?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
