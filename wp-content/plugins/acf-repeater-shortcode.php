<?php
/*
Plugin Name: Advanced Custom Fields: Repeater Field Shortcodes
Plugin URI: http://github.com/fahrenheitmarketing/acf-repeater-shortcodes
Description: Adds shortcodes for the ACF repeater addon
Version: 1.0
Author: Jacob Williams
Author URI: http://www.iakob.com/
License: GPL
Copyright: Jacob Williams
*/

/*

This Wordpress Module adds shortcode support for the acf-repeater (paid) add-on for Advanced Custom Fields

It adds three shortcodes for using repeaters:

acf_repeater

[acf_repeater field="<fieldname>" (post_id="<post_id>" separator="<separator>")]..\[/acf_repeater]

Renders contents for each item in repeater list. Optional separator can be placed between each of the items. Optional post_id parameter defaults to the current post.

acf_sub_field

[acf_sub_field field="<subfieldname>" (autop="true")]

Renders a subfield of the surrounding acf_repeater shortcode. Optional autop applies wpautop to the contents of the subfield.

acf_sub_repeater

[acf_sub_repeater field="<fieldname>" (separator="<separator>")]..[/acf_sub_repeater]

Renders a repeater which is a subfield of another repeater. Necessary as I do not believe the shortcode parser in WP can have a shortcode embedded within a shortcode of the same name.

*/
add_shortcode( 'acf_repeater', 'acf_repeater_shortcode' );
add_shortcode( 'acf_sub_repeater', 'acf_repeater_shortcode' );
function acf_repeater_shortcode($atts, $content, $tag) {
  $defaults = array(
    'post_id' => null,
    'separator' => '',
    'field' => null,
  );
  $params = array_merge( $defaults, $atts );
  if (!$params['field']) {
    return "";
  }
  $output = array();
  if ( $tag === 'acf_repeater'
      ? get_field( $params['field'], $params['post_id'] )
      : get_sub_field( $params['field'] ) ) {
    while ( has_sub_field( $params['field'], $params['post_id'] ) ) {
      $output[] = do_shortcode( $content );
    }
  }
  return implode( $params['separator'], $output );
}
add_shortcode( 'acf_sub_field', 'acf_sub_field_shortcode' );
function acf_sub_field_shortcode($atts, $content, $tag) {
  if (!isset($atts['field'])) {
    return "";
  }
  $autop = isset($atts['autop']);
  $output = get_sub_field($atts['field']);
  return $autop ? wpautop($output) : $output;
}
?>