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

//* Remove the entry header
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Add the widgets

add_action( 'genesis_after_content_sidebar_wrap', __NAMESPACE__ . '\gorton_home_feature_widgets' );
function gorton_home_feature_widgets() {
	genesis_widget_area( 'home-feature-left', array(
		'before' => '<div class="home-widgets home-left one-half first widget-area">',
		'after' => '</div>',
	) );
	genesis_widget_area( 'home-feature-right', array(
		'before' => '<div class="home-widgets home-right one-half widget-area">',
		'after' => '</div>',
	) );
}


add_action( 'genesis_before_footer', __NAMESPACE__ . '\testimonial_widget', 1 );
function testimonial_widget() {
	genesis_widget_area( 'home-footer-testimonial', array(
		'before' => '<div class="testimonial-widget">',
		'after' => '</div>',
	) );
}


genesis();