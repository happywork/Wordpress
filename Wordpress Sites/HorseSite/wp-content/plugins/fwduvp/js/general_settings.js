jQuery(document).ready(function($)


{


	var DEFAULT_SKINS_NR = 8;


	


	var cur_settings_obj;


	


	$("#tabs").tabs();


	$("#aopwTitleColor").spectrum({

  	    color: "#888888",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});


	$("#bg_color").spectrum(


	{


  	    color: "#5a5a5a",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});
	
	$("#normal_HEX_buttons_color").spectrum({

  	    color: "#888888",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});
	
	$("#selected_HEX_buttons_color").spectrum({

  	    color: "#888888",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});


	


	$("#video_bg_color").spectrum(


	{


  	    color: "#5a5a5a",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#poster_bg_color").spectrum(


	{


  	    color: "#5a5a5a",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#buttons_tooltip_font_color").spectrum(


	{


  	    color: "#5a5a5a",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


    


    $("#time_color").spectrum(


	{


  	    color: "#888888",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


    


    $("#youtube_quality_button_normal_color").spectrum(


	{


  	    color: "#888888",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


    


    $("#youtube_quality_button_selected_color").spectrum(


	{


  	    color: "FFFFFF",


  	  	chooseText: "Update",


		showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


    


    $("#playlist_background_color").spectrum(


	{


  	    color: "888888",


  	  	chooseText: "Update",


		showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


    


    $("#playlist_name_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#thumbnail_normal_background_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#thumbnail_hover_background_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#thumbnail_disabled_background_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#search_input_background_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#search_input_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#youtube_and_folder_video_title_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#youtube_owner_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#youtube_description_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#border_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#main_labels_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#secondary_labels_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#share_and_embed_text_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#input_background_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#input_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#ads_text_normal_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#ads_text_selected_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#ads_border_normal_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


	


	$("#ads_border_selected_color").spectrum(


	{


  	    color: "#878787",


  	  	chooseText: "Update",


  	  	showInitial: true,


  	  	showInput: true,


  	  	allowEmpty:true,


  	  	preferredFormat: "hex6"


  	});


    


    $("#tabs").tooltip(


    {


        position:


        {


    		my: "center bottom-10",


    		at: "center top"


        }


    });


	


	$("#start_space_between_buttons_img").tooltip(


	{


		content: "<img src='" + spacesUrl + "startSpaceBetweenButtons.jpg' width='600' height='41'>",


		tooltipClass: "ui-tooltip-img",


		position:


        {


    		my: "center bottom-10",


    		at: "center top"


        }


	});


	


	$("#space_between_buttons_img").tooltip(


	{


		content: "<img src='" + spacesUrl + "spaceBetweenButtons.jpg' width='600' height='41'>",


		tooltipClass: "ui-tooltip-img",


		position:


        {


    		my: "center bottom-10",


    		at: "center top"


        }


	});
	
	
	
	$("#main_selector_background_selected_color").spectrum(

	{

  	    color: "#878787",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});
	
	$("#main_selector_text_normal_color").spectrum(

	{

  	    color: "#878787",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});
	
	$("#main_selector_text_selected_color").spectrum(

	{

  	    color: "#878787",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});
	
	$("#main_button_background_normal_color").spectrum(

	{

  	    color: "#878787",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});
	
	$("#main_button_background_selected_color").spectrum(

	{

  	    color: "#878787",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});
	
	$("#main_button_text_normal_color").spectrum(

	{

  	    color: "#878787",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});
	
	$("#main_button_text_selected_color").spectrum(

	{

  	    color: "#878787",

  	  	chooseText: "Update",

  	  	showInitial: true,

  	  	showInput: true,

  	  	allowEmpty:true,

  	  	preferredFormat: "hex6"

  	});





    function setSettings() {


    	var settings_obj = settingsAr[cur_order_id];


		


		// main settings


		$("#name").val(settings_obj.name);


		$("#display_type").val(settings_obj.display_type);


		$("#skin_path").val(settings_obj.skin_path);


		$("#initializeOnlyWhenVisible").val(settings_obj.initializeOnlyWhenVisible);
		
		$("#fill_entire_video_screen").val(settings_obj.fill_entire_video_screen);
		
		$("#use_HEX_colors_for_skin").val(settings_obj.use_HEX_colors_for_skin);
		


		$("#use_deeplinking").val(settings_obj.use_deeplinking);


		$("#right_click_context_menu").val(settings_obj.right_click_context_menu);


		$("#add_keyboard_support").val(settings_obj.add_keyboard_support);


		$("#auto_scale").val(settings_obj.auto_scale);


		$("#show_buttons_tooltips").val(settings_obj.show_buttons_tooltips);


		$("#stop_video_when_play_complete").val(settings_obj.stop_video_when_play_complete);


		$("#autoplay").val(settings_obj.autoplay);


		$("#loop").val(settings_obj.loop);


		$("#shuffle").val(settings_obj.shuffle);


		$("#max_width").val(settings_obj.max_width);


		$("#max_height").val(settings_obj.max_height);


		$("#volume").val(settings_obj.volume);
		
		
		$("#show_popup_ads_close_button").val(settings_obj.show_popup_ads_close_button);
		

		$("#bg_color").spectrum("set", settings_obj.bg_color != "transparent" ? settings_obj.bg_color : null);


		$("#video_bg_color").spectrum("set", settings_obj.video_bg_color != "transparent" ? settings_obj.video_bg_color : null);


		$("#poster_bg_color").spectrum("set", settings_obj.poster_bg_color != "transparent" ? settings_obj.poster_bg_color : null);


		$("#buttons_tooltip_hide_delay").val(settings_obj.buttons_tooltip_hide_delay);


		$("#buttons_tooltip_font_color").spectrum("set", settings_obj.buttons_tooltip_font_color != "transparent" ? settings_obj.buttons_tooltip_font_color : null);
		
		$("#main_selector_background_selected_color").spectrum("set", settings_obj.main_selector_background_selected_color != "transparent" ? settings_obj.main_selector_background_selected_color : null);
		
		$("#main_selector_text_normal_color").spectrum("set", settings_obj.main_selector_text_normal_color != "transparent" ? settings_obj.main_selector_text_normal_color : null);
		
		$("#main_selector_text_selected_color").spectrum("set", settings_obj.main_selector_text_selected_color != "transparent" ? settings_obj.main_selector_text_selected_color : null);
		
		$("#main_button_background_normal_color").spectrum("set", settings_obj.main_button_background_normal_color != "transparent" ? settings_obj.main_button_background_normal_color : null);
		
		$("#main_button_background_selected_color").spectrum("set", settings_obj.main_button_background_selected_color != "transparent" ? settings_obj.main_button_background_selected_color : null);
		
		$("#main_button_text_normal_color").spectrum("set", settings_obj.main_button_text_normal_color != "transparent" ? settings_obj.main_button_text_normal_color : null);
		
		$("#main_button_text_selected_color").spectrum("set", settings_obj.main_button_text_selected_color != "transparent" ? settings_obj.main_button_text_selected_color : null);


		


		// controller settings


		$("#show_controller_when_video_is_stopped").val(settings_obj.show_controller_when_video_is_stopped);


		$("#show_next_and_prev_buttons_in_controller").val(settings_obj.show_next_and_prev_buttons_in_controller);


		$("#show_volume_button").val(settings_obj.show_volume_button);
		$("#showErrorInfo").val(settings_obj.showErrorInfo);


		$("#show_time").val(settings_obj.show_time);


		$("#show_youtube_quality_button").val(settings_obj.show_youtube_quality_button);
		$("#showPlaybackRateButton").val(settings_obj.showPlaybackRateButton);
		$("#defaultPlaybackRate").val(settings_obj.defaultPlaybackRate);
		$("#privateVideoPassword").val(settings_obj.privateVideoPassword);
		$("#showPreloader").val(settings_obj.showPreloader);
	
		


		$("#show_info_button").val(settings_obj.show_info_button);


		$("#show_download_button").val(settings_obj.show_download_button);


		$("#show_share_button").val(settings_obj.show_share_button);


		$("#show_embed_button").val(settings_obj.show_embed_button);


		$("#show_fullscreen_button").val(settings_obj.show_fullscreen_button);


		$("#repeat_background").val(settings_obj.repeat_background);
		
		$("#disable_video_scrubber").val(settings_obj.disable_video_scrubber);
		

		$("#controller_height").val(settings_obj.controller_height);


		$("#controller_hide_delay").val(settings_obj.controller_hide_delay);


		$("#start_space_between_buttons").val(settings_obj.start_space_between_buttons);


		$("#space_between_buttons").val(settings_obj.space_between_buttons);


		$("#scrubbers_offset_width").val(settings_obj.scrubbers_offset_width);


		$("#main_scrubber_offest_top").val(settings_obj.main_scrubber_offest_top);
		$("#loggedInMessage").val(settings_obj.loggedInMessage);
		$("#playVideoOnlyWhenLoggedIn").val(settings_obj.playVideoOnlyWhenLoggedIn);
		
		$("#aopwTitle").val(settings_obj.aopwTitle);
		$("#aopwWidth").val(settings_obj.aopwWidth);
		$("#aopwHeight").val(settings_obj.aopwHeight);
		$("#aopwBorderSize").val(settings_obj.aopwBorderSize);
		$("#aopwTitleColor").spectrum("set", settings_obj.aopwTitleColor != "transparent" ? settings_obj.aopwTitleColor : null);



		$("#time_offset_left_width").val(settings_obj.time_offset_left_width);


		$("#time_offset_right_width").val(settings_obj.time_offset_right_width);


		$("#time_offset_top").val(settings_obj.time_offset_top);


		$("#volume_scrubber_height").val(settings_obj.volume_scrubber_height);


		$("#volume_scrubber_ofset_height").val(settings_obj.volume_scrubber_ofset_height);


		$("#time_color").spectrum("set", settings_obj.time_color != "transparent" ? settings_obj.time_color : null);


		$("#youtube_quality_button_normal_color").spectrum("set", settings_obj.youtube_quality_button_normal_color != "transparent" ? settings_obj.youtube_quality_button_normal_color : null);


		$("#youtube_quality_button_selected_color").spectrum("set", settings_obj.youtube_quality_button_selected_color != "transparent" ? settings_obj.youtube_quality_button_selected_color : null);


		$("#normal_HEX_buttons_color").spectrum("set", settings_obj.normal_HEX_buttons_color != "transparent" ? settings_obj.normal_HEX_buttons_color : null);
		
		$("#selected_HEX_buttons_color").spectrum("set", settings_obj.selected_HEX_buttons_color != "transparent" ? settings_obj.selected_HEX_buttons_color : null);
		


		// playlists window settings


		$("#show_playlists_button_and_playlists").val(settings_obj.show_playlists_button_and_playlists);
		$("#use_playlists_select_box").val(settings_obj.use_playlists_select_box);
		


		$("#show_playlists_by_default").val(settings_obj.show_playlists_by_default);


		$("#thumbnail_selected_type").val(settings_obj.thumbnail_selected_type);


		$("#start_at_playlist").val(settings_obj.start_at_playlist);


		$("#buttons_margins").val(settings_obj.buttons_margins);


		$("#thumbnail_max_width").val(settings_obj.thumbnail_max_width);


		$("#thumbnail_max_height").val(settings_obj.thumbnail_max_height);


		$("#horizontal_space_between_thumbnails").val(settings_obj.horizontal_space_between_thumbnails);


		$("#vertical_space_between_thumbnails").val(settings_obj.vertical_space_between_thumbnails);


		


		// playlist settings


		$("#show_playlist_button_and_playlist").val(settings_obj.show_playlist_button_and_playlist);


		$("#playlist_position").val(settings_obj.playlist_position);


		$("#show_playlist_by_default").val(settings_obj.show_playlist_by_default);


		$("#show_playlist_name").val(settings_obj.show_playlist_name);


		$("#show_search_input").val(settings_obj.show_search_input);


		$("#show_loop_button").val(settings_obj.show_loop_button);


		$("#show_shuffle_button").val(settings_obj.show_shuffle_button);


		$("#show_next_and_prev_buttons").val(settings_obj.show_next_and_prev_buttons);


		$("#force_disable_download_button_for_folder").val(settings_obj.force_disable_download_button_for_folder);


		$("#add_mouse_wheel_support").val(settings_obj.add_mouse_wheel_support);


		$("#start_at_random_video").val(settings_obj.start_at_random_video);


		$("#folder_video_label").val(settings_obj.folder_video_label);


		$("#playlist_right_width").val(settings_obj.playlist_right_width);


		$("#playlist_bottom_height").val(settings_obj.playlist_bottom_height);


		$("#start_at_video").val(settings_obj.start_at_video);


		$("#max_playlist_items").val(settings_obj.max_playlist_items);


		$("#thumbnail_width").val(settings_obj.thumbnail_width);


		$("#thumbnail_height").val(settings_obj.thumbnail_height);


		$("#space_between_controller_and_playlist").val(settings_obj.space_between_controller_and_playlist);


		$("#space_between_thumbnails").val(settings_obj.space_between_thumbnails);


		$("#scrollbar_offest_width").val(settings_obj.scrollbar_offest_width);


		$("#scollbar_speed_sensitivity").val(settings_obj.scollbar_speed_sensitivity);


		$("#playlist_background_color").spectrum("set", settings_obj.playlist_background_color != "transparent" ? settings_obj.playlist_background_color : null);


		$("#playlist_name_color").spectrum("set", settings_obj.playlist_name_color != "transparent" ? settings_obj.playlist_name_color : null);


		$("#thumbnail_normal_background_color").spectrum("set", settings_obj.thumbnail_normal_background_color != "transparent" ? settings_obj.thumbnail_normal_background_color : null);


		$("#thumbnail_hover_background_color").spectrum("set", settings_obj.thumbnail_hover_background_color != "transparent" ? settings_obj.thumbnail_hover_background_color : null);


		$("#thumbnail_disabled_background_color").spectrum("set", settings_obj.thumbnail_disabled_background_color != "transparent" ? settings_obj.thumbnail_disabled_background_color : null);


		$("#search_input_background_color").spectrum("set", settings_obj.search_input_background_color != "transparent" ? settings_obj.search_input_background_color : null);


		$("#search_input_color").spectrum("set", settings_obj.search_input_color != "transparent" ? settings_obj.search_input_color : null);


		$("#youtube_and_folder_video_title_color").spectrum("set", settings_obj.youtube_and_folder_video_title_color != "transparent" ? settings_obj.youtube_and_folder_video_title_color : null);


		$("#youtube_owner_color").spectrum("set", settings_obj.youtube_owner_color != "transparent" ? settings_obj.youtube_owner_color : null);


		$("#youtube_description_color").spectrum("set", settings_obj.youtube_description_color != "transparent" ? settings_obj.youtube_description_color : null);


		


		// logo settings


		$("#show_logo").val(settings_obj.show_logo);


		$("#hide_logo_with_controller").val(settings_obj.hide_logo_with_controller);


		$("#logo_position").val(settings_obj.logo_position);


		$("#logo_path").val(settings_obj.logo_path);


		$("#logo_link").val(settings_obj.logo_link);


		$("#logo_margins").val(settings_obj.logo_margins);


		


		// embed and info windows settings


		$("#embed_and_info_window_close_button_margins").val(settings_obj.embed_and_info_window_close_button_margins);


		$("#border_color").spectrum("set", settings_obj.border_color != "transparent" ? settings_obj.border_color : null);


		$("#main_labels_color").spectrum("set", settings_obj.main_labels_color != "transparent" ? settings_obj.main_labels_color : null);


		$("#secondary_labels_color").spectrum("set", settings_obj.secondary_labels_color != "transparent" ? settings_obj.secondary_labels_color : null);


		$("#share_and_embed_text_color").spectrum("set", settings_obj.share_and_embed_text_color != "transparent" ? settings_obj.share_and_embed_text_color : null);


		$("#input_background_color").spectrum("set", settings_obj.input_background_color != "transparent" ? settings_obj.input_background_color : null);


		$("#input_color").spectrum("set", settings_obj.input_color != "transparent" ? settings_obj.input_color : null);


		


		// ads settings


		$("#open_new_page_at_the_end_of_the_ads").val(settings_obj.open_new_page_at_the_end_of_the_ads);


		$("#play_ads_only_once").val(settings_obj.play_ads_only_once);


		$("#ads_buttons_position").val(settings_obj.ads_buttons_position);


		$("#skip_to_video_text").val(settings_obj.skip_to_video_text);


		$("#skip_to_video_button_text").val(settings_obj.skip_to_video_button_text);


		$("#ads_text_normal_color").spectrum("set", settings_obj.ads_text_normal_color != "transparent" ? settings_obj.ads_text_normal_color : null);


		$("#ads_text_selected_color").spectrum("set", settings_obj.ads_text_selected_color != "transparent" ? settings_obj.ads_text_selected_color : null);


		$("#ads_border_normal_color").spectrum("set", settings_obj.ads_border_normal_color != "transparent" ? settings_obj.ads_border_normal_color : null);


		$("#ads_border_selected_color").spectrum("set", settings_obj.ads_border_selected_color != "transparent" ? settings_obj.ads_border_selected_color : null);


    }





    function init(){   


    	$.each(settingsAr, function(i, el)


		{


			$("#skins").append("<option value='" + el.id + "'>" + el.name + "</option>");


		});


    	


    	$("#skins").val(sid);


    	


    	if (cur_order_id < DEFAULT_SKINS_NR){


    		$("#update_btn").hide();


            $("#del_btn").hide();


    	}else{


    		$("#update_btn").show();


            $("#del_btn").show();


    	}


	    


	    setSettings();


	    


	    $("#preset_id").html("ID : " + sid);


	    


	    $("#tabs").tabs("option", "active", tab_init_id);


    }


    


    init();


    


    $("#skins").change(function(){


    	sid = parseInt($("#skins").val());


    	


    	$.each(settingsAr, function(i, el){


			if (sid == el.id){


				cur_order_id = i;


			}


		});


    	


    	setSettings();


    	


    	if (cur_order_id < DEFAULT_SKINS_NR){


    		$("#update_btn").hide();


            $("#del_btn").hide();


    	}else{


    		$("#update_btn").show();


            $("#del_btn").show();


    	}


    	


    	allFields.removeClass("ui-state-error");


    	$("#tips").text("All form fields are required.");


    	


    	$("#preset_id").html("ID : " + sid);


    });


    


    function updateSettings() {


		// main settings


		cur_settings_obj.id = sid;


		cur_settings_obj.name = $("#name").val().replace(/"/g, "'");


		cur_settings_obj.display_type = $("#display_type").val();


		cur_settings_obj.initializeOnlyWhenVisible = $("#initializeOnlyWhenVisible").val();
		
		cur_settings_obj.fill_entire_video_screen = $("#fill_entire_video_screen").val();
		
		cur_settings_obj.use_HEX_colors_for_skin = $("#use_HEX_colors_for_skin").val();
		
		


		cur_settings_obj.showErrorInfo = $("#showErrorInfo").val();


		cur_settings_obj.skin_path = $("#skin_path").val();


		cur_settings_obj.use_deeplinking = $("#use_deeplinking").val();


		cur_settings_obj.right_click_context_menu = $("#right_click_context_menu").val();


		cur_settings_obj.add_keyboard_support = $("#add_keyboard_support").val();


		cur_settings_obj.auto_scale = $("#auto_scale").val();


		cur_settings_obj.show_buttons_tooltips = $("#show_buttons_tooltips").val();


		cur_settings_obj.stop_video_when_play_complete = $("#stop_video_when_play_complete").val();


		cur_settings_obj.autoplay = $("#autoplay").val();


		cur_settings_obj.loop = $("#loop").val();


		cur_settings_obj.shuffle = $("#shuffle").val();


		cur_settings_obj.max_width = parseInt($("#max_width").val());


		cur_settings_obj.max_height = parseInt($("#max_height").val());


		cur_settings_obj.volume = parseFloat($("#volume").val());
		cur_settings_obj.show_popup_ads_close_button = $("#show_popup_ads_close_button").val();
		
		cur_settings_obj.loggedInMessage = $("#loggedInMessage").val();
		cur_settings_obj.playVideoOnlyWhenLoggedIn = $("#playVideoOnlyWhenLoggedIn").val();


		cur_settings_obj.bg_color = $("#bg_color").spectrum("get") ? $("#bg_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.video_bg_color = $("#video_bg_color").spectrum("get") ? $("#video_bg_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.poster_bg_color = $("#poster_bg_color").spectrum("get") ? $("#poster_bg_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.buttons_tooltip_hide_delay = parseFloat($("#buttons_tooltip_hide_delay").val());


		cur_settings_obj.buttons_tooltip_font_color = $("#buttons_tooltip_font_color").spectrum("get") ? $("#buttons_tooltip_font_color").spectrum("get").toHexString() : "transparent";
		
		
		cur_settings_obj.main_selector_background_selected_color = $("#main_selector_background_selected_color").spectrum("get") ? $("#main_selector_background_selected_color").spectrum("get").toHexString() : "transparent";
		
		cur_settings_obj.main_selector_text_normal_color = $("#main_selector_text_normal_color").spectrum("get") ? $("#main_selector_text_normal_color").spectrum("get").toHexString() : "transparent";
		
		cur_settings_obj.main_selector_text_selected_color = $("#main_selector_text_selected_color").spectrum("get") ? $("#main_selector_text_selected_color").spectrum("get").toHexString() : "transparent";
		
		cur_settings_obj.main_button_background_normal_color = $("#main_button_background_normal_color").spectrum("get") ? $("#main_button_background_normal_color").spectrum("get").toHexString() : "transparent";
		
		cur_settings_obj.main_button_background_selected_color = $("#main_button_background_selected_color").spectrum("get") ? $("#main_button_background_selected_color").spectrum("get").toHexString() : "transparent";
		
		cur_settings_obj.main_button_text_normal_color = $("#main_button_text_normal_color").spectrum("get") ? $("#main_button_text_normal_color").spectrum("get").toHexString() : "transparent";
		
		cur_settings_obj.main_button_text_selected_color = $("#main_button_text_selected_color").spectrum("get") ? $("#main_button_text_selected_color").spectrum("get").toHexString() : "transparent";


		


		// controller settings


		cur_settings_obj.show_controller_when_video_is_stopped = $("#show_controller_when_video_is_stopped").val();


		cur_settings_obj.show_next_and_prev_buttons_in_controller = $("#show_next_and_prev_buttons_in_controller").val();


		cur_settings_obj.show_volume_button = $("#show_volume_button").val();


		cur_settings_obj.show_time = $("#show_time").val();


		cur_settings_obj.show_youtube_quality_button = $("#show_youtube_quality_button").val();
		cur_settings_obj.showPlaybackRateButton = $("#showPlaybackRateButton").val();
		cur_settings_obj.defaultPlaybackRate = $("#defaultPlaybackRate").val();
		cur_settings_obj.privateVideoPassword = $("#privateVideoPassword").val();
		cur_settings_obj.showPreloader = $("#showPreloader").val();
		


		cur_settings_obj.show_info_button = $("#show_info_button").val();


		cur_settings_obj.show_download_button = $("#show_download_button").val();


		cur_settings_obj.show_share_button = $("#show_share_button").val();


		cur_settings_obj.show_embed_button = $("#show_embed_button").val();


		cur_settings_obj.show_fullscreen_button = $("#show_fullscreen_button").val();


		cur_settings_obj.repeat_background = $("#repeat_background").val();
		
		cur_settings_obj.disable_video_scrubber = $("#disable_video_scrubber").val();


		cur_settings_obj.controller_height = parseInt($("#controller_height").val());


		cur_settings_obj.controller_hide_delay = parseFloat($("#controller_hide_delay").val());


		cur_settings_obj.start_space_between_buttons = parseInt($("#start_space_between_buttons").val());


		cur_settings_obj.space_between_buttons = parseInt($("#space_between_buttons").val());


		cur_settings_obj.scrubbers_offset_width = parseInt($("#scrubbers_offset_width").val());


		cur_settings_obj.main_scrubber_offest_top = parseInt($("#main_scrubber_offest_top").val());


		cur_settings_obj.time_offset_left_width = parseInt($("#time_offset_left_width").val());


		cur_settings_obj.time_offset_right_width = parseInt($("#time_offset_right_width").val());


		cur_settings_obj.time_offset_top = parseInt($("#time_offset_top").val());


		cur_settings_obj.volume_scrubber_height = parseInt($("#volume_scrubber_height").val());
		
		cur_settings_obj.aopwTitle = $("#aopwTitle").val();
		cur_settings_obj.aopwWidth = parseInt($("#aopwWidth").val());
		cur_settings_obj.aopwHeight = parseInt($("#aopwHeight").val());
		cur_settings_obj.aopwBorderSize = parseInt($("#aopwBorderSize").val());
		cur_settings_obj.aopwTitleColor = $("#aopwTitleColor").spectrum("get") ? $("#aopwTitleColor").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.volume_scrubber_ofset_height = parseInt($("#volume_scrubber_ofset_height").val());


		cur_settings_obj.time_color = $("#time_color").spectrum("get") ? $("#time_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.youtube_quality_button_normal_color = $("#youtube_quality_button_normal_color").spectrum("get") ? $("#youtube_quality_button_normal_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.youtube_quality_button_selected_color = $("#youtube_quality_button_selected_color").spectrum("get") ? $("#youtube_quality_button_selected_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.normal_HEX_buttons_color = $("#normal_HEX_buttons_color").spectrum("get") ? $("#normal_HEX_buttons_color").spectrum("get").toHexString() : "transparent";
		
		cur_settings_obj.selected_HEX_buttons_color = $("#selected_HEX_buttons_color").spectrum("get") ? $("#selected_HEX_buttons_color").spectrum("get").toHexString() : "transparent";
		


		// playlists window settings


		cur_settings_obj.show_playlists_button_and_playlists = $("#show_playlists_button_and_playlists").val();
		cur_settings_obj.use_playlists_select_box = $("#use_playlists_select_box").val();
		


		cur_settings_obj.show_playlists_by_default = $("#show_playlists_by_default").val();


		cur_settings_obj.thumbnail_selected_type = $("#thumbnail_selected_type").val();


		cur_settings_obj.start_at_playlist = parseInt($("#start_at_playlist").val());


		cur_settings_obj.buttons_margins = parseInt($("#buttons_margins").val());


		cur_settings_obj.thumbnail_max_width = parseInt($("#thumbnail_max_width").val());


		cur_settings_obj.thumbnail_max_height = parseInt($("#thumbnail_max_height").val());


		cur_settings_obj.horizontal_space_between_thumbnails = parseInt($("#horizontal_space_between_thumbnails").val());


		cur_settings_obj.vertical_space_between_thumbnails = parseInt($("#vertical_space_between_thumbnails").val());


		


		// playlist settings


		cur_settings_obj.show_playlist_button_and_playlist = $("#show_playlist_button_and_playlist").val();


		cur_settings_obj.playlist_position = $("#playlist_position").val();


		cur_settings_obj.show_playlist_by_default = $("#show_playlist_by_default").val();


		cur_settings_obj.show_playlist_name = $("#show_playlist_name").val();


		cur_settings_obj.show_search_input = $("#show_search_input").val();


		cur_settings_obj.show_loop_button = $("#show_loop_button").val();


		cur_settings_obj.show_shuffle_button = $("#show_shuffle_button").val();


		cur_settings_obj.show_next_and_prev_buttons = $("#show_next_and_prev_buttons").val();


		cur_settings_obj.force_disable_download_button_for_folder = $("#force_disable_download_button_for_folder").val();


		cur_settings_obj.add_mouse_wheel_support = $("#add_mouse_wheel_support").val();


		cur_settings_obj.start_at_random_video = $("#start_at_random_video").val();


		cur_settings_obj.folder_video_label = $("#folder_video_label").val().replace(/"/g, "'");


		cur_settings_obj.playlist_right_width = parseInt($("#playlist_right_width").val());


		cur_settings_obj.playlist_bottom_height = parseInt($("#playlist_bottom_height").val());


		cur_settings_obj.start_at_video = parseInt($("#start_at_video").val());


		cur_settings_obj.max_playlist_items = parseInt($("#max_playlist_items").val());


		cur_settings_obj.thumbnail_width = parseInt($("#thumbnail_width").val());


		cur_settings_obj.thumbnail_height = parseInt($("#thumbnail_height").val());


		cur_settings_obj.space_between_controller_and_playlist = parseInt($("#space_between_controller_and_playlist").val());


		cur_settings_obj.space_between_thumbnails = parseInt($("#space_between_thumbnails").val());


		cur_settings_obj.scrollbar_offest_width = parseInt($("#scrollbar_offest_width").val());


		cur_settings_obj.scollbar_speed_sensitivity = parseFloat($("#scollbar_speed_sensitivity").val());


		cur_settings_obj.playlist_background_color = $("#playlist_background_color").spectrum("get") ? $("#playlist_background_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.playlist_name_color = $("#playlist_name_color").spectrum("get") ? $("#playlist_name_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.thumbnail_normal_background_color = $("#thumbnail_normal_background_color").spectrum("get") ? $("#thumbnail_normal_background_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.thumbnail_hover_background_color = $("#thumbnail_hover_background_color").spectrum("get") ? $("#thumbnail_hover_background_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.thumbnail_disabled_background_color = $("#thumbnail_disabled_background_color").spectrum("get") ? $("#thumbnail_disabled_background_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.search_input_background_color = $("#search_input_background_color").spectrum("get") ? $("#search_input_background_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.search_input_color = $("#search_input_color").spectrum("get") ? $("#search_input_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.youtube_and_folder_video_title_color = $("#youtube_and_folder_video_title_color").spectrum("get") ? $("#youtube_and_folder_video_title_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.youtube_owner_color = $("#youtube_owner_color").spectrum("get") ? $("#youtube_owner_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.youtube_description_color = $("#youtube_description_color").spectrum("get") ? $("#youtube_description_color").spectrum("get").toHexString() : "transparent";


		


		// logo settings


		cur_settings_obj.show_logo = $("#show_logo").val();


		cur_settings_obj.hide_logo_with_controller = $("#hide_logo_with_controller").val();


		cur_settings_obj.logo_position = $("#logo_position").val();


		cur_settings_obj.logo_path = $("#logo_path").val().replace(/"/g, "'");


		cur_settings_obj.logo_link = $("#logo_link").val().replace(/"/g, "'");


		cur_settings_obj.logo_margins = parseInt($("#logo_margins").val());


		


		// embed and info windows settings


		cur_settings_obj.embed_and_info_window_close_button_margins = parseInt($("#embed_and_info_window_close_button_margins").val());


		cur_settings_obj.border_color = $("#border_color").spectrum("get") ? $("#border_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.main_labels_color = $("#main_labels_color").spectrum("get") ? $("#main_labels_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.secondary_labels_color = $("#secondary_labels_color").spectrum("get") ? $("#secondary_labels_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.share_and_embed_text_color = $("#share_and_embed_text_color").spectrum("get") ? $("#share_and_embed_text_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.input_background_color = $("#input_background_color").spectrum("get") ? $("#input_background_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.input_color = $("#input_color").spectrum("get") ? $("#input_color").spectrum("get").toHexString() : "transparent";


		


		// ads settings


		cur_settings_obj.open_new_page_at_the_end_of_the_ads = $("#open_new_page_at_the_end_of_the_ads").val();


		cur_settings_obj.play_ads_only_once = $("#play_ads_only_once").val();


		cur_settings_obj.ads_buttons_position = $("#ads_buttons_position").val();


		cur_settings_obj.skip_to_video_text = $("#skip_to_video_text").val().replace(/"/g, "'");


		cur_settings_obj.skip_to_video_button_text = $("#skip_to_video_button_text").val().replace(/"/g, "'");


		cur_settings_obj.ads_text_normal_color = $("#ads_text_normal_color").spectrum("get") ? $("#ads_text_normal_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.ads_text_selected_color = $("#ads_text_selected_color").spectrum("get") ? $("#ads_text_selected_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.ads_border_normal_color = $("#ads_border_normal_color").spectrum("get") ? $("#ads_border_normal_color").spectrum("get").toHexString() : "transparent";


		cur_settings_obj.ads_border_selected_color = $("#ads_border_selected_color").spectrum("get") ? $("#ads_border_selected_color").spectrum("get").toHexString() : "transparent";


    }


    


    function checkLength(el, prop, min, max)


	{


      	if ((el.val().length > max) || (el.val().length < min))


	    {


        	el.addClass("ui-state-error");


        	updateTips("Length of " + prop + " must be between " + min + " and " + max + ".");


        	


        	return false;


      	}


	    else


		{


        	return true;


      	}


	}


    


    function checkIfIntegerAndLength(el, prop, min, max)


	{


    	var int_reg_exp = /-?[0-9]+/;


    	var str = el.val();


    	var res = str.match(int_reg_exp);


    	


    	if (res && (res[0] == str))


        {


    		if ((el.val().length > max) || (el.val().length < min))


    	    {


            	el.addClass("ui-state-error");


            	updateTips("Length of " + prop + " must be between " + min + " and " + max + ".");


            	


            	return false;


          	}


    	    else


    		{


            	return true;


          	}


        }


        else


        {


        	el.addClass("ui-state-error");


        	updateTips("The " + prop + " field value must be an integer.");


        	


        	return false;


        }


	}


    


    function checkIfFloatAndLength(el, prop, min, max)


	{


    	var float_reg_exp = /1\.0|0?\.[0-9]+|[01]/;


    	var str = el.val();


    	var res = str.match(float_reg_exp);


    	


    	if (res && (res[0] == str))


        {


    		if ((el.val().length > max) || (el.val().length < min))


    	    {


            	el.addClass("ui-state-error");


            	updateTips("Length of " + prop + " must be between " + min + " and " + max + ".");


            	


            	return false;


          	}


    	    else


    		{


            	return true;


          	}


        }


        else


        {


        	el.addClass("ui-state-error");


        	updateTips("The " + prop + " field value must be a float number.");


        	


        	return false;


        }


	}


	


	function checkIfFloatAndLength2(el, prop, min, max)


	{


    	var float_reg_exp = /[0-9]*\.?[0-9]+/;


    	var str = el.val();


    	var res = str.match(float_reg_exp);


    	


    	if (res && (res[0] == str))


        {


    		if ((el.val().length > max) || (el.val().length < min))


    	    {


            	el.addClass("ui-state-error");


            	updateTips("Length of " + prop + " must be between " + min + " and " + max + ".");


            	


            	return false;


          	}


    	    else


    		{


            	return true;


          	}


        }


        else


        {


        	el.addClass("ui-state-error");


        	updateTips("The " + prop + " field value must be a float number.");


        	


        	return false;


        }


	}





	function updateTips(txt)


	{


		$("#tips").text(txt).addClass("ui-state-highlight");





	    setTimeout(function()


		{


	    	$("#tips").removeClass("ui-state-highlight", 1500);


	    }, 500);


	    


	    $("#tips").addClass("fwd-error");


	}


	


	var allFields = $([]).add($("#name")).add($("#max_width")).add($("#max_height")).add($("#volume")).add($("#buttons_tooltip_hide_delay")).add($("#controller_height")).add($("#controller_hide_delay"))


							.add($("#start_space_between_buttons")).add($("#space_between_buttons")).add($("#scrubbers_offset_width")).add($("#main_scrubber_offest_top")).add($("#time_offset_left_width")).add($("#time_offset_right_width"))


							.add($("#time_offset_top")).add($("#volume_scrubber_height")).add($("#volume_scrubber_ofset_height")).add($("#start_at_playlist")).add($("#buttons_margins")).add($("#thumbnail_max_width")).add($("#thumbnail_max_height"))


							.add($("#horizontal_space_between_thumbnails")).add($("#vertical_space_between_thumbnails")).add($("#playlist_right_width")).add($("#playlist_bottom_height")).add($("#start_at_video")).add($("#max_playlist_items"))


							.add($("#thumbnail_width")).add($("#thumbnail_height")).add($("#space_between_controller_and_playlist")).add($("#space_between_thumbnails")).add($("#scrollbar_offest_width")).add($("#scollbar_speed_sensitivity"))


							.add($("#logo_path")).add($("#logo_link")).add($("#logo_margins")).add($("#embed_and_info_window_close_button_margins")).add($("#skip_to_video_text")).add($("#skip_to_video_button_text")).add($("#aopwTitle")).add($("#aopwWidth")).add($("#aopwHeight")).add($("#aopwBorderSize"));


	var fValid = false;


	 


	function validateFields(){


		fValid = true;


     	


      	allFields.removeClass("ui-state-error");





      	// main settings


      	fValid = fValid && checkLength($("#name"), "name", 1, 64);


      	fValid = fValid && checkIfIntegerAndLength($("#max_width"), "maximum width", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#max_height"), "maximum height", 1, 8);


      	fValid = fValid && checkIfFloatAndLength($("#volume"), "volume", 1, 8);


      	fValid = fValid && checkIfFloatAndLength2($("#buttons_tooltip_hide_delay"), "buttons tooltip hide delay", 1, 8);


      	


      	if (!fValid){


      		$("#tabs").tabs("option", "active", 0);


      		window.scrollTo(0,0);	


      		return false;


      	}


		


		// controller settings


      	fValid = fValid && checkIfIntegerAndLength($("#controller_height"), "controller height", 1, 8);


		fValid = fValid && checkIfFloatAndLength2($("#controller_hide_delay"), "controller hide delay", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#start_space_between_buttons"), "start space between buttons", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#space_between_buttons"), "space between buttons", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#scrubbers_offset_width"), "scrubbers offset width", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#main_scrubber_offest_top"), "main scrubber offset top", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#time_offset_left_width"), "time offset left width", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#time_offset_right_width"), "time offset right width", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#time_offset_top"), "time offset top", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#volume_scrubber_height"), "volume scrubber height", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#volume_scrubber_ofset_height"), "volume scrubber offset height", 1, 8);


      	


      	if (!fValid)


      	{


      		$("#tabs").tabs("option", "active", 1);


      		


      		window.scrollTo(0,0);


      		


      		return false;


      	}


      	


      	// playlists window settings settings


      	fValid = fValid && checkIfIntegerAndLength($("#start_at_playlist"), "start at playlist", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#buttons_margins"), "buttons margins", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#thumbnail_max_width"), "thumbnail maximum width", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#thumbnail_max_height"), "thumbnail maximum height", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#horizontal_space_between_thumbnails"), "horizontal space between thumbnails", 1, 8);


      	fValid = fValid && checkIfIntegerAndLength($("#vertical_space_between_thumbnails"), "vertical space between thumbnails", 1, 8);


      	


      	if (!fValid)


      	{


      		$("#tabs").tabs("option", "active", 2);


      		


      		window.scrollTo(0,0);


      		


      		return false;


      	}


      	


      	// playlist settings


    	fValid = fValid && checkIfIntegerAndLength($("#playlist_right_width"), "playlist right width", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#playlist_bottom_height"), "playlist bottom height", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#start_at_video"), "start at video", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#max_playlist_items"), "maximum playlist items", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#thumbnail_width"), "thumbnail_width", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#thumbnail_height"), "thumbnail height", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#space_between_controller_and_playlist"), "space between controller and playlist", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#space_between_thumbnails"), "space between thumbnails", 1, 8);


    	fValid = fValid && checkIfIntegerAndLength($("#scrollbar_offest_width"), "scrollbar offset width", 1, 8);


    	fValid = fValid && checkIfFloatAndLength($("#scollbar_speed_sensitivity"), "scrollbar speed sensitivity", 1, 8);


      	


      	if (!fValid)


      	{


      		$("#tabs").tabs("option", "active", 3);


      		


      		window.scrollTo(0,0);


      		


      		return false;


      	}


		


		// logo settings


		fValid = fValid && checkLength($("#logo_path"), "logo path", 0, 256);


		fValid = fValid && checkLength($("#logo_link"), "logo link", 0, 256);


    	fValid = fValid && checkIfIntegerAndLength($("#logo_margins"), "logo margins", 1, 8);


      	


      	if (!fValid)


      	{


      		$("#tabs").tabs("option", "active", 4);


      		


      		window.scrollTo(0,0);


      		


      		return false;


      	}


		


		// embed and info windows settings


    	fValid = fValid && checkIfIntegerAndLength($("#embed_and_info_window_close_button_margins"), "embed and info window close button margins", 1, 8);


      	


      	if (!fValid)


      	{


      		$("#tabs").tabs("option", "active", 5);


      		


      		window.scrollTo(0,0);


      		


      		return false;


      	}


		


		// ads settings


		fValid = fValid && checkLength($("#skip_to_video_text"), "skip to video text", 0, 256);


		fValid = fValid && checkLength($("#skip_to_video_button_text"), "skip to video button text", 0, 256);


      	


      	if (!fValid)


      	{


      		$("#tabs").tabs("option", "active", 6);


      		


      		window.scrollTo(0,0);


      		


      		return false;


      	}
		
		// popup on pause settings
		fValid = fValid && checkLength($("#aopwTitle"), "title", 0, 256);
		fValid = fValid && checkIfIntegerAndLength($("#aopwWidth"), "maximum width", 1, 10);
		fValid = fValid && checkIfIntegerAndLength($("#aopwHeight"), "maximum height", 1, 10);
		fValid = fValid && checkIfIntegerAndLength($("#aopwBorderSize"), "advertisement border size", 1, 10);

      	if (!fValid){
      		$("#tabs").tabs("option", "active", 7);
      		window.scrollTo(0,0);
      		return false;
      	}


	}


    


    $("#add_btn").click(function(e){


		if($("#name").val() == settingsAr[cur_order_id]["name"]){


			updateTips("Please make sure that the preset name is unique");


			$("#name").addClass("ui-state-error");


			$("#tabs").tabs("option", "active", 0);


			window.scrollTo(0,0);


			return false;


		};


		


    	validateFields();





      	if (fValid) {


      		cur_settings_obj = {};


        	


        	sid = $("#skins option").length;


        	cur_order_id = $("#skins option").length;


        	


      		var idsAr = [];


      		


      		if (sid > DEFAULT_SKINS_NR){


      			$.each(settingsAr, function(i, el){


    				idsAr.push(el.id);


    			});


          		


          		for (var i=DEFAULT_SKINS_NR; i<settingsAr.length; i++){


          			if ($.inArray(i, idsAr) == -1){


          				sid = i;


          				break;


          			}


          		}


      		}


        	


	    	updateSettings();


	    	


	    	settingsAr.push(cur_settings_obj);


	    	


	    	var data_obj = {


	    		action: "add",


	    		set_id: sid,


	    		set_order_id: cur_order_id,


	    		tab_init_id: $("#tabs").tabs("option", "active"),


	    		settings_ar: settingsAr


	    	};


	    	


	    	$("#settings_data").val(JSON.stringify(data_obj));


        }else{


      		return false;


      	}


    });


    


    $("#update_btn").click(function()


	{


    	validateFields();





      	if (fValid)


        {


      		cur_settings_obj = {};


      		


	    	updateSettings();


	    	


	    	settingsAr[cur_order_id] = cur_settings_obj;


	    	


	    	var data_obj =


	    	{


	    		action: "save",


	    		set_id: sid,


	    		set_order_id: cur_order_id,


	    		tab_init_id: $("#tabs").tabs("option", "active"),


	    		settings_ar: settingsAr


	    	};


	    	


	    	$("#settings_data").val(JSON.stringify(data_obj));


        }


      	else


      	{


      		return false;


      	}


    });


    


    $("#del_btn").click(function()


	{


    	settingsAr.splice(cur_order_id, 1);


    	


    	var data_obj =


    	{


    		action: "del",


    		settings_ar: settingsAr


    	};


    	


    	$("#settings_data").val(JSON.stringify(data_obj));


    });


});