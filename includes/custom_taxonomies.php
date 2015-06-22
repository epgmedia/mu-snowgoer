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
$sng_custom_tax_brands = new SNG_Custom_Taxonomy(
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
$sng_custom_tax_brands->post_types( array( 'post', 'snowmobiles', 'races', 'gear' ) );
$sng_custom_tax_brands->remove_from_edit_pages( 'snowmobiles' );

/*
 * Sled Class Taxonomy
 */
$sng_custom_tax_sled_class = new SNG_Custom_Taxonomy(
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
$sng_custom_tax_sled_class->post_types( 'snowmobiles' );
$sng_custom_tax_sled_class->remove_from_edit_pages( 'snowmobiles' );

/*
 * Snowmobile Racing Types Taxonomy
 */
$sng_custom_tax_racing_type = new SNG_Custom_Taxonomy(
	'racing-type',
	array(
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	),
	array(
		'name'                       => 'Racing Types',
		'singular_name'              => 'Racing Type',
		'menu_name'                  => 'Racing Types',
		'all_items'                  => 'All Racing Types',
		'parent_item'                => 'Parent Racing Type',
		'parent_item_colon'          => 'Parent Racing Types:',
		'new_item_name'              => 'New Racing Type',
		'add_new_item'               => 'Add New Racing Type',
		'edit_item'                  => 'Edit Racing Type',
		'update_item'                => 'Update Racing Type',
		'view_item'                  => 'View Racing Type',
		'separate_items_with_commas' => 'Separate Sled Classes with commas',
		'add_or_remove_items'        => 'Add or remove Racing Types',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Racing Types',
		'search_items'               => 'Search Racing Types',
		'not_found'                  => 'Not Found',
	)
);
$sng_custom_tax_racing_type->post_types( 'races' );
$sng_custom_tax_racing_type->remove_from_edit_pages( 'races' );