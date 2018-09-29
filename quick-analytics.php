<?php
/**
 * Plugin Name: Quick Analytics
 * Plugin URI: http://thibaultcrouzet.com/
 * Description: A simple plugin that helps you to integrate quickly your analytics tracking IDs.
 * Version: 1.0.0
 * Author: Thibault Crouzet
 * Author URI: http://thibaultcrouzet.com
 * Text Domain: quick-analytics
 * Domain Path: /languages/
 *
 * @package Quick Analytics
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//Define QUICK_ANALYTICS_PLUGIN_VERSION.
if ( ! defined('QUICK_ANALYTICS_PLUGIN_VERSION' ) ) {
	define('QUICK_ANALYTICS_PLUGIN_VERSION', '1.1.1');
}

//Define QUICK_ANALYTICS_PLUGIN_URI.
if ( ! defined('QUICK_ANALYTICS_PLUGIN_URI' ) ) {
	define('QUICK_ANALYTICS_PLUGIN_URI', plugins_url( '' , __FILE__ ));
}

//Define QUICK_ANALYTICS_PLUGIN_BASENAME.
if ( ! defined('QUICK_ANALYTICS_PLUGIN_BASENAME' ) ) {
	define('QUICK_ANALYTICS_PLUGIN_BASENAME', plugins_url( __FILE__ ));
}

// Include the main Quick Analytics class.
if ( ! class_exists( 'quick-analytics' ) ) {
	include_once dirname( __FILE__ ).'/includes/admin/class-qa-admin.php';
	include_once dirname( __FILE__ ).'/includes/public/class-qa-public.php';
}

/**
 * Initiate plugin.
 *
 * @since 1.0.0
 */
function quick_analytics_initiate(){

	Quick_Analytics_Admin::get_instance();
	Quick_Analytics_Public::get_instance();

}

/**
 * Register text domain for localization.
 *
 * @since 1.0.0
 */
function quick_analytics_textdomain(){

  	load_plugin_textdomain( 'quick-analytics', false, basename( dirname( __FILE__ ) ).'/languages/' ); 

}

//Add Actions
add_action( 'plugins_loaded','quick_analytics_initiate' );
add_action( 'init','quick_analytics_textdomain' );
