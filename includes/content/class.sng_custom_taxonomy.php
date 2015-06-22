<?php
/** 
 * Custom SnowGoer Taxonomy
 *
 * Description.
 *
 * @link  URL
 * @since x.x.x
 *
 * @package    {WordPress}
 * @subpackage {Component} 
 */

Class SNG_Custom_Taxonomy extends SNG_Custom_Content {

	/**
	 * @var array Post types to add taxonomy
	 */
	public $post_types = array();

	/**
	 * @var array Post types to hide taxonomy metabox
	 */
	public $hide_metabox_types = array();

	/**
	 * Registers the taxonomy.
	 *
	 * Takes no arguments because they are supplied into the constructor.
	 *
	 * Creates a filter named {$post_name}_post_types. This returns an array
	 * of post types.
	 */
	public function register() {
		register_taxonomy( $this->name, apply_filters( $this->name . '_post_types', array() ), $this->args );
	}

	public function post_init( ){
		/**
		 * Filter in which post types to run. Filter is created by the object
		 * for each post class
		 *
		 * @see post_types
		 */
		add_filter( $this->name . '_post_types', array( $this, 'add_post_types' ) );
	}

	/**
	 * Removes the taxonomy box from edit pages.
	 *
	 * Takes an array of post types that the box should be hidden on and queues them
	 * up to be removed.
	 *
	 * @see post_init
	 *
	 * @param $post_types array Array of post types to be removed from edit pages
	 */
	public function remove_from_edit_pages( $post_types ) {
		if ( is_array( $post_types ) ) {
			$this->hide_metabox_types = $post_types;
		} else {
			$this->hide_metabox_types[] = $post_types;
		}
		$this->remove_from_post_types();
	}

	/**
	 * Adds removal action to each post type in the hidden post types.
	 */
	protected function remove_from_post_types() {
		foreach ( $this->hide_metabox_types as $post_type ) {
			/**
			 * Adds action to remove metaboxes from certain post types.
			 *
			 * @see remove_from_edit_pages
			 */
			add_action( 'add_meta_boxes_' . $post_type, array( $this, 'remove_meta_boxes' ) );
		}
	}

	/**
	 * Removes a metabox from a post type page.
	 */
	public function remove_meta_boxes() {
		foreach ( $this->hide_metabox_types as $post_type ) {
			if ( $this->args['hierarchical'] === TRUE ) {
				remove_meta_box( $this->name . 'div', $post_type, 'side' );
			} else {
				remove_meta_box( 'tagsdiv-' . $this->name, $post_type, 'side' );
			}
		}
	}

	/**
	 * Determines what post types an object will use.
	 *
	 * @param $post_types array|string
	 */
	public function post_types( $post_types ) {
		if ( is_array( $post_types ) ) {
			$this->post_types = $post_types;
		} else {
			$this->post_types[] = $post_types;
		}
	}

	/**
	 * Adds data to the filter.
	 *
	 * @return array
	 */
	public function add_post_types() {

		return $this->post_types;
	}

}