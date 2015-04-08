<?php 
/**
 * Template Name: Page - Homepage
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="container content-container">
      <div class="row">
        <div class="col-md-6 home-left-half">
          <div class="home-left-caption">
          <?php

					// check if the repeater field has rows of data
					if( have_rows('homepage_side_background') ):

					 	// loop through the rows of data
					    while ( have_rows('homepage_side_background') ) : the_row();

					        // display a sub field value
					        $image = get_sub_field('image');
					        $banner_caption_top = get_sub_field('banner_caption_top');
					        $banner_caption_bottom = get_sub_field('banner_caption_bottom');
					        echo "<style>
					        		.home-left-half{
										background: url('".$image."') no-repeat;
										display: block;
										height: 100%;
										width: 46%;
										background-size: cover;
										background-position: center center;
										position: fixed;
										top: 0px;
										left: 0px;
										clear: both;
										margin-right: 10px;
									}
					        		</style>";
					        echo '<div class="banner-caption-top">'.$banner_caption_top.'</div>
						            <div class="banner-caption-bottom">'.$banner_caption_bottom.'</div>
					        ';
					    endwhile;

					else :

					    // no rows found

					endif;

					?>
            
          </div>
        </div>
        <div class="col-md-6 home-right-half">
          <div class="row">
            <div class="col-md-6">
              <div class="row">

                <?php

					// check if the repeater field has rows of data
					if( have_rows('homepage_items_col_1') ):

					 	// loop through the rows of data
					    while ( have_rows('homepage_items_col_1') ) : the_row();

					        // display a sub field value
							$block_type = get_sub_field('block_type');
					        $content_type = get_sub_field('content_type');
					        $image = get_sub_field('image');
					        $title = get_sub_field('title');
					        $description = get_sub_field('description');
					        $link_address = get_sub_field('link_address');
					        $link_text = get_sub_field('link_text');

					        echo '<div class="homepage-item '.$block_type.' '. $content_type.'">';

					        if ($block_type == "caption"){

					        	echo '<div class="image">
					                    <img src="'.$image.'">
					                  </div>
					                  <div class="text">
					                    '.$title.'
					                  </div>
					                </div>';
					        }
					        if ($block_type == "photobox"){

			                  echo '<div class="image">
			                    		<img src="'.$image.'">
					                </div>
					                <div class="text">
					                  <h1>'.$title.' &raquo;</h1>
					                  <p>'.$description.' <br><a href="'.$link_address.'">'.$link_text.' &raquo;</a></p>
					                </div>
			                	    </div>';
			            	}
			            	if ($block_type == "color"){

			                  echo '<div class="text">
					                  <h1>'.$title.' &raquo;</h1>
					                  <p>'.$description.' <br><a href="'.$link_address.'">'.$link_text.' &raquo;</a></p>
					                </div>
			                	    </div>';
			            	}



					    endwhile;

					else :

					    // no rows found

					endif;

					?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                
                
					<?php

					// check if the repeater field has rows of data
					if( have_rows('homepage_items_col_2') ):

					 	// loop through the rows of data
					    while ( have_rows('homepage_items_col_2') ) : the_row();

					        // display a sub field value
							$block_type = get_sub_field('block_type');
					        $content_type = get_sub_field('content_type');
					        $image = get_sub_field('image');
					        $title = get_sub_field('title');
					        $description = get_sub_field('description');
					        $link_address = get_sub_field('link_address');
					        $link_text = get_sub_field('link_text');

					        echo '<div class="homepage-item '.$block_type.' '. $content_type.'">';

					        if ($block_type == "caption"){

					        	echo '<div class="image">
					                    <img src="'.$image.'">
					                  </div>
					                  <div class="text">
					                    '.$title.'
					                  </div>
					                </div>';
					        }
					        if ($block_type == "photobox"){

			                  echo '<div class="image">
			                    		<img src="'.$image.'">
					                </div>
					                <div class="text">
					                  <h1>'.$title.'</h1>
					                  <p>'.$description.' <br><a href="'.$link_address.'">'.$link_text.' &raquo;</a></p>
					                </div>
			                	    </div>';
			            	}
			            	if ($block_type == "color"){

			                  echo '<div class="text">
					                  <h1>'.$title.'</h1>
					                  <p>'.$description.' <br><a href="'.$link_address.'">'.$link_text.' &raquo;</a></p>
					                </div>
			                	    </div>';
			            	}



					    endwhile;

					else :

					    // no rows found

					endif;

					?>
					<?php endwhile; // end of the loop. ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
					
				
<?php get_footer(); ?>