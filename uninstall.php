<?php
/**
 * Quick Analytics Uninstall
 *
 * Uninstalling Quick Analytics deletes options.
 *
 * @package Quick Analytics
 * @version 1.0.0
 */
 
// If plugin is not being uninstalled, exit (do nothing)
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Do something here if plugin is being uninstalled.
wp_trash_post( get_option( 'quick_analytics' ) );
