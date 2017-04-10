<?php
/**
 * Template Name: Cat Directory
 *
 * Template for displaying the directory of available cats.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pt-0" id="full-width-page-wrapper">

	<h1 class="text-center py-3 my-0 bg-faded">Cats Available for Adoption</h1>

	<section class="available-cats container-fluid px-0 bg-primary">

		<div class="container">

			<form class="cat-filters row py-4 align-items-center">

				<div class="col-12 col-md-2">

					<h2>Filters:</h2>

				</div>

				<div class="col-12 col-md-3">

					<div class="form-group">

						<label clafor="sexSelect">Sex</label>
					    <select class="form-control form-control-sm" id="sexSelect">
					      <option>Female</option>
					      <option>Male</option>
					    </select>

					</div>

					<div class="form-group">

						<label for="ageSelect">Age</label>
					    <select class="form-control form-control-sm" id="ageSelect">
					      <option>kitten</option>
					      <option>adult</option>
					    </select>

					</div>
					

				</div>

				<div class="col-12 col-md-3">

					<div class="form-group">

						<label for="colorSelect">color</label>
					    <select class="form-control form-control-sm" id="colorSelect">
					      <option>brown tabby</option>
					      <option>calico</option>
					    </select>

					</div>

					<div class="form-group">

						<label for="hairSelect">Hair Length</label>
					    <select class="form-control form-control-sm" id="hairSelect">
					      <option>short</option>
					      <option>long</option>
					    </select>

					</div>
					

				</div>

				<div class="col-12 col-md-4 pl-md-3">

					<div class="form-inline row mx-0">

						<label class="sr-only" for="inlineFormInput">description</label>

						<input type="text" class="form-control col-8 m-0" id="inlineFormInput" placeholder="...enter description text">

						<div class="col-4"><button type="submit" class="btn btn-primary w-100">Search</button></div>

					</div>

				</div><!--col end -->

			</form>

		</div>

	</section>

	<section class="cats-grid container mb-5">

		<div class="row">

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">
				
				<img src="http://lorempixel.com/600/400/cats" class="w-100" >

				<div class="d-flex justify-content-between">

					<h2>Gypsy</h2>

					<a class="btn btn-link" href="#" role="button">learn more</a>

				</div>

			</article>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">
				
				<img src="http://lorempixel.com/600/400/cats" class="w-100" >

				<div class="d-flex justify-content-between">

					<h2>Gypsy</h2>

					<a class="btn btn-link" href="#" role="button">learn more</a>

				</div>

			</article>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">
				
				<img src="http://lorempixel.com/600/400/cats" class="w-100" >

				<div class="d-flex justify-content-between">

					<h2>Gypsy</h2>

					<a class="btn btn-link" href="#" role="button">learn more</a>

				</div>

			</article>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">
				
				<img src="http://lorempixel.com/600/400/cats" class="w-100" >

				<div class="d-flex justify-content-between">

					<h2>Gypsy</h2>

					<a class="btn btn-link" href="#" role="button">learn more</a>

				</div>

			</article>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">
				
				<img src="http://lorempixel.com/600/400/cats" class="w-100" >

				<div class="d-flex justify-content-between">

					<h2>Gypsy</h2>

					<a class="btn btn-link" href="#" role="button">learn more</a>

				</div>

			</article>

			<article class="grid-cat col-12 col-md-6 col-lg-4 py-3">
				
				<img src="http://lorempixel.com/600/400/cats" class="w-100" >

				<div class="d-flex justify-content-between">

					<h2>Gypsy</h2>

					<a class="btn btn-link" href="#" role="button">learn more</a>

				</div>

			</article>

		</div>

		<div class="text-center py-3"><a class="btn btn-primary" href="#" role="button">Load More Cats</a></div>

	</section>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
