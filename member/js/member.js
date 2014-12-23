/* -------- Variables -----------------------------------
---------------------------------------------------------
-------------------------------------------------------*/

var main = {};
var defaults = {};
var current = {};

var data = {};
data.keywords 			= {type:"tags",value:[]};
data.employers 			= {type:"tags",value:[]};
data.prior_projects 	= {type:"tags",value:[]};

data.specialties 		= {type:"specialties",value:[]};
data.project_links 		= {type:"project_links",value:[]};



/* -------- Doc Ready -----------------------------------
---------------------------------------------------------
-------------------------------------------------------*/

jQuery( function($){
	/* ------ Set Defaults -- */
	defaults.hourly_rate 			= $("div.number-selector[data-id='hourly_rate'] span:last-child").text();
	defaults.day_rate 				= $("div.number-selector[data-id='day_rate'] span:last-child").text();
	defaults.years_experience 		= $("div.number-selector[data-id='years_experience'] span:last-child").text();
	defaults.new_project_link		= {
		id:"",
		fields:{
			title:{type:"span",value: ""},
			url:{type:"text-input",value:""}
		}
	};

	$('.dropdown-menu input').click(function(event){
		event.stopPropagation();
	});

	$(".dropdown-menu.multi-select li").click(function(event){
		event.stopPropagation();
	});

	/* ------ Add Event Handlers -- */

	$("#project-links-menu .dropdown-menu i").click( main.addProjectLink );
	$(".dropdown-menu:not(.special,.multi-select) li").click( main.dropdownItemClicked );
	$(".dropdown-menu.multi-select li").click( main.multiSelectItemClicked );
	$(".number-selector .icn-btn").click( main.plusMinusClicked );

	$("textarea").keyup( main.textareaChanged );
	$(".input-group input[type='text']").keyup( main.textInputChanged );

	/* ------ Init TagIt -- */

	$('#keywordTags').tagit({
		autocomplete:{disabled:true},
		afterTagAdded:function(e, v){
			data.keywords.value.push(v.tagLabel);
			main.showUnsavedChanges();
		},
		afterTagRemoved:function(e, v){
			var label = v.tagLabel;
			data.keywords.value = $.grep( data.keywords, function(v,i){
				return v != label;
			});

			main.showUnsavedChanges();
		}
	});

	$('#employerTags').tagit({
		allowSpaces:true,
		autocomplete:{disabled:true},
		afterTagAdded:function(e, v){
			data.employers.value.push(v.tagLabel);
			main.showUnsavedChanges();
		},
		afterTagRemoved:function(e, v){
			var label = v.tagLabel;
			data.employers.value = $.grep( data.employers, function(v,i){
				return v != label;
			});

			main.showUnsavedChanges();
		}
	});

	$('#brigadeProjects').tagit({
		allowSpaces:true,
		autocomplete:{disabled:true},
		afterTagAdded:function(e, v){
			data.prior_projects.value.push(v.tagLabel);
			main.showUnsavedChanges();
	
		},
		afterTagRemoved:function(e, v){
			var label = v.tagLabel;
			data.prior_projects.value = $.grep( data.prior_projects, function(v,i){
				return v != label;
			});

			main.showUnsavedChanges();
		}
	});

	// $('#messengerTags').tagit({
	// 	autocomplete:{disabled:true},
	// 	afterTagAdded:function(e, v){
			// var data_id = v.tag.attr("data-id");
			// var alreadyHere = main.specialtyDataIsHere(data_id);

			// if(!alreadyHere)
			// 	main.addNewSpecialtyData( data_id );
			// else
			// 	main.initSpecialtyDetails( data_id );
	// 	},
	// 	afterTagRemoved:function(e, v){
	// 		//main.removeSpecialtyData( v.tag.attr("data-id") );
	// 	},
	// 	onTagClicked:function(e, v){
	// 		// main.initSpecialtyDetails(  v.tag.attr("data-id") );
	// 	}
	// });

	$('#specialtyTags').tagit({
		autocomplete:{disabled:true},
		afterTagAdded:function(e, v){
			var data_id = v.tag.attr("data-id");
			var alreadyHere = main.specialtyDataIsHere(data_id);

			if(!alreadyHere)
				main.addNewSpecialtyData( data_id );
			else
				main.initSpecialtyDetails( data_id );
		},
		afterTagRemoved:function(e, v){
			main.removeSpecialtyData( v.tag.attr("data-id") );
		},
		onTagClicked:function(e, v){
			main.initSpecialtyDetails(  v.tag.attr("data-id") );
		}
	});

	$('#projectLinks').tagit({
		autocomplete:{disabled:true},
		afterTagAdded:function(e, v){
			var data_id = v.tag.attr("data-id");
			var alreadyHere = main.projectLinkDataIsHere(data_id);

			if(!alreadyHere)
				main.addNewProjectLinksData( v.tag.attr("data-id"), v.tagLabel);
			else
				main.initProjectLinksDetails( v.tag.attr("data-id") );
		},
		afterTagRemoved:function(e, v){
			main.removeProjectLinksData( v.tag.attr("data-id") );
		},
		onTagClicked:function(e, v){
			main.initProjectLinksDetails( v.tag.attr("data-id") );
		}
	});

	main.populateMenusFromData();

	$('a[data-toggle="popover"]').popover(
	 {
	     trigger: 'hover'
	 });

	$('input,textarea').tooltip({
		delay:1000
	});
});

/* -------- Misc Util Methods ---------------------------
---------------------------------------------------------
-------------------------------------------------------*/
main.getDefaultSpecialtyData = function(_id){
	return {
		id:_id,
		fields:{
			hourly_rate: 			{type:"number-selector",value:defaults.hourly_rate},
			day_rate: 				{type:"number-selector",value:defaults.day_rate},
			years_experience: 		{type:"number-selector",value:defaults.years_experience},
			details: 				{type:"multi-select",value:""},
			applications: 			{type:"multi-select",value:""},
			industry: 				{type:"dropdown-menu",value:""},
			creative_field: 		{type:"dropdown-menu",value:""}
		}
	}
}

main.getDefaultProjectLinkData = function(_id, _title){
	return {
		id:_id,
		fields:{
			title:{type:"span",value: _title},
			url:{type:"text-input",value:""}
		}
	}
}

main.showProfileSaved = function(){
	clearTimeout(main.unsavedTimer);
	main.hideUnsavedChanges();

	$("#saved").css("margin-top","0");

	clearTimeout(main.savedTimer);
	main.savedTimer = setTimeout(main.hideProfileSaved,4000);
}
main.hideProfileSaved = function(){
	$("#saved").css("margin-top","-30px");
}

main.showUnsavedChanges = function(){
	if(main.initComplete){
		main.hideProfileSaved();

		$("#unsaved").css("margin-top","0");
	}
}
main.hideUnsavedChanges = function(){
	$("#unsaved").css("margin-top","-30px");
}

main.submit = function(){
	console.log("submitting : ");
	console.log(data);

	$.ajax({
		url: base_url + "index.php/member/update",
		data: data,
		type: "POST",
		dataType: "json",
		success: function( $data ) {			
			console.log("submit complete - ");	
			main.showProfileSaved();
		},
		error: function( $error ){
			console.log("submit failed : ", $error );
		}
	});
}

main.specialtyDataIsHere = function( _id ){
	var exists = false;

	$.each(data.specialties.value, function(i,v){
		if(v.id == _id){
			exists = true;
		}
	});

	return exists;
}

main.projectLinkDataIsHere = function( _id ){
	var exists = false;

	$.each(data.project_links.value, function(i,v){
		if(v.id == _id){
			exists = true;
		}
	});

	return exists;
}

main.populateMenusFromData = function(){
	$.each(data, function(i,v){
		if( v.type == "dropdown-menu"){
			$(".dropdown-menu[data-id='" + i + "'] li[data-id='" + v.value + "']").trigger("click");
		} else if(v.type == "multi-select"){
			$.each(v.value, function(ib,vb){
				$(".dropdown-menu[data-id='" + i + "'] li[data-id='" + vb + "']").trigger("click");
			});
		}
	});

	main.initComplete = true;
}

main.updateData = function(_key, _val){
	data[_key] = _val;
	main.showUnsavedChanges();

	console.log(data);
}

/* -------- Event Handlers ------------------------------
---------------------------------------------------------
-------------------------------------------------------*/

main.plusMinusClicked = function(){
	var span 		= $(this),
	i 				= span.children("i").eq(0),
	div 			= span.parent("div"),
	val_span 		= div.children("span:last-child").eq(0),
	increment 		= parseInt(val_span.attr("data-increment")),
	curr_val 		= parseInt(val_span.text());

	if(i.hasClass("icon-chevron-down"))
		increment = increment*-1;

	var new_val = String(curr_val+increment);

	val_span.text(new_val);

	if(div.attr("data-category") == "specialty_details")
		main.updateCurrentSpecialtyData( div.attr("data-id"), new_val );
}

main.textareaChanged = function(e){
	var textarea 	= $(this),
	val 			= textarea.val(),
	textarea_id		= textarea.attr("data-id"),
	category 		= textarea.attr("data-category");

	if(category == "specialty_details")
		main.updateCurrentSpecialtyData( textarea.attr("data-id"), val );
	else
		main.updateData(textarea_id,{type:"textarea", value:val});
}

main.textInputChanged = function(e){
	var input 		= $(this),
	input_group 	= input.parent(),
	val 			= input.val(),
	input_id		= input.attr("data-id"),
	category 		= input_group.attr("data-category");

	if( category == "project_links")
		main.updateCurrentProjectLinkData( input.attr("data-id"), val );
	else
		main.updateData(input_id,{type:"textinput", value:val});
}

main.dropdownItemClicked = function(){
	var li 		= $(this),
	ul			= li.parent(),
	section 	= ul.parent(),
	button 		= section.children("button").eq(0),
	li_a_val 	= li.children("a").text(),
	ul_id		= ul.attr("data-id"),
	li_id 		= li.attr("data-id"),
	category 	= ul.attr("data-category");

	if( ul_id == "specialty"){
		main.addSpecialty( li_id, li_a_val );
	} else {
		if( category == "specialty_details"){
			main.updateCurrentSpecialtyData( ul_id, li.attr("data-id") );
		} else {
			main.updateData(ul_id,{type:"dropdown-menu", value:li_id});
		}

		//filter stuff
		switch(ul_id){
			case "industry":
				main.filterCreativeFields();
				main.filterSpecialties();
				break;
			case "creative_field":
				main.filterSpecialties();
				break;
			case "country_id":
				main.filterStates();
				break;
		}

		var button_text = li_a_val == "" ? "" : " : " + li_a_val;
		button.eq(0).children(".val").eq(0).text(button_text);
	}
}

main.multiSelectItemClicked = function(){
	var li 		= $(this),
	ul			= li.parent(),
	section 	= ul.parent(),
	button 		= section.children("button").eq(0),
	ul_id		= ul.attr("data-id"),
	li_id 		= li.attr("data-id"),
	category 	= ul.attr("data-category"),
	_sel_id 	= [];

	li.toggleClass("checked");

	ul.find("li").each(function(){
		if($(this).hasClass("checked"))
			_sel_id.push( $(this).attr("data-id") );
	});

	if(_sel_id.length == 0){
		_sel_id = "";
	}

	main.setMultiSelectButtonValue(ul, button);

	if( category == "specialty_details")
		main.updateCurrentSpecialtyData( ul_id, _sel_id );
	else
		main.updateData(ul_id,{type:"multi-select", value:_sel_id});
}

main.setMultiSelectButtonValue = function(_ul, _button){
	var vals 	= [];

	_ul.find("li").each(function(){
		if($(this).hasClass("checked"))
			vals.push( $(this).find("a").eq(0).text() );
	});

	var _button_text = vals.length == 0 ? "" : " : " + vals.join(", ");
	_button.eq(0).children(".val").eq(0).text(_button_text);
}

/* -------- Specialty Methods ---------------------
---------------------------------------------------------
-------------------------------------------------------*/

main.addSpecialty = function(_id, _text){
	$("#specialtyTags").tagit("createTag", _text, null, _id );
}

main.updateCurrentSpecialtyData = function( _id, _val ){
	console.log("updateCurrentSpecialtyData : ", current.specialty_id);

	var item = data.specialties.value[ current.specialty_index ];
	item.fields[ _id ].value = _val;

	main.showUnsavedChanges();

	console.log(data);
}

main.removeInactiveDetailSelections = function(_ul,_selections){
	//loop through selected details. cross check with the li[data-id]. If the li is inactive, 
	//remove it from the data list, and update the menu display

	$.each( _selections, function(i,v){
		var li = _ul.find("li[data-id='"+ v +"']").eq(0);

		if( li.hasClass('inactive') ){
			if(li.hasClass('checked')){
				li.trigger("click");
			}
		}
	});
}

main.getSpecialtyDataIndex = function( _id ){
	var index = -1;

	for(var i in data.specialties.value){
		var v = data.specialties.value[i].id;

		if(v == _id){
			index = i;
			break;
		}
	}

	return index;
}

main.addNewSpecialtyData = function( _id ){
	data.specialties.value.push( main.getDefaultSpecialtyData(_id) );
	
	main.initSpecialtyDetails( _id );
	main.showUnsavedChanges();

	console.log(data);
}

main.initSpecialtyDetails = function( _id ){
	console.log("init specialty details : ", _id);

	current.specialty_id 		= _id;
	current.specialty_index 	= main.getSpecialtyDataIndex( _id );
	
	$("#specialtyTags li").removeClass("selected");
	$("#specialtyTags li[data-id='" + _id + "']").addClass("selected");

	var fields = data.specialties.value[ current.specialty_index ].fields;

	for( var i in fields ){
		var v = fields[i];

		switch(v.type){
			case "number-selector":
				$("div.number-selector[data-id='" + i + "'] span:last-child").text(v.value);
				break;
			case "multi-select":
				var _ul = $("ul.dropdown-menu[data-id='" + i + "']"),
				_group = _ul.parent(),
				_button = _group.find("button[data-id='" + i + "']").eq(0);

				_ul.find("li").removeClass("checked");
				$.each(v.value, function(mi, mv){
					_ul.find("li[data-id='" + mv + "']").addClass("checked");
				});

				main.setMultiSelectButtonValue(_ul, _button);
				break;
		}
	};

	if(data.specialties.value.length >= 1)
		main.showSpecialtyDetails();

	main.filterSpecialtyDetails();

	console.log(data);
}

main.filterSpecialties = function(){
	var specialty_ul 			= $("ul[data-id='specialty']");

	specialty_ul.find("li").removeClass('inactive');

	//filter by creative field
	specialty_ul.find("li").each(function(){
		if(data["creative_field"] && data["creative_field"].value !=""){
			if( $(this).attr("data-creative-field") != data["creative_field"].value ){
				$(this).addClass('inactive');
			}
		}
		if(data["industry"] && data["industry"].value != ""){
			if( $(this).attr("data-industry") != data["industry"].value ){
				$(this).addClass('inactive');
			}
		}
	});

	main.disableButtonIfEmptyList(specialty_ul);
}

main.filterStates = function(){
	var state_ul 			= $("ul[data-id='state_id']"),
	section 				= state_ul.parent(),
 	button 					= section.children("button").eq(0);

	if(data.country_id && data.country_id .value != ""){
		state_ul.find("li").each(function(){
			if( $(this).attr("data-country-id") == data.country_id.value){
				$(this).removeClass('inactive');
			}else{
				if( !$(this).hasClass('inactive') ){
					$(this).addClass('inactive');

					if( data["state_id"] && $(this).attr("data-id") == data["state_id"].value){
						data["state_id"].value = "";
						button.children(".val").eq(0).text("");
					}
				}
			}
		});
	}

	main.disableButtonIfEmptyList(state_ul);
}

main.filterCreativeFields = function(){
	var creative_ul 		= $("ul[data-id='creative_field']"),
	section 				= creative_ul.parent(),
 	button 					= section.children("button").eq(0);

	if(data["industry"] && data["industry"].value != ""){
		creative_ul.find("li").each(function(){
			if( $(this).attr("data-industry") == data["industry"].value){
				$(this).removeClass('inactive');
			}else{
				if( !$(this).hasClass('inactive') ){
					$(this).addClass('inactive');
					if( data["creative_field"] && $(this).attr("data-id") == data["creative_field"].value){
						data["creative_field"].value = "";
						button.children(".val").eq(0).text("");
					}
				}
			}
		});
	}

	main.disableButtonIfEmptyList(creative_ul);
}

main.disableButtonIfEmptyList = function(_ul){
	var _group = _ul.parent('.btn-group');

	if( _ul.find("li:not(.inactive)").length == 0 ){
		if( !_group.hasClass("disabled") )
			_group.addClass("disabled");
	}else{
		if( _group.hasClass("disabled") )
			_group.removeClass("disabled");
	}
}

main.filterSpecialtyDetails = function(){
	var item = data.specialties.value[ current.specialty_index ];

	// -- filter the details menu by specialty_id
	var details_ul 		= $("ul[data-id='details']"),
	curr_details 		= item.fields[ "details" ].value;

	details_ul.find("li").removeClass('inactive');
	details_ul.find("li[data-specialty!='"+ current.specialty_id +"']").addClass('inactive');
	main.removeInactiveDetailSelections( details_ul, curr_details );

	main.disableButtonIfEmptyList(details_ul);

	// -- filter the applications menu by specialty_id
	var applications_ul 	= $("ul[data-id='applications']"),
	curr_applications 		= item.fields[ "applications" ].value;

	applications_ul.find("li").removeClass('inactive');
	applications_ul.find("li[data-specialty!='"+ current.specialty_id +"']").addClass('inactive');
	main.removeInactiveDetailSelections( applications_ul, curr_applications );

	main.disableButtonIfEmptyList(applications_ul);
}

main.removeSpecialtyData = function( _id ){
	

	var index = main.getSpecialtyDataIndex(_id);

	data.specialties.value = $.grep( data.specialties.value, function(v,i){
		return v.id != _id;
	});

	console.log(data.specialties.value.length);

	if(data.specialties.value.length == 0){
		main.hideSpecialtyDetails();
	} else if(current.specialty_index == index){
		main.initSpecialtyDetails( data.specialties.value[0].id );
	}

	main.showUnsavedChanges();
}

main.showSpecialtyDetails = function(){
	$("#specialty-section-row .specialty-details").each( function(){
		if($(this).hasClass("inactive"))
			$(this).removeClass("inactive");
	});
}

main.hideSpecialtyDetails = function(){
	$("#specialty-section-row .specialty-details").each( function(){
		if(!$(this).hasClass("inactive"))
			$(this).addClass("inactive");
	});
}

/* -------- Project Links Methods -----------------------
---------------------------------------------------------
-------------------------------------------------------*/

main.addProjectLink = function(){
	var index = "new_" + String(Math.round(Math.random()*10000)),
	i = $(this),
	input = i.parent().children("input").eq(0),
	label = input.val();

	input.val("");

	$("#projectLinks").tagit("createTag", label, null, index );
}

main.updateCurrentProjectLinkData = function( _id, _val ){
	var item = data.project_links.value[ current.project_link_index ];
	item.fields[ _id ].value = _val;

	main.showUnsavedChanges();
}

main.getProjectLinkDataIndex = function( _id ){
	var index = -1;

	for(var i in data.project_links.value){
		var v = data.project_links.value[i];
		if(v.id == _id){
			index = i;
			break;
		}
	}

	return index;
}

main.addNewProjectLinksData = function( _id, _title ){
	data.project_links.value.push( main.getDefaultProjectLinkData(_id,_title) );

	main.initProjectLinksDetails( _id );

	main.showUnsavedChanges();

	console.log(data);
}

main.initProjectLinksDetails = function( _id ){
	current.project_link_index = main.getProjectLinkDataIndex( _id );

	$("#projectLinks li").removeClass("selected");
	$("#projectLinks li[data-id='" + _id + "']").addClass("selected");

	var fields = data.project_links.value[ current.project_link_index ].fields;
	
	for( var i in fields ){
		var v = fields[i];

		switch(v.type){
		case "span":
			$(".project-links-details span[data-id='" + i + "']").text(v.value);
			break;
		case "text-input":
			$(".project-links-details input[data-id='" + i + "']").val(v.value);
			break;
		}
	};

	if(data.project_links.value.length >= 1)
		main.showProjectLinksDetails();
}

main.showProjectLinksDetails = function(){
	$("#project-links-section-row .project-links-details").each( function(){
		var d = $(this);

		if(d.hasClass("inactive"))
			d.removeClass("inactive");
	});
}

main.hideProjectLinksDetails = function(){
	$("#project-links-section-row .project-links-details").each( function(){
		var d = $(this);

		if(!d.hasClass("inactive"))
			d.addClass("inactive");
	});
}

main.removeProjectLinksData = function( _id ){
	var index = main.getProjectLinkDataIndex(_id);

	data.project_links.value = $.grep( data.project_links.value, function(v,i){
		return v.id != _id;
	});

	if(data.project_links.value.length == 0){
		main.hideProjectLinksDetails();
	} else if(current.project_link_index == index){
		main.initProjectLinksDetails( data.project_links.value[0].id );
	}

	main.showUnsavedChanges();
}