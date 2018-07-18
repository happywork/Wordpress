<?php





// main FWD Ultimate Video Player Data class


class FWDUVPData {


	


	// constants


	const DEFAULT_SKINS_NR = 8;


	


	// variables


	public $settings_ar;


    public $main_playlists_ar;


	


    // constructor


    public function init(){


		$cur_data = get_option("fwduvp_data");


		


		//$this->reset_presets();


	       


	    if (!$cur_data){


	    	$this->init_settings();


	    	$this->set_data();


	    }


		


		$this->set_updates();


		//$this->reset_presets();


		$this->get_data();

    }


	


	private function reset_presets(){


		$this->get_data();


		$this->init_settings();


	    $this->set_data();


	}


	


	


	private function set_updates()


	{


		$this->get_data();


		


   		foreach ($this->settings_ar as &$preset)


    	{
		

			// update new or existing fields


			if (!array_key_exists("initializeOnlyWhenVisible", $preset)){

	    		$preset["initializeOnlyWhenVisible"] =  "yes";

			}
			
			if (!array_key_exists("showPlaybackRateButton", $preset)){
	    		$preset["showPlaybackRateButton"] =  "yes";
			}
			
			if (!array_key_exists("showErrorInfo", $preset)){

				$preset["showErrorInfo"] = "yes";
			}
			
			if (!array_key_exists("playVideoOnlyWhenLoggedIn", $preset)){

				$preset["playVideoOnlyWhenLoggedIn"] = "no";
			}
			
			if (!array_key_exists("loggedInMessage", $preset)){

				$preset["loggedInMessage"] = "Please loggin to view this video.";
			}	
			
			
			if (!array_key_exists("showPreloader", $preset)){
	    		$preset["showPreloader"] =  "yes";
			}
			
			if (!array_key_exists("defaultPlaybackRate", $preset)){
	    		$preset["defaultPlaybackRate"] =  1;
			}
			
			if (!array_key_exists("privateVideoPassword", $preset)){
	    		$preset["privateVideoPassword"] = "428c841430ea18a70f7b06525d4b748a";
			}
			
			
			
			if (!array_key_exists("use_playlists_select_box", $preset)){
	    		$preset["use_playlists_select_box"] =  "yes";
			}
			
			if (!array_key_exists("fill_entire_video_screen", $preset)){

	    		$preset["fill_entire_video_screen"] =  "yes";

			}
			
			if (!array_key_exists("use_HEX_colors_for_skin", $preset)){

	    		$preset["use_HEX_colors_for_skin"] =  "no";

			}
			
			if (!array_key_exists("normal_HEX_buttons_color", $preset)){

	    		$preset["normal_HEX_buttons_color"] =  "yes";

			}
			
			if (!array_key_exists("selected_HEX_buttons_color", $preset)){

	    		$preset["selected_HEX_buttons_color"] =  "yes";

			}
			
			
			if (!array_key_exists("show_popup_ads_close_button", $preset)){

	    		$preset["show_popup_ads_close_button"] =  "yes";

			}
			
			if (!array_key_exists("aopwTitle", $preset)){

				$preset["aopwTitle"] = "Advertisement";

			}
	
	
			if (!array_key_exists("aopwWidth", $preset)){

				$preset["aopwWidth"] = 400;

			}
			
			
			if (!array_key_exists("aopwHeight", $preset)){

				$preset["aopwHeight"] = 240;

			}
			
			
			if (!array_key_exists("aopwBorderSize", $preset)){

				$preset["aopwBorderSize"] = 6;

			}
	
	
			
	

			if (!array_key_exists("showErrorInfo", $preset)){


	    		$preset["showErrorInfo"] =  "yes";


			}


			


			if (!array_key_exists("subtitles_off_label", $preset)){

	    		$preset["subtitles_off_label"] =  "yes";

			}


			


			if (!array_key_exists("show_share_button", $preset)){


	    		$preset["show_share_button"] =  "yes";


			}


			


			if (!array_key_exists("logo_path", $preset))


	    	{


	    		$preset["logo_path"] = plugin_dir_url(dirname(__FILE__)) . "content/logo.png";


			}


			


			if (!array_key_exists("stop_video_when_play_complete", $preset))


			{


				$preset["stop_video_when_play_complete"] = "no";


			}
			
			if (!array_key_exists("disable_video_scrubber", $preset))

			{

				$preset["disable_video_scrubber"] = "no";

			}


			


			if (!array_key_exists("start_at_random_video", $preset))


			{


				$preset["start_at_random_video"] = "no";


			}


			


			if (!array_key_exists("open_new_page_at_the_end_of_the_ads", $preset))


			{


				$preset["open_new_page_at_the_end_of_the_ads"] = "no";


			}


			


			if (!array_key_exists("play_ads_only_once", $preset))


			{


				$preset["play_ads_only_once"] = "no";


			}





			if (!array_key_exists("ads_buttons_position", $preset))


			{


				$preset["ads_buttons_position"] = "left";


			}





			if (!array_key_exists("skip_to_video_text", $preset))


			{


				$preset["skip_to_video_text"] = "You can skip to video in: ";


			}





			if (!array_key_exists("skip_to_video_button_text", $preset))


			{


				$preset["skip_to_video_button_text"] = "Skip Ad";


			}





			switch ($preset["skin_path"])


			{


				case "minimal_skin_dark":
				
				if (!array_key_exists("main_selector_background_selected_color", $preset)){
					$preset["main_selector_background_selected_color"] = "#FFFFFF";
				}
				
				if (!array_key_exists("main_selector_text_normal_color", $preset)){
					$preset["main_selector_text_normal_color"] = "#FFFFFF";
				}
				
				if (!array_key_exists("main_selector_text_selected_color", $preset)){
					$preset["main_selector_text_selected_color"] = "#000000";
				}
				
				if (!array_key_exists("main_button_background_normal_color", $preset)){
					$preset["main_button_background_normal_color"] = "#212021";
				}
				
				if (!array_key_exists("main_button_background_selected_color", $preset)){
					$preset["main_button_background_selected_color"] = "#FFFFFF";
				}
				
				if (!array_key_exists("main_button_text_normal_color", $preset)){
					$preset["main_button_text_normal_color"] = "#FFFFFF";
				}
				
				if (!array_key_exists("main_button_text_selected_color", $preset)){
					$preset["main_button_text_selected_color"] = "#000000";
				}
				
				
				if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#000000";

					}



					if (!array_key_exists("ads_text_normal_color", $preset)){

						$preset["ads_text_normal_color"] = "#888888";

					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#FFFFFF";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#666666";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#FFFFFF";


					}


					break;


				case "modern_skin_dark":
				
					if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#FFFFFF";

					}


					if (!array_key_exists("ads_text_normal_color", $preset))


					{


						$preset["ads_text_normal_color"] = "#888888";


					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#FFFFFF";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#666666";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#FFFFFF";


					}


					break;


				case "classic_skin_dark":
				
					if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#FFFFFF";

					}


					if (!array_key_exists("ads_text_normal_color", $preset))


					{


						$preset["ads_text_normal_color"] = "#bdbdbd";


					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#FFFFFF";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#444444";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#FFFFFF";


					}


					break;


				case "metal_skin_dark":
				
					if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#FFFFFF";

					}


					if (!array_key_exists("ads_text_normal_color", $preset))


					{


						$preset["ads_text_normal_color"] = "#999999";


					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#FFFFFF";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#666666";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#FFFFFF";


					}


					break;


				case "minimal_skin_white":
				
					
					if (!array_key_exists("main_selector_background_selected_color", $preset)){
						$preset["main_selector_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_normal_color", $preset)){
						$preset["main_selector_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_selected_color", $preset)){
						$preset["main_selector_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_normal_color", $preset)){
						$preset["main_button_background_normal_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_selected_color", $preset)){
						$preset["main_button_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#000000";

					}


					if (!array_key_exists("ads_text_normal_color", $preset)){

						$preset["ads_text_normal_color"] = "#888888";

					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#000000";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#AAAAAA";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#000000";


					}


					break;


				case "modern_skin_white":
				
					if (!array_key_exists("main_selector_background_selected_color", $preset)){
						$preset["main_selector_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_normal_color", $preset)){
						$preset["main_selector_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_selected_color", $preset)){
						$preset["main_selector_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_normal_color", $preset)){
						$preset["main_button_background_normal_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_selected_color", $preset)){
						$preset["main_button_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#000000";

					}


					if (!array_key_exists("ads_text_normal_color", $preset))


					{


						$preset["ads_text_normal_color"] = "#6a6a6a";


					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#000000";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#BBBBBB";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#000000";


					}


					break;


				case "classic_skin_white":
				
					if (!array_key_exists("main_selector_background_selected_color", $preset)){
						$preset["main_selector_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_normal_color", $preset)){
						$preset["main_selector_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_selected_color", $preset)){
						$preset["main_selector_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_normal_color", $preset)){
						$preset["main_button_background_normal_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_selected_color", $preset)){
						$preset["main_button_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#000000";

					}


					if (!array_key_exists("ads_text_normal_color", $preset))


					{


						$preset["ads_text_normal_color"] = "#FFFFFF";


					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#494949";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#BBBBBB";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#494949";


					}


					break;


				case "metal_skin_white":
				
					if (!array_key_exists("main_selector_background_selected_color", $preset)){
						$preset["main_selector_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_normal_color", $preset)){
						$preset["main_selector_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_selector_text_selected_color", $preset)){
						$preset["main_selector_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_normal_color", $preset)){
						$preset["main_button_background_normal_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("main_button_background_selected_color", $preset)){
						$preset["main_button_background_selected_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_normal_color"] = "#000000";
					}
					
					if (!array_key_exists("main_button_text_normal_color", $preset)){
						$preset["main_button_text_selected_color"] = "#FFFFFF";
					}
					
					if (!array_key_exists("aopwTitleColor", $preset)){

						$preset["aopwTitleColor"] = "#000000";

					}


					if (!array_key_exists("ads_text_normal_color", $preset))


					{


						$preset["ads_text_normal_color"] = "#777777";


					}


					


					if (!array_key_exists("ads_text_selected_color", $preset))


					{


						$preset["ads_text_selected_color"] = "#333333";


					}


					


					if (!array_key_exists("ads_border_normal_color", $preset))


					{


						$preset["ads_border_normal_color"] = "#AAAAAA";


					}


					


					if (!array_key_exists("ads_border_selected_color", $preset))


					{


						$preset["ads_border_selected_color"] = "#333333";


					}


					break;


			}


    	}


		


		$this->set_data();


	}


    


    // functions


    private function init_settings()


    {


    	$this->settings_ar = array(


									array(


											// main settings


											"id" => 0,


											"name" => "skin_minimal_dark",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" => "#FFFFFF",
											"main_selector_text_normal_color" => "#FFFFFF",
											"main_selector_text_selected_color" => "#000000",
											"main_button_background_normal_color" => "#212021",
											"main_button_background_selected_color" => "#FFFFFF",
											"main_button_text_normal_color" => "#FFFFFF",
											"main_button_text_selected_color" => "#000000",


											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",
											

											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",


											"skin_path" => "minimal_skin_dark",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#000000",


											"video_bg_color" => "#000000",


											"poster_bg_color" => "#000000",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#5a5a5a",
	

											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#000000",


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "yes",


											"controller_height" => 37,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 7,


											"space_between_buttons" => 8,


											"scrubbers_offset_width" => 2,


											"main_scrubber_offest_top" => 14,


											"time_offset_left_width" => 5,


											"time_offset_right_width" => 3,


											"time_offset_top" => 0,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 12,


											"time_color" => "#888888",


											"youtube_quality_button_normal_color" => "#888888",


											"youtube_quality_button_selected_color" => "#FFFFFF",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 0,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 310,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 8,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#000000",


											"playlist_name_color" => "#FFFFFF",


											"thumbnail_normal_background_color" => "#1b1b1b",


											"thumbnail_hover_background_color" => "#313131",


											"thumbnail_disabled_background_color" => "#272727",


											"search_input_background_color" => "#000000",


											"search_input_color" => "#999999",


											"youtube_and_folder_video_title_color" => "#FFFFFF",


											"youtube_owner_color" => "#888888",


											"youtube_description_color" => "#888888",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 0,


											"border_color" => "#333333",


											"main_labels_color" => "#FFFFFF",


											"secondary_labels_color" => "#a1a1a1",


											"share_and_embed_text_color" => "#5a5a5a",


											"input_background_color" => "#000000",


											"input_color" => "#FFFFFF",


									),


									array(


											// main settings


											"id" => 1,


											"name" => "skin_modern_dark",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" => "#FFFFFF",
											"main_selector_text_normal_color" => "#FFFFFF",
											"main_selector_text_selected_color" => "#000000",
											"main_button_background_normal_color" => "#212021",
											"main_button_background_selected_color" => "#FFFFFF",
											"main_button_text_normal_color" => "#FFFFFF",
											"main_button_text_selected_color" => "#000000",

											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",
											

											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",


											"skin_path" => "modern_skin_dark",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#000000",


											"video_bg_color" => "#000000",


											"poster_bg_color" => "#000000",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#5a5a5a",

											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#000000",
											


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "yes",


											"controller_height" => 43,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 10,


											"space_between_buttons" => 10,


											"scrubbers_offset_width" => 2,


											"main_scrubber_offest_top" => 17,


											"time_offset_left_width" => 2,


											"time_offset_right_width" => 2,


											"time_offset_top" => -1,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 20,


											"time_color" => "#888888",


											"youtube_quality_button_normal_color" => "#888888",


											"youtube_quality_button_selected_color" => "#FFFFFF",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 7,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 290,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 8,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#000000",


											"playlist_name_color" => "#FFFFFF",


											"thumbnail_normal_background_color" => "#1b1b1b",


											"thumbnail_hover_background_color" => "#313131",


											"thumbnail_disabled_background_color" => "#272727",


											"search_input_background_color" => "#000000",


											"search_input_color" => "#999999",


											"youtube_and_folder_video_title_color" => "#FFFFFF",


											"youtube_owner_color" => "#888888",


											"youtube_description_color" => "#888888",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 7,


											"border_color" => "#333333",


											"main_labels_color" => "#FFFFFF",


											"secondary_labels_color" => "#a1a1a1",


											"share_and_embed_text_color" => "#5a5a5a",


											"input_background_color" => "#000000",


											"input_color" => "#FFFFFF",


									),


									array(


											// main settings


											"id" => 2,


											"name" => "skin_classic_dark",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" => "#FFFFFF",
											"main_selector_text_normal_color" => "#FFFFFF",
											"main_selector_text_selected_color" => "#000000",
											"main_button_background_normal_color" => "#212021",
											"main_button_background_selected_color" => "#FFFFFF",
											"main_button_text_normal_color" => "#FFFFFF",
											"main_button_text_selected_color" => "#000000",
											
											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",


											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",


											"skin_path" => "classic_skin_dark",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#000000",


											"video_bg_color" => "#000000",


											"poster_bg_color" => "#000000",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#5a5a5a",

											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#000000",
											


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "no",


											"controller_height" => 37,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 10,


											"space_between_buttons" => 10,


											"scrubbers_offset_width" => 2,


											"main_scrubber_offest_top" => 16,


											"time_offset_left_width" => 2,


											"time_offset_right_width" => 3,


											"time_offset_top" => 0,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 12,


											"time_color" => "#bdbdbd",


											"youtube_quality_button_normal_color" => "#bdbdbd",


											"youtube_quality_button_selected_color" => "#FFFFFF",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 0,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 310,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 10,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#000000",


											"playlist_name_color" => "#FFFFFF",


											"thumbnail_normal_background_color" => "#1b1b1b",


											"thumbnail_hover_background_color" => "#313131",


											"thumbnail_disabled_background_color" => "#272727",


											"search_input_background_color" => "#000000",


											"search_input_color" => "#bdbdbd",


											"youtube_and_folder_video_title_color" => "#FFFFFF",


											"youtube_owner_color" => "#bdbdbd",


											"youtube_description_color" => "#bdbdbd",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 0,


											"border_color" => "#333333",


											"main_labels_color" => "#FFFFFF",


											"secondary_labels_color" => "#bdbdbd",


											"share_and_embed_text_color" => "#5a5a5a",


											"input_background_color" => "#000000",


											"input_color" => "#FFFFFF",


									),


									array(


											// main settings


											"id" => 3,


											"name" => "skin_metal_dark",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" => "#FFFFFF",
											"main_selector_text_normal_color" => "#FFFFFF",
											"main_selector_text_selected_color" => "#000000",
											"main_button_background_normal_color" => "#212021",
											"main_button_background_selected_color" => "#FFFFFF",
											"main_button_text_normal_color" => "#FFFFFF",
											"main_button_text_selected_color" => "#000000",
											
											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",


											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",


											"skin_path" => "metal_skin_dark",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#000000",


											"video_bg_color" => "#000000",


											"poster_bg_color" => "#000000",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#5a5a5a",


											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#000000",


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "yes",


											"controller_height" => 43,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 7,


											"space_between_buttons" => 8,


											"scrubbers_offset_width" => 4,


											"main_scrubber_offest_top" => 14,


											"time_offset_left_width" => 5,


											"time_offset_right_width" => 3,


											"time_offset_top" => 1,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 12,


											"time_color" => "#888888",


											"youtube_quality_button_normal_color" => "#888888",


											"youtube_quality_button_selected_color" => "#FFFFFF",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 0,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 310,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 8,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#000000",


											"playlist_name_color" => "#FFFFFF",


											"thumbnail_normal_background_color" => "#1b1b1b",


											"thumbnail_hover_background_color" => "#313131",


											"thumbnail_disabled_background_color" => "#272727",


											"search_input_background_color" => "#000000",


											"search_input_color" => "#999999",


											"youtube_and_folder_video_title_color" => "#FFFFFF",


											"youtube_owner_color" => "#888888",


											"youtube_description_color" => "#888888",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 0,


											"border_color" => "#333333",


											"main_labels_color" => "#FFFFFF",


											"secondary_labels_color" => "#a1a1a1",


											"share_and_embed_text_color" => "#5a5a5a",


											"input_background_color" => "#000000",


											"input_color" => "#FFFFFF",


									),


									array(


											// main settings


											"id" => 4,


											"name" => "skin_minimal_white",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" =>"#000000",
											"main_selector_text_normal_color" =>"#000000",
											"main_selector_text_selected_color" =>"#FFFFFFF",
											"main_button_background_normal_color" =>"#FFFFFF",
											"main_button_background_selected_color" =>"#000000",
											"main_button_text_normal_color" =>"#000000",
											"main_button_text_selected_color" =>"#FFFFFF",

											
											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",


											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",


											"skin_path" => "minimal_skin_white",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#DDDDDD",


											"video_bg_color" => "#ebebeb",


											"poster_bg_color" => "#ebebeb",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#000000",


											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#FFFFFF",


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "yes",


											"controller_height" => 37,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 7,


											"space_between_buttons" => 8,


											"scrubbers_offset_width" => 2,


											"main_scrubber_offest_top" => 14,


											"time_offset_left_width" => 5,


											"time_offset_right_width" => 3,


											"time_offset_top" => 0,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 12,


											"time_color" => "#919191",


											"youtube_quality_button_normal_color" => "#919191",


											"youtube_quality_button_selected_color" => "#000000",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 0,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 310,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 8,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#BBBBBB",


											"playlist_name_color" => "#000000",


											"thumbnail_normal_background_color" => "#ebebeb",


											"thumbnail_hover_background_color" => "#dcdcdc",


											"thumbnail_disabled_background_color" => "#c0c0c0",


											"search_input_background_color" => "#c0c0c0",


											"search_input_color" => "#333333",


											"youtube_and_folder_video_title_color" => "#000000",


											"youtube_owner_color" => "#919191",


											"youtube_description_color" => "#919191",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 0,


											"border_color" => "#CDCDCD",


											"main_labels_color" => "#000000",


											"secondary_labels_color" => "#444444",


											"share_and_embed_text_color" => "#777777",


											"input_background_color" => "#c0c0c0",


											"input_color" => "#333333",


									),


									array(


											// main settings


											"id" => 5,


											"name" => "skin_modern_white",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" =>"#000000",
											"main_selector_text_normal_color" =>"#000000",
											"main_selector_text_selected_color" =>"#FFFFFFF",
											"main_button_background_normal_color" =>"#FFFFFF",
											"main_button_background_selected_color" =>"#000000",
											"main_button_text_normal_color" =>"#000000",
											"main_button_text_selected_color" =>"#FFFFFF",
											
											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",


											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",


											"skin_path" => "modern_skin_white",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#FFFFFF",


											"video_bg_color" => "#ebebeb",


											"poster_bg_color" => "#ebebeb",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#000000",


											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#FFFFFF",


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "yes",


											"controller_height" => 43,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 10,


											"space_between_buttons" => 10,


											"scrubbers_offset_width" => 2,


											"main_scrubber_offest_top" => 17,


											"time_offset_left_width" => 2,


											"time_offset_right_width" => 2,


											"time_offset_top" => 1,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 20,


											"time_color" => "#919191",


											"youtube_quality_button_normal_color" => "#919191",


											"youtube_quality_button_selected_color" => "#000000",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 7,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 290,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 8,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#FFFFFF",


											"playlist_name_color" => "#000000",


											"thumbnail_normal_background_color" => "#ebebeb",


											"thumbnail_hover_background_color" => "#dcdcdc",


											"thumbnail_disabled_background_color" => "#c0c0c0",


											"search_input_background_color" => "#c0c0c0",


											"search_input_color" => "#333333",


											"youtube_and_folder_video_title_color" => "#000000",


											"youtube_owner_color" => "#919191",


											"youtube_description_color" => "#919191",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 7,


											"border_color" => "#CDCDCD",


											"main_labels_color" => "#000000",


											"secondary_labels_color" => "#444444",


											"share_and_embed_text_color" => "#777777",


											"input_background_color" => "#c0c0c0",


											"input_color" => "#333333",


									),


									array(


											// main settings


											"id" => 6,


											"name" => "skin_classic_white",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" =>"#000000",
											"main_selector_text_normal_color" =>"#000000",
											"main_selector_text_selected_color" =>"#FFFFFFF",
											"main_button_background_normal_color" =>"#FFFFFF",
											"main_button_background_selected_color" =>"#000000",
											"main_button_text_normal_color" =>"#000000",
											"main_button_text_selected_color" =>"#FFFFFF",
											
											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",


											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",


											"skin_path" => "classic_skin_white",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#FFFFFF",


											"video_bg_color" => "#ebebeb",


											"poster_bg_color" => "#ebebeb",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#494949",


											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#FFFFFF",


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "no",


											"controller_height" => 37,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 7,


											"space_between_buttons" => 8,


											"scrubbers_offset_width" => 2,


											"main_scrubber_offest_top" => 14,


											"time_offset_left_width" => 5,


											"time_offset_right_width" => 3,


											"time_offset_top" => 0,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 12,


											"time_color" => "#FFFFFF",


											"youtube_quality_button_normal_color" => "#494949",


											"youtube_quality_button_selected_color" => "#FFFFFF",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 0,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 310,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 8,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#FFFFFF",


											"playlist_name_color" => "#000000",


											"thumbnail_normal_background_color" => "#ebebeb",


											"thumbnail_hover_background_color" => "#dcdcdc",


											"thumbnail_disabled_background_color" => "#c0c0c0",


											"search_input_background_color" => "#ebebeb",


											"search_input_color" => "#494949",


											"youtube_and_folder_video_title_color" => "#000000",


											"youtube_owner_color" => "#777777",


											"youtube_description_color" => "#777777",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 0,


											"border_color" => "#CDCDCD",


											"main_labels_color" => "#000000",


											"secondary_labels_color" => "#494949",


											"share_and_embed_text_color" => "#777777",


											"input_background_color" => "#b2b2b2",


											"input_color" => "#333333",


									),


									array(


											// main settings


											"id" => 7,


											"name" => "skin_metal_white",


											
											"showErrorInfo" => "yes",

											"initializeOnlyWhenVisible" => "yes",
											"showPlaybackRateButton" => "yes",
											"showPreloader" => "yes",
											"defaultPlaybackRate" => 1,
											"privateVideoPassword" => "428c841430ea18a70f7b06525d4b748a",
											"use_playlists_select_box" => "yes",
											"main_selector_background_selected_color" =>"#000000",
											"main_selector_text_normal_color" =>"#000000",
											"main_selector_text_selected_color" =>"#FFFFFFF",
											"main_button_background_normal_color" =>"#FFFFFF",
											"main_button_background_selected_color" =>"#000000",
											"main_button_text_normal_color" =>"#000000",
											"main_button_text_selected_color" =>"#FFFFFF",
											
											"fill_entire_video_screen" => "no",
											"use_HEX_colors_for_skin" => "no",
											"normal_HEX_buttons_color" => "#FF0000",
											"selected_HEX_buttons_color" => "#000000",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",

											"subtitles_off_label" => "Subtitle off",
											"playVideoOnlyWhenLoggedIn" => "no",
											"loggedInMessage" => "Please loggin to view this video.",

											"skin_path" => "metal_skin_white",


											"display_type" => "responsive",


											"use_deeplinking" => "yes",


											"right_click_context_menu" => "developer",


											"add_keyboard_support" => "yes",


											"auto_scale" => "yes",


											"show_buttons_tooltips" => "yes",


											"autoplay" => "no",


											"loop" => "no",


											"shuffle" => "no",
											
											"show_popup_ads_close_button" => "yes",


											"max_width" => 980,


											"max_height" => 552,


											"volume" => .8,


											"bg_color" => "#FFFFFF",


											"video_bg_color" => "#dcdcdc",


											"poster_bg_color" => "#dcdcdc",


											"buttons_tooltip_hide_delay" => 1.5,


											"buttons_tooltip_font_color" => "#000000",


											//apw
											"aopwTitle" => "Advertisement",
											"aopwWidth" => 400,
											"aopwHeight" => 240,
											"aopwBorderSize" => 6,
											"aopwTitleColor" => "#FFFFFF",


											// controller settings


											"show_controller_when_video_is_stopped" => "yes",


											"show_next_and_prev_buttons_in_controller" => "no",


											"show_volume_button" => "yes",


											"show_time" => "yes",


											"show_youtube_quality_button" => "yes",


											"show_info_button" => "yes",


											"show_download_button" => "yes",


											"show_share_button" => "yes",


											"show_embed_button" => "yes",


											"show_fullscreen_button" => "yes",
											
											"disable_video_scrubber" => "no",


											"repeat_background" => "yes",


											"controller_height" => 43,


											"controller_hide_delay" => 3,


											"start_space_between_buttons" => 7,


											"space_between_buttons" => 8,


											"scrubbers_offset_width" => 4,


											"main_scrubber_offest_top" => 14,


											"time_offset_left_width" => 5,


											"time_offset_right_width" => 3,


											"time_offset_top" => 0,


											"volume_scrubber_height" => 80,


											"volume_scrubber_ofset_height" => 12,


											"time_color" => "#919191",


											"youtube_quality_button_normal_color" => "#919191",


											"youtube_quality_button_selected_color" => "#000000",


											


											// playlists window settings


											"show_playlists_button_and_playlists" => "yes",


											"show_playlists_by_default" => "no",


											"thumbnail_selected_type" => "opacity",


											"start_at_playlist" => 0,


											"buttons_margins" => 0,


											"thumbnail_max_width" => 350,


											"thumbnail_max_height" => 350,


											"horizontal_space_between_thumbnails" => 40,


											"vertical_space_between_thumbnails" => 40,


											


											// playlist settings


											"show_playlist_button_and_playlist" => "yes",


											"playlist_position" => "right",


											"show_playlist_by_default" => "yes",


											"show_playlist_name" => "yes",


											"show_search_input" => "yes",


											"show_loop_button" => "yes",


											"show_shuffle_button" => "yes",


											"show_next_and_prev_buttons" => "yes",


											"force_disable_download_button_for_folder" => "yes",


											"add_mouse_wheel_support" => "yes",


											"folder_video_label" => "VIDEO",


											"playlist_right_width" => 310,


											"playlist_bottom_height" => 599,


											"start_at_video" => 0,


											"max_playlist_items" => 50,


											"thumbnail_width" => 70,


											"thumbnail_height" => 70,


											"space_between_controller_and_playlist" => 2,


											"space_between_thumbnails" => 2,


											"scrollbar_offest_width" => 8,


											"scollbar_speed_sensitivity" => .5,


											"playlist_background_color" => "#FFFFFF",


											"playlist_name_color" => "#000000",


											"thumbnail_normal_background_color" => "#dcdcdc",


											"thumbnail_hover_background_color" => "#ebebeb",


											"thumbnail_disabled_background_color" => "#c0c0c0",


											"search_input_background_color" => "#c0c0c0",


											"search_input_color" => "#333333",


											"youtube_and_folder_video_title_color" => "#000000",


											"youtube_owner_color" => "#919191",


											"youtube_description_color" => "#919191",


											


											// logo settings


											"show_logo" => "yes",


											"hide_logo_with_controller" => "yes",


											"logo_position" => "topRight",


											"logo_path" => plugin_dir_url(dirname(__FILE__)) . "content/logo.png",


											"logo_link" => "http://www.webdesign-flash.ro/",


											"logo_margins" => 5,


											


											// embed and info windows settings


											"embed_and_info_window_close_button_margins" => 0,


											"border_color" => "#CDCDCD",


											"main_labels_color" => "#000000",


											"secondary_labels_color" => "#444444",


											"share_and_embed_text_color" => "#777777",


											"input_background_color" => "#c0c0c0",


											"input_color" => "#333333",


									)


							      );


    }





    public function get_data(){


	    $cur_data = get_option("fwduvp_data");


	       


	    $this->settings_ar = $cur_data->settings_ar;


	    $this->main_playlists_ar = $cur_data->main_playlists_ar;


    }


    


    public function set_data(){


    	update_option("fwduvp_data", $this);


    }


}





?>