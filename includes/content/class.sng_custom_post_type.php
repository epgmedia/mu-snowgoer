<?php
/** 
 * Snow Goer Custom Post Type
 *
 * To make it easier to manage CPTs
 *
 * @since 0.1.0
 *
 * @package WordPress
 */

Class SNG_Custom_Post_Type extends SNG_Custom_Content {

	public function register() {
		$this->args['labels'] = $this->labels;
		register_post_type( $this->name, $this->args );
	}

	public function post_init( ){
		add_filter( 'single_template', array( $this, 'get_single_template' ) );
		add_filter( 'archive_template', array( $this, 'get_archive_template' ) );
	}

	public function get_single_template( $single_template ) {
		global $post;
		global $sng_plugin_dir;

		$theme_obj = wp_get_theme();

		if ( $post->post_type == $this->name && $theme_obj->name == 'Jarida'  ) {

			return $sng_plugin_dir . '/templates/single-template.php';
		} else {

			return $single_template;
		}

	}

	public function get_archive_template( $archive_template ) {
		global $post;
		global $sng_plugin_dir;

		$theme_obj = wp_get_theme();

		if ( is_post_type_archive ( $this->name ) && $theme_obj->name == 'Jarida' ) {

			return $sng_plugin_dir . '/templates/archive-template.php';
		} else {

			return $archive_template;
		}

	}

}