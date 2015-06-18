<?php
/** 
 * Summary
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

	public $post_types = array();

	public function register() {
		$this->args['labels'] = $this->labels;
		register_taxonomy( $this->name, apply_filters( $this->name . '_post_types', array() ), $this->args );
	}

}