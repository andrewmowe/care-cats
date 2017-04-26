<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class('row'); ?> id="post-<?php the_ID(); ?>">

		<?php if(has_post_thumbnail() || in_category('events')){ ?>

		<div class="col-md-4 col-lg-5 p-0 mb-3">

			<a class="imgwrap-4-6" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); 


				if(in_category('events')) {

					$date = get_field("e_date");

						if($date) {

						// assuming your return format is "Ymd"
						$dateTime = DateTime::createFromFormat("Ymd", $date);

						if ( is_object($dateTime) ) {
						  $month = $dateTime->format('M');
						  $year = $dateTime->format('Y');
						  $day = $dateTime->format('j');
						  //...
						}

			?>

				<div class="e-date-container">

					<h4>
						<span class="month"><?php echo $month; ?></span><br>
						<span class="day"><?php echo $day; ?></span><br>
						<?php echo $year; ?>
					</h4>

				</div>

			<?php 
					}

				} 

			?></a>

		</div>


		<div class="text col-md-8 col-lg-7 py-lg-5 pl-lg-5">

		<?php }else{ ?>

		<div class="text py-lg-5 text-columns">

		<?php } ?>

			<header class="entry-header">

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php
				the_excerpt();
				?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>

			</div><!-- .entry-content -->

		</div>

</article><!-- #post-## -->
