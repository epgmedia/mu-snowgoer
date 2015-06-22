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
	require 'includes/custom_post_types.php';
	require 'includes/custom_taxonomies.php';
	require 'includes/custom_fields.php';
	/** Partials */
	include 'partials/list-story-list.php';

	/**
	 * Dynamically adds list to content. Don't need a custom post type to add
	 * list stories, since it can be managed with a checkbox and custom fields.
	 *
	 * @param $content string
	 *
	 * @return string
	 */
	function sng_add_lists_to_posts( $content ) {
		if ( get_field( 'list_post' ) !== FALSE ) {
			$content .= sng_get_list_content();
		}

		return $content;
	}
	add_filter( 'the_content', 'sng_add_lists_to_posts' );

	/* The Styles */
	function sng_scripts() {
		wp_enqueue_style( 'sng-plugin-styles', plugins_url( '/assets/css/all.min.css', __FILE__ ) );
		wp_enqueue_script( 'google-map-api-v3', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '', false );
		wp_enqueue_script( 'sng-plugin-scripts', plugins_url( '/assets/js/all.min.js', __FILE__ ), array('jquery', 'google-map-api-v3'), '', false );

	}
	add_action( 'wp_enqueue_scripts', 'sng_scripts' );
}