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
						'post_type' => 'post',
						'posts_per_page'	=> 9, 
						'paged' => $paged,
				);


				$news = new WP_Query( $args );

				// echo '<pre>';
				// print_r( $news );
				// echo '</pre>';

				if ( $news->have_posts() ) : 

			?>


			<?php

					while ( $news->have_posts() ) : $news->the_post();


						get_template_part( 'loop-templates/content', 'news' );

					endwhile; 

			?>
			

		</div>

			<?php if ( $news->max_num_pages > 1 ) : ?>
		    <div class="text-center py-3 load-more-news">
		         <?php next_posts_link( 'Load More News', $news ->max_num_pages ); ?>
		    </div>
			<?php endif;  ?>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>