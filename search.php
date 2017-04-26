<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper pt-0" id="full-width-page-wrapper">

	<header>
		<h1 class="text-center bg-gray-lt divider-header"><?php printf( esc_html__( 'Search Results for: %s', 'understrap' ),
						'<span>' . get_search_query() . '</span>' ); ?></h1>
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


	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
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
