<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pt-0" id="full-width-page-wrapper">

	<header>
		<?php
		the_archive_title( '<h1 class="text-center bg-gray-lt divider-header">', '</h1>' );
		?>
	</header><!-- .page-header -->

	<section class="available-cats container-fluid px-0 bg-gray-md">

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'care-news-menu',
				'container_class' => 'container',
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