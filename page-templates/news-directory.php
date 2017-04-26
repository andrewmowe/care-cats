<?php
/**
 * Template Name: News Directory
 *
 * Template for displaying the directory of available cats.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pt-0" id="full-width-page-wrapper">

	<h1 class="text-center bg-gray-lt divider-header">C.A.R.E. News</h1>

	<section class="container-fluid px-0 bg-gray-md cat-nav-wrap">

		<h3><a id="togglefilters" href="#filters" aria-expanded="true" aria-controls="#filters">Categories</a></h3>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'care-news-menu',
				'container_class' => 'container filtercontrols',
				'container_id'    => '',
				'menu_class'      => 'category-nav',
				'fallback_cb'     => '',
				'menu_id'         => 'news-menu',
				'walker'          => new WP_Bootstrap_Navwalker(),
			)
		); ?>

	</section>

	<section class="news-list container my-5" id="news-list">

		<?php get_template_part('partials/news', 'list'); ?>

	</section>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
