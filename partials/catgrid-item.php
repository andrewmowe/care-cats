<?php
/**
 *
 *
 * @package understrap
 */
?>

<?php
	if ( get_query_var('paged') ) {
	    $paged = get_query_var('paged');
	} else if ( get_query_var('page') ) {
	    $paged = get_query_var('page');
	} else {
	    $paged = 1;
	}

	$args = array(
			'post_type' => 'cats',
			'orderby'			=> 'meta_value',
			'order'				=> 'DESC',
			'meta_key'		=> 'pet_id',
			'paged' 			=> $paged,
			'meta_query'	=> array(
					array(
						'key'			=> 'availability',
						'value'		=> 'available',
						'compare'	=> '='
					)
			),
	);


	if(is_page_template('page-templates/homepage.php')) {

		$args["posts_per_page"] = get_theme_mod("cat_num");

	}elseif(is_single()) {
		$args["posts_per_page"] = 3;
	}

	// echo "<pre>";
	// var_dump($args);

	// echo "</pre>";

	$cats = new WP_Query( $args );

	if ( $cats->have_posts() ) :

?>

		<div class="row">

			<?php

					while ( $cats->have_posts() ) : $cats->the_post();

						get_template_part( 'loop-templates/content', 'gridcat' );

					endwhile; 

			?>

		</div>

		<?php if ( $cats->max_num_pages > 1 && !is_front_page()) : ?>
	    <div class="text-center py-3 load-more">
	         <?php next_posts_link( 'Load More Cats', $cats ->max_num_pages ); ?>
	    </div>
		<?php endif;  ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>