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

      <?php get_template_part('partials/sidebar', 'boxes'); ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
