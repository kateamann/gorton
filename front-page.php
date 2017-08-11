<?php

/**
 * Front Page HTML markup structure
 *
 * @package   Gorton
 * @since     1.0.0
 * @author    Kate Amann
 * @link      http://kateamann.com
 * @license   GNU General Public License 2.0+
 *
 */
namespace Gorton;

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action( 'genesis_after_header', __NAMESPACE__ . '\home_slider' );
function home_slider() {
	if( function_exists('cyclone_slider') ) cyclone_slider('homepage');
}

//* Add the widgets
add_action( 'genesis_before_footer', __NAMESPACE__ . '\testimonial_widget', 1 );
function testimonial_widget() {
	genesis_widget_area( 'home-footer-testimonial', array(
		'before' => '<div class="testimonial-widget">',
		'after' => '</div>',
	) );
}


genesis();