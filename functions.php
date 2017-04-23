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
	'care-news-menu' => __( 'News Menu', 'understrap' ),
) );



if ( ! function_exists( 'understrap_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'understrap' ),
			'id'            => 'right-sidebar',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'understrap' ),
			'id'            => 'left-sidebar',
			'description'   => 'Left sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Hero Slider', 'understrap' ),
			'id'            => 'hero',
			'description'   => 'Hero slider area. Place two or more widgets here and they will slide!',
			'before_widget' => '<div class="carousel-item">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => __( 'Hero Static', 'understrap' ),
			'id'            => 'statichero',
			'description'   => 'Static Hero widget. no slider functionallity',
		    'before_widget'  => '<div id="%1$s" class="static-hero-widget %2$s '. slbd_count_widgets( 'statichero' ) .'">', 
		    'after_widget'   => '</div><!-- .static-hero-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Left', 'understrap' ),
			'id'            => 'footerleft',
			'description'   => 'Left side of footer. Use this area for adoption event updates and adoption locations.',
		    'before_widget'  => '', 
		    'after_widget'   => '', 
		    'before_title'   => '<h2 class="widget-title">', 
		    'after_title'    => '</h2>', 
		) );

	}
} // endif function_exists( 'understrap_widgets_init' ).



// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');


function t8_cats_widget($atts){
	extract(shortcode_atts(array(
	  'count' => 3,
	), $atts));

	$args = array(
			'post_type' => 'cats',
			'posts_per_page'	=> $count,
			'orderby'	=> 'menu_order',
			'meta_query'	=> array(
					array(
						'key'		=> 'availability',
						'value'		=> 'available',
						'compare'	=> '='
					)
			),
	);

	$cats = new WP_Query( $args );

	if ( $cats->have_posts() ) : 

		$return_string =  '';


		while ( $cats->have_posts() ) : $cats->the_post();

			$cat_meta = get_post_meta( get_the_ID(), 'pet_data', true );

			$featured_image = '<img src="' . $cat_meta->images[0]->original_url .'" alt="' . get_the_title() . '" >';
			$image_class = 'imgwrap-4-6';

			if(has_post_thumbnail()){
				$featured_image = get_the_post_thumbnail( $post->ID, 'medium' );
				$image_class .= " no-crop ";
			}

			$return_string .= '<div class="grid-cat">';

				$return_string .= '<a href="' . get_the_permalink() . '" class="' . $image_class . '">' . $featured_image . '</a>';

				$return_string .= '<div class="d-flex justify-content-between align-items-baseline bg-gray-lt px-3 py-2">';

					$return_string .= '<h3>' . get_the_title() . '</h3>';

					$return_string .= '<a class="text-link" href="' . get_the_permalink() . '">learn more</a>';

				$return_string .= '</div>';

			$return_string .= '</div>';

		endwhile;

	endif;

	wp_reset_postdata();

	return $return_string;

}
add_shortcode( 't8-cats-widget', 't8_cats_widget' );