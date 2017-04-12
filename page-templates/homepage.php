<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying the HOME page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper p-0" id="full-width-page-wrapper">

	<section class="home-banner container-fluid bg-inverse text-white" style="background-image: url('http://lorempixel.com/1200/400/cats'); background-size: cover; background-position: center center; background-repeat: no-repeat;"> 
	<!-- banner bg image would be applied to this container -->

		<div class="container">
			
			<div class="row">

				<div class="col-md-6 py-5">
				  
					<h2>Since 2001, CARE has rescued over 7,500 cats and kittens and placed them in forever homes.</h2>

				</div>

			</div>

		</div>

	</section>

	<section class="home-eventpromo container-fluid">

		<div class="container">
			
			<div class="row justify-content-between">

				<div class="col-md-5 py-5">
				  
					<h2>Adopt at Petco on March 4 &amp; 5</h2>
					<p>Help us reach our goal of a minimum of 5 adoptions this weekend and Petco will make a donation to CARE for each adoption!</p>

				</div>
				<div class="col-md-4">
				  
					<img src="http://lorempixel.com/300/200/cats" class="w-100" >

				</div>

			</div>

		</div>

	</section>

	<section class="available-cats container-fluid px-0">

			
		<h1 class="text-center py-4 my-0 bg-gray-lt divider-header">Cats Available for Adoption</h1>

		<article class="featured-cat container-fluid p-0">
				
			<div class="row">

					<div class="col-md-6 col-lg-7 py-0">
					  
						<img src="http://lorempixel.com/600/400/cats" class="w-100" >

					</div>

					<div class="text col-md-6 col-lg-5 p-5 p-sm-5">
					  
						<h1>Hushpuppy</h1>
						<p>I was part of a feral colony of kitties. Neighbors, fearful for my survival, live-trapped me and turned me over to CARE. I have been in foster care since mid-May and am about 11 months old and have become the most loveable kitty around. I am an extremely lively boy that enjoys romp and playtime. I can be shy until I feel comfortable but once I get to know you, I am loving. Being in foster care has given me the opportunity to live with multiple kitty personalities so I tend to get along well with other cats/kittens…</p>

						<p class="mt-md-4">

							<a class="btn btn-primary" href="#" role="button">Learn More</a>

							<a class="btn btn-secondary ml-md-4" href="#" role="button">Adopt Me</a>

						</p>

					</div>

				</div>

			</div>

		</article>

		<section class="cats-grid container-fluid my-5">

			<div class="row">

				<?php get_template_part('partials/catgrid', 'item'); ?>
				<?php get_template_part('partials/catgrid', 'item'); ?>
				<?php get_template_part('partials/catgrid', 'item'); ?>

			</div>

		</section>

		<h3 class="text-center bg-primary divider-header"><a class="btn btn-outline-secondary" href="#" role="button">See All Available Cats</a></h3>

	</section>

	<section class="full-text-section container-fluid bg-gray-lt">

		<article class="container py-5 text-center">
			
			<h2>the C.A.R.E. Mission</h2>

			<p>Cat Adoption and Rescue Efforts, Inc. (C.A.R.E.) is an all-volunteer, non-profit 501 (c) (3) organization dedicated to the rehabilitation, care and adoption of cats and kittens rescued from euthanizing animal shelters in Richmond, VA and surrounding areas. And, accepts on a limited basis animals from alternative sources. We are committed to the highest principles of humane care and obtain professional medical treatment for all animals in our systems.</p>

		</article>

	</section>

	<section class="home-sponsors container py-5">

		<h3 class="text-center mb-5">Sponsors</h3>

		<div class="row">

			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>

			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>

			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>
			
			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>

			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>

			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>

			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>
			
			<article class="grid-sponsor col-6 col-lg-3 py-3 text-center">
				
				<a class="" href="#" ><img src="http://lorempixel.com/600/400/cats" class="" ></a>
				
				<a class="" href="#" ><h2>United Way</h2></a>

			</article>

		</div>

	</section>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
