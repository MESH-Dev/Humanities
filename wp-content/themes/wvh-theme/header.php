<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'before' ); ?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
						<div class="top-nav">
							<?php wp_nav_menu( array( 'theme_location' => 'topmenu' ) ); ?>
						</div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-md-12 logobox menu">
					<div class="main-nav">
						<div class="navbar-header">
							<a href="<?php echo home_url(); ?>" class="navbar-brand">
								<img src="<?php bloginfo('template_directory');?>/img/wvhc-logo.png">
							</a>
						</div>
			    	<div id="navbar" class="navbar-collapse collapse">
			    		<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'nav navbar-nav', 'walker' => new wp_bootstrap_navwalker() ) ); ?>
			    		<a href="http://www.wvencyclopedia.org/" target="_blank" class="ewv-link">e-WV</a>
          	</div><!--/.nav-collapse -->

					</div>
	    	</div>
	    </div>





	</div>
</nav>
