<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
?>

<a id="back-to-top" href="#" role="button"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/back-to-top.svg" width="40" height="40" /></a>

<div class="wrapper bg-primary text-white py-5" id="wrapper-footer">

	<div class="container">

		<footer class="site-footer row justify-content-between" id="colophon">

			<section class="col-12 col-md-5">

				<?php

				if ( is_active_sidebar( 'footerleft' ) ) :

					dynamic_sidebar( 'footerleft' );

				endif;

				?>

			</section><!--col end -->

			<section class="col-12 col-md-5 pl-md-5">

				<h3>Stay Connected</h3>
				<p>Sign up for our newsletter</p>

				<!-- Begin MailChimp Signup Form -->
				<form action="//care-cats.us15.list-manage.com/subscribe/post?u=5362ba8d348c8a223262e4d3f&amp;id=887cc66615" class="form-inline mb-4 row mx-0 mc4wp-form mc4wp-form-17733" data-id="17735" data-name="Newsletter Signup" id="mc4wp-form-1" method="post" name="mc4wp-form-1">
						<label class="sr-only" for="inlineFormInput">Email address</label>
						<input name="EMAIL" class="form-control col-8 m-0" id="inlineFormInput" placeholder="...enter your email" required="" type="email">
						<div class="col-4 pl-2 pr-0"><button type="submit" class="btn btn-gray w-100">Sign Up</button></div>
						<div style="display: none;">
							<input autocomplete="off" name="_mc4wp_honeypot" tabindex="-1" type="text" value="">
						</div><input name="_mc4wp_timestamp" type="hidden" value="1493741299"><input name="_mc4wp_form_id" type="hidden" value="17735"><input name="_mc4wp_form_element_id" type="hidden" value="mc4wp-form-1">
					<div class="mc4wp-response"></div>
				</form>
				<!-- End MC Signup Form -->

				<div class="d-flex justify-content-between">

					<a class="btn btn-secondary" href="<?php echo home_url(); ?>/donate" role="button">Donate</a>

					<?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?>

				</div>

			</section><!--col end -->

		</footer><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
