<?php



// main FWD Ultimate Video Player plugin class

class FWDUVP{

	

	// constants

	const MIN_WP_VER =  "3.5.0";

	const CAPABILITY = "edit_fwduvp";

	

	// variables

	private $_data;

	private $_dir_url;

    

    private static $_uvp_id = 0;

    private static $_pl_id = 0;

    

    // constructor

    public function init(){

		$this->_dir_url = plugin_dir_url(dirname(__FILE__));

	

    	// set hooks

    	add_action("admin_menu", array($this, "add_plugin_menu"));

		add_action("wp_enqueue_scripts", array($this, "add_header_files"));

		add_shortcode("fwduvp", array($this, "set_player"));

		

		// set data

		$this->_data = new FWDUVPData();		$this->_data->init();

    }

	

    // functions

    public function add_plugin_menu(){

    	// add menus

        add_menu_page("Ultimate Video Player", "Ultimate Video Player", FWDUVP::CAPABILITY, "FWDUVPMenu-General-Settings", array($this, "set_general_settings"), $this->_dir_url . "content/icons/menu-icon.png");

       	

		add_submenu_page("FWDUVPMenu-General-Settings", "General settings", "General settings", FWDUVP::CAPABILITY, "FWDUVPMenu-General-Settings");

        

		add_submenu_page("FWDUVPMenu-General-Settings", "Playlists manager", "Playlists manager", FWDUVP::CAPABILITY, "FWDUVPMenu-Playlists-Manager", array($this, "set_playlists_manager"));

        

		add_submenu_page("FWDUVPMenu-General-Settings", "CSS Editor", "CSS Editor", FWDUVP::CAPABILITY, "FWDUVPMenu-CSS-Editor", array($this, "set_css_editor"));

       	

       	// add meta boxes

       	$post_type_screens = array("post", "page");



    	foreach ($post_type_screens as $screen){

       		add_meta_box("fwduvp-shortcode-generator", "FWDUVP Shortcode Generator",  array($this, "set_custom_meta_box"), $screen, "side", "default");

    	}

    }

	

	public function add_header_files(){

    	wp_enqueue_script("fwduvp_uvp_script", $this->_dir_url . "js/FWDUVP.js");

		wp_enqueue_style("fwduvp_uvp_css", $this->_dir_url . "css/fwduvp.css");

    }

    

	private function check_wp_ver(){

	    global $wp_version;

	    

		$exit_msg = "The FWD Ultimate Video Player plugin requires WordPress " . FWDUVP::MIN_WP_VER . " or newer. <a href='http://codex.wordpress.org/Updating_WordPress'>Please update!</a>";

		

		if (version_compare($wp_version, FWDUVP::MIN_WP_VER) <= 0){

			echo $exit_msg;

			return false;

		}

		return true;

	}



    public function set_general_settings(){

    	if (!$this->check_wp_ver()){

    		return;

    	}

    	

    	$msg = "";

    	

    	$set_id = 0;

		$set_order_id = 0;

		$tab_init_id = 0;

    	

	    if (!empty($_POST) && check_admin_referer("fwduvp_general_settings_update", "fwduvp_general_settings_nonce")){

			$data_obj = json_decode(str_replace("\\", "", $_POST["settings_data"]), true);

			

			$action = $data_obj["action"];

			$settingsAr = $data_obj["settings_ar"];

			

			$this->_data->settings_ar = $settingsAr;

			$this->_data->set_data();

			

			switch ($action){

			    case "add":

			        $msg = "<div class='fwd-updated'><p style='padding:8px;'>Your new preset has been added!</p></div>";

			        $set_id = $data_obj["set_id"];

					$set_order_id = $data_obj["set_order_id"];

					$tab_init_id = $data_obj["tab_init_id"];

			        break;

			    case "save":

			        $msg = "<div class='fwd-updated'><p style='padding:8px;'>Your preset settings have been updated!</p></div>";

			        $set_id = $data_obj["set_id"];

					$set_order_id = $data_obj["set_order_id"];

					$tab_init_id = $data_obj["tab_init_id"];

			        break;

			    case "del":

			       	$msg = "<div class='fwd-updated'><p style='padding:8px;'>Your preset has been deleted!</p></div>";

			        break;

			}

		}

		

		// jquery ui

		wp_enqueue_style("fwduvp_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");

		wp_enqueue_script("jquery-ui-tabs");

		wp_enqueue_script("jquery-ui-tooltip");

		

		// spectrum colorpicker

    	wp_enqueue_style("fwduvp_spectrum_css", $this->_dir_url . "css/spectrum.css");

    	wp_enqueue_script("fwduvp_spectrum_script", $this->_dir_url . "js/spectrum.js");

    	

    	// general settings script

		wp_enqueue_media();

        wp_enqueue_script("fwduvp_general_settings_script", $this->_dir_url . "js/general_settings.js");

		

    	include_once "general_settings.php";

    }

    

 	public function set_playlists_manager(){



    	if (!$this->check_wp_ver()){

    		return;

    	}

    	

    	$msg = "";

    	

	    if (!empty($_POST) && check_admin_referer("fwduvp_playlist_manager_update", "fwduvp_playlist_manager_nonce")){

			$mainPlaylistsAr = json_decode(str_replace("\\", "", $_POST["playlist_data"]), true);

			

			$this->_data->main_playlists_ar = $mainPlaylistsAr;

			$this->_data->set_data();

			

			$msg = "<div class='fwd-updated'><p style='padding:8px;'>Your playlists have been updated!</p></div>";

		}

		

		// jquery ui

		wp_enqueue_style("fwduvp_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");

		wp_enqueue_script("jquery-ui-sortable");

		wp_enqueue_script("jquery-ui-accordion");

		wp_enqueue_script("jquery-ui-dialog");

		wp_enqueue_script("jquery-ui-tooltip");

		

		// playlist manager script

		wp_enqueue_media();

        wp_enqueue_script("fwduvp_playlist_manager_script", $this->_dir_url . "js/playlist_manager.js");

        

    	include_once "playlist_manager.php";

    }

    

    public function set_css_editor(){

    	if (!$this->check_wp_ver()){

    		return;

    	}

    	

    	$msg = "";

    	$scroll_pos = 0;

    	

    	$css_file = plugin_dir_path(dirname(__FILE__)) . "css/fwduvp.css";

    	

	    if (!empty($_POST) && check_admin_referer("fwduvp_css_editor_update", "fwduvp_css_editor_nonce")){

			$handle = fopen($css_file, "w") or die("Cannot open file: " . $css_file);

			

			$data = $_POST["css_data"];

			$scroll_pos = $_POST["scroll_pos"];

			

			fwrite($handle, $data);

			

			$msg = "<div class='fwd-updated'><p style='padding:8px;'>The CSS file has been updated!</p></div>";

		}

		

		wp_enqueue_style("fwduvp_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");

	  			

		$handle = fopen($css_file, "r") or die("Cannot open file: " . $css_file);

        

    	include_once "css_editor.php";

    	

    	fclose($handle);

    }

    

	public static function set_action_links($links){

		$settings_link = "<a href='" . get_admin_url(null, "admin.php?page=FWDUVPMenu-General-Settings") . "'>Settings</a>";

   		array_unshift($links, $settings_link);

   		

   		return $links;

	}

    

    

	public function set_player($atts){

		

		extract(shortcode_atts(array("preset_id" => 0, "playlist_id" => 0), $atts, "fwduvp"));

		

	

		$rap_constructor = $this->get_constructor($preset_id, $playlist_id);

		$rap_div = "<div id='fwduvpDiv" . FWDUVP::$_uvp_id. "'></div>";

		$rap_main_playlist = $this->get_main_playlist($playlist_id);

		

		FWDUVP::$_uvp_id++;

		

		

		$rap_output = $rap_div . $rap_constructor . $rap_main_playlist;

		

		return $rap_output;

	}

	

	public function set_custom_meta_box($post){

		if (!$this->check_wp_ver()){

    		return;

    	}

		

		// presets

		$presetsNames = array();

		

		foreach ($this->_data->settings_ar as $setting){

    		$el = array(

						"id" => $setting["id"],

						"name" => $setting["name"]

				   );

    				   

    		array_push($presetsNames, $el);

    	}

    	

		// playlists

		$mainPlaylistsNames = array();

		

		if (isset($this->_data->main_playlists_ar)){

			foreach ($this->_data->main_playlists_ar as $main_playlist){

	    		$el = array(

	    						"id" => $main_playlist["id"],

	    						"name" => $main_playlist["name"]

	    				   );

	    				   

	    		array_push($mainPlaylistsNames, $el);

	    	}

		}

		

    	wp_enqueue_style("fwduvp_fwd_ui_css", $this->_dir_url . "css/fwd_ui.css");

		wp_enqueue_script("fwduvp_shortcode_script", $this->_dir_url . "js/shortcode.js");

		

    	include_once "meta_box.php";

	}
	
	public function is_user_logged_in() {
		$user = wp_get_current_user();
	 
		return $user->exists();
	}
	

	public function get_constructor($presetId, $playlistId) {

    	$preset = NULL;

    	

    	foreach ($this->_data->settings_ar as $set){

    		if ($set["id"] == $presetId){

    			$preset = $set;

    		}

    	}

    	

    	if (is_null($preset)){

    		return "ultimate Video Player with preset id ". $presetId . " does not exist!";

    	}

    	

    	$main_playlist = NULL;

    	

    	foreach ($this->_data->main_playlists_ar as $pl){

    		if ($pl["id"] == $playlistId){

    			$main_playlist = $pl;

    		}

    	}

    	 	

    	if (is_null($main_playlist)){

    		return "Ultimate Video Player playlist with id ". $playlistId . " does not exist!";

    	}
		
		$isLoggedIn = $this->is_user_logged_in();
		if($isLoggedIn ==  true){
			$isLoggedIn = "yes";
		}else{
			$isLoggedIn = "no";
		}
    	

    	return "<script type='text/javascript'>
			document.addEventListener('DOMContentLoaded', loadPlayer, false);
			
			function loadPlayer(){
			FWDUVPUtils.checkIfHasTransofrms();

			new FWDUVPlayer(

			{" . 

				//required settings

			   "instanceName:'fwduvpPlayer" . FWDUVP::$_uvp_id . "',

				parentId:'fwduvpDiv" . FWDUVP::$_uvp_id . "',

				playlistsId:'fwduvpMainPlaylist" . $playlistId . "',
				
				fillEntireVideoScreen:'" . $preset['fill_entire_video_screen'] . "',
				
				useHEXColorsForSkin:'" . $preset['use_HEX_colors_for_skin'] . "',
				
				normalHEXButtonsColor:'" . $preset['normal_HEX_buttons_color'] . "',
				privateVideoPassword:'" . $preset['privateVideoPassword'] . "',
				selectedHEXButtonsColor:'" . $preset['selected_HEX_buttons_color'] . "',
				isLoggedIn:'" . $isLoggedIn . "',
				playVideoOnlyWhenLoggedIn:'" .  $preset['playVideoOnlyWhenLoggedIn'] . "',
				loggedInMessage:'" .  $preset['loggedInMessage'] . "',
			
				mainFolderPath:'" . $this->_dir_url . "content'," . 



				//main settings

			   "skinPath:'" . $preset['skin_path'] . "',

				displayType:'" . $preset['display_type'] . "',

				useYoutube:'" . $preset['showErrorInfo'] . "',

				initializeOnlyWhenVisible:'" . $preset['initializeOnlyWhenVisible'] . "',
				
				showPreloader:'" . $preset['showPreloader'] . "',
				
				useDeepLinking:'" . $preset['use_deeplinking'] . "',

				rightClickContextMenu:'" . $preset['right_click_context_menu'] . "',

				addKeyboardSupport:'" . $preset['add_keyboard_support'] . "',

				autoScale:'" . $preset['auto_scale'] . "',

				showButtonsToolTip:'" . $preset['show_buttons_tooltips'] . "',

				stopVideoWhenPlayComplete:'" . $preset['stop_video_when_play_complete'] . "',

				autoPlay:'" . $preset['autoplay'] . "',

				loop:'" . $preset['loop'] . "',

				shuffle:'" . $preset['shuffle'] . "',

				maxWidth:" . $preset['max_width'] . ",

				maxHeight:" . $preset['max_height'] . ",

				buttonsToolTipHideDelay:" . $preset['buttons_tooltip_hide_delay'] . ",
				
				showPopupAdsCloseButton:'" . $preset['show_popup_ads_close_button'] . "',

				volume:" . $preset['volume'] . ",

				backgroundColor:'" . $preset['bg_color'] . "',
				showErrorInfo:'" . $preset['showErrorInfo'] . "',
				aopwTitle:'" . $preset['aopwTitle'] . "',
				aopwWidth:" . $preset['aopwWidth'] . ",
				aopwHeight:" . $preset['aopwHeight'] . ",
				aopwBorderSize:" . $preset['aopwBorderSize'] . ",
				aopwTitleColor:'" . $preset['aopwTitleColor'] . "',
				
				disableVideoScrubber:'" . $preset['disable_video_scrubber'] . "',
				
				

				videoBackgroundColor:'" . $preset['video_bg_color'] . "',

				posterBackgroundColor:'" . $preset['poster_bg_color'] . "',

				buttonsToolTipFontColor:'" . $preset['buttons_tooltip_font_color'] . "'," . 

				

				//controller settings

			   "showControllerWhenVideoIsStopped:'" . $preset['show_controller_when_video_is_stopped'] . "',

				showNextAndPrevButtonsInController:'" . $preset['show_next_and_prev_buttons_in_controller'] . "',
				defaultPlaybackRate:" . $preset['defaultPlaybackRate'] . ",
				showPlaybackRateButton:'" . $preset['showPlaybackRateButton'] . "',
				
				

				showVolumeButton:'" . $preset['show_volume_button'] . "',

				showTime:'" . $preset['show_time'] . "',

				showYoutubeQualityButton:'" . $preset['show_youtube_quality_button'] . "',

				showInfoButton:'" . $preset['show_info_button'] . "',

				showDownloadButton:'" . $preset['show_download_button'] . "',

				showShareButton:'" . $preset['show_share_button'] . "',

				showEmbedButton:'" . $preset['show_embed_button'] . "',

				showFullScreenButton:'" . $preset['show_fullscreen_button'] . "',

				repeatBackground:'" . $preset['repeat_background'] . "',

				controllerHeight:" . $preset['controller_height'] . ",

				controllerHideDelay:" . $preset['controller_hide_delay'] . ",

				startSpaceBetweenButtons:" . $preset['start_space_between_buttons'] . ",

				spaceBetweenButtons:" . $preset['space_between_buttons'] . ",

				scrubbersOffsetWidth:" . $preset['scrubbers_offset_width'] . ",

				mainScrubberOffestTop:" . $preset['main_scrubber_offest_top'] . ",

				timeOffsetLeftWidth:" . $preset['time_offset_left_width'] . ",

				timeOffsetRightWidth:" . $preset['time_offset_right_width'] . ",

				timeOffsetTop:" . $preset['time_offset_top'] . ",

				volumeScrubberHeight:" . $preset['volume_scrubber_height'] . ",

				volumeScrubberOfsetHeight:" . $preset['volume_scrubber_ofset_height'] . ",

				timeColor:'" . $preset['time_color'] . "',

				youtubeQualityButtonNormalColor:'" . $preset['youtube_quality_button_normal_color'] . "',

				youtubeQualityButtonSelectedColor:'" . $preset['youtube_quality_button_selected_color'] . "'," . 

				

				//playlists window settings

			   "showPlaylistsButtonAndPlaylists:'" . $preset['show_playlists_button_and_playlists'] . "',
			   
			    usePlaylistsSelectBox:'" . $preset['use_playlists_select_box'] . "',

				showPlaylistsByDefault:'" . $preset['show_playlists_by_default'] . "',

				thumbnailSelectedType:'" . $preset['thumbnail_selected_type'] . "',

				startAtPlaylist:" . $preset['start_at_playlist'] . ",

				buttonsMargins:" . $preset['buttons_margins'] . ",

				thumbnailMaxWidth:" . $preset['thumbnail_max_width'] . ", 

				thumbnailMaxHeight:" . $preset['thumbnail_max_height'] . ",

				horizontalSpaceBetweenThumbnails:" . $preset['horizontal_space_between_thumbnails'] . ",
				
				
				
				mainSelectorBackgroundSelectedColor:'" . $preset['main_selector_background_selected_color'] . "',
				mainSelectorTextNormalColor:'" . $preset['main_selector_text_normal_color'] . "',
				mainSelectorTextSelectedColor:'" . $preset['main_selector_text_selected_color'] . "',
				mainButtonBackgroundNormalColor:'" . $preset['main_button_background_normal_color'] . "',
				mainButtonBackgroundSelectedColor:'" . $preset['main_button_background_selected_color'] . "',
				mainButtonTextNormalColor:'" . $preset['main_button_text_normal_color'] . "',
				mainButtonTextSelectedColor:'" . $preset['main_button_text_selected_color'] . "',
				

				verticalSpaceBetweenThumbnails:" . $preset['vertical_space_between_thumbnails'] . "," . 

				

				//playlist settings

			   "showPlaylistButtonAndPlaylist:'" . $preset['show_playlist_button_and_playlist'] . "',

				playlistPosition:'" . $preset['playlist_position'] . "',

				showPlaylistByDefault:'" . $preset['show_playlist_by_default'] . "',

				showPlaylistName:'" . $preset['show_playlist_name'] . "',

				showSearchInput:'" . $preset['show_search_input'] . "',

				showLoopButton:'" . $preset['show_loop_button'] . "',

				showShuffleButton:'" . $preset['show_shuffle_button'] . "',

				showNextAndPrevButtons:'" . $preset['show_next_and_prev_buttons'] . "',

				forceDisableDownloadButtonForFolder:'" . $preset['force_disable_download_button_for_folder'] . "',

				addMouseWheelSupport:'" . $preset['add_mouse_wheel_support'] . "',

				startAtRandomVideo:'" . $preset['start_at_random_video'] . "',

				folderVideoLabel:'" . $preset['folder_video_label'] . "',

				playlistRightWidth:" . $preset['playlist_right_width'] . ",

				playlistBottomHeight:" . $preset['playlist_bottom_height'] . ",

				startAtVideo:" . $preset['start_at_video'] . ",

				maxPlaylistItems:" . $preset['max_playlist_items'] . ",

				thumbnailWidth:" . $preset['thumbnail_width'] . ",

				thumbnailHeight:" . $preset['thumbnail_height'] . ",

				spaceBetweenControllerAndPlaylist:" . $preset['space_between_controller_and_playlist'] . ",

				spaceBetweenThumbnails:" . $preset['space_between_thumbnails'] . ",

				scrollbarOffestWidth:" . $preset['scrollbar_offest_width'] . ",

				scollbarSpeedSensitivity:" . $preset['scollbar_speed_sensitivity'] . ",

				playlistBackgroundColor:'" . $preset['playlist_background_color'] . "',

				playlistNameColor:'" . $preset['playlist_name_color'] . "',

				thumbnailNormalBackgroundColor:'" . $preset['thumbnail_normal_background_color'] . "',

				thumbnailHoverBackgroundColor:'" . $preset['thumbnail_hover_background_color'] . "',

				thumbnailDisabledBackgroundColor:'" . $preset['thumbnail_disabled_background_color'] . "',

				searchInputBackgroundColor:'" . $preset['search_input_background_color'] . "',

				searchInputColor:'" . $preset['search_input_color'] . "',

				youtubeAndFolderVideoTitleColor:'" . $preset['youtube_and_folder_video_title_color'] . "',

				youtubeOwnerColor:'" . $preset['youtube_owner_color'] . "',

				youtubeDescriptionColor:'" . $preset['youtube_description_color'] . "'," . 

				

				//logo settings

			   "showLogo:'" . $preset['show_logo'] . "',

				hideLogoWithController:'" . $preset['hide_logo_with_controller'] . "',

				logoPosition:'" . $preset['logo_position'] . "',

				logoPath:'" . $preset['logo_path'] . "',

				logoLink:'" . $preset['logo_link'] . "',

				logoMargins:" . $preset['logo_margins'] . "," .

				

				

				//subtitle settings

				"subtitlesOffLabel:'" . $preset['subtitles_off_label'] . "'," . 



				//embed window and info window

			   "embedAndInfoWindowCloseButtonMargins:" . $preset['embed_and_info_window_close_button_margins'] . ",

				borderColor:'" . $preset['border_color'] . "',

				mainLabelsColor:'" . $preset['main_labels_color'] . "',

				secondaryLabelsColor:'" . $preset['secondary_labels_color'] . "',

				shareAndEmbedTextColor:'" . $preset['share_and_embed_text_color'] . "',

				inputBackgroundColor:'" . $preset['input_background_color'] . "',

				inputColor:'" . $preset['input_color'] . "'," .

				

				//ads settings

			   "openNewPageAtTheEndOfTheAds:'" . $preset['open_new_page_at_the_end_of_the_ads'] . "',

				playAdsOnlyOnce:'" . $preset['play_ads_only_once'] . "',

				adsButtonsPosition:'" . $preset['ads_buttons_position'] . "',

				skipToVideoText:'" . $preset['skip_to_video_text'] . "',

				skipToVideoButtonText:'" . $preset['skip_to_video_button_text'] . "',

				adsTextNormalColor:'" . $preset['ads_text_normal_color'] . "',

				adsTextSelectedColor:'" . $preset['ads_text_selected_color'] . "',

				adsBorderNormalColor:'" . $preset['ads_border_normal_color'] . "',

				adsBorderSelectedColor:'" . $preset['ads_border_selected_color'] . "'

			});
			
			};

		</script>";

    }

    

    public function get_main_playlist($playlistId){

    	$main_playlist = NULL;

    	

    	foreach ($this->_data->main_playlists_ar as $pl){

    		if ($pl["id"] == $playlistId){

    			$main_playlist = $pl;

    		}

    	}

    	

    	if (is_null($main_playlist)){

    		return "ultimate Video Player main playlist with id ". $playlistId . " does not exist!";

    	}

    	

    	$main_playlist_str = "<ul id='fwduvpMainPlaylist$playlistId' style='display:none;'>";

		$normal_playlist_str = "";

    	

    	foreach ($main_playlist["playlists"] as $playlist){

			

			if ($playlist["type"] == "normal"){

				$main_playlist_str .= "<li data-source='fwduvpPlaylist" . FWDUVP::$_pl_id . "'";
				$normal_playlist_str .= "<ul id='fwduvpPlaylist" . FWDUVP::$_pl_id . "' style='display:none;'>";
				

				foreach ($playlist["videos"] as $video){
					
					$normal_playlist_str .= "<li data-video-source=\"[";
					foreach ($video["vids_ar"] as $vid){
						$source = $vid['source'];
						if(strpos($vid["source"], ".mp4") !== false){
							if($vid['encrypt'] == "yes") $source = "encrypt:" . base64_encode($source);
							$normal_playlist_str .= "{source:'" . $source . "', label:'" . $vid['label'] . "', is360:'" . $vid['is360'] ."'},";
						}else{
							if($vid['encrypt'] == "yes") $source = "encrypt:" . base64_encode($source);
							$normal_playlist_str .= "{source:'" . $source . "', label:'" . $vid['label'] ."'}";
						}
					}
					$normal_playlist_str .= "]\"";
					$normal_playlist_str = str_replace("},]", "}]", $normal_playlist_str);
					$countVids = 0;
					foreach ($video["vids_ar"] as $vid){
						if($vid['checked'] == true){
							$normal_playlist_str .= " data-start-at-video='" . $countVids . "'";
						}
					
						$countVids ++;
					}
					
					if($video["startAtTime"]){
						$normal_playlist_str .= " data-start-at-time='" . $video["startAtTime"] . "'";
					}
					
					if($video["stopAtTime"]){
						$normal_playlist_str .= " data-stop-at-time='" . $video["stopAtTime"] . "'";
					}
				
					if($video["password"]){
						$normal_playlist_str .= " data-private-video-password='" . md5($video["password"]) . "'";
					}
				
					$normal_playlist_str .= " data-is-private='" . $video["isPrivate"] . "'";
					
					
					if(count($video["subtitles_ar"]) > 0){
						$normal_playlist_str .= " data-subtitle-soruce=\"[";
						foreach ($video["subtitles_ar"] as $subtitle){
							$normal_playlist_str .= "{source:'" . $subtitle['source'] . "', label:'" . $subtitle['label'] ."'},";
						}
						$normal_playlist_str .= "]\"";
						$normal_playlist_str = str_replace("},]", "}]", $normal_playlist_str);
						$countSubtitles = 1;
						foreach ($video["subtitles_ar"] as $subtitle){
							if($subtitle['checked'] == true){
								$normal_playlist_str .= " data-start-at-subtitle='" . $countSubtitles . "'";
							}
							$countSubtitles ++;
						}
					}
					
					if (strlen($video["thumb"]) >= 1){
						$normal_playlist_str .= " data-thumb-source='" . $video["thumb"] . "'";
					}

					

					if (strlen($video["poster"]) >= 1){

						if (strlen($video["poster_mobile"]) >= 1){

							$normal_playlist_str .= " data-poster-source='" .  $video["poster"] . "," . $video["poster_mobile"] . "'";

						}else{

							$normal_playlist_str .= " data-poster-source='" .  $video["poster"] . "'";

						}

					}
					
					if (strlen($video["popw"]) >= 3){
						$normal_playlist_str .= "  data-advertisement-on-pause-source='" .  $video["popw"] . "'";

					}

					$normal_playlist_str .= " data-downloadable='" . $video["downloadable"] . "'";

					

					if (isset($video["ads_source"]) && strlen($video["ads_source"]) >= 1){

						if (isset($video["ads_source_mobile"]) && strlen($video["ads_source_mobile"]) >= 1){

							$normal_playlist_str .= " data-ads-source='" .  $video["ads_source"] . "," . $video["ads_source_mobile"] . "'";

						}else{

							$normal_playlist_str .= " data-ads-source='" .  $video["ads_source"] . "'";

						}

					}

					

					if (isset($video["ads_url"]) && strlen($video["ads_url"]) >= 1){

						$normal_playlist_str .= " data-ads-page-to-open-url='" .  $video["ads_url"] . "'";

					}

					

					if (isset($video["ads_url_target"]) && strlen($video["ads_url_target"]) >= 1){

						$normal_playlist_str .= " data-ads-page-target='" .  $video["ads_url_target"] . "'";

					}

					

					if (isset($video["ads_hold_time"]) && strlen($video["ads_hold_time"]) >= 1){

						$normal_playlist_str .= " data-time-to-hold-ads='" .  $video["ads_hold_time"] . "'";

					}

					

					$normal_playlist_str .= ">";

					

					$normal_playlist_str .= "<div data-video-short-description=''>";

					

					$normal_playlist_str .= $video["short_descr"];

					

					$normal_playlist_str .= "</div>";

					

					if (strlen($video["long_descr"]) >= 1){

						$normal_playlist_str .= "<div data-video-long-description=''>";
						$normal_playlist_str .= $video["long_descr"];
						$normal_playlist_str .= "</div>";

					}
					
					if(count($video["cuepoints_ar"]) > 0){
						$normal_playlist_str .= "<div data-cuepoints=''>";
						foreach ($video["cuepoints_ar"] as $cuepoint){
							$normal_playlist_str .= "<p data-time-start='" . $cuepoint['startAtTime'] . "'  data-javascript-call='" . $cuepoint['code']  . "'></p>";
						}
						$normal_playlist_str .= "</div>";
					}
					
					if(count($video["ads_ar"]) > 0){
						$normal_playlist_str .= "<div data-ads=''>";
						foreach ($video["ads_ar"] as $ad){
							$normal_playlist_str .= "<p data-source='" . $ad['source'] . "' data-time-start='" . $ad['startTime'] . "' data-time-to-hold-ads='" . $ad['timeToHoldAd']  . "' data-add-duration='" . $ad['addDuration'] ."' data-link='" .$ad['url'] . "' data-target='" . $ad['target'] . "'></p>";
						}

						$normal_playlist_str .= "</div>";
					}
					
					if(count($video["popupads_ar"]) > 0){
						$normal_playlist_str .= "<div data-add-popup=''>";
						foreach ($video["popupads_ar"] as $ad){
							$normal_playlist_str .= "<p image-path='" . $ad['source'] . "' data-time-start='" . $ad['startTime'] . "' data-time-end='" . $ad['stopTime'] ."' data-link='" .$ad['url'] . "' data-target='" . $ad['target'] . "' ></p>";
						}

						$normal_playlist_str .= "</div>";
					}

					$normal_playlist_str .= "</li>";
					
					
				}

				

				$normal_playlist_str .= "</ul>";

				

				FWDUVP::$_pl_id++;

			}else if ($playlist["type"] == "youtube"){

				$youtube_playlist_source = "list=";

			

				$reg_exp = "/[\?\&]list\=.+/";

				

				if (preg_match($reg_exp, $playlist["source"], $matches)){

					$youtube_playlist_source .= substr($matches[0], 6);

				}

			

				$main_playlist_str .= "<li data-source='" . $youtube_playlist_source . "'";

			}else if ($playlist["type"] == "folder"){

				$main_playlist_str .= "<li data-source='folder=" . $playlist["source"] . "'";

			}else{

				$main_playlist_str .= "<li data-source='" . $playlist["source"] . "'";

			}

			

			$main_playlist_str .= " data-playlist-name='" . $playlist["name"] . "'";

			

			if (count($playlist["thumb"]) >= 1){

				$main_playlist_str .= " data-thumbnail-path='" . $playlist["thumb"] . "'>";

			}else{

				$main_playlist_str .= ">";

			}

			

			$main_playlist_str .= $playlist["text"];

    		

    		$main_playlist_str .= "</li>";

    	}

    	

    	$main_playlist_str .= "</ul>";

		

		$main_playlist_str .= $normal_playlist_str;

    	

    	return $main_playlist_str;

    }

}



?>