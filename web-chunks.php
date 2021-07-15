<?php
/*
Plugin Name: Chunks
Version: 1.1
Plugin URI: https://www.hjemmesider.dk
Description: Indhold der vises på sider via shortcodes. ACF Pro er påkrævet! - [chunks type=TYPER] - [chunks grid=gd-3 gap=gap-2] - [chunks class=custom_class] - [chunk display=banner,fader,parallax] - [chunk-id postid=1,2,3] - [chunk wrap=wrap]
Author: Morten Andersen
Author URI: https://www.hjemmesider.dk.dk
*/

if( class_exists('ACF') ) {
/* -------------------------------------- */
require_once ('acf/acf.php');
require_once ('functions/posttype.php');
require_once ('shortcode/shortcode.php');
require_once ('functions/functions.php');
require_once ('functions/taxonomy.php');
/* -------------------------------------- */
}