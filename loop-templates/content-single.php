<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php // understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php if(in_category('events')){ 


			$date = get_field("e_date");

			if($date) {

			// assuming your return format is "Ymd"
			$dateTime = DateTime::createFromFormat("Ymd", $date);

			if ( is_object($dateTime) ) {
			  $month = $dateTime->format('F');
			  $year = $dateTime->format('Y');
			  $day = $dateTime->format('j');
			  //...
			}

	?>

		<div class="e-date-container">

			<h4>
				<span class="month"><?php echo $month; ?></span>
				<span class="day"><?php echo $day; ?></span>
				<?php echo $year; ?>
			</h4>

		</div>

	<?php 
			}
		} 
	?>

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
