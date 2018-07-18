<style>

    body { font-size: 10px; }

    p { font-size: 12px; }

    input.text { margin-bottom:12px; width:95%; padding: .4em; }

    fieldset { padding:0; border:0; margin-top:25px; }

    .fwd_editor_class { height: 200px !important; }

   

    .main-playlist { margin-top: 8px; margin-bottom: 8px; }

    .playlist { margin-top: 8px; margin-bottom: 8px; }

    #add_main_playlist_btn { margin-top: 6px; }

    .add_playlist_btn { margin-right: 8px; margin-top: 6px; }

    .edit_main_playlist_btn { margin-right: 8px; margin-top: 6px; }

    .delete_main_playlist_btn { margin-right: 8px; margin-top: 6px; }

    .add_video_btn { margin-right: 8px; margin-top: 6px; }

    .edit_playlist_btn { margin-right: 8px; margin-top: 4px; }

    .delete_playlist_btn { margin-right: 8px; margin-top: 4px; }

	.edit_ads_btn, .edit_vid_btn, .edit_subtitle_btn , .edit_popupad_btn, .edit_cuepoint_btn {cursor: pointer; position:absolute; left:488px; top:5px;}

    .delete_ads_btn, .delete_vid_btn, .delete_subtitle_btn, .delete_popupad_btn, .delete_cuepoint_btn { cursor: pointer; position:absolute; left:530px; top:5px;}
	
	.checkbox_vid, .checkbox_subtitle, .checkbox_ads, .checkbox_popupad{ cursor: pointer; position:absolute; left:464px; top:10px;}

	.edit_video_btn { cursor: pointer; position:absolute; left:519px; top:6px;}

    .delete_video_btn { cursor: pointer; position:absolute; left:560px; top:6px;}

	.edit_playlist_btn2 { cursor: pointer; position:absolute; left:558px; top:5px; }

    .delete_playlist_btn2 { cursor: pointer; position:absolute; left:598px; top:5px; }
	
	.fwd-item-image-img{

		width:26px;

		height:26px;

		position:absolute;

		top:2px;

		left:455px;

	}
	
	.fwd-video-image-img{

		width:26px;

		height:25px;

		position:absolute;

		top:2px;

		left:486px;

	}
	
	.item-header { 
		font-familly:Verdana, Arial, sans-serif;
		font-size:13px;
		font-weight:normal;
		padding: 8px;
		padding-right:20px;
		padding-top:7px;
		margin: 0px; 
		color: #555555; 
	}

    .fwd-item{

    	position:relative;

    	margin-top: 8px;

    	margin-bottom: 8px;

    	width: 585px;

    	height: 29px;

		border: 1px solid #d3d3d3;

		border-radius: 4px;

		background: #e6e6e6 url(<?php echo $this->_dir_url . "css/images/ui-bg_glass_75_e6e6e6_1x400.png" ?>) 50% 50% repeat-x;

    }

    .fwd-error { color:#FF0000; }

    .ui-tooltip{

		max-width: 400px !important;

	}
	
	#ads_url, #url_edit, #ads_url_edit, #popupads_url, #popupads_url_edit{
		width:395px;
		margin-right:20px;
	}

	

	#main_playlists .ui-accordion-header {

	  font-familly:Verdana, Arial, sans-serif;

	  font-size:13px;

	  margin-bottom:8px;

	  margin-top:8px;

	  padding:6px;

	  padding-left:28px;

	  height:16px;

	}

	

    .video-header { 

		font-familly:Verdana, Arial, sans-serif;

		font-size:13px;

		font-weight:normal;

		cursor: pointer; 

		padding: 8px;

		padding-top:7px;

		margin: 0px; 

		color: #555555; 

	}

	

    .fwd-video{

    	position:relative;

    	margin-top: 8px;

    	margin-bottom: 8px;

    	width: 615px;

    	height: 29px;

		border: 1px solid #d3d3d3;

		border-radius: 4px;

		background: #e6e6e6 url(<?php echo $this->_dir_url . "css/images/ui-bg_glass_75_e6e6e6_1x400.png" ?>) 50% 50% repeat-x;

    }



    .vid_over{

    	border: 1px solid #999999;

    	background: #dadada url(<?php echo $this->_dir_url . "css/images/ui-bg_glass_75_dadada_1x400.png" ?>) 50% 50% repeat-x;

    }

	

	.pl-header {

		font-familly:Verdana, Arial, sans-serif;

		font-size:13px;

		font-weight:normal;

		cursor: pointer; 

		padding: 8px; 

		margin: 0px; 

		color: #555555; 

	}

   

   .fwd-playlist{

    	position:relative;

    	margin-top: 8px;

    	margin-bottom: 8px;

    	width: 656px;

    	height: 28px;

		border: 1px solid #d3d3d3;

		border-radius: 4px;

		background: #e6e6e6 url(<?php echo $this->_dir_url . "css/images/ui-bg_glass_75_e6e6e6_1x400.png" ?>) 50% 50% repeat-x;

    }

    

    .pl_over{

    	border: 1px solid #999999;

    	background: #dadada url(<?php echo $this->_dir_url . "css/images/ui-bg_glass_75_dadada_1x400.png" ?>) 50% 50% repeat-x;

    }
	
	#pr_name, pr_name_edit{
		margin-bottom:17px;
	}

</style>



<script>

	var mainPlaylistsAr = <?php echo json_encode($this->_data->main_playlists_ar); ?>;



	if (!mainPlaylistsAr)

	{

		mainPlaylistsAr = [];

	}

	

	var iconsPath = "<?php echo $this->_dir_url . "content/icons/" ?>";

</script>

<div id="add-cuepoint-dialog" title="Add new cuepoint">

	<p id="cuepoint_cuepoints_tips">The start time field is required.</p>
	
	
	<br>
	<label for="cuepoint_label">Cuepoint label:</label>
	<input id="cuepoint_label" type="text" style="width:100px" class="text ui-widget-content ui-corner-all">

	<label style="margin-left:30px;" for="cuepoint_start_time">Start time:</label>
	<input type="text" id="cuepoint_start_time" style="width:180px" class="text ui-widget-content ui-corner-all">
	<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle; margin-left:4px;"
	title="The start time of for the cuepoint, the format is hours:minutes:seconds, for example 01:20:20."/>
		
	<br>
	<label for="cuepoint_code">Cuepoint javascript function call:</label>
	<input id="cuepoint_code" style="width:480px;overflow:hidden;" class="text ui-widget-content ui-corner-all fwdevpInputFleds"></input>
	<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:3px;"
	title="The cupoint javascript function that will be executed at the cuepoint start time. If you have a javascript function defined in your page it can be set here to be called at the start time, for example if the function is called myFunction set this to myFunction(); make sure you add the parentheses as well and also make sure you don't use any parameters the function has to be simple.">

	
</div>

<div id="edit-cuepoints-dialog" title="Add new cuepoint">

	<p id="cuepoint_cuepoints_tips_edit">The start time field is required.</p>
	
	
	<br>
	<label for="cuepoint_label_edit">Cuepoint label:</label>
	<input id="cuepoint_label_edit" type="text" style="width:100px" class="text ui-widget-content ui-corner-all">

	<label style="margin-left:30px;" for="cuepoint_start_time_edit">Start time:</label>
	<input type="text" id="cuepoint_start_time_edit" style="width:180px" class="text ui-widget-content ui-corner-all">
	<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle; margin-left:4px;"
	title="The start time of for the cuepoint, the format is hours:minutes:seconds, for example 01:20:20."/>
		
	<br>
	<label for="cuepoint_code_edit">Cuepoint javascript function call::</label>
	<input id="cuepoint_code_edit" style="width:480px;overflow:hidden;" class="text ui-widget-content ui-corner-all fwdevpInputFleds"></input>
	<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:3px;"
	title="The cupoint javascript function that will be executed at the cuepoint start time. If you have a javascript function defined in your page it can be set here to be called at the start time, for example if the function is called myFunction set this to myFunction(); make sure you add the parentheses as well and also make sure you don't use any parameters the function has to be simple.">

	
</div>

<div id="add-ads-dialog" title="Add new pre-roll,mid-roll,post-roll advertisement">

	<p id="add_ads_tips">The source field is required.</p>

	<fieldset>
		<table>
			<tr>
				<td style="width:100%;padding:0;">
					<label for="ads_label">Advertisement label:</label>
					<input id="ads_label" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
			<tr>
				<td style="width:100%;padding:0;">
					<label for="ads_source">Video or image source (mp4,youtube or image path):</label>
					<input id="ads_source" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
					<button id="ads_source_button" style="cursor:pointer;position:relative;">Add from media library</button>
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:0px;position:relative;top:4px;"
					title="This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).">
				</td>
			</tr>
		</table>
		
		<br>
		<div id="ads_link_type">
			<label for="ads_url">URL:</label>
			<input type="text" id="ads_url" class="text ui-widget-content ui-corner-all">
			
			<label for="ads_target">Target:</label>
			<select id="ads_target" class="ui-corner-all">
				<option value="_blank">_blank</option>
				<option value="_self">_self</option>
			</select>
		</div>
		<br>
		<table>
			<tr>
				<td style="width:340px;padding:0;">
					<label for="ads_start_time">Start time:</label>
					<input type="text" id="ads_start_time" style="width:180px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The time at which the advertisement will start playing, the format is hours:minutes:seconds, for example 01:20:20."/>
				</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td style="width:340px;padding:0;">
					<label for="time_to_hold_ad">Time to hold add:</label>
					<input type="text" id="time_to_hold_ad" style="width:143px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The duration in seconds format until the skip button will appear, for example to show the skip add button after 10 seconds from the video start set this to 10."/>
				</td>
				
				<td style="width:340px;padding:0px;padding-left:20px">
					<label for="add_duration">Add duration:</label>
					<input type="text" id="add_duration" style="width:177px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The add duration in hh:mm:ss format to hold the add if an image is used, for example to hold the image add for 20 seconds set this option to 00:00:20."/>
				</td>
			</tr>
		</table>
		
  	</fieldset>
	
</div>

<div id="edit-ads-dialog" title="Edit new pre-roll,mid-roll,post-roll advertisement">

	<p id="edit_ads_tips">The source field is required.</p>

	<fieldset>
		<table>
			<tr>
				<td style="width:100%;pediting:0;">
					<label for="ads_label_edit">Advertisement label:</label>
					<input id="ads_label_edit" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
			<tr>
				<td style="width:100%;pediting:0;">
					<label for="ads_source_edit">Video or image source (mp4,youtube or image path):</label>
					<input id="ads_source_edit" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
					<button id="ads_source_button_edit" style="cursor:pointer;position:relative;">Add from media library</button>
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:0px;position:relative;top:4px;"
					title="This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).">
				</td>
			</tr>
		</table>
		
		<br>
		<div id="ads_link_type">
			<label for="ads_url_edit">URL:</label>
			<input type="text" id="ads_url_edit" class="text ui-widget-content ui-corner-all">
			
			<label for="ads_target_edit">Target:</label>
			<select id="ads_target_edit" class="ui-corner-all">
				<option value="_blank">_blank</option>
				<option value="_self">_self</option>
			</select>
		</div>
		<br>
		<table>
			<tr>
				<td style="width:340px;pediting:0;">
					<label for="ads_start_time_edit">Start time:</label>
					<input type="text" id="ads_start_time_edit" style="width:180px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The time at which the advertisement will start playing, the format is hours:minutes:seconds, for example 01:20:20."/>
				</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td style="width:340px;pediting:0;">
					<label for="time_to_hold_ad_edit">Time to hold add:</label>
					<input type="text" id="time_to_hold_ad_edit" style="width:143px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The duration in seconds until the skip button will appear, for example to show the skip add button after 10 seconds from the video start set this to 10."/>
				</td>
				
				<td style="width:340px;pediting:0px;pediting-left:20px">
					<label for="edit_duration_edit">Add duration:</label>
					<input type="text" id="add_duration_edit" style="width:177px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The add duration in hh:mm:ss format to hold the add if an image is used, for example to hold the image add for 20 seconds set this option to 00:00:20."/>
				</td>
			</tr>
		</table>
		
  	</fieldset>
	
</div>

<div id="add-popupad-dialog" title="Add new pop-up advertisement">

	<p id="popupad_popupads_tips">The source field is required.</p>

	<fieldset>
		<table>
			<tr>
				<td style="width:100%;ppopupading:0;">
					<label for="popupads_label">Advertisement label:</label>
					<input id="popupads_label" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
			<tr>
				<td style="width:100%;ppopupading:0;">
					<label for="popupads_source">Image source (jpg, jpeg, png):</label>
					<input id="popupads_source" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
					<button id="popupads_source_button" style="cursor:pointer;position:relative;">Add from media library</button>
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:0px;position:relative;top:4px;"
					title="This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).">
				</td>
			</tr>
		</table>
		
		<br>
		<div id="popupads_link_type">
			<label for="popupads_url">URL:</label>
			<input type="text" id="popupads_url" class="text ui-widget-content ui-corner-all">
			<label for="popupads_target">Target:</label>
			<select id="popupads_target" class="ui-corner-all">
				<option value="_blank">_blank</option>
				<option value="_self">_self</option>
			</select>
		</div>
		
		<br>
		<table>
			<tr>
				<td style="width:340px;ppopupading:0;">
					<label for="popupads_start_time">Start time:</label>
					<input type="text" id="popupads_start_time" style="width:180px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The time at which the advertisement will show, the format is hours:minutes:seconds, for example 01:20:20."/>
				</td>
				<td style="width:340px;ppopupading:0px;padding-left:20px">
					<label for="popupads_stop_time">Stop time:</label>
					<input type="text" id="popupads_stop_time" style="width:177px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The time at which the advertisement will hide, the format is hours:minutes:seconds, for example 01:20:20."/>
				</td>
		</table>
		
  	</fieldset>
	
</div>

<div id="edit-popupad-dialog" title="Edit pop-up advertisement">

	<p id="edit_popupads_tips">The source field is required.</p>

	<fieldset>
		<table>
			<tr>
				<td style="width:100%;pediting:0;">
					<label for="popupads_label_edit">Advertisement label:</label>
					<input id="popupads_label_edit" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
				</td>
			</tr>
			<tr>
				<td style="width:100%;pediting:0;">
					<label for="popupads_source_edit">Image source (jpg, jpeg, png):</label>
					<input id="popupads_source_edit" type="text" style="width:550px" class="text ui-widget-content ui-corner-all">
					<button id="popupads_source_button_edit" style="cursor:pointer;position:relative;">Add from media library</button>
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:0px;position:relative;top:4px;"
					title="This feature support mp4 video files from the media library or external path, youtube videos or images (jpg, jpeg, png).">
				</td>
			</tr>
		</table>
		<br>
		<div id="popupads_link_type">
			<label for="popupads_url_edit">URL:</label>
			<input type="text" id="popupads_url_edit" class="text ui-widget-content ui-corner-all">
			
			<label for="popupads_target_edit">Target:</label>
			<select id="popupads_target_edit" class="ui-corner-all">
				<option value="_blank">_blank</option>
				<option value="_self">_self</option>
			</select>
		</div>
		<br>
		<table>
			<tr>
				<td style="width:340px;ppopupading:0;">
					<label for="popupads_start_time_edit">Start time:</label>
					<input type="text" id="popupads_start_time_edit" style="width:180px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The time at which the advertisement will show, the format is hours:minutes:seconds, for example 01:20:20."/>
				</td>
				<td style="width:340px;ppopupading:0px;padding-left:20px">
					<label for="popupads_stop_time_edit">Stop time:</label>
					<input type="text" id="popupads_stop_time_edit" style="width:177px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The time at which the advertisement will hide, the format is hours:minutes:seconds, for example 01:20:20."/>
				</td>
		</table>
  	</fieldset>
</div>


<div id="add-subtitle-dialog" title="Add new subtitle">

	<p id="add-subtitle-tips" style="width:80%;">The label field is required.</p>

	<fieldset>
	
		<table>
			<tr >
				<td style="width:250px;padding:0;">
					<label for="subtitle_label">Subtitle label:</label>
					<input id="subtitle_label" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The subtitle label that will appear in the subtitle quality selector like: 720p, 1080p or whatever label you like. If you are using just a single subtitle source this will not be displayed.">
				</td>
			</tr>
			
			<tr>
				<td style="width:500px;padding:0;padding-top:10px;">
					<label for="subtitle_source">Subtitle source:</label>
					<input id="subtitle_source" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The subtitle .txt or .srt path.">
					<button id="uploads_subtitle_button" style="cursor:pointer;position:relative;top:4px;">Add from media library</button>
				</td>
			</tr>
			
			<tr>
				
			</tr>
		</table>
		
	</fieldset>
</div>

<div id="edit-subtitle-dialog" title="Edit subtitle">

	<p id="edit-subtitle-tips_edit" style="width:80%;">The label field is required.</p>

	<fieldset>
	
		<table>
			<tr >
				<td style="width:250px;pediting:0;">
					<label for="subtitle_label_edit">Subtitle label:</label>
					<input id="subtitle_label_edit" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The subtitle label that will appear in the subtitle quality selector like: 720p, 1080p or whatever label you like. If you are using just a single subtitle source this will not be displayed.">
				</td>
			</tr>
			
			<tr>
				<td style="width:500px;pediting:0;pediting-top:10px;">
					<label for="subtitle_source_edit">Subtitle source:</label>
					<input id="subtitle_source_edit" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The subtitle .txt or .srt path.">
					<button id="uploads_subtitle_button_edit" style="cursor:pointer;position:relative;top:4px;">Add from media library</button>
				</td>
			</tr>
			
			<tr>
				
			</tr>
		</table>
		
	</fieldset>
</div>

<div id="delete-subtitle-dialog" title="Delete subtitle">
	<fieldset>
    	<label>Are you sure you want to delete this subtitle?</label>
  	</fieldset>

</div>

<div id="delete-popupad-dialog" title="Delete pop-up advertisement">
	<fieldset>
    	<label>Are you sure you want to delete this pop-up advertisement?</label>
  	</fieldset>
</div>

<div id="add-video-final-dialog" title="Add new video">

	<p id="add-video-tips">The label field is required.</p>

	<fieldset>	
			<label for="is360">Is 360 degree / VR:</label>
			<select id="is360" class="ui-corner-all">
				<option value="no">no</option>
				<option value="yes">yes</option>
			</select>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
			title="If 360 degree / VR video is used set this option to yes otherwise set it to no.">
		
			<label style="margin-left:20px;" for="fwd_evpencript">Encrypt:</label>
			<select id="fwd_evpencript" class="ui-corner-all">
				<option value="yes">yes</option>
				<option value="no">no</option>
			</select>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:5px;"
			title="Set this feature to yes if you wish to encrypt the video paths this way it will not be possible to see / steal the videos location by viewing the page source.">
			
			<table style="margin-top:10px;">
			<tr>
				<td style="width:250px;padding:0;">
					<label for="video_label">Video label:</label>
					<input id="video_label" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The video label that will appear in the video quality selector like: 720p, 1080p or whatever label you like. If you are using just a single video source this will not be displayed.">
				</td>
			</tr>
			
			<tr>
				<td style="width:500px;padding:0;padding-top:10px;">
					<label for="video_source">Video source:</label>
					<input id="video_source" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The video mp4 path, Vimeo video URL, Youtube video URL, mp3 path, hls/m3u8 URL ....">
					<button id="uploads_video_button" style="cursor:pointer;position:relative;top:4px;">Add from media library</button>
					
				</td>
			</tr>
			<tr>
				
			</tr>
		</table>
		
	</fieldset>
</div>

<div id="edit-video-final-dialog" title="Edit video">

	<p id="video-tips-edit">The label field is required.</p>

	<fieldset>
	
		
		<label for="is360_edit">Is 360 degree / VR:</label>
		<select id="is360_edit" class="ui-corner-all">
			<option value="no">no</option>
			<option value="yes">yes</option>
		</select>
		<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
		title="If 360 degree / VR video is used set this option to yes otherwise set it to no.">
	
		<label style="margin-left:20px;" for="fwd_evpencript_edit">Encrypt:</label>
		<select id="fwd_evpencript_edit" class="ui-corner-all">
			<option value="yes">yes</option>
			<option value="no">no</option>
		</select>
		<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:5px;"
		title="Set this feature to yes if you wish to encrypt the video paths this way it will not be possible to see / steal the videos location by viewing the page source.">
		
		<table>	
			<tr >
				<td style="width:250px;padding:0;">
					<label for="video_label_edit">Video label:</label>
					<input id="video_label_edit" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The video label that will appear in the video quality selector like: 720p, 1080p or whatever label you like. If you are using just a single video source this will not be displayed.">
				</td>
			</tr>
			
			<tr>
				<td style="width:500px;padding:0;padding-top:10px;">
					<label for="video_source_edit">Video source:</label>
					<input id="video_source_edit" type="text" style="width:470px" class="text ui-widget-content ui-corner-all">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:3px;"
					title="The video mp4 path, Vimeo video URL, Youtube video URL, mp3 path, hls/m3u8 URL ....">
					<button id="uploads_video_button_edit" style="cursor:pointer;position:relative;top:4px;">Add from media library</button>
				</td>
			</tr>
			<tr>
			</tr>
		</table>
		
	</fieldset>
</div>

<div id="delete-video-final-dialog" title="Delete video">
	<fieldset>
    	<label>Are you sure you want to delete this video?</label>
  	</fieldset>

</div>

<div id="add-ad-dialog" title="Add new ad">

	<p id="add_pr_tips">The name field is required.</p>


	<fieldset>

    	<label for="pr_name">Name:</label>
    	<input type="text" id="pr_name" class="text ui-widget-content ui-corner-all">
		<br>
		<table>
			<tr>
				<td style="width:500px;padding:0;">
					<label for="image_source">Image source:</label>
					<input id="image_source" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">
					<button id="uploads_source_button" style="cursor:pointer;position:relative;top:-4px;">Add image</button>
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:8px;position:relative;top:1px;"
					title="The image path of the popup image that will appear over the video.">
				</td>

				<td>
					<img src="" id="thumb_source" style="width:50px;height:50px;margin-left:20px; margin-top:15px;">
				</td>
			</tr>
		</table>
		
		<br>
		<div id="link_type">
			<label for="ads_url">URL:</label>
			<input type="text" id="ads_url" style="width:395px;margin-right:20px;" class="text ui-widget-content ui-corner-all">
			
			<label for="ads_target">Target:</label>
			<select id="ads_target" class="ui-corner-all">
				<option value="_blank">_blank</option>
				<option value="_self">_self</option>
			</select>
		</div>
		<br>
		<table>
			<tr>
				<td style="width:300px;padding:0;">
					<label for="start_time">Start time:</label>
					<input type="text" id="start_time" class="text ui-widget-content ui-corner-all">
				</td>
				<td style="padding-right:20px;">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="float:left;vertical-align:middle;"
					title="The start time of for when the popup image will show, the format is hours:minutes:seconds, for example 01:20:20.">
				</td>

				
				<td style="width:300px;padding:0px;">
					<label for="stop_time">Stop time:</label>
					<input type="text" id="stop_time" class="text ui-widget-content ui-corner-all">
				</td>
				<td style="padding-right:10px;">
					<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="vertical-align:middle;"
					title="The stop time of for when the popup image will hide, the format is hours:minutes:seconds, for example 01:22:10.">
				</td>

			</tr>
		</table>
		
  	</fieldset>
	
</div>

<div id="delete-ad-dialog" title="Delete ad">

	<fieldset>

    	<label>Are you sure you want to delete this ad?</label>

  	</fieldset>

</div>

<div id="delete-cuepoint-dialog" title="Delete cuepoint">
	<fieldset>
    	<label>Are you sure you want to delete this cuepoint?</label>
  	</fieldset>
</div>



<div id="add-main-playlist-dialog" title="Add new main playlist">

	<p id="add_mp_tips">The name field is required.</p>

	

	<fieldset>

    	<label for="mp_name">Name:</label>

    	<input type="text" id="mp_name" class="text ui-widget-content ui-corner-all">

  	</fieldset>

</div>

<div id="edit-main-playlist-dialog" title="Edit main playlist">

	<p id="edit_mp_tips">The name field is required.</p>

	

	<fieldset>

    	<label for="mp_name_edit">Name:</label>

    	<input type="text" id="mp_name_edit" class="text ui-widget-content ui-corner-all">

  	</fieldset>

</div>

<div id="delete-main-playlist-dialog" title="Delete main playlist">

	<fieldset>

    	<label>Are you sure you want to delete this main playlist?</label>

  	</fieldset>

</div>

<div id="add-playlist-dialog" title="Add new playlist">

	<p id="add_pl_tips">The playlist name and thumbnail path fields are required.</p>

	

	<fieldset>

    	<label for="pl_name">Playlist name:</label>

		<br>

    	<input type="text" id="pl_name" style="width:500px" class="text ui-widget-content ui-corner-all">

		

		<br>

		<label for="pl_type">Playlist type:</label>

    	<select id="pl_type" class="ui-corner-all">

			<option value="normal">normal</option>

			<option value="youtube">youtube</option>

			<option value="folder">folder</option>
			
			<option value="xml">xml</option>

		</select>


		<br><br>

		<div id="pl_source_div">

			<label for="pl_source">Playlist source:</label>

			<br>

			<input type="text" id="pl_source" style="width:500px" class="text ui-widget-content ui-corner-all">

			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> id="source_help_img" style="vertical-align:middle;margin-left:8px;"

				title="Source help.">

		</div>

		

		<br>

    	<div id="uploads_pl_thumb_div">

    		<label for="pl_thumb">Playlist thumbnail path (enter a URL or upload an image):</label>



    		<table style="border-spacing:0;">

    			<tr>

		    		<td style="width:500px;padding:0;">

		    			<input id="pl_thumb" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">

		    		 	<button id="uploads_pl_thumb_button" style="cursor:pointer;position:relative;top:-4px;">Add Image</button>

		    		</td>

		    		<td>

		    			<img src="" id="uploads_pl_thumb" style="width:50px;height:50px;margin-left:20px;">

		    		</td>

		    	</tr>

		    </table>

		</div>

		

		<br><br>

		<div id="pl_text_div">

			<label>Playlist text:</label>

			<?php

				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);

				wp_editor("", "pltext", $settings);

			?>

		</div>

		

  	</fieldset>

</div>

<div id="edit-playlist-dialog" title="Edit playlist">

	<p id="edit_pl_tips">The playlist name and thumbnail path fields are required.</p>

	

	<fieldset>

    	<label for="pl_name_edit">Playlist name:</label>

		<br>

    	<input type="text" id="pl_name_edit" style="width:500px" class="text ui-widget-content ui-corner-all">

		

		<br>

		<label for="pl_type_edit">Playlist type:</label>

    	<select id="pl_type_edit" class="ui-corner-all">

			<option value="normal">normal</option>

			<option value="youtube">youtube</option>

			<option value="folder">folder</option>
			
			<option value="xml">xml</option>

		</select>

		

		<br><br>

		<div id="pl_source_div_edit">

			<label for="pl_source_edit">Playlist source:</label>

			<br>

			<input type="text" id="pl_source_edit" style="width:500px" class="text ui-widget-content ui-corner-all">

			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> id="source_help_img_edit" style="vertical-align:middle;margin-left:8px;"

				title="Source help.">

		</div>

		

		<br>

    	<div id="uploads_pl_thumb_div_edit">

    		<label for="pl_thumb_edit">Playlist thumbnail path (enter a URL or upload an image):</label>



    		<table style="border-spacing:0;">

    			<tr>

		    		<td style="width:500px;padding:0;">

		    			<input id="pl_thumb_edit" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">

		    		 	<button id="uploads_pl_thumb_button_edit" style="cursor:pointer;position:relative;top:-4px;">Add Image</button>

		    		</td>

		    		<td>

		    			<img src="" id="uploads_pl_thumb_edit" style="width:50px;height:50px;margin-left:20px;">

		    		</td>

		    	</tr>

		    </table>

		</div>

		

		<br><br>

		<div id="pl_text_div_edit">

			<label>Playlist text:</label>

			<?php

				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);

				wp_editor("", "pltextedit", $settings);

			?>

		</div>

		

  	</fieldset>

</div>

<div id="delete-playlist-dialog" title="Delete playlist">

	<fieldset>

    	<label>Are you sure you want to delete this playlist?</label>

  	</fieldset>

</div>

<div id="add-video-dialog" title="Add new video">

	<p id="add_vid_tips">The video name, source and thumbnail path fields are required.</p>

	<fieldset>

    	<label for="vid_name">Video name:</label>

    	<br>

    	<input type="text" id="vid_name" style="width:500px" class="text ui-widget-content ui-corner-all">

		<br>

    	<div id="uploads_thumb_div">

    		<label for="vid_thumb">Video thumbnail path (enter a URL or upload an image):</label>

    		<table style="border-spacing:0;">

    			<tr>

		    		<td style="width:500px;padding:0;">

		    			<input id="vid_thumb" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">

		    		 	<button id="uploads_thumb_button" style="cursor:pointer;position:relative;top:-4px;">Add Image</button>

		    		</td>

		    		<td>

		    			<img src="" id="uploads_thumb" style="width:50px;height:50px;margin-left:20px;">

		    		</td>

		    	</tr>

		    </table>

		</div>

		<br>

    	<div id="uploads_poster_div">
    		<label for="vid_poster">Video poster path (enter a URL or upload an image):</label>
    		<table style="border-spacing:0;">
    			<tr>
		    		<td style="width:500px;padding:0;">
		    			<input id="vid_poster" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">
		    		 	<button id="uploads_poster_button" style="cursor:pointer;position:relative;top:-4px;">Add Image</button>
		    		</td>

		    		<td>
		    			<img src="" id="uploads_poster" style="width:50px;height:50px;margin-left:20px;">
		    		</td>
		    	</tr>
		    </table>
		</div>
		
		<div id="private_video_div">
			<label style="margin-left:5px;" for="is_private">Is private:</label>
			<select id="is_private" class="ui-corner-all">
				<option value="yes">yes</option>
				<option value="no">no</option>
			</select>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="Set this to yes if you want a private video, this way a user will be required to enter a password to view the video.">
			
			
			<label style="margin-left:12px;" for="start_at_time">Start at time:</label>
			<input type="text" id="start_at_time" maxlength="8" style="width:110px" class="text ui-widget-content ui-corner-all fwdevpInputFleds">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="Start playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don't need this feature leave this blank.">
		
			<label style="margin-left:12px;" for="stop_at_time">Stop at time:</label>
			<input type="text" id="stop_at_time" maxlength="8" style="width:110px" class="text ui-widget-content ui-corner-all fwdevpInputFleds">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:9px;position:relative;top:4px;"
			title="Stop playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don't need this feature leave this blank.">
			
			<label style="margin-left:5px;" for="password">Video password:</label>
			<input id="password" type="text" style="width:464px;" class="text ui-widget-content ui-corner-all">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="A unique password for this video can be set here, if left blank the global password will be used that is set in the general settings under the used preset.">
		</div>
		<br>
    	<div id="uploads_video_div">
			<label for="add_video_button">Video:</label>
			<div id="main_vids" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;">
			</div>
			<button id="add_video_button" style="cursor:pointer;">Add video</button>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="If multiple videos are added check the select box of the video that you want to load first...">
		</div>

		<br>
		
		<div id="uploads_subtitle_div">
			<label for="add_subtitle_button">Subtitle:</label>
			<div id="main_subtitles" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="add_subtitle_button" style="cursor:pointer;">Add subtitle</button>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="If multiple subtitles are added check the select box of the subtitle that you want to load first...">
		</div>
		
		<br>
		<div>
			<label for="add_ads_button">Advertisement pre-roll,mid-roll,post-roll:</label>
			<div id="main_ads" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="add_ads_button" style="cursor:pointer;">Add advertisement</button>
		</div>

		<br>
		<div>
			<label for="add_popupad_button">Pop-up image advertisement:</label>
			<div id="main_popupads" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="add_popupad_button" style="cursor:pointer;">Add advertisement</button>
		</div>
		
		<br>
		<div>
			<label for="add_cuepoint_button">Cuepoints:</label>
			<div id="main_cuepoints" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="add_cuepoint_button" style="cursor:pointer;">Add cuepoint</button>
		</div>
		
		<br>
		<div id="">
    		<label for="popw_label">Advertisement on pauuse:</label>	
		    <input id="popw_label" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="Add here the URL / page source of the webpage to be displayed in the advertisement on pause window (ex:http://www.webdesign-flash.ro/iframe.html), if you don't want this window to appear when the video is paused leave this input blank.">
		    	
		</div>

		<label for="vid_dl">Downloadable:</label>

		<select id="vid_dl" class="ui-corner-all">

			<option value="yes">yes</option>

			<option value="no">no</option>

		</select>
		<br><br><br>
		<div id="vid_short_descr_div">

			<label>Video short description:</label>

			<?php

				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);

				wp_editor("", "vidshortdescr", $settings);

			?>

		</div>
		
		<br><br>

		<div id="vid_long_descr_div">

			<label>Video long description:</label>

			<?php

				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);

				wp_editor("", "vidlongdescr", $settings);

			?>

		</div>

		


  	</fieldset>

</div>

<div id="edit-video-dialog" title="Edit video">

	<p id="edit_vid_tips">The video name, source and thumbnail path fields are required.</p>

	
	<fieldset>

    	<label for="vid_name_edit">Video name:</label>

    	<br>

    	<input type="text" id="vid_name_edit" style="width:500px" class="text ui-widget-content ui-corner-all">


		<br>

    	<div id="uploads_thumb_div_edit">

    		<label for="vid_thumb_edit">Video thumbnail path (enter a URL or upload an image):</label>



    		<table style="border-spacing:0;">

    			<tr>

		    		<td style="width:500px;padding:0;">

		    			<input id="vid_thumb_edit" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">

		    		 	<button id="uploads_thumb_button_edit" style="cursor:pointer;position:relative;top:-4px;">Add Image</button>

		    		</td>

		    		<td>

		    			<img src="" id="uploads_thumb_edit" style="width:50px;height:50px;margin-left:20px;">

		    		</td>

		    	</tr>

		    </table>

		</div>

		

		<br>

    	<div id="uploads_poster_div_edit">

    		<label for="vid_poster_edit">Video poster path (enter a URL or upload an image):</label>



    		<table style="border-spacing:0;">

    			<tr>

		    		<td style="width:500px;padding:0;">

		    			<input id="vid_poster_edit" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">

		    		 	<button id="uploads_poster_button_edit" style="cursor:pointer;position:relative;top:-4px;">Add Image</button>

		    		</td>

		    		<td>

		    			<img src="" id="uploads_poster_edit" style="width:50px;height:50px;margin-left:20px;">

		    		</td>

		    	</tr>

		    </table>

		</div>
		<br>
		
		<div id="private_video_div_edit">
			<label style="margin-left:5px;" for="is_private_edit">Is private:</label>
			<select id="is_private_edit" class="ui-corner-all">
				<option value="yes">yes</option>
				<option value="no">no</option>
			</select>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="Set this to yes if you want a private video, this way a user will be required to enter a password to view the video.">
			
			
			<label style="margin-left:12px;" for="start_at_time_edit">Start at time:</label>
			<input type="text" id="start_at_time_edit" maxlength="8" style="width:110px" class="text ui-widget-content ui-corner-all fwdevpInputFleds">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="Start playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don't need this feature leave this blank.">
		
			<label style="margin-left:12px;" for="stop_at_time_edit">Stop at time:</label>
			<input type="text" id="stop_at_time_edit" maxlength="8" style="width:110px" class="text ui-widget-content ui-corner-all fwdevpInputFleds">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:9px;position:relative;top:4px;"
			title="Stop playing the video at a specified time in format hours:minutes:seconds, for example 00:01:10. If you don't need this feature leave this blank.">
			
			<label style="margin-left:5px;" for="password_edit">Video password:</label>
			<input id="password_edit" type="text" style="width:464px;" class="text ui-widget-content ui-corner-all">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="A unique password for this video can be set here, if left blank the global password will be used that is set in the general settings under the used preset.">
		</div>
		
    	<div id="uploads_video_div_edit">
			<label for="add_video_button_edit">Video source:</label>
			<div id="main_vids_edit" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="add_video_button_edit" style="cursor:pointer;">Add video</button>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="If multiple videos are added check the select box of the video that you want to load first...">
		</div>
		

		<br>
		
		<div id="uploads_subtitle_div_edit">
			<label for="add_subtitle_button_edit">Subtitle source:</label>
			<div id="main_subtitles_edit" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="subtitle_button_edit" style="cursor:pointer;">Add subtitle</button>
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="If multiple subtitles are added check the select box of the subtitle that you want to load first...">
		</div>

		<br>
		<div>
			<label for="add_ads_button_edit">Advertisement pre-roll,mid-roll,post-roll:</label>
			<div id="main_ads_edit" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="edit_ads_button" style="cursor:pointer;">Add advertisement</button>
		</div>
		<br>
		<div>
			<label for="edit_popupad_button">Pop-up image advertisement:</label>
			<div id="main_popupads_edit" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="edit_popupad_button" style="cursor:pointer;">Add advertisement</button>
		</div>
		<br>
		<div>
			<label for="edit_cuepoint_button">Cuepoints:</label>
			<div id="main_cuepoints_edit" style="border-style:dotted;border-width:1px;border-color:#999999;padding:2px 8px 2px;margin-bottom:10px;"></div>
			<button id="edit_cuepoint_button" style="cursor:pointer;">Add cuepoint</button>
		</div>
		<br>
		<div id="">
    		<label for="popw_label_edit">Advertisement on pauuse:</label>	
		    <input id="popw_label_edit" type="text" style="width:500px" class="text ui-widget-content ui-corner-all">
			<img src=<?php echo $this->_dir_url . "content/icons/help-icon.png" ?> style="margin-left:4px;position:relative;top:4px;"
			title="Add here the URL / page source of the webpage to be displayed in the advertisement on pause window (ex:http://www.webdesign-flash.ro/iframe.html), if you don't want this window to appear when the video is paused leave this input blank.">
		    	
		</div>
		

		<label for="vid_dl_edit">Downloadable:</label>

		<select id="vid_dl_edit" class="ui-corner-all">

			<option value="yes">yes</option>

			<option value="no">no</option>

		</select>

		<br><br><br>

		<div id="vid_short_descr_div_edit">

			<label>Video short description:</label>

			<?php

				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);

				wp_editor("", "vidshortdescredit", $settings);

			?>

		</div>

		

		<br><br>

		<div id="vid_long_descr_div_edit">

			<label>Video long description:</label>

			<?php

				$settings = array("media_buttons" => false, "wpautop" => false, "editor_class" => "fwd_editor_class", "teeny" => true);

				wp_editor("", "vidlongdescredit", $settings);

			?>

		</div>

  	</fieldset>

</div>

<div id="delete-video-dialog" title="Delete video">
	<fieldset>
    	<label>Are you sure you want to delete this video?</label>
  	</fieldset>
</div>

<div id="delete-ads-dialog" title="Delete advertisement">
	<fieldset>
    	<label>Are you sure you want to delete this advertisement?</label>
  	</fieldset>
</div>



<form action="" method="post" style="margin-top:20px;margin-right:20px;">

	<div style="height:500px;padding:20px;overflow:auto;" class="ui-widget ui-widget-content ui-corner-all">

		<h3>All main playlists:</h3>

	  	

		<div id="main_playlists" style="width:700px">

			<?php 

				$playlists_str = "";

				

				if (isset($this->_data->main_playlists_ar)){

					foreach ($this->_data->main_playlists_ar as $main_playlist){

			    		$mid = $main_playlist["id"];

			    		

			    		$playlists_str .= "<div id='mp" . $mid . "' class='main-playlist'>";

			    		

			    		$playlists_str .= "<h3 class='main-playlist-header'>" . $main_playlist["name"] . "<span style='float:right'>ID : " . $mid . "</span></h3>";

			    		

			    		$playlists_str .= "<div>";

			    		

			    		$playlists_str .= "<div id='mp" . $mid . "_pls' class='pls' style='width:658px'>";

			    		

			    		foreach ($main_playlist["playlists"] as $pid => $playlist){

							if ($playlist["type"] == "normal"){

								$playlists_str .= "<div id='mp" .$mid . "_pl" . $pid . "' class='playlist playlist-count'>";

		    				

								$playlists_str .= "<h3 class='playlist-header-sort playlist-header'><span style='margin-left:12px;'>" . $playlist["name"] . "</span></h3>";

								

								$playlists_str .= "<div>";

								

								$playlists_str .= "<div id='mp" . $mid . "_pl" . $pid . "_vids' class='vids' style='width:558px'>";

								

								foreach ($playlist["videos"] as $tid => $video){

									$playlists_str .= "<div id='mp" . $mid . "_pl" . $pid . "_vid" . $tid . "' class='fwd-video'>";

						
									$playlists_str .= "<h3 class='video-header'>" . $video["name"] . "</h3>";

									
									$playlists_str .= "<img src='" . $video['thumb'] . "' class='fwd-video-image-img' id='mp" . $mid . "_pl" . $pid . "_vid" . $tid . "_img'/>";

									$playlists_str .= "<button class='delete_video_btn' id='mp" . $mid . "_pl" . $pid . "_vid" . $tid . "_del_btn'>Delete</button>";

									

									$playlists_str .= "<button class='edit_video_btn' id='mp" . $mid . "_pl" . $pid . "_vid" . $tid . "_edit_btn'>Edit</button>";

									

									$playlists_str .= "</div>";

								}

								

								$playlists_str .= "</div>";

								

								$playlists_str .= "<button class='add_video_btn' id='mp" . $mid . "_pl" . $pid . "_add_btn' style='cursor:pointer;'>Add new video</button>";

								

								$playlists_str .= "<button class='edit_playlist_btn' id='mp" . $mid . "_pl" . $pid . "_edit_btn' style='cursor:pointer;'>Edit</button>";

							

								$playlists_str .= "<button class='delete_playlist_btn' id='mp" . $mid . "_pl" . $pid . "_del_btn' style='cursor:pointer;'>Delete</button>";

								

								$playlists_str .= "</div>";

								

								$playlists_str .= "</div>";

							}else{

								$playlists_str .= "<div id='mp" .$mid . "_pl" . $pid . "' class='fwd-playlist playlist-count'>";

		    				

								$imgPath = $this->_dir_url . "content/icons/";

								

								switch ($playlist["type"]){

									case "youtube":

										$imgPath .= "youtube-icon.png";

										break;

									case "folder":

										$imgPath .= "folder-icon.png";

										break;
									case "xml":

										$imgPath .= "xml-icon.png";

										break;

								}

								

								$img = "<img src='" . $imgPath . "' style='position:absolute;left:6px;top:6px;'>";

								

								$playlists_str .= $img;

							

								$playlists_str .= "<h3 class='playlist-header-sort pl-header'><span style='position:relative; margin-left:22px; top:-1px;'>" . $playlist["name"] . "</span></h3>";

								

								$playlists_str .= "<button class='edit_playlist_btn2' id='mp" . $mid . "_pl" . $pid . "_edit_btn' style='cursor:pointer;'>Edit</button>";

							

								$playlists_str .= "<button class='delete_playlist_btn2' id='mp" . $mid . "_pl" . $pid . "_del_btn' style='cursor:pointer;'>Delete</button>";

								

								$playlists_str .= "</div>";

							}

		    			}

			    		

			    		$playlists_str .= "</div>";

			    		

			    		$playlists_str .= "<button class='add_playlist_btn' id='mp" .$mid . "_add_btn' style='cursor:pointer;'>Add new playlist</button>";

			    		

			    		$playlists_str .= "<button class='edit_main_playlist_btn' id='mp" . $mid . "_edit_btn' style='cursor:pointer;'>Edit</button>";

			    		

			    		$playlists_str .= "<button class='delete_main_playlist_btn' id='mp" . $mid . "_del_btn' style='cursor:pointer;'>Delete</button>";

			    		

			    		$playlists_str .= "</div>";

			    		

			    		$playlists_str .= "</div>";

			    	}

			    	

			    	echo $playlists_str;

				}

			?>

		</div>

		

		<em id="mp_em" style="display:block;margin-bottom:8px;">No main playlists are available.</em>

		

		<button id="add_main_playlist_btn" style="cursor:pointer">Add new main playlist</button>

  	</div>

  	

  	<input type="hidden" id="playlist_data" name="playlist_data" value="">



	<input id="update_btn" type="submit" name="submit" style="cursor:pointer;margin-top:20px;" value="Update main playlists" />

	

	<?php wp_nonce_field("fwduvp_playlist_manager_update", "fwduvp_playlist_manager_nonce"); ?>

</form>



<?php echo $msg; ?>



