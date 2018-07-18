<?php
/*
Plugin Name: FWD Ultimate Video Player
Plugin URI: http://codecanyon.net/user/FWDesign/portfolio
Description: This is the Wordpress plugin with a CMS menu for the installation and configuration of the FWD Ultimate Video Player.
Author: FWD
Version: 5.1
Author URI: http://webdesign-flash.ro/
*/

require "update-checker/plugin-update-checker.php";
$fwduvpPUC = PucFactory::buildUpdateChecker(
	"http://webdesign-flash.ro/w/uvp/update/info.json",
	__FILE__,
	"fwduvp"
);

include_once "php/FWDUVP.php";
include_once "php/FWDUVPData.php";

function fwduvp_check_if_admin(){
	$roles = wp_get_current_user()->roles;
	$role = "administrator";
	 
	return in_array($role, $roles);
}

function fwduvp_admin_init(){
	if (fwduvp_check_if_admin()){
		$role = get_role("administrator");
		$role->add_cap(FWDUVP::CAPABILITY);
	}
}

function fwduvp_init_plugin(){	
	$uvp = new FWDUVP();
	$uvp->init();
}

add_action("init", "fwduvp_init_plugin");
add_action("admin_init", "fwduvp_admin_init");
add_filter("plugin_action_links_" . plugin_basename(__FILE__), array("FWDUVP", "set_action_links"));

?>