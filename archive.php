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

	<?php if ( have_posts() ) : ?>


			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

				get_template_part( 'loop-templates/content', 'news' );
				?>

			<?php endwhile; ?>


		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

	</section>

	<div class="text-center py-3 mb-5 load-more-news">
         <?php next_posts_link( 'Load More News', $news ->max_num_pages ); ?>
    </div>

</div><!-- Wrapper end -->

<?php get_footer(); ?>