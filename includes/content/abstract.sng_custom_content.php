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

	/**
	 * Name of Custom Content Type
	 *
	 * @var string
	 */
	public $name;

	/**
	 * Labels used throughout WordPress
	 *
	 * @var array
	 */
	public $labels;

	/**
	 * Arguments for how content type should be displayed
	 *
	 * @var array
	 */
	public $args;

	/**
	 * PHP5 Constructor
	 *
	 * @param $name   string
	 * @param $args   array
	 * @param $labels array
	 */
	public function __construct( $name, $args, $labels ) {
		$this->name   = $name;
		$this->args   = $args;
		$this->labels = $labels;
		// Run a task before the action is initialized
		$this->pre_init();
		// Adds the action to initialize the post type
		$this->init();
		// Run a task after the position is initialized
		$this->post_init();
	}

	/**
	 * Action to be run on content type registration. Must
	 * be overridden by the subclass.
	 *
	 * @return mixed
	 */
	abstract function register();

	/**
	 * Set of actions to be run before registering the custom
	 * post type. Not 100% necessary.
	 *
	 * Best for setting up the information to be registered in the
	 * content type (taxonomy or post type)
	 */
	public function pre_init() {
		$this->args['labels'] = $this->labels;
	}

	/**
	 * Runs an action to register the custom post type.
	 */
	public function init() {
		add_action( 'init', array( $this, 'register' ), 0 );
	}

	/**
	 * Set of actions to be run after registering the custom post
	 * type. Not 100% necessary.
	 *
	 * Best use is for running actions and filters after the post
	 * type has been registered.
	 */
	public function post_init() {}

}