<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying the HOME page without sidebar even if a sidebar widget is published.
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
						//'posts_per_page'	=> 9,
						'orderby'	=> 'menu_order', 
						'paged' => $paged,
						'meta_query'	=> array(
								array(
									'key'		=> 'availability',
									'value'		=> 'available',
									'compare'	=> '='
								)
						),
				);

				if(!is_front_page()) {
				
					if(is_single()) {
						$args["posts_per_page"] = 3;
					} else {
						$args["posts_per_page"] = 9;
					}

				
				}

				$cats = new WP_Query( $args );

				if ( $cats->have_posts() ) : 

			?>

		<div class="row">

			<?php

					while ( $cats->have_posts() ) : $cats->the_post();

					$cat_meta = get_post_meta( $post->ID, 'pet_data', true );

					$featured_image = '<img src="' . $cat_meta->images[0]->original_url .'" alt="<?php the_title(); ?>" >';
					$image_class = 'imgwrap-4-6';

					if(has_post_thumbnail()){
						$featured_image = get_the_post_thumbnail( $post->ID, 'medium' );
						$image_class .= " no-crop ";
					}

					// echo '<pre>';
					// print_r( $cat_meta );
					// echo '</pre>';
			?>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">

				<a href="<?php the_permalink(); ?>" class="<?php echo $image_class; ?>"><?php echo $featured_image; ?></a>

				<div class="d-flex justify-content-between align-items-baseline bg-gray-lt px-3 py-2">

					<h2><?php the_title(); ?></h2>

					<a class="btn btn-link" href="<?php the_permalink(); ?>" role="button">learn more</a>

				</div>

			</article>

			<?php endwhile; ?>

			

		</div>

		<?php if ( $cats->max_num_pages > 1 && !is_front_page()) : ?>
	    <div class="text-center py-3 load-more">
	         <?php next_posts_link( 'Load More Cats', $cats ->max_num_pages ); ?>
	    </div>
		<?php endif;  ?>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>