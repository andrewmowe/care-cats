<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying the HOME page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper p-0" id="full-width-page-wrapper">


	<?php 

		$banner_override = get_field('override_rescue_banner');
		$event_promo_expiration = get_field('event_promo_expiration');

		$today = date('Ymd');

		if($banner_override && $today <= $event_promo_expiration){
	?>

	<section class="home-eventpromo container-fluid p-0">
			
		<div class="row justify-content-between">

			<div class="promo-text col-md-5 py-5">
			  
				<?php the_field('event_promo_text'); ?>

				<a class="btn btn-primary" href="<?php the_field('learn_more_link'); ?>" role="button">Learn More</a>

			</div>
			<div class="col-md-5">

				<?php  

					$image = get_field('promo_image');  

					if( !empty($image) ): ?>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100" />

					<?php endif; ?>

			</div>

		</div>

	</section>

	<?php }else{ ?>

		<?php  $image = get_field('rescue_banner');  ?>

	<section class="home-banner container-fluid bg-inverse text-white" style="background-image: url('<?php if( !empty($image) ) echo $image['url']; ?>');"> 

		<div class="container">
			
			<div class="row">

				<div class="col-md-6 py-5">
				  
					<h2><?php the_field('banner_text'); ?></h2>

				</div>

			</div>

		</div>

	</section>


	<?php } ?>

	<section class="available-cats container-fluid px-0">

			
		<h1 class="text-center py-4 my-0 bg-gray-lt divider-header">Cats Available for Adoption</h1>

		<?php

			$args = array(
						'post_type' => 'cats',
						'posts_per_page'	=> 1,
						'orderby'	=> 'rand',
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

					while ( $cats->have_posts() ) : $cats->the_post();

					$cat_meta = get_post_meta( $post->ID, 'pet_data', true );

					// echo '<pre>';
					// print_r( $cat_meta );
					// echo '</pre>';
			?>

			<article class="featured-cat container-fluid p-0">
				
				<div class="row">

						<div class="col-md-6 col-lg-7 py-0">
						  
							<div class="imgwrap-4-6"><img src="<?php echo $cat_meta->images[0]->original_url; ?>" alt="<?php the_title(); ?>" ></div>

						</div>

						<div class="text col-md-6 col-lg-5 p-5 p-sm-5">
						  
							<h1><?php the_title(); ?></h1>
							<p><?php echo $cat_meta->description; ?></p>

							<p class="mt-md-4">

								<a class="btn btn-primary" href="<?php the_permalink(); ?>" role="button">Learn More</a>

								<a class="btn btn-secondary ml-md-4" href="#" role="button">Adopt Me</a>

							</p>

						</div>

					</div>

				</div>

			</article>

			<?php endwhile; ?>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>


		<section class="cats-grid container-fluid my-5">

				<?php get_template_part('partials/catgrid', 'item'); ?>

		</section>

		<h3 class="text-center bg-primary divider-header"><a class="btn btn-outline-secondary" href="<?php echo get_permalink( get_page_by_title( 'Find a Cat' ) ); ?>" role="button">See All Available Cats</a></h3>

	</section>

	<section class="full-text-section container-fluid bg-gray-lt">

		<article class="container py-5 text-center">
			
			<?php the_field('mission_statement'); ?>

		</article>

	</section>

	<section class="home-sponsors container py-5">

		<h3 class="text-center mb-5">Sponsors</h3>

		<div class="row align-items-center">

			<?php 
			if( have_rows('sponsors') ):

			 	// loop through the rows of data
			    while ( have_rows('sponsors') ) : the_row();

				$image = get_sub_field('sponsor_logo');

			?>

				<article class="grid-sponsor col-6 col-lg-3 p-5 text-center">
					
					<a class="sponsor-logo" href="<?php the_sub_field('sponsor_link'); ?>" ><img src="<?php if( !empty($image) ) echo $image['url']; ?>" class="" ></a>
					
					<a class="" href="<?php the_sub_field('sponsor_link'); ?>" ><h2><?php the_sub_field('sponsor_name'); ?></h2></a>

				</article>

			<?php

			    endwhile;

			else :

			    // no rows found

			endif;

			?>
			

		</div>

	</section>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
