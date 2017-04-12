<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper bg-primary text-white py-5" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>">

		<footer class="site-footer row justify-content-between" id="colophon">

			<section class="col-12 col-md-5">

				<h2>Adoption Event Updates</h2>
				<p>No Adoption event Saturday 3/14
				<br>Cat caretakers needed Sundays</p>
				<h2>OUR LOCATIONS</h2>
				<p>Cats may be seen during regular store hours.
				<br>Adoptions arranged by appointment.</p>
				<h4>Petco</h4>
				<p>9051 Staples Mill Road  Richmond, VA 23228
				<br/>Adoption events every Saturday 12-3pm</p>

			</section><!--col end -->

			<section class="col-12 col-md-5 pl-md-5">

				<h3>Stay Connected</h3>
				<p>Sign up for our newsletter</p>
				<form class="form-inline mb-4 row mx-0">
					<label class="sr-only" for="inlineFormInput">Email</label>
					<input type="email" class="form-control col-8 m-0" id="inlineFormInput" placeholder="...enter your email">

					<div class="col-4 pl-2"><button type="submit" class="btn btn-gray w-100">Sign Up</button></div>
				</form>

				<div class="d-flex justify-content-between">

					<a class="btn btn-secondary" href="#" role="button">Donate</a>

					<p>[social icons]</p>

				</div>

			</section><!--col end -->

		</footer><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
