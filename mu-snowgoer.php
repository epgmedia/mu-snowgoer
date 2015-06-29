<?php
/** 
 * Plugin Name: SnowGoer Must-Use Plugin
 * Version: 0.1.0
 * Description: Contains functionality necessary for SnowGoer.com
 * Author: Chris W. Gerber
 * Author URI: http://www.chriswgerber.com/
 * Requires at least: 3.6
 * Tested up to: 4.2.1
 *
 * Text Domain:
 * Domain Path:
 *
 * Summary
 *
 * Description.
 *
 * @since 0.1.0
 *
 * @package WordPress
 * @author  Chris W. Gerber
 */

/*
 * Important Note:
 *
 * This plugin is reliant on features from the Jarida theme. If Jarida
 * is not active, the plugin will not run. Eventually, this will not be
 * a requirement as style and templating is decoupled from the theme, but
 * for now we need to do it this way.
 */

$sng_plugin_dir = dirname( __FILE__ );

if ( wp_get_theme() == 'Jarida' ) {
	/* Queueing up required Classes */
	require 'includes/content/abstract.sng_custom_content.php';
	require 'includes/content/class.sng_custom_post_type.php';
	require 'includes/content/class.sng_custom_taxonomy.php';
	/* Begin the Logic */
	require 'includes/functions.php';
	require 'includes/custom_post_types.php';
	require 'includes/custom_taxonomies.php';
	require 'includes/custom_fields.php';
	/** Partials */
	include 'partials/list-story-list.php';

	/* Add lists to end of posts */
	add_filter( 'the_content', 'sng_add_lists_to_posts' );

	/* Enqueue scripts and styles */
	add_action( 'wp_enqueue_scripts', 'sng_scripts' );
}