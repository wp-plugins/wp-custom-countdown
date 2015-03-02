<?php
/*
Plugin Name: Wp Custom Countdown
Plugin URI: http://plugins.bishawjit.me/wp-custom-countdown/
Description: Adds nice and clean circular countdown in your site. Fully customizable with options panel. Let's Enjoy!
Version: 1.1
Author: Bishawjit Das
Author URI: http://plugins.bishawjit.me/
License: GPLv2 or later
Text Domain: wcc
*/

// Adding Plugin's file
function wcc_required_files() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('wcc_primary_js', plugins_url('js/jquery.knob.js', __FILE__), array('jquery'), false);
    wp_enqueue_script('wcc_secondary_js', plugins_url('js/jquery.throttle.js', __FILE__), array('jquery'), false);
    wp_enqueue_script('wcc_plugin_js', plugins_url('js/jquery.classycountdown.min.js', __FILE__), array('jquery'), false);
    wp_enqueue_style('wcc_main_style', plugins_url('css/classycountdown.min.css', __FILE__), false);
}
add_action('wp_enqueue_scripts', 'wcc_required_files');

// Adding custom tinyMCE styles
function wcc_tinyMCE_custom_css() {
	wp_enqueue_style( 'wcc_tinymce_css', plugins_url( 'css/wcc_tinymce_style.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'wcc_tinyMCE_custom_css' );


// Adding required files
require_once( 'wcc-shortcode.php' );