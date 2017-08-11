<?php

/**
 * Single accommodation entry template
 *
 * @package   Gorton
 * @since     1.0.0
 * @author    Kate Amann
 * @link      http://kateamann.com
 * @license   GNU General Public License 2.0+
 *
 */
namespace Gorton;  

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_before_entry', __NAMESPACE__ . '\display_accom_image' );
function display_accom_image() {
	if ( ! has_post_thumbnail() ) {
		return;
	}
	// Display featured image above content
	echo '<div class="singular-featured-image">';
		genesis_image( array( 'size' => 'featured-image' ) );
	echo '</div>';
} 

// add_action( 'genesis_before_entry', __NAMESPACE__ . '\display_slider_gallery' );
// function display_slider_gallery() {
// } 

add_action( 'genesis_before_sidebar_widget_area', __NAMESPACE__ . '\display_floorplan' );
function display_floorplan() {
	
	$image = get_field('floorplan_image');
	$size = 'full'; 

	if( $image ) {

		echo '<div class="floorplan-image">';
			echo wp_get_attachment_image( $image, $size );
		echo '</div>';
	}	
}  


add_action( 'genesis_after_entry_content', __NAMESPACE__ . '\display_rates' );
function display_rates() {

		echo '<div class="rates-table"><h2>Rates</h2>';
			echo do_shortcode( get_field('rates_table') );
		echo '</div>';
}              


genesis();