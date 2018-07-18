<style>





   	body { font-size: 10px; }





    p { font-size: 12px; }





    input.text { width:95%; padding: .4em; }





    fieldset { padding:0; border:0; margin-top:25px; }





    table { border-spacing:0;float:left;margin-right:40px; }





    tr { height:50px;}





    td { padding:0; width:230px;}





    .fwd-error { color:#FF0000; }





</style>











<script>





	var settingsAr = <?php echo json_encode($this->_data->settings_ar); ?>;





	var spacesUrl = '<?php echo $this->_dir_url . "content/spaces/"; ?>';





	var sid = <?php echo $set_id; ?>;





	var cur_order_id = <?php echo $set_order_id; ?>;





	var tab_init_id = <?php echo $tab_init_id; ?>;





</script>











<fieldset class="ui-widget">





	<label for="skins">Select your preset:</label>





	





    <select id="skins" class="ui-widget ui-corner-all" style="max-width:200px;"></select>





    <label id="preset_id" for="skins"></label>





    





    <p id="tips" style="width:600px;">All form fields are required.</p>





</fieldset>











<form action="" method="post" style="margin-top:20px;margin-right:20px;">





	<div id="tabs" style="height:600px;overflow:auto;">





	  	<ul>





			<?php $iconsPath = $this->_dir_url . "content/icons/" ?>





		    <li><a href="#tab1"><img src=<?php echo $iconsPath . "tab1-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Main settings</span></a></li>





		    <li><a href="#tab2"><img src=<?php echo $iconsPath . "tab2-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Controller settings</span></a></li>





		    <li><a href="#tab3"><img src=<?php echo $iconsPath . "tab3-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Playlists window settings</span></a></li>





		    <li><a href="#tab4"><img src=<?php echo $iconsPath . "tab4-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Playlist settings</span></a></li>





		    <li><a href="#tab5"><img src=<?php echo $iconsPath . "tab5-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Logo settings</span></a></li>





		    <li><a href="#tab6"><img src=<?php echo $iconsPath . "tab6-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Embed and info windows settings</span></a></li>





		    <li><a href="#tab7"><img src=<?php echo $iconsPath . "tab7-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Ads settings</span></a></li>


			<li><a href="#tab8"><img src=<?php echo $iconsPath . "tab6-icon.png" ?> style="vertical-align:middle;"><span style="vertical-align:middle;margin-left:4px;">Advertisement window on pause settings</span></a></li>


	  	</ul>





	 





	  	<div id="tab1">





			<table>





    			<tr>





		    		<td>





		    			<label for="name">Preset name:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="name" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="skin_path">Skin type:</label>





		    		</td>





		    		<td>





		    			<select id="skin_path" class="ui-corner-all">





							<option value="minimal_skin_dark">minimal-skin-dark</option>





							<option value="modern_skin_dark">modern-skin-dark</option>





							<option value="classic_skin_dark">classic-skin-dark</option>





							<option value="metal_skin_dark">metal-skin-dark</option>





							<option value="minimal_skin_white">minimal-skin-white</option>





							<option value="modern_skin_white">modern-skin-white</option>





							<option value="classic_skin_white">classic-skin-white</option>





							<option value="metal_skin_white">metal-skin-white</option>
							
							
							<option value="hex_dark">hex-dark</option>
							
							<option value="hex_white">hex-white</option>




						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="showErrorInfo">Show error / info window:</label>





		    		</td>





		    		<td>





		    			<select id="showErrorInfo" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="Set this to no if you don't want the error / info window appear and display the error to the user.">

		    		</td>





		    	</tr>
				
				<tr>





		    		<td>





		    			<label for="initializeOnlyWhenVisible">Initialize only when visible:</label>





		    		</td>





		    		<td>





		    			<select id="initializeOnlyWhenVisible" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"

							title="Lazy scrolling / loading, the posibility to initialize UVP on scroll when the player is visible in the page, this way for example if the player is in a section of a webpage that is not visible it will not be initialized / play, instead UVP will be initalized / play only when the user is scrolling to that section in which the player is added.">





		    		</td>





		    	</tr>


				<tr>





		    		<td>





		    			<label for="display_type">Display type:</label>





		    		</td>





		    		<td>





		    			<select id="display_type" class="ui-corner-all">





							<option value="responsive">responsive</option>





							<option value="fullscreen">fullscreen</option>





						</select>





		    		</td>





		    	</tr>





				





				<tr>

		    		<td>

		    			<label for="use_deeplinking">Use deeplinking:</label>

		    		</td>


		    		<td>

		    			<select id="use_deeplinking" class="ui-corner-all">

							<option value="yes">yes</option>

							<option value="no">no</option>

						</select>

						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"

							title="This allows or not deeplinking (an unique URL for each video).">

		    		</td>
					

		    	</tr>
				
				
				
					<tr>

		    		<td>

		    			<label for="fill_entire_video_screen">Fill entire video screen:</label>

		    		</td>

		    		<td>

		    			<select id="fill_entire_video_screen" class="ui-corner-all">

							<option value="yes">yes</option>

							<option value="no">no</option>

						</select>
						
						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"

							title="This feature will allow to fill the gaps of the video player, you can have for example a real full width player.">
			
		    		</td>
					
		    	</tr>
				
				<tr>

		    		<td>

		    			<label for="use_HEX_colors_for_skin">Use HEX / CSS colors:</label>

		    		</td>

		    		<td>

		    			<select id="use_HEX_colors_for_skin" class="ui-corner-all">

							<option value="yes">yes</option>

							<option value="no">no</option>

						</select>
						
						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"

							title="This feature allows to add hexadecimal colors to all buttons and some player elements just like it's done with CSS and even more, we have done it in a cool way that all graphics will retain the texture and at the same time apply the chosen color. Please note that this feature will work with all skins but we created a custom dark skin and a custom white skin specially for this, I suggest to use this skins, if you are using a dark theme set the 'Skin type:' option to hex_dark if is the white theme set 'Skin type:' to hex_white , both skins can be found in the plugin directory wp-plugins/fwduvp/content.">
			
		    		</td>
					
		    	</tr>
				
				<tr>

		    		<td>

		    			<label for="normal_HEX_buttons_color">Normal HEX / CSS color:</label>

		    		</td>

		    		<td>

		    			<input id="normal_HEX_buttons_color" />

		    		</td>

		    	</tr>
				
				<tr>

		    		<td>

		    			<label for="selected_HEX_buttons_color">Selected HEX / CSS color:</label>

		    		</td>

		    		<td>

		    			<input id="selected_HEX_buttons_color" />

		    		</td>

		    	</tr>
				
				




				<tr>





		    		<td>





		    			<label for="right_click_context_menu">Right-click context menu:</label>





		    		</td>





		    		<td>





		    			<select id="right_click_context_menu" class="ui-corner-all">





							<option value="developer">developer</option>





							<option value="disabled">disabled</option>





							<option value="default">default</option>





						</select>





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="If 'developer' the context menu will be the developer link 'made by FWD'.





								If 'disabled' the context menu will be disabled completely.





								If 'default' the context menu will be the browser default.">





		    		</td>





		    	</tr>





			</table>





			 





			<table>
				
				

				<tr>



		    		<td>



		    			<label for="add_keyboard_support">Add keyboard support:</label>



		    		</td>



		    		<td>



		    			<select id="add_keyboard_support" class="ui-corner-all">



							<option value="yes">yes</option>



							<option value="no">no</option>



						</select>



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="auto_scale">Autoscale:</label>



		    		</td>



		    		<td>



		    			<select id="auto_scale" class="ui-corner-all">



							<option value="yes">yes</option>



							<option value="no">no</option>



						</select>



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="show_buttons_tooltips">Show buttons tooltips:</label>



		    		</td>



		    		<td>



		    			<select id="show_buttons_tooltips" class="ui-corner-all">



							<option value="yes">yes</option>



							<option value="no">no</option>



						</select>



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="stop_video_when_play_complete">Stop video when play complete:</label>



		    		</td>



		    		<td>



		    			<select id="stop_video_when_play_complete" class="ui-corner-all">



							<option value="yes">yes</option>



							<option value="no">no</option>



						</select>



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="subtitles_off_label">Subtitle off label:</label>



		    		</td>



		    		<td>



		    			<select id="subtitles_off_label" class="ui-corner-all">



							<option value="yes">yes</option>



							<option value="no">no</option>



						</select>



						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"



							title="Set this to yes to show the subtitle without clicking the subtitle button from the controller if there is a subtitle for the current video.">



		    		</td>



		    	</tr>






				<tr>





		    		<td>





		    			<label for="autoplay">Autoplay:</label>





		    		</td>





		    		<td>





		    			<select id="autoplay" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="loop">Loop:</label>





		    		</td>





		    		<td>





		    			<select id="loop" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>

		    		<td>

		    			<label for="shuffle">Shuffle:</label>

		    		</td>


		    		<td>

		    			<select id="shuffle" class="ui-corner-all">

							<option value="yes">yes</option>

							<option value="no">no</option>

						</select>

		    		</td>

		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="show_popup_ads_close_button">Show popup commercial ads close button:</label>
		    		</td>

		    		<td>
		    			<select id="show_popup_ads_close_button" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="max_width">Player maximum width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="max_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This value represents the player maximum width in px units, think of this property as it would be the 'max-width' CSS property.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="max_height">Player maximum height:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="max_height" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This value represents the player maximum height in px units, think of this property as it would be the 'max-height' CSS property.">





		    		</td>





		    	</tr>





		    </table>


			<table>
			
				

				<tr>



		    		<td>



		    			<label for="volume">Volume:</label>



		    		</td>



		    		<td>



		    			<input type="text" id="volume" style="width:200px;" class="text ui-widget-content ui-corner-all">



		    			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"



							title="This is the volume level of the player. It must be a float value between 0 and 1.">



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="bg_color">Background color:</label>



		    		</td>



		    		<td>



		    			<input id="bg_color" />



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="video_bg_color">Video background color:</label>



		    		</td>



		    		<td>



		    			<input id="video_bg_color" />



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="poster_bg_color">Poster background color:</label>



		    		</td>



		    		<td>



		    			<input id="poster_bg_color" />



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="buttons_tooltip_hide_delay">Buttons tooltip hide delay:</label>



		    		</td>



		    		<td>



		    			<input type="text" id="buttons_tooltip_hide_delay" style="width:200px;" class="text ui-widget-content ui-corner-all">



		    			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"



							title="This is a float number that represents the duration in seconds until the tooltip button is showed on mouse hover.">



		    		</td>



		    	</tr>



		    	<tr>



		    		<td>



		    			<label for="buttons_tooltip_font_color">Buttons tooltip font color:</label>



		    		</td>



		    		<td>



		    			<input id="buttons_tooltip_font_color" />



		    		</td>



		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="defaultPlaybackRate">Playback rate / speed:</label>
		    		</td>

		    		<td>
		    			<select id="defaultPlaybackRate" class="ui-corner-all">
							<option value="0.25">0.25</option>
							<option value="0.5">0.5</option>
							<option value="1">1</option>
							<option value="1.25">1.25</option>
							<option value="1.5">1.5</option>
							<option value="2">2</option>
						</select>
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="privateVideoPassword">Global private videos password:</label>
		    		</td>

		    		<td>
		    			<input type="text" id="privateVideoPassword" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"
							title="The global password for private videos.">
		    		</td>
		    	</tr>
				
				
				<tr>
					<td>
						<label for="showPreloader">Show preloader:</label>
					</td>

					<td>
						<select id="showPreloader" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="Set this to no to disable the counting time preloader.">
					</td>
				</tr>
				
				<tr>
		    		<td>
		    			<label for="playVideoOnlyWhenLoggedIn">Play video only when loggedin:</label>
		    		</td>
		    		<td>
		    			<select id="playVideoOnlyWhenLoggedIn" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="loggedInMessage">Message to show if user is not loggedin:</label>
		    		</td>

		    		<td>
		    			<input type="text" id="loggedInMessage" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
			

			</table>


		</div>





	  





		<div id="tab2">





		  	<table>





				<tr>





		    		<td>





		    			<label for="show_controller_when_video_is_stopped">Show controller when video is stopped:</label>





		    		</td>





		    		<td>





		    			<select id="show_controller_when_video_is_stopped" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_next_and_prev_buttons_in_controller">Show next and previous buttons in controller:</label>





		    		</td>





		    		<td>





		    			<select id="show_next_and_prev_buttons_in_controller" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_volume_button">Show volume button:</label>





		    		</td>





		    		<td>





		    			<select id="show_volume_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_time">Show time:</label>





		    		</td>





		    		<td>





		    			<select id="show_time" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="showPlaybackRateButton">Show playback rate / speed button:</label>
		    		</td>
		    		<td>
		    			<select id="showPlaybackRateButton" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>




				<tr>

		    		<td>

		    			<label for="show_youtube_quality_button">Show Youtube quality button:</label>

		    		</td>

		    		<td>

		    			<select id="show_youtube_quality_button" class="ui-corner-all">

							<option value="yes">yes</option>

							<option value="no">no</option>

						</select>

		    		</td>

		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_info_button">Show info button:</label>





		    		</td>





		    		<td>





		    			<select id="show_info_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_download_button">Show download button:</label>





		    		</td>





		    		<td>





		    			<select id="show_download_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_share_button">Show share button:</label>





		    		</td>





		    		<td>





		    			<select id="show_share_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_embed_button">Show embed button:</label>





		    		</td>





		    		<td>





		    			<select id="show_embed_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="show_fullscreen_button">Show fullscreen button:</label>





		    		</td>





		    		<td>





		    			<select id="show_fullscreen_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





			</table>





			<table>
				
				<tr>
		    		<td>
		    			<label for="disable_video_scrubber">Disable video scrubber:</label>
		    		</td>

		    		<td>
		    			<select id="disable_video_scrubber" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
		    		</td>
		    	</tr>

				<tr>
		    		<td>
		    			<label for="repeat_background">Repeat background:</label>
		    		</td>

		    		<td>
		    			<select id="repeat_background" class="ui-corner-all">
							<option value="no">no</option>
							<option value="yes">yes</option>
						</select>

						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
							title="This option is like the CSS 'background-repeat' property for the controller background image. If set to 'no' it will expand the image to fill the controller size.">
		    		</td>
		    	</tr>





	    		<tr>





		    		<td>





		    			<label for="controller_height">Controller height:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="controller_height" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="controller_hide_delay">Controller hide delay:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="controller_hide_delay" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This is a number that represents the seconds until the control bar is hiding after a period of inactivity.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="start_space_between_buttons">Start space between buttons:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="start_space_between_buttons" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> id="start_space_between_buttons_img" style="vertical-align:middle;margin-top:-4px;" title="">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="space_between_buttons">Space between buttons:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="space_between_buttons" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> id="space_between_buttons_img" style="vertical-align:middle;margin-top:-4px;" title="">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="scrubbers_offset_width">Scrubbers offset width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="scrubbers_offset_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This is a number that represents the total amount in pixels removed from the scrubber bars when they are at the end (useful based on the skin type).">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="main_scrubber_offest_top">Main scrubber offset top:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="main_scrubber_offest_top" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This is the amount in pixels to push the main scrubber up when the controller is hiding.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="time_offset_left_width">Time offset left width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="time_offset_left_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This is a number that represents an addition in px to the space between the time indicator left side and the scrubber.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="time_offset_right_width">Time offset right width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="time_offset_right_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This is a number that represents an addition in px to the space between the time indicator right side and the volume button or any other button that will follow the time indicator.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="time_offset_top">Time offset top:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="time_offset_top" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This is a number that represents an addition in px to the time position on the y axis.">





		    		</td>





		    	</tr>





				





			</table>





			<table>
			
				<tr>



		    		<td>



		    			<label for="volume_scrubber_height">Volume scrubber height:</label>



		    		</td>



		    		<td>



		    			<input type="text" id="volume_scrubber_height" style="width:200px;" class="text ui-widget-content ui-corner-all">



						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"



							title="This is a number that represents the height of the volume scrubber.">



		    		</td>



		    	</tr>



				<tr>



		    		<td>



		    			<label for="volume_scrubber_ofset_height">Volume scrubber offset height:</label>



		    		</td>



		    		<td>



		    			<input type="text" id="volume_scrubber_ofset_height" style="width:200px;" class="text ui-widget-content ui-corner-all">



						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"



							title="This is a number that represents the extra offset height added to the volume scrubber.">



		    		</td>



		    	</tr>





				<tr>





		    		<td>





		    			<label for="time_color">Time color:</label>





		    		</td>





		    		<td>





		    			<input id="time_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="youtube_quality_button_normal_color">Youtube quality button normal color:</label>





		    		</td>





		    		<td>





		    			<input id="youtube_quality_button_normal_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="youtube_quality_button_selected_color">Youtube quality button selected color:</label>





		    		</td>





		    		<td>





		    			<input id="youtube_quality_button_selected_color" />





		    		</td>





		    	</tr>





			</table>





		</div>





	





		<div id="tab3">





			<table>
				
				<tr>
		    		<td>
		    			<label for="use_playlists_select_box">Show playlists select / combo-box:</label>
		    		</td>
		    		<td>
		    			<select id="use_playlists_select_box" class="ui-corner-all">
							<option value="yes">yes</option>
							<option value="no">no</option>
						</select>
						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
						title="If this is set to 'yes' the playlists select / combo-box is showed as soon as the player is loaded and displayed.">
		    		</td>
					
		    	</tr>




		    	<tr>

		    		<td>

		    			<label for="show_playlists_button_and_playlists">Show playlists button and playlists:</label>

		    		</td>

		    		<td>

		    			<select id="show_playlists_button_and_playlists" class="ui-corner-all">

							<option value="yes">yes</option>

							<option value="no">no</option>

						</select>

		    		</td>

		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_playlists_by_default">Show playlists by default:</label>





		    		</td>





		    		<td>





		    			<select id="show_playlists_by_default" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="If this is set to 'yes' the playlists window is showed as soon as the player is loaded and displayed.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="thumbnail_selected_type">Thumbnail selected type:</label>





		    		</td>





		    		<td>





		    			<select id="thumbnail_selected_type" class="ui-corner-all">





							<option value="opacity">opacity</option>





							<option value="threshold">threshold</option>





							<option value="blackAndWhite">black-and-white</option>





						</select>





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This represents the playlist thumbnail selected state (please note that this setting is always 'opacity' when tested locally or on a mobile device).">





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="start_at_playlist">Start at playlist:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="start_at_playlist" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the playlist number that will be loaded when the player loads the first time. If deeplinking is used and the browser URL has a playlist link this option is ignored.





								The playlists count starts from 0 (zero).">





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="buttons_margins">Buttons margins:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="buttons_margins" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the margins offset for the prev, next and close buttons from the playlists window.">





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="thumbnail_max_width">Thumbnail maximum width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="thumbnail_max_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="thumbnail_max_height">Thumbnail maximum height:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="thumbnail_max_height" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="horizontal_space_between_thumbnails">Horizontal space between <br> thumbnails:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="horizontal_space_between_thumbnails" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="vertical_space_between_thumbnails">Vertical space between thumbnails:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="vertical_space_between_thumbnails" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





		    </table>
			
			<table>
				<tr>
		    		<td>
		    			<label for="main_selector_background_selected_color">Combo-box selector background selected color:</label>
		    		</td>
		    		<td>
		    			<input id="main_selector_background_selected_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_selector_text_normal_color">Combo-box selector text normal color:</label>
		    		</td>
		    		<td>
		    			<input id="main_selector_text_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_selector_text_selected_color">Combo-box selector text selected color:</label>
		    		</td>
		    		<td>
		    			<input id="main_selector_text_selected_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_background_normal_color">Combo-box button background normal color:</label>
		    		</td>
		    		<td>
		    			<input id="main_button_background_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_background_selected_color">Combo-box button background selected color:</label>
		    		</td>
		    		<td>
		    			<input id="main_button_background_selected_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_text_normal_color">Combo-box button text normal color</label>
		    		</td>
		    		<td>
		    			<input id="main_button_text_normal_color" />
		    		</td>
		    	</tr>
				<tr>
		    		<td>
		    			<label for="main_button_text_selected_color">Combo-box button text selected color</label>
		    		</td>
		    		<td>
		    			<input id="main_button_text_selected_color" />
		    		</td>
		    	</tr>
			</table>





		</div>





			





		<div id="tab4">





			<table>





		    	<tr>





		    		<td>





		    			<label for="show_playlist_button_and_playlist">Show playlist button and playlist:</label>





		    		</td>





		    		<td>





		    			<select id="show_playlist_button_and_playlist" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





						





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="playlist_position">Playlist position:</label>





		    		</td>





		    		<td>





		    			<select id="playlist_position" class="ui-corner-all">





							<option value="right">right</option>





							<option value="bottom">bottom</option>





						</select>





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="show_playlist_by_default">Show playlist by default:</label>





		    		</td>





		    		<td>





		    			<select id="show_playlist_by_default" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="If this is set to 'yes' the playlist is showed as soon as the player is loaded and displayed otherwise the playlist is hidden and it will only appear if the playlist button is clicked or touched.">





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="show_playlist_name">Show playlist name:</label>





		    		</td>





		    		<td>





		    			<select id="show_playlist_name" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="show_search_input">Show search input:</label>





		    		</td>





		    		<td>





		    			<select id="show_search_input" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="show_loop_button">Show loop button:</label>





		    		</td>





		    		<td>





		    			<select id="show_loop_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="show_shuffle_button">Show shuffle button:</label>





		    		</td>





		    		<td>





		    			<select id="show_shuffle_button" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





		    	<tr>





		    		<td>





		    			<label for="show_next_and_prev_buttons">Show next and previous buttons:</label>





		    		</td>





		    		<td>





		    			<select id="show_next_and_prev_buttons" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="force_disable_download_button_for_folder">Disable download button for <br> folder:</label>





		    		</td>





		    		<td>





		    			<select id="force_disable_download_button_for_folder" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="add_mouse_wheel_support">Add mouse wheel support:</label>





		    		</td>





		    		<td>





		    			<select id="add_mouse_wheel_support" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="start_at_random_video">Start at random video:</label>





		    		</td>





		    		<td>





		    			<select id="start_at_random_video" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





			</table>





			





			<table>





				<tr>





		    		<td>





		    			<label for="folder_video_label">Folder video label:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="folder_video_label" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="playlist_right_width">Playlist right width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="playlist_right_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the playlist width when it is positioned at the right.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="playlist_bottom_height">Playlist bottom height:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="playlist_bottom_height" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the playlist height when it is positioned at the bottom.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="start_at_video">Start at video:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="start_at_video" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the video number that will be loaded when the player loads the first time. If deeplinking is used and the browser URL has a playlist link this option is ignored.





								The videos count starts from 0 (zero).">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="max_playlist_items">Maximum playlist items:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="max_playlist_items" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"





							title="This option is useful if the number of playlist items needs to be limited, for example if a playlist is loaded from Youtube and it has 1000 videos it will be too large to display so the playlist





								will display only 100 videos. If you want to load the total available number of videos without limitation just set this number to a large number like 10000.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="thumbnail_width">Thumbnail width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="thumbnail_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the thumbnails width in pixels.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="thumbnail_height">Thumbnail height:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="thumbnail_height" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the thumbnails height in pixels.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="space_between_controller_and_playlist">Space between controller and playlist:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="space_between_controller_and_playlist" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the space in pixels between the video control bar and playlist.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="space_between_thumbnails">Space between thumbnails:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="space_between_thumbnails" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the vertical space in pixels between thumbnails.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="scrollbar_offest_width">Scrollbar offset width:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="scrollbar_offest_width" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the width to remove from the playlist total width to make room for the playlist scrollbar.">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="scollbar_speed_sensitivity">Scrollbar speed sensitivity:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="scollbar_speed_sensitivity" style="width:200px;" class="text ui-widget-content ui-corner-all">





						<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;margin-top:-4px;"





							title="This is a number that represents the scrollbar speed sensitivity. It must be a float value between 0 and 1.">





		    		</td>





		    	</tr>





			</table>





			





			<table>





				<tr>

		    		<td>

		    			<label for="playlist_background_color">Playlist background color:</label>

		    		</td>

		    		<td>

		    			<input id="playlist_background_color" />

		    		</td>

		    	</tr>





				<tr>





		    		<td>





		    			<label for="playlist_name_color">Playlist name color:</label>





		    		</td>





		    		<td>





		    			<input id="playlist_name_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="thumbnail_normal_background_color">Thumbnail normal background color:</label>





		    		</td>





		    		<td>





		    			<input id="thumbnail_normal_background_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="thumbnail_hover_background_color">Thumbnail hover background color:</label>





		    		</td>





		    		<td>





		    			<input id="thumbnail_hover_background_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="thumbnail_disabled_background_color">Thumbnail disabled background color:</label>





		    		</td>





		    		<td>





		    			<input id="thumbnail_disabled_background_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="search_input_background_color">Search input background color:</label>





		    		</td>





		    		<td>





		    			<input id="search_input_background_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="search_input_color">Search input color:</label>





		    		</td>





		    		<td>





		    			<input id="search_input_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="youtube_and_folder_video_title_color">Youtube and folder video title color:</label>





		    		</td>





		    		<td>





		    			<input id="youtube_and_folder_video_title_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="youtube_owner_color">Youtube owner color:</label>





		    		</td>





		    		<td>





		    			<input id="youtube_owner_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="youtube_description_color">Youtube description color:</label>





		    		</td>





		    		<td>





		    			<input id="youtube_description_color" />





		    		</td>





		    	</tr>





		    </table>





		</div>





		





		<div id="tab5">





			<table>





				<tr>





		    		<td>





		    			<label for="show_logo">Show logo:</label>





		    		</td>





		    		<td>





		    			<select id="show_logo" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="hide_logo_with_controller">Hide logo with controller:</label>





		    		</td>





		    		<td>





		    			<select id="hide_logo_with_controller" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="logo_position">Logo position:</label>





		    		</td>





		    		<td>





		    			<select id="logo_position" class="ui-corner-all">





							<option value="topRight">top-right</option>





							<option value="topLeft">top-left</option>





							<option value="bottomRight">bottom-right</option>





							<option value="bottomLeft">bottom-left</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="logo_path">Logo path:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="logo_path" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="logo_link">Logo link:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="logo_link" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="logo_margins">Logo margins:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="logo_margins" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





			</table>





		</div>





		





		<div id="tab6">





			<table>





				<tr>





		    		<td>





		    			<label for="embed_and_info_window_close_button_margins">Embed and info window close button margins:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="embed_and_info_window_close_button_margins" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="border_color">Border color:</label>





		    		</td>





		    		<td>





		    			<input id="border_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="main_labels_color">Main labels color:</label>





		    		</td>





		    		<td>





		    			<input id="main_labels_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="secondary_labels_color">Secondary labels color:</label>





		    		</td>





		    		<td>





		    			<input id="secondary_labels_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="share_and_embed_text_color">Share and embed text color:</label>





		    		</td>





		    		<td>





		    			<input id="share_and_embed_text_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="input_background_color">Input background color:</label>





		    		</td>





		    		<td>





		    			<input id="input_background_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="input_color">Input color:</label>





		    		</td>





		    		<td>





		    			<input id="input_color" />





		    		</td>





		    	</tr>





			</table>





			





			<img src=<?php echo $this->_dir_url . "content/spaces/embedWindow.jpg" ?>>





		</div>





		





		<div id="tab7">





			<table>





				<tr>





		    		<td>





		    			<label for="open_new_page_at_the_end_of_the_ads">Open new page at the end <br> of the ads:</label>





		    		</td>





		    		<td>





		    			<select id="open_new_page_at_the_end_of_the_ads" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="play_ads_only_once">Play ads only once:</label>





		    		</td>





		    		<td>





		    			<select id="play_ads_only_once" class="ui-corner-all">





							<option value="yes">yes</option>





							<option value="no">no</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="ads_buttons_position">Ads buttons position:</label>





		    		</td>





		    		<td>





		    			<select id="ads_buttons_position" class="ui-corner-all">





							<option value="left">left</option>





							<option value="right">right</option>





						</select>





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="skip_to_video_text">Skip to video text:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="skip_to_video_text" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="skip_to_video_button_text">Skip to video button text:</label>





		    		</td>





		    		<td>





		    			<input type="text" id="skip_to_video_button_text" style="width:200px;" class="text ui-widget-content ui-corner-all">





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="ads_text_normal_color">Ads text normal color:</label>





		    		</td>





		    		<td>





		    			<input id="ads_text_normal_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="ads_text_selected_color">Ads text selected color:</label>





		    		</td>





		    		<td>





		    			<input id="ads_text_selected_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="ads_border_normal_color">Ads border normal color:</label>





		    		</td>





		    		<td>





		    			<input id="ads_border_normal_color" />





		    		</td>





		    	</tr>





				<tr>





		    		<td>





		    			<label for="ads_border_selected_color">Ads border selected color:</label>





		    		</td>





		    		<td>





		    			<input id="ads_border_selected_color" />





		    		</td>





		    	</tr>





			</table>


		</div>
		
		
		<div id="tab8">
			<table>
				<tr>
		    		<td>
		    			<label for="aopwTitle">Title:</label>
		    		</td>

		    		<td>
		    			<input type="text" id="aopwTitle" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwWidth">Maximum width:</label>
		    		</td>

		    		<td>
		    			<input type="text" id="aopwWidth" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwHeight">Maximum height:</label>
		    		</td>

		    		<td>
		    			<input type="text" id="aopwHeight" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwBorderSize">Advertisement border size:</label>
		    		</td>

		    		<td>
		    			<input type="text" id="aopwBorderSize" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				<tr>
		    		<td>
		    			<label for="aopwTitleColor">Title color:</label>
		    		</td>

		    		<td>
		    			<input type="text" id="aopwTitleColor" style="width:200px;" class="text ui-widget-content ui-corner-all">
		    		</td>
		    	</tr>
				
				
			</table>
		</div>
		





	</div>





	





	<input type="hidden" id="settings_data" name="settings_data" value="">





	





	<input id="add_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Add new preset" />





	<input id="update_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Update preset settings" />





	<input id="del_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Delete preset" />





	





	<?php wp_nonce_field("fwduvp_general_settings_update", "fwduvp_general_settings_nonce"); ?>





</form>











<?php echo $msg; ?>











