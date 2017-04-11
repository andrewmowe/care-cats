<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<header class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

	<!-- ******************* The Navbar Area ******************* -->

		<nav class="navbar navbar-toggleable-md navbar-light bg-faded m-md-0 p-0">

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbartoggled" aria-controls="#navbartoggled" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="container-fluid w-100 p-0">

				<div class="container">

					<div class="row align-items-end">

					  	<!-- Your site title as branding in the menu -->
						<div class=" col-12 col-lg-4">
							<?php if ( ! has_custom_logo() ) { ?>

								<?php if ( is_front_page() && is_home() ) : ?>

									<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
									
								<?php else : ?>

									<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
								
								<?php endif; ?>
								

							<?php } else {
								the_custom_logo();
							} ?><!-- end custom logo -->
						</div>


				  		<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse col-12 col-lg-8 justify-content-end',
								'container_id'    => 'navbartoggled',
								'menu_class'      => 'navbar-nav py-3',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); ?>

					</div>

				</div>

				<div class="container-fluid bg-primary text-white w-100 collapse navbar-collapse" id="navbartoggled2">

					<div class="container">

						<div class="row align-items-end justify-content-between align-items-center py-3 px-md-0">

						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'care-secondary-menu',
								'container_class' => 'navbar-inverse col-12 col-lg-8',
								'container_id'    => '',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'second-menu',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); ?>

						<div class="col-12 col-lg-4">
						
							<?php get_search_form(); ?>

						</div>

					</div>

				</div>

			</div>

		</nav>

	</header><!-- .wrapper-navbar end -->
