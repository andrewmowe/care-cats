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

				if (isset($_POST["catsearch"]) && !empty($_POST["catsearch"])) {


					// color
					// sex
					// age
					// hair
					// description

					$meta_query_vars = array(
							'relation' => 'AND',
							array(
								'key'		=> 'availability',
								'value'		=> 'available',
								'compare'	=> '='
							)
					);


					if (isset($_POST["colorSelect"]) && !empty($_POST["colorSelect"])) {
						
						$meta_query_vars[] = array(
							'key'			=> 'color',
							'value'		=> sanitize_text_field($_POST["colorSelect"]),
							'compare'	=> '='
						);
					
					}

					if (isset($_POST["sexSelect"]) && !empty($_POST["sexSelect"])) {
						
						$meta_query_vars[] = array(
							'key'		=> 'sex',
							'value'		=> sanitize_text_field($_POST["sexSelect"]),
							'compare'	=> '='
						);
					
					}

					if (isset($_POST["hairSelect"]) && !empty($_POST["hairSelect"])) {
						
						$meta_query_vars[] = array(
							'key'			=> 'hair',
							'value'		=> sanitize_text_field($_POST["hairSelect"]),
							'compare'	=> '='
						);
					
					}

					if (isset($_POST["ageSelect"]) && !empty($_POST["ageSelect"])) {
						
						$meta_query_vars[] = array(
							'key'			=> 'age',
							'value'		=> sanitize_text_field($_POST["ageSelect"]),
							'compare'	=> '='
						);
					
					}

					// if (isset($_POST["inlineFormInput"]) && !empty($_POST["inlineFormInput"])) {
						
					// 	$meta_query_vars[] = array(
					// 		'key'			=> 'description',
					// 		'value'		=> '%'.$_POST["inlineFormInput"].'%',
					// 		'compare'	=> 'LIKE'
					// 	);
					
					// }

					$args = array(
							'post_type' 	=> 'cats',
							'orderby'		=> 'meta_value',
							'meta_key'		=> 'pet_id',
							'order'			=> 'DESC',
							'paged' 		=> $paged,
							'meta_query'	=> $meta_query_vars,
					);

				}else{

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

					$cat_meta = get_post_meta( $post->ID, 'pet_data', true );

					$featured_image = '<img src="' . str_replace("p://","ps://", $cat_meta->images[0]->original_url) .'" alt="' . get_the_title() . '" >';
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