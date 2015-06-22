<?php
/** 
 * Custom Post Types for SnowGoer
 *
 * Contains the logic to queue up custom post types. Makes it a little
 * easier to read the plugin.php file.
 *
 * Each new CPT is added to the variable {$sng_cpts} so that they can
 * be referenced later by their slug.
 *
 * @since 0.1.0
 *
 * @package WordPress
 */

// Sleds CPT
$sng_cpts['snowmobiles'] = new SNG_Custom_Post_Type(
	'snowmobiles',
	array(
		'label'               => 'snowmobiles',
		'description'         => 'Snowmobile database',
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions' ),
		'taxonomies'          => array( 'category', 'post_tag', 'brands', 'sled-class' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-aside',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'labels'              => array(),
	),
	array(
		'name'                => 'Snowmobiles',
		'singular_name'       => 'Snowmobile',
		'menu_name'           => 'Sleds',
		'name_admin_bar'      => 'Sleds',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Snowmobiles',
		'add_new_item'        => 'Add New Snowmobile',
		'add_new'             => 'Add New',
		'new_item'            => 'New Snowmobile',
		'edit_item'           => 'Edit Snowmobile',
		'update_item'         => 'Update Snowmobile',
		'view_item'           => 'View Snowmobile',
		'search_items'        => 'Search Snowmobiles',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	)
);

// Tour CPT
$sng_cpts['gear'] = new SNG_Custom_Post_Type(
	'gear',
	array(
		'label'               => 'gear',
		'description'         => 'Gear',
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-image',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	),
	array(
		'name'                => 'Gear',
		'singular_name'       => 'Gear',
		'menu_name'           => 'Gear',
		'name_admin_bar'      => 'Gear',
		'parent_item_colon'   => 'Parent Gear:',
		'all_items'           => 'All Gear',
		'add_new_item'        => 'Add New Gear',
		'add_new'             => 'Add New',
		'new_item'            => 'New Gear',
		'edit_item'           => 'Edit Gear',
		'update_item'         => 'Update Gear',
		'view_item'           => 'View Gear',
		'search_items'        => 'Search Gear',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	)
);

// Races CPT
$sng_cpts['races'] = new SNG_Custom_Post_Type(
	'races',
	array(
		'label'               => 'races',
		'description'         => 'Racing and results',
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-flag',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	),
	array(
		'name'                => 'Races',
		'singular_name'       => 'Race',
		'menu_name'           => 'Races',
		'name_admin_bar'      => 'Races',
		'parent_item_colon'   => 'Parent Race:',
		'all_items'           => 'All Races',
		'add_new_item'        => 'Add New Race',
		'add_new'             => 'Add New',
		'new_item'            => 'New Race',
		'edit_item'           => 'Edit Race',
		'update_item'         => 'Update Race',
		'view_item'           => 'View Race',
		'search_items'        => 'Search Races',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	)
);

// Tour CPT
$sng_cpts['tours'] = new SNG_Custom_Post_Type(
	'tours',
	array(
		'label'               => 'tours',
		'description'         => 'Tour Stories',
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-location-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	),
	array(
		'name'                => 'Tours',
		'singular_name'       => 'Tour',
		'menu_name'           => 'Tours',
		'name_admin_bar'      => 'Tours',
		'parent_item_colon'   => 'Parent Tour:',
		'all_items'           => 'All Tours',
		'add_new_item'        => 'Add New Tour',
		'add_new'             => 'Add New',
		'new_item'            => 'New Tour',
		'edit_item'           => 'Edit Tour',
		'update_item'         => 'Update Tour',
		'view_item'           => 'View Tour',
		'search_items'        => 'Search Tours',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	)
);
