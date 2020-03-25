<?php 
// Register Custom Post Type
function showcase_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Showcase', 'Post Type General Name', CBM_TEXTDOMAIN ),
		'singular_name'         => _x( 'Showcase', 'Post Type Singular Name', CBM_TEXTDOMAIN ),
		'menu_name'             => __( 'Showcase', CBM_TEXTDOMAIN ),
		'name_admin_bar'        => __( 'Showcase', CBM_TEXTDOMAIN ),
		'archives'              => __( 'Showcase Archives', CBM_TEXTDOMAIN ),
		'attributes'            => __( 'Showcase Attributes', CBM_TEXTDOMAIN ),
		'parent_item_colon'     => __( 'Parent Showcase:', CBM_TEXTDOMAIN ),
		'all_items'             => __( 'All Showcase', CBM_TEXTDOMAIN ),
		'add_new_item'          => __( 'Add New Showcase', CBM_TEXTDOMAIN ),
		'add_new'               => __( 'Add Showcase', CBM_TEXTDOMAIN ),
		'new_item'              => __( 'New Showcase', CBM_TEXTDOMAIN ),
		'edit_item'             => __( 'Edit Showcase', CBM_TEXTDOMAIN ),
		'update_item'           => __( 'Update Showcase', CBM_TEXTDOMAIN ),
		'view_item'             => __( 'View Showcase', CBM_TEXTDOMAIN ),
		'view_items'            => __( 'View Showcases', CBM_TEXTDOMAIN ),
		'search_items'          => __( 'Search Showcase', CBM_TEXTDOMAIN ),
		'not_found'             => __( 'Not found', CBM_TEXTDOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', CBM_TEXTDOMAIN ),
		'featured_image'        => __( 'Featured Image', CBM_TEXTDOMAIN ),
		'set_featured_image'    => __( 'Set featured image', CBM_TEXTDOMAIN ),
		'remove_featured_image' => __( 'Remove featured image', CBM_TEXTDOMAIN ),
		'use_featured_image'    => __( 'Use as featured image', CBM_TEXTDOMAIN ),
		'insert_into_item'      => __( 'Insert into showcase', CBM_TEXTDOMAIN ),
		'uploaded_to_this_item' => __( 'Uploaded to this showcase', CBM_TEXTDOMAIN ),
		'items_list'            => __( 'Showcases list', CBM_TEXTDOMAIN ),
		'items_list_navigation' => __( 'Showcases list navigation', CBM_TEXTDOMAIN ),
		'filter_items_list'     => __( 'Filter showcases list', CBM_TEXTDOMAIN ),
	);
	$args = array(
		'label'                 => __( 'Showcase', CBM_TEXTDOMAIN ),
		'description'           => __( 'Post Type Description', CBM_TEXTDOMAIN ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'showcase_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-layout',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'showcase', $args );

}
add_action( 'init', 'showcase_custom_post_type', 0 );

// Register Custom Taxonomy
function showcase_category_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Showcase Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Showcase Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Showcase Category', 'text_domain' ),
		'all_items'                  => __( 'All Showcase Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Showcase Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Showcase Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Showcase Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Showcase Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Showcase Category', 'text_domain' ),
		'update_item'                => __( 'Update Showcase Category', 'text_domain' ),
		'view_item'                  => __( 'View Showcase Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Categories', 'text_domain' ),
		'search_items'               => __( 'Search Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'showcase_category', array( 'showcase' ), $args );

}
add_action( 'init', 'showcase_category_taxonomy', 0 );