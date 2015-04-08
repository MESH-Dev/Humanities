<nav class="navbar navbar-default navbar-bottom" role="navigation">
	<div class="footer-container">
	    <div class="row">
		    <div class="container">
		        <div class="col-md-3">
		        <?php if ( is_active_sidebar( 'footer_left' ) ) : dynamic_sidebar( 'footer_left' ); endif; ?>
		        		
		        </div>
		        <div class="col-md-3 middle">
		        <?php if ( is_active_sidebar( 'footer_center' ) ) : dynamic_sidebar( 'footer_center' ); endif; ?>
				       
		        </div>
		        <div class="col-md-6">
		        <?php if ( is_active_sidebar( 'footer_right' ) ) : dynamic_sidebar( 'footer_right' ); endif; ?>
			        	
		        </div>
		    </div>
	    </div>
	</div>
</nav>
<?php wp_footer(); ?>
</body>
</html>
