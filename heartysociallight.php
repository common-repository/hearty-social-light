<?php

/**
*   Plugin Name: Hearty Social Light
*   Plugin URI: http://www.heartyplugins.com/hearty-social-light
*   Description: Hearty Social Light is a free responsive WordPress plugin that lets you choose up to 10 social media icons from Font Awesome and link each one to your social media accounts
*   Version: 1.1
*   Author: Hearty Plugins
*   Author URI: http://www.heartyplugins.com
*   License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
*/

// no direct access

if (!defined('ABSPATH')) { die; }

function heartysociallight_add_css() {

	//------

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');

	wp_register_style('heartysociallight-css', plugins_url('/theme/css/frontend.css', __FILE__));

	//------

	wp_enqueue_style('hrty-bootstrap-css');
	wp_enqueue_style('hrty-fontawesome-css');

  wp_enqueue_style('heartysociallight-css');

}

function heartysociallight_add_admin_css() {

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');
	wp_register_style('heartysociallight-admin-css', plugins_url('/theme/css/admin.css', __FILE__));

  wp_enqueue_style('hrty-bootstrap-css');
  wp_enqueue_style('hrty-fontawesome-css');
	wp_enqueue_style('heartysociallight-admin-css');

	// Add the color picker css file
  wp_enqueue_style( 'wp-color-picker' );

}

function heartysociallight_add_js() {

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');

}

function heartysociallight_add_admin_js() {

	wp_enqueue_media();

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));
	wp_register_script('heartycolorpicker-js', plugins_url('/theme/js/colorpicker.js', __FILE__), array('wp-color-picker'), false, true);
	wp_register_script('heartysociallight-admin-js', plugins_url('/theme/js/admin.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');
	wp_enqueue_script('heartycolorpicker-js');
	wp_enqueue_script('heartysociallight-admin-js');

}

function heartysociallight($atts) {

	require_once('inc/view.php');

	$atts = shortcode_atts(array('settings_instance' => 1), $atts, 'heartysociallight');
	$settings_instance = $atts['settings_instance'];
	$output = HeartySocialLightView::generate_view($settings_instance);

	return $output;

}

function heartysociallight_widget() {

	require_once('inc/widget.php');

	register_widget('HeartySocialLightWidget');

}

if (is_admin()) {

	require_once('inc/options.php');
	$heartysociallight_settings_page = new HeartySocialLightSettingsPage();

	if (isset($_GET['page']) && $_GET['page'] == 'heartysociallight-setting-admin') {

		add_action('admin_enqueue_scripts', 'heartysociallight_add_admin_css');
		add_action('admin_enqueue_scripts', 'heartysociallight_add_admin_js');

	} else {

		add_action('widgets_init', 'heartysociallight_widget');

	}

} else {

	add_action('wp_enqueue_scripts', 'heartysociallight_add_css');
	add_action('wp_enqueue_scripts', 'heartysociallight_add_js');

	add_action('widgets_init', 'heartysociallight_widget');
	add_shortcode('heartysociallight', 'heartysociallight');

}

