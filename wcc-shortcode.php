<?php 

function wcc_main_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'theme' => 'flat-colors',
		'now' => '', 
		'end' => 1,
		'bg' => '',
		'padding' => ''
	), $atts );
		
		static $count = 1;
		$h2s = $a['end'] * 3600000;
		$html = '<div id="wcc_wrapper'.$count.'" style="background-color:'.$a['bg'].';padding:'.$a['padding'].'px;margin-bottom:20px;"><div id="countdown';
		$html .= $count.'"></div></div><script>(function($){ var d = new Date(); var n = d.getTime(); if( n > '.$a['now'].'){ var end = '.$h2s.' - ( n - '.$a['now'].' ) } else { var end = '.$a['now'].';}  $("#countdown'.$count.'").ClassyCountdown({theme: "';
		$html .= $a['theme'].'", end: $.now() + (end/1000) });})(jQuery)</script>';
		$count++;
		return $html;
}
add_shortcode( 'wpc_countdown', 'wcc_main_shortcode' );


function wcc_add_tinymce() {
	global $typenow;

	// only on Post Type: post and page
	if( ! in_array( $typenow, array( 'post', 'page' ) ) ){
		return ;
		}
	add_filter( 'mce_external_plugins', 'wcc_tinymce_plugin' );
	add_filter( 'mce_buttons', 'wcc_add_tinymce_button' );
}
add_action( 'admin_head', 'wcc_add_tinymce' );


// inlcude the js for tinymce
function wcc_tinymce_plugin( $plugin_array ) {

	$plugin_array['wcc_button'] = plugins_url( '/js/wcc-mce-button.js', __FILE__ );
	return $plugin_array;
}

// Add the button key for address via JS
function wcc_add_tinymce_button( $buttons ) {

	array_push( $buttons, 'wcc_button_key' );
	return $buttons;
}