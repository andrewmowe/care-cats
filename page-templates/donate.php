<?php
/**
 * Template Name: Donate Page
 *
 * Template for displaying the donate page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

the_post();
?>

<div class="wrapper pt-0" id="full-width-page-wrapper">

	<div class="container-fluid">

		<div class="container">

			<h1 class="mt-5"><?php the_title(); ?></h1>

			<div class="row">

			<section class="care-donate-info col-md-6">

				<?php the_content(); ?>

			</section>

			<section class="care-donate-form col-md-6">

				<?php echo apply_filters('the_content', get_field('donate_form_code') ); ?>

			</section>

			</div>

		</div>

	</div>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
