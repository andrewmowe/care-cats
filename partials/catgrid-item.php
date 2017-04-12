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
				$args = array(
						'post_type' => 'cats',
						'posts_per_page'	=> 6,
						'orderby'	=> 'menu_order',
						'meta_query'	=> array(
								array(
									'key'			=> 'availability',
									'value'		=> 'available',
									'compare'	=> '='
								)
						),
				);

				$cats = new WP_Query( $args );

				if ( $cats->have_posts() ) :

					while ( $cats->have_posts() ) : $cats->the_post();

					$cat_meta = get_post_meta( $post->ID, 'pet_data', true );

					// echo '<pre>';
					// print_r( $meta );
					// echo '</pre>';
			?>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">

				<img src="<?php echo $cat_meta->images[0]->original_url; ?>" class="w-100" >

				<div class="d-flex justify-content-between">

					<h2><?php the_title(); ?></h2>

					<a class="btn btn-link" href="#" role="button">learn more</a>

				</div>

			</article>

			<?php endwhile; ?>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>