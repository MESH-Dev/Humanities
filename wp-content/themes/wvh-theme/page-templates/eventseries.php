<?php
/**
 * Template Name: Page - Event Series
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
			.jumbotron.littlelectures {
				background: url('".$page_background_url."');
				min-height: 400px;
				background-position: right center;
				background-size: cover;
			}</style>";

	echo '<div class="jumbotron littlelectures">
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
				<div class="col-md-12 littlelectures titlebar">
					<div class="container">
					<div class="row">
					<h1>'.$page_heading.'</h1><h4>'.$page_subheading.'</h4>
					</div>
					</div>
					
				</div>
			</div>';
?>


    <div class="container content-container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4 clarendonlinks">
			<?php the_content(); ?>
        </div>
        <div class="col-md-8">
          <h1 class="eventseries"><?php echo get_field('events_list_title'); ?></h1>

<?php 

$events_list = get_field('events_list');

if( $events_list ): ?>

	<?php foreach( $events_list as $e ):

		$title = get_field('title', $e->ID);
		$event_type = get_field('event_type', $e->ID);
		$datestart = get_field('datestart', $e->ID);
		$dateend = get_field('dateend', $e->ID);
		$time = get_field('time', $e->ID);
		$description = get_field('description', $e->ID);
		$venue = get_field('venue', $e->ID);
		$filename = get_field('filename', $e->ID);

		$date_display  = strtotime($datestart);
		$date_display_day   = date('d',$date_display);
		$date_display_month = date('M',$date_display);

	    	//echo '<a href="'.get_permalink( $p->ID ).'">'.get_the_title( $p->ID ).'</a>';

	    	echo '<div class="littlelectures-item">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-1">
			              <div class="datebox">
			                <span class="month">'.$date_display_month.'</span>
			                <span class="day">'.$date_display_day.'</span>
			              </div>
			            </div>
			            <div class="col-md-3">
			                <div class="littlelectures-thumbnail">
			                  <img src="'.$filename.'">
			                </div>
			            </div>
			            <div class="col-md-8">
			              <div class="description">
			                <h2>'.$title.'</h2>
			                <h3 class="h3bold">'.$event_type.'</h3>
			                <p>'.$description.'</p>
			              </div>

			            </div>
			          </div> 
			          </div>        
			        </div>';



 endforeach;
 endif;
 endwhile;
?>
					        


        




        
               </div> 
        </div>
      </div>
<?php get_footer(); ?>