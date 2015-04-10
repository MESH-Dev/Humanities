<?php
/**
 * The Default Page Template
 *
**/
get_header();?>

<?php while (have_posts()) : the_post();

		$page_background_url = get_field('page_background_url');
		$page_background_quote = get_field('page_background_quote');
		$page_heading = get_the_title();
		$page_subheading = get_field('page_subheading');

		?>

		<style>
				.jumbotron {
					background: url("<?php echo $page_background_url; ?>");
					min-height: 400px;
					background-position: right center;
					background-size: cover;
				}
		</style>

		<div class="jumbotron">
      <div class="container">
				<div class="row">
	        <div class="col-md-3 col-md-offset-9">
	          <div class="jumbotron-caption-container">
	            <div class="jumbotron-caption"><?php echo $page_background_quote; ?></div>
	          </div>
          </div>
        </div>
      </div>
		</div>

		<div class="titlebar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?php echo $page_heading; ?></h1>
						<h4><?php echo $page_subheading; ?></h4>
					</div>
				</div>
			</div>
		</div>
	</div>

		<?php
		endwhile;
?>


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

				        <div class="landingpage-item photobox <?php echo $sidebar_color; ?>">
									<?php if($sidebar_image_url != "") { ?>

										<div class="image">
											<img src="<?php echo $sidebar_image_url; ?>">
										</div>

									<?php } ?>

									<?php if($sidebar_heading != "") { ?>

										<div class="text">
											<h1><?php echo $sidebar_heading; ?> &raquo;</h1>
											<p><?php echo $sidebar_text; ?><br>
											<a href="<?php echo $sidebar_link_url; ?>"><?php echo $sidebar_link_text; ?></a></p>
										</div>

									<?php } ?>

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
