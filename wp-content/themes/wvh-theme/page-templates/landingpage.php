<?php
/**
 * Template Name: Page - Landing Page
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */
get_header();?>

<?php get_template_part('partials/header', 'jumbotron'); ?>

	<div class="container content-container">
	  <!-- Example row of columns -->
	  <div class="row">

			<?php

				// check if the repeater field has rows of data
				if( have_rows('grid_items') ):

				 	// loop through the rows of data
				    while ( have_rows('grid_items') ) : the_row();

				        // display a sub field value
							$grid_image_url = get_sub_field('grid_image_url');
							$flag = get_sub_field('flag');
							$grid_item_heading = get_sub_field('grid_item_heading');
							$grid_item_text = get_sub_field('grid_item_text');
							$grid_item_link_url = get_sub_field('grid_item_link_url');
							$grid_item_link_text = get_sub_field('grid_item_link_text');
							$grid_item_color = get_sub_field('grid_item_color');

							?>

							<?php if($grid_item_heading != "") { ?>

					      <div class="col-md-4">
									<div class="photobox <?php echo $grid_item_color; ?>">
										<div class="landingpage-item">
		                  <div class="image">

								  		<?php if ($flag != "none") { ?>

												<div class="ribbon-wrapper">
										    	<div class="ribbon success <?php echo $flag; ?>">
												    <?php echo $flag; ?>
										    	</div>
												</div>

											<?php } ?>

												<?php if($grid_image_url != "") { ?>
													<img src="<?php echo $grid_image_url; ?>">
												<?php } ?>

		                  </div>

											<div class="text">

												<h1><?php echo $grid_item_heading; ?></h1>

		                    <p><?php echo $grid_item_text; ?></p>
		                    <p>
		                      <a href="<?php echo $grid_item_link_url; ?>"><?php echo $grid_item_link_text; ?></a>
		                    </p>
		                  </div>
										</div>
	                </div>
			        	</div>

							<?php } ?>

							<?php

				    endwhile;

				else :

				    // no rows found

				endif;

			?>

    </div>
  </div>
<?php get_footer(); ?>
