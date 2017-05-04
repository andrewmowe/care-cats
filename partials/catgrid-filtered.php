<?php
/**
 *
 *
 * @package understrap
 */
?>

<?php
	if ( get_query_var('paged') ) {
	    $paged = get_query_var('paged');
	} else if ( get_query_var('page') ) {
	    $paged = get_query_var('page');
	} else {
	    $paged = 1;
	}

	
	// color
	// sex
	// age
	// hair
	// description

	$meta_query_vars = array(
			'relation' => 'AND',
			array(
				'key'		=> 'availability',
				'value'		=> 'available',
				'compare'	=> '='
			)
	);


	if (isset($_POST["colorSelect"]) && !empty($_POST["colorSelect"])) {
		
		$meta_query_vars[] = array(
			'key'			=> 'color',
			'value'		=> sanitize_text_field($_POST["colorSelect"]),
			'compare'	=> '='
		);
	
	}

	if (isset($_POST["sexSelect"]) && !empty($_POST["sexSelect"])) {
		
		$meta_query_vars[] = array(
			'key'		=> 'sex',
			'value'		=> sanitize_text_field($_POST["sexSelect"]),
			'compare'	=> '='
		);
	
	}

	if (isset($_POST["hairSelect"]) && !empty($_POST["hairSelect"])) {
		
		$meta_query_vars[] = array(
			'key'			=> 'hair',
			'value'		=> sanitize_text_field($_POST["hairSelect"]),
			'compare'	=> '='
		);
	
	}

	if (isset($_POST["ageSelect"]) && !empty($_POST["ageSelect"])) {
		
		$meta_query_vars[] = array(
			'key'			=> 'age',
			'value'		=> sanitize_text_field($_POST["ageSelect"]),
			'compare'	=> '='
		);
	
	}

	// if (isset($_POST["inlineFormInput"]) && !empty($_POST["inlineFormInput"])) {
		
	// 	$meta_query_vars[] = array(
	// 		'key'			=> 'description',
	// 		'value'		=> '%'.$_POST["inlineFormInput"].'%',
	// 		'compare'	=> 'LIKE'
	// 	);
	
	// }

	$args = array(
			'post_type' 	=> 'cats',
			'orderby'		=> 'meta_value',
			'meta_key'		=> 'pet_id',
			'order'			=> 'DESC',
			'paged' 		=> $paged,
			'meta_query'	=> $meta_query_vars,
	);

	$cats = new WP_Query( $args );

	if ( $cats->have_posts() ) :

?>

		<div class="row">

			<?php

					while ( $cats->have_posts() ) : $cats->the_post();

						get_template_part( 'loop-templates/content', 'gridcat' );

					endwhile; 

			?>

		</div>

	<?php if ( $cats->max_num_pages > 1 && !is_front_page()) : ?>
    <div class="text-center py-3 load-more">
         <?php next_posts_link( 'Show More Cats', $cats ->max_num_pages ); ?>
    </div>
	<?php endif;  ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>