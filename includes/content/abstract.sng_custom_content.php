<?php
/** 
 * Summary
 *
 * Description.
 *
 * @since 0.1.0
 *
 * @package WordPress
 */

Abstract Class SNG_Custom_Content {

	public $name;

	public $labels;

	public $args;

	public function __construct( $name, $args, $labels ) {
		$this->name   = $name;
		$this->args   = $args;
		$this->labels = $labels;

		$this->pre_init();

		$this->init();

		$this->post_init();
	}

	abstract function register();

	public function pre_init() {}

	public function init() {
		add_action( 'init', array( $this, 'register' ), 0 );
	}

	public function post_init() {}

}