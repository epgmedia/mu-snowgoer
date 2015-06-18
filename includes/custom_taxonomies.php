<?php
/** 
 * SnowGoer's Custom Taxonomies
 *
 * Contains the logic for filtering and displaying taxonomies. Some of
 * the taxonomies are hidden on certain pages and at certain times, so
 * there are additional functions to hide them where managed by ACF.
 *
 * @since 0.1.0
 *
 * @package WordPress
 */

/*
 * Brands Taxonomy
 */
$sng_custom_tax['brands'] = new SNG_Custom_Taxonomy(
	'brands',
	array(
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	),
	array(
		'name'                       => 'Brands',
		'singular_name'              => 'Brand',
		'menu_name'                  => 'Brands',
		'all_items'                  => 'All Brands',
		'parent_item'                => 'Parent Brand',
		'parent_item_colon'          => 'Parent Brand:',
		'new_item_name'              => 'New Brand',
		'add_new_item'               => 'Add New Brand',
		'edit_item'                  => 'Edit Brand',
		'update_item'                => 'Update Brand',
		'view_item'                  => 'View Brand',
		'separate_items_with_commas' => 'Separate Brands with commas',
		'add_or_remove_items'        => 'Add or remove Brands',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Brands',
		'search_items'               => 'Search Brands',
		'not_found'                  => 'Not Found',
	)
);
/*
 * Filter in which post types to run. Filter is created by the object
 * for each post class
 */
add_filter( 'brands_post_types', 'brands_post_types' );
function brands_post_types( $post_types ) {

	return array( 'post', 'snowmobiles', 'list_story', 'races' );
}

/*
 * Sled Class Taxonomy
 */
$sng_custom_tax['sled-class'] = new SNG_Custom_Taxonomy(
	'sled-class',
	array(
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	),
	array(
		'name'                       => 'Sled Classes',
		'singular_name'              => 'Sled Class',
		'menu_name'                  => 'Sled Classes',
		'all_items'                  => 'All Sled Classes',
		'parent_item'                => 'Parent Sled Class',
		'parent_item_colon'          => 'Parent Sled Classes:',
		'new_item_name'              => 'New Sled Class',
		'add_new_item'               => 'Add New Sled Class',
		'edit_item'                  => 'Edit Sled Class',
		'update_item'                => 'Update Sled Class',
		'view_item'                  => 'View Sled Class',
		'separate_items_with_commas' => 'Separate Sled Classes with commas',
		'add_or_remove_items'        => 'Add or remove Sled Classes',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Sled Classes',
		'search_items'               => 'Search Sled Classes',
		'not_found'                  => 'Not Found',
	)
);
/*
 * Filter in which post types to run. Filter is created by the object
 * for each post class
 */
add_filter( 'sled-class_post_types', 'sled_class_post_types' );
function sled_class_post_types( $post_types ) {

	return array( 'snowmobiles' );
}

/*
 * Remove taxonomies from Snowmobiles Admin Page because they're being
 * handled by a custom meta box through Advanced Custom Fields
 */
function sng_remove_taxonomies_metaboxes() {
	remove_meta_box( 'sled-classdiv', 'snowmobiles', 'side' );
	remove_meta_box( 'tagsdiv-brands', 'snowmobiles', 'side' );
}
add_action( 'add_meta_boxes_snowmobiles' , 'sng_remove_taxonomies_metaboxes' );