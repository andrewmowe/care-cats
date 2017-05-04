<?php
/**
 * Template Name: Cat Directory
 *
 * Template for displaying the directory of available cats.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$page_id = get_queried_object_id();
$p_uri = get_page_uri($page_id);

?>

<div class="wrapper pt-0" id="full-width-page-wrapper">

	<h1 class="text-center bg-gray-lt divider-header">Cats Available for Adoption</h1>

	<section class="available-cats container-fluid px-0 bg-gray-md">

		<div class="container">

			<form class="cat-filters row py-4 align-items-center" method="post">

				<div class="col-12 col-lg-2">

					<h2><a id="togglefilters" href="#filters" aria-expanded="true" aria-controls="#filters">Filters:</a></h2>

				</div>

				<div class="col-12 col-lg-2 filtercontrols">

					<div class="form-group">

						<label clafor="sexSelect">Sex</label>
					    <select class="form-control form-control-sm" id="sexSelect" name="sexSelect">
					      <option value="">Select...</option>
					      <option value="Female">Female</option>
					      <option value="Male">Male</option>
					    </select>

					</div>
				</div>
				<div class="col-12 col-lg-2 filtercontrols">

					<div class="form-group">

						<label for="ageSelect">Age</label>
					    <select class="form-control form-control-sm" id="ageSelect" name="ageSelect">
					      <option value="">Select...</option>
					      <option value="Kitten">Kitten</option>
					      <option value="Young">Young</option>
					      <option value="Adult">Adult</option>
					      <option value="Senior">Senior</option>
					    </select>

					</div>

				</div>

				<div class="col-12 col-lg-2 filtercontrols">

					<div class="form-group">

						<label for="colorSelect">color</label>
						<?php
							$catcolors = array(

								"Black (All)",
								"Black (Mostly)",
								"Black &amp; White or Tuxedo",
								"Brown or Chocolate",
								"Brown or Chocolate (Mostly)",
								"Brown Tabby",
								"Calico or Dilute Calico",
								"Cream or Ivory",
								"Cream or Ivory (Mostly)",
								"Gray or Blue",
								"Gray or Blue (Mostly)",
								"Gray, Blue or Silver Tabby",
								"Orange or Red",
								"Orange or Red (Mostly)",
								"Orange or Red Tabby",
								"Spotted Tabby/Leopard Spotted",
								"Tan or Fawn",
								"Tan or Fawn (Mostly)",
								"Tan or Fawn Tabby",
								"Tiger Striped",
								"Tortoiseshell",
								"White",
								"White (Mostly)",

							);
						?>
					    <select class="form-control form-control-sm" id="colorSelect" name="colorSelect">
							<option value="">Select...</option>
							<?php 

								foreach ($catcolors as $key => $value) {
									echo '<option value="'. $value .'">'. $value .'</option>';
								}

							?> 
					    </select>

					</div>

				</div>
				<div class="col-12 col-lg-2 filtercontrols">

					<div class="form-group">

						<label for="hairSelect">Hair Length</label>
					    <select class="form-control form-control-sm" id="hairSelect" name="hairSelect">
					      <option value="">Select...</option>
					      <option value="Short">Short</option>
					      <option value="Medium">Medium</option>
					      <option value="Long">Long</option>            
					    </select>

					</div>

				</div>

				<div class="col-12 col-lg-2 filtercontrols">

					<div class="form-inline row mx-0">

						<input type="hidden" name="catsearch" value="true">

						<button type="submit" class="btn btn-primary w-100">Search</button>

					</div>

				</div><!--col end -->

			</form>
			<?php 
				// if(!empty($_POST)) {

				// 	var_dump($_POST);

				// }

			?>
		</div>

	</section>

	<section class="cats-grid container my-5" id="cats-grid">

		<?php 

			if (isset($_POST["catsearch"]) && !empty($_POST["catsearch"])) {
				
				get_template_part('partials/catgrid', 'filtered'); 

			}else{

				get_template_part('partials/catgrid', 'item'); 

			}


		?>

	</section>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
