<style>
    div .fwd-meta-box { font-size: 10px !important; }
    table .fwd-meta-box { border-spacing:0 !important; }
    tr .fwd-meta-box { height:30px !important;}
    td .fwd-meta-box { padding:0 !important; width:100px !important; }
</style>

<script>
	var fwduvpPresetsObj = <?php echo json_encode($presetsNames); ?>;
	var fwduvpMainPlaylistsObj = <?php echo json_encode($mainPlaylistsNames); ?>;
</script>

<div class="fwd-meta-box ui-widget">
	<table>
    	<tr>
			<td>
				<label for="fwduvp_presets_list">Select preset:</label>
			</td>
			<td>
				<select id="fwduvp_presets_list" class="ui-widget ui-corner-all" style="max-width:160px;"></select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fwduvp_main_playlists_list">Select playlist:</label>
			</td>
			<td>
				<select id="fwduvp_main_playlists_list" class="ui-widget ui-corner-all" style="max-width:160px;"></select>
			</td>
		</tr>
	</table>
	<input type="text" id="fwduvp_shortocde" class="text ui-widget-content ui-corner-all" style="width:100%;">	<p></p>	
	<button id="fwduvp_shortcode_btn" style="cursor:pointer">Add shortcode</button>
	
	<div id="fwduvp_div" class="fwd-updated" style="background-color:#F2F2F2;"><p id="fwduvp_msg" style="padding:8px;font-size:11px;"></p></div>
</div>
