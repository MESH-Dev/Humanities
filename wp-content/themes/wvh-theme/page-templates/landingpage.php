<?php
/**
 * Template Name: Page - Landing Page
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */
get_header();?>

<?php while (have_posts()) : the_post();

		$page_background_url = get_field('page_background_url');
		$page_background_quote = get_field('page_background_quote');
		$page_heading = get_the_title();
		$page_subheading = get_field('page_subheading');

	echo "<style>
			.jumbotron.landingpage {
				background: url('".$page_background_url."');
				min-height: 400px;
				background-position: right center;
				background-size: cover;
			}</style>";

	echo '<div class="jumbotron landingpage">
	      <div class="container">
			<div class="row">
			        <div class="col-md-3 col-md-offset-9">
			          <div class="jumbotron-caption-container">
			            <div class="jumbotron-caption">'.$page_background_quote.'</div>
			          </div>
			          </div>
			        </div>
			      </div>
			</div>

			<div class="row">
				<div class="col-md-12 landingpage titlebar">
					<div class="container">
					<div class="row">
					<h1>'.$page_heading.'</h1><h4>'.$page_subheading.'</h4>
					</div>
					</div>
					
				</div>
			</div>';
			endwhile;
?>


    <div class="container content-container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
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


					        echo '<div class="col-md-4 col-centered">
										<div class="landingpage-item photobox '.$grid_item_color.'">
						                  <div class="image">
						                  ';
						    if ($flag != "none"){
						                  echo '<div class="ribbon-wrapper">
										    	<div class="ribbon success '.$flag.'">
										        	'.$flag.'
										    	</div>
											</div>';
										}
						    echo '<img src="'.$grid_image_url.'">
						                  </div>
						                  <div class="text">
						                    <h1>'.$grid_item_heading.' &raquo;</h1>
						                    <p>'.$grid_item_text.'</p>
						                    <p>
						                      <a href="'.$grid_item_link_url.'">'.$grid_item_link_text.' &raquo;</a>
						                    </p>
						                  </div>
						                </div>
						        	</div>';
					    endwhile;

					else :

					    // no rows found

					endif;

					?>
		</div> 
        </div>
      </div>
<?php get_footer(); ?>