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

					<?php if($page_background_quote != "") { ?>

						<div class="col-md-3 col-md-offset-9">
		          <div class="jumbotron-caption-container">
		            <div class="jumbotron-caption"><?php echo $page_background_quote; ?></div>
		          </div>
	          </div>

					<?php } ?>
					
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
