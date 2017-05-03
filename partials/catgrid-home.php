<?php
/**
 *
 *
 * @package understrap
 */
?>

<?php
	if(get_field('small_cats') && !empty(get_field('small_cats'))){

		$small_cats = array_slice(get_field('small_cats'), 0, 3);

		$args = array(
			'post_type' => 'cats',
			'post__in' => $small_cats,
			);

		if(count($small_cats) < 3){

			$remainder = 3 - count($small_cats);

			if(get_field('lg_cat')){
				$small_cats[] = get_field('lg_cat');
			}

			$args2 = array(
					'post_type' => 'cats',
					'orderby'			=> 'meta_value',
					'order'				=> 'DESC',
					'meta_key'		=> 'pet_id',
					'post__not_in'	=> $small_cats,
					'posts_per_page' 			=> $remainder,
					'meta_query'	=> array(
							array(
								'key'			=> 'availability',
								'value'		=> 'available',
								'compare'	=> '='
							)
					),
			);
		}
	}else{

		$args = array(
				'post_type' => 'cats',
				'orderby'			=> 'meta_value',
				'order'				=> 'DESC',
				'meta_key'		=> 'pet_id',
				'posts_per_page' 			=> 3,
				'meta_query'	=> array(
						array(
							'key'			=> 'availability',
							'value'		=> 'available',
							'compare'	=> '='
						)
				),
		);
	}

	// echo "<pre>";
	// var_dump($args);
	// echo "</pre>";

	// if(isset($args2)){

	// 	echo "<pre>";
	// 	var_dump($args2);
	// 	echo "</pre>";
	// }


?>

		<div class="row">

			<?php

				$cats = new WP_Query( $args );

				if ( $cats->have_posts() ) :
					while ( $cats->have_posts() ) : $cats->the_post();

						get_template_part( 'loop-templates/content', 'gridcat' );

					endwhile; 
				endif;

				wp_reset_postdata();


				if(isset($args2)){

					$cats = new WP_Query( $args2 );

					if ( $cats->have_posts() ) :
						while ( $cats->have_posts() ) : $cats->the_post();

							get_template_part( 'loop-templates/content', 'gridcat' );

						endwhile; 
					endif;

					wp_reset_postdata();

				}

			?>

		</div>