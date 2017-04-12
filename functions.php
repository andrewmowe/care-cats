<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}

// Custom post types

add_action( 'init', 'create_post_type_cats' );

function create_post_type_cats() {
		$labels = array(
			'name'               => _x( 'Cats', 'post type general name', 'understrap' ),
			'singular_name'      => _x( 'Cat', 'post type singular name', 'understrap' ),
			'menu_name'          => _x( 'Cats', 'admin menu', 'understrap' ),
			'name_admin_bar'     => _x( 'Cat', 'add new on admin bar', 'understrap' ),
			'add_new'            => _x( 'Add New', 'cat', 'understrap' ),
			'add_new_item'       => __( 'Add New Cat', 'understrap' ),
			'new_item'           => __( 'New Cat', 'understrap' ),
			'edit_item'          => __( 'Edit Cat', 'understrap' ),
			'view_item'          => __( 'View Cat', 'understrap' ),
			'all_items'          => __( 'All Cats', 'understrap' ),
			'search_items'       => __( 'Search Cats', 'understrap' ),
			'parent_item_colon'  => __( 'Parent Cats:', 'understrap' ),
			'not_found'          => __( 'No cats found.', 'understrap' ),
			'not_found_in_trash' => __( 'No cats found in Trash.', 'understrap' )
		);

		$args = array(
			'labels'             => $labels,
	    'description'        => __( 'Description.', 'understrap' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'cat' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

    register_post_type( 'cats', $args );

}

/**
 * Enqueue TypeKit Fonts
 */
function t8_enqueue_scripts() {
    wp_enqueue_script( 'typekit', '//use.typekit.net/ure0vfn.js' );
}
add_action( 'wp_enqueue_scripts', 't8_enqueue_scripts' );

function t8_typekit_inline() {
    if ( wp_script_is( 'typekit', 'done' ) ) {
        echo '<script>try{Typekit.load();}catch(e){}</script>';
    }
}
add_action( 'wp_head', 't8_typekit_inline' );

register_nav_menus( array(
			'care-secondary-menu' => __( 'Secondary Menu', 'understrap' ),
		) );