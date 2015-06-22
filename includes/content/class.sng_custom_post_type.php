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
		register_post_type( $this->name, $this->args );
		add_filter( 'sng_custom_post_types', array( $this, 'add_post_type_to_filter' ) );
	}

	public function add_post_type_to_filter( $post_types ) {
		$post_types[] = $this->name;

		return $post_types;
	}

	public function post_init( ){
		add_filter( 'single_template', array( $this, 'get_single_template' ) );
		add_filter( 'archive_template', array( $this, 'get_archive_template' ) );
		/* Adds custom post types to main query */
		add_action( 'pre_get_posts', array( $this, 'add_post_types_to_queries' ) );
	}

	/**
	 * Filters in the single template for a CPT
	 *
	 * @see post_init
	 *
	 * @param $single_template
	 *
	 * @return string
	 */
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

	/**
	 * Filters in the archive template for a CPT
	 *
	 * @see post_init
	 *
	 * @param $archive_template
	 *
	 * @return string
	 */
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

	/**
	 * Adds Custom Post Types to queries
	 *
	 * @param $query WP_Query
	 *
	 * @return mixed
	 */
	function add_post_types_to_queries( $query ) {
		if (
			( is_home() || is_category() || is_tag() || is_tax( ) || is_author() ) &&
		    empty( $query->query_vars['suppress_filters'] )
		) {
			$post_types = apply_filters( 'sng_custom_post_types', array( 'post' ) );
			$query->set( 'post_type', $post_types );
		}

		return $query;
	}

}