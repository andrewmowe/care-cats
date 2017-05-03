<?php
/**
 * Cat grid post partial template.
 *
 * @package understrap
 */

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
