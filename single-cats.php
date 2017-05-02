<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
?>

<?php

	while ( have_posts() ) : the_post();

		$all_meta = get_post_meta( $post->ID, '', true );
		// echo '<pre>';
		// print_r($all_meta);
		// echo '</pre>';

		$cat_meta = get_post_meta( $post->ID, 'pet_data', true );

		// echo '<pre>';
		// print_r($cat_meta);
		// echo '</pre>';

		$featured_image = '<img src="' . str_replace("p://","ps://", $cat_meta->images[0]->original_url) .'" alt="' . get_the_title() . '" >';
		$image_class = 'imgwrap-4-6';

		if(has_post_thumbnail()){
			$featured_image = get_the_post_thumbnail( $post->ID, 'large' );
			$image_class .= " no-crop ";
		}

?>

<article class="featured-cat">
	
	<div class="container-fluid p-0">

		<div class="row">

			<div class="col-md-6 col-lg-7 py-0">

				<div class="<?php echo $image_class; ?>"><?php echo $featured_image; ?></div>

			</div>

			<div class="text col-md-6 col-lg-5 p-5 p-sm-5">

				<h1><?php the_title(); ?></h1>

				<div class="mt-md-4 mb-3">

					<a class="btn btn-secondary mr-md-4" href="#" role="button">Adopt Me</a>

				<!-- 	<a class="btn btn-gray" href="#" role="button">SHARE</a> -->
					<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>

				</div>

				<p><?php echo $cat_meta->description; ?></p>

			</div>

		</div>

	</div>	
	<div class="container">

		<div class="row my-5 mb-5">

			<div class="col-lg-6 pl-lg-5 mb-5">

				<div class="my-stats p-5">

					<h2>My Stats</h2>

					<?php 

						$breed = $cat_meta->primary_breed;
						if($cat_meta->secondary_breed !== NULL) $breed .= ", " . $cat_meta->secondary_breed;

					?>

					<table>
						<tbody>
							<tr>
								<td>Sex</td>
								<td><?php echo $cat_meta->sex; ?></td>
							</tr>
							<tr>
								<td>Age</td>
								<td><?php echo $cat_meta->age; ?></td>
							</tr>
							<tr>
								<td>Breed</td>
								<td><?php echo $breed; ?></td>
							</tr>
							<tr>
								<td>Color</td>
								<td><?php echo $cat_meta->color; ?></td>
							</tr>
							<tr>
								<td>Hair Length</td>
								<td><?php echo $cat_meta->hair_length; ?></td>
							</tr>
						</tbody>
					</table>

					<ul class="row my-4 mx-0 stat-list">

					<?php if($cat_meta->good_with_kids) { ?>
						<li class="col-sm-6 pl-0">
							Good with kids
						</li>
					<?php } ?>
					<?php if($cat_meta->good_with_dogs) { ?>
						<li class="col-sm-6 pl-0">
							Good with dogs
						</li>
					<?php } ?>
					<?php if($cat_meta->good_with_cats) { ?>
						<li class="col-sm-6 pl-0">
							Good with cats
						</li>
					<?php } ?>
					<?php if($cat_meta->shots_current) { ?>
						<li class="col-sm-6 pl-0">
							Shots up to date
						</li>
					<?php } ?>
					<?php if($cat_meta->spayed_neutered) { ?>
						<li class="col-sm-6 pl-0">
							Spayed/neutered
						</li>
					<?php } ?>
					<?php if($cat_meta->declawed) { ?>
						<li class="col-sm-6 pl-0">
							Declawed
						</li>
					<?php } ?>
					<?php if($cat_meta->special_needs) { ?>
						<li class="col-sm-6 pl-0">
							Special needs
						</li>
					<?php } ?>

					</ul>

				</div>
			</div>

			<?php if($cat_meta->video_url !== NULL) { ?>

			<div class="col-lg-6">
				<div class="embed-responsive embed-responsive-4by3">

					<div class=""><?php echo wp_oembed_get( $cat_meta->video_url ); ?></div>

				</div>
			</div>

			<?php } else { ?>
				<?php if(count($cat_meta->images) > 1) {  ?>

					<div class="col-lg-6">
						<h4 class="px-3">More images of <?php the_title(); ?></h4>

						<div class="row img-thumbs px-3">

							<?php foreach ($cat_meta->images as $key => $image) { 
								$imageurl = str_replace("p://","ps://", $image->original_url);
							?>

					<?php
					$content = '<a class="col-sm-6 col-xl-4 mb-3" href="' . $imageurl .'"><img src="'. $imageurl .'" alt="' . get_the_title() . '" title="' . get_the_title() . '"></a>';
					?>
					<?php 

						if ( function_exists('slb_activate') ) {
							$content = slb_activate($content);
							echo $content; 

						} 

					?>
							<?php } ?>

						</div>

					</div>

				<?php } ?>

			<?php } ?>

		</div>

		<?php if(count($cat_meta->images) > 1 && $cat_meta->video_url !== NULL) {  ?>


			<h4 class="px-3">More images of <?php the_title(); ?></h4>

			<div class="row img-thumbs px-3 mb-5">

				<?php foreach ($cat_meta->images as $key => $image) { 
					$imageurl = str_replace("p://","ps://", $image->original_url);
				?>

					<?php
					$content = '<a class="col-sm-6 col-md-4 col-lg-3" href="' . $imageurl .'"><img src="'. $imageurl .'" alt="' . get_the_title() . '" title="' . get_the_title() . '"></a>';
					?>
					<?php 

						if ( function_exists('slb_activate') ) { 
							$content = slb_activate($content); 
							echo $content; 
						}
					?>

				<?php } ?>

			</div>

		<?php } ?>

	</div>

</article>

<?php

	// echo '<pre>';
	// print_r( $cat_meta );
	// echo '</pre>';

?>

<?php endwhile; // end of the loop. ?>

<h3 class="text-center bg-primary divider-header related-cats-header">You may also like...</h3>

<section class="cats-grid container mt-3 mb-5" id="cats-grid">


<?php

				$exclude_ids = array( $post->ID );

				$args = array(
						'post_type' => 'cats',
						'posts_per_page'	=> 3,
						'orderby'		=> 'meta_value',
						'meta_key'		=> 'pet_id',
						'order'			=> 'ASC',
						'post__not_in' => $exclude_ids,
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

			?>

		<div class="row">

			<?php

					while ( $cats->have_posts() ) : $cats->the_post();

					$cat_meta = get_post_meta( $post->ID, 'pet_data', true );

					// echo '<pre>';
					// print_r( $cat_meta );
					// echo '</pre>';
			?>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">

				<a href="<?php the_permalink(); ?>" class="imgwrap-4-6"><img src="<?php echo str_replace("p://","ps://", $cat_meta->images[0]->original_url); ?>" alt="<?php the_title(); ?>" ></a>

				<div class="d-flex justify-content-between align-items-baseline bg-gray-lt px-3 py-2">

					<h2><?php the_title(); ?></h2>

					<a class="btn btn-link" href="<?php the_permalink(); ?>" role="button">learn more</a>

				</div>

			</article>

			<?php endwhile; ?>

			

		</div>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>



</section>

<?php get_footer(); ?>
