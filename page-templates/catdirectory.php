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

	<h1 class="text-center bg-gray-lt divider-header">Cats Available for Adoption</h1>

	<section class="available-cats container-fluid px-0 bg-gray-md">

		<div class="container">

			<form class="cat-filters row py-4 align-items-center">

				<div class="col-12 col-md-2">

					<h2><a id="togglefilters" href="#filters" aria-expanded="true" aria-controls="#filters">Filters:</a></h2>

				</div>

				<div class="col-12 col-md-2 filtercontrols">

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

				<div class="col-12 col-md-2 filtercontrols">

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

				<div class="col-12 col-md-6 pl-md-4 filtercontrols">

					<div class="form-inline row mx-0">

						<label class="sr-only" for="inlineFormInput">description</label>

						<input type="text" class="form-control col-md-7 col-lg-8" id="inlineFormInput" placeholder="...enter description text">

						<div class="col-md-5 col-lg-4"><button type="submit" class="btn btn-primary w-100">Search</button></div>

					</div>

				</div><!--col end -->

			</form>

		</div>

	</section>

	<section class="cats-grid container my-5" id="cats-grid">

		<?php get_template_part('partials/catgrid', 'item'); ?>

	</section>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
