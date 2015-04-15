<?php
/**
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */

if (!isset($content_width)) $content_width = 770;

/**
 * upbootwp_setup function.
 *
 * @access public
 * @return void
 */
function upbootwp_setup() {

	require 'inc/general/class-Upbootwp_Walker_Nav_Menu.php';

	load_theme_textdomain('upbootwp', get_template_directory().'/languages');

	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'topmenu' => __( 'Top Menu', 'Top Menu' ),
		'mainmenu' => __( 'Main Menu', 'Main Menu' ),
	) );


}

add_action( 'after_setup_theme', 'upbootwp_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function upbootwp_widgets_init() {
	register_sidebar(array(
		'name'          => __('Sidebar','upbootwp'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'upbootwp_widgets_init' );

function wvhc_widgets_init() {

	register_sidebar( array(
		'name' => 'Footer Left',
		'id' => 'footer_left',
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => 'Footer Center',
		'id' => 'footer_center',
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => 'Footer Right',
		'id' => 'footer_right',
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => 'Calendar Widget',
		'id' => 'calendar_widget',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}

add_action( 'widgets_init', 'wvhc_widgets_init' );

function upbootwp_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css', array(), '1.1');
	wp_enqueue_style( 'wvh-css', get_template_directory_uri().'/css/style.css', array(), '1.1');
	wp_enqueue_script( 'upbootwp-basefile', get_template_directory_uri().'/js/bootstrap.min.js',array( 'jquery' ));
	wp_enqueue_script( 'wvh-js', get_template_directory_uri().'/js/humanities.js', array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'upbootwp_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory().'/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory().'/inc/jetpack.php';


class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= $item->url;

				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}
function calendar_widgets_init() {

	register_sidebar( array(
		'name' => 'Calendar Sidebar',
		'id' => 'calendar_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'calendar_widgets_init' );

function add_external_calendar_events() {

		$servername = "localhost";
		$username = "mesh";
		$password = "Wasd1234!";
		$dbname = "wvhc_filemaker";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM events where wp_id is null";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {

					$id = $row["ID"];
					$eventID = $row["EventID"];
					$title = $row["Title"];
					$dateStart = $row["DateStart"];
					$dateEnd = $row["DateEnd"];
					$time = $row["Time"];
					$description = $row["Description"];
					$venue = $row["Venue"];
					$venueStreet1 = $row["VenueStreet1"];
					$venueStreet2 = $row["VenueStreet2"];
					$venueCity = $row["VenueCity"];
					$venueState = $row["VenueState"];
					$venueZip = $row["VenueZip"];
					$venueContact = $row["VenueContact"];
					$venueEmail = $row["VenueEmail"];
					$venuePhone = $row["VenuePhone"];
					$venueURL = $row["VenueURL"];
					$programType = $row["ProgramType"];
					$filename = $row["Filename"];

					// Create post object
					$my_post = array(
					'post_title'    => $title,
					'post_content'  => $description,
					'post_status'   => 'publish',
					'post_type' => 'tribe_events'
					);

					// Insert the post into the database
					$post_id = wp_insert_post( $my_post );

					// VENUE

					$dateStart = $dateStart . " " . $time;

					update_post_meta($post_id, "_EventStartDate", $dateStart);
					update_post_meta($post_id, "_EventEndDate", $dateEnd);

					// Update the external database with the new post ID
					$conn->query("UPDATE events set wp_id = $post_id where ID = $id");

					// Check if event location exists

					if (strlen($venue) > 0) {

						global $wpdb;
						$r = $wpdb->get_results ( "SELECT ID FROM  $wpdb->posts WHERE post_title = '".$venue."'" );

						if(count($r) <= 0) {

								$new_venue = array(
									'post_title' => $venue,
									'post_status' => 'publish',
									'post_type' => 'tribe_venue',
									''
								);

								$venue_id = wp_insert_post($new_venue);

								update_post_meta($venue_id, "_VenueVenue", $title);
								update_post_meta($venue_id, "_VenueAddress", $venueStreet1);
								update_post_meta($venue_id, "_VenueCity", $venueCity);
								update_post_meta($venue_id, "_VenueStateProvince", $venueState);
								update_post_meta($venue_id, "_VenueZip", $venueZip);
								update_post_meta($venue_id, "_VenueCountry", "United States");

								update_post_meta($venue_id, "_VenueURL", $venueURL);
								update_post_meta($venue_id, "_VenuePhone", $venuePhone);

								update_post_meta($post_id, "_EventVenueID", $venue_id);

						} else {

							  foreach($r as $row1) {
									update_post_meta($post_id, "_EventVenueID", $row1->ID);
								}


						}
					}

					if (strlen($venueContact) > 0) {

						global $wpdb;
						$r = $wpdb->get_results ( "SELECT ID FROM  $wpdb->posts WHERE post_title = '".$venueContact."'" );

						if(count($r) <= 0) {

								$new_contact = array(
									'post_title' => $venueContact,
									'post_status' => 'publish',
									'post_type' => 'tribe_organizer'
								);

								$contact_id = wp_insert_post($new_contact);

								update_post_meta($contact_id, "_OrganizerWebsite", $venueURL);
								update_post_meta($contact_id, "_OrganizerEmail", $venueEmail);
								update_post_meta($contact_id, "_OrganizerPhone", $venuePhone);

								update_post_meta($post_id, "_EventOrganizerID", $contact_id);

						} else {

							  foreach($r as $row1) {
									update_post_meta($post_id, "_EventOrganizerID", $row1->ID);
								}


						}

					}


		    }
		} else {

		}
		$conn->close();

}
