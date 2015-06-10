<div class="footer-container">
  <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="footer-block">
            <img src="<?php echo get_template_directory_uri(); ?>/img/online-catalog.png" class="alignleft">
        		<p>Get your West Virginia Encyclopedia and DVD in our <a href="<?php echo get_permalink( get_page_by_id(275) ) ?>" target="_blank">Online Store &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-3 middle">
          <div class="footer-block">
            <ul>
  	        	<li><a href="http://www.wvencyclopedia.org/" target="_blank">e-WV: The West Virginia Encyclopedia &raquo;</a></li>
  	        	<li><a href="<?php echo get_permalink( get_page_by_id(267) ); ?>">Our Historic House &raquo;</a></li>
  	        	<li><a href="<?php echo get_permalink( get_page_by_id(221) ); ?>">Contact Us &raquo;</a></li>
  	        </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="footer-block last">
            <span class="footer-address">West Virginia Humanities Council<br/>1310 Kanawha Blvd. E, Charleston, West Virginia  25301</span>
          	<span class="footer-phone">304-346-8500 (T) | 304-346-8504 (F)</span>
          </div>
          <div class="search-form">
            <?php get_search_form( ); ?>
          </div>
        </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
