<?php
/**
 * The Default Page Template
 *
**/
get_header();?>

<?php get_template_part('partials/header', 'jumbotron'); ?>

<div class="container content-container">
  <!-- Example row of columns -->
  <div class="row">

    <div class="col-md-8">
			<?php the_content(); ?>
		</div>

    <div class="col-md-4">

			<?php

				// check if the repeater field has rows of data
				if( have_rows('sidebar_boxes') ):

				 	// loop through the rows of data
				    while ( have_rows('sidebar_boxes') ) : the_row();

				        // display a sub field value
						$sidebar_image_url = get_sub_field('sidebar_image_url');
						$sidebar_heading = get_sub_field('sidebar_heading');
						$sidebar_text = get_sub_field('sidebar_text');
						$sidebar_link_url = get_sub_field('sidebar_link_url');
						$sidebar_link_text = get_sub_field('sidebar_link_text');
						$sidebar_color = get_sub_field('sidebar_color');

						?>

				        <div class="photobox <?php echo $sidebar_color; ?>">
                  <div class="landingpage-item">
  									<?php if($sidebar_image_url != "") { ?>

  										<div class="image">
  											<img src="<?php echo $sidebar_image_url; ?>">
  										</div>

  									<?php } ?>

  									<?php if($sidebar_heading != "") { ?>

  										<div class="text">
  											<h1><?php echo $sidebar_heading; ?></h1>
  											<p><?php echo $sidebar_text; ?></p>
  											<p><a href="<?php echo $sidebar_link_url; ?>"><?php echo $sidebar_link_text; ?></a></p>
  										</div>

  									<?php } ?>
                  </div>
                </div>

						<?php

				    endwhile;

				else :

				    // no rows found

				endif;
		  ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
