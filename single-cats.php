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

		$cat_meta = get_post_meta( $post->ID, 'pet_data', true );

?>

<article class="featured-cat container-fluid p-0">
			
	<div class="row">

		<div class="col-md-6 col-lg-7 py-0">
		  
			<div class="imgwrap-4-6"><img src="<?php echo $cat_meta->images[0]->original_url; ?>" alt="<?php the_title(); ?>" ></div>

		</div>

		<div class="text col-md-6 col-lg-5 p-5 p-sm-5">
		  
			
			<h1><?php the_title(); ?></h1>
			
			<p class="mt-md-4">

				<a class="btn btn-secondary mr-md-4" href="#" role="button">Adopt Me</a>

				<a class="btn btn-gray" href="#" role="button">SHARE</a>

			</p>
			
			<p><?php echo $cat_meta->description; ?></p>

		</div>

	</div>

	<div class="row my-5 mb-5">

		<div class="col-md-6 pl-md-5 mb-5">
		  
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

		<div class="col-md-6">
			<div class="embed-responsive embed-responsive-4by3">
			  
				<div class=""><?php echo wp_oembed_get( $cat_meta->video_url ); ?></div>

			</div>
		</div>

		<?php } else { ?>
			<?php if(count($cat_meta->images) > 1) {  ?>

				<div class="col-md-6">
					<h4 class="px-3">More images of <?php the_title(); ?></h4>

					<div class="row img-thumbs px-3">

						<?php foreach ($cat_meta->images as $key => $image) { ?>
							
							<div class="col-sm-6 col-xl-4 mb-3"><img src="<?php echo $image->original_url; ?>" alt="<?php the_title(); ?>" ></div>
						<?php } ?>

					</div>

				</div>

			<?php } ?>

		<?php } ?>

	</div>

	<?php if(count($cat_meta->images) > 1 && $cat_meta->video_url !== NULL) {  ?>


		<h4 class="px-3">More images of <?php the_title(); ?></h4>

		<div class="row img-thumbs px-3">

			<?php foreach ($cat_meta->images as $key => $image) { ?>
				
				<div class="col-md-6 col-md-4 col-lg-3"><img src="<?php echo $image->original_url; ?>" alt="<?php the_title(); ?>" ></div>
			<?php } ?>

		</div>

	<?php } ?>

</article>

<?php

	// echo '<pre>';
	// print_r( $cat_meta );
	// echo '</pre>';

?>

<?php endwhile; // end of the loop. ?>

<h3 class="text-center bg-primary divider-header">You may also like...</h3>

<?php get_footer(); ?>
