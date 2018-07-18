<?php
/**
 * Template name: Import Users
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 1.0
 */
 
get_header();

$path  = plugin_dir_path( __FILE__); 

require $path . "/import/library/csv.fn.php";

 //..directory within your plugin 
 $path .= 'import/test/';                


if ($handle = opendir($path)) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
            
            csvToArray($path.$entry);
            
        }
    }

    closedir($handle);
}

?>