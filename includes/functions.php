<?php
/** 
 * Various external functions
 *
 * @since 0.1.0
 *
 * @package WordPress
 */

/**
 * Dynamically adds list to content. Don't need a custom post type to add
 * list stories, since it can be managed with a checkbox and custom fields.
 *
 * Should be run through the_content filter to add to feeds.
 *
 * @see the_content
 * @since 0.1.0
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

/**
 * The Styles.
 *
 * Must enqueue maps to run with it, as well, as the min.js relies on
 * Maps to render correctly.
 *
 * @since 0.1.0
 *
 * @return void
 */
function sng_scripts() {
	global $sng_plugin_dir;

	wp_enqueue_style( 'sng-plugin-styles', plugins_url( '../assets/css/all.min.css', __FILE__ ) );
	wp_enqueue_script( 'google-map-api-v3', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '', false );
	wp_enqueue_script( 'sng-plugin-scripts', plugins_url( '../assets/js/all.min.js', __FILE__ ), array('jquery', 'google-map-api-v3'), '', false );
}