<?php

/**
 * Accommodation archive template
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

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );

/**
 * Archive Post Class
 * @since 1.0.0
 *
 * Breaks the posts into three columns
 * @link http://www.billerickson.net/code/grid-loop-using-post-class
 *
 * @param array $classes
 * @return array
 */
function be_home_post_class( $classes ) {
	global $wp_query;
	if( ! $wp_query->is_main_query() )
		return $classes;
		
	$classes[] = 'one-third';
	if( 0 == $wp_query->current_post % 3 )
		$classes[] = 'first';
	return $classes;
}
add_filter( 'post_class', __NAMESPACE__ . '\be_home_post_class' );

add_action( 'genesis_entry_content', __NAMESPACE__ . '\accom_desc' );

function accom_desc() {
    echo '<p>Sleeps '. genesis_get_custom_field('accom_max_occupancy') . '</p>';
    echo '<p>'. genesis_get_custom_field('accom_list_desc') . '</p>';
    echo '<p><small>Starting at £'. genesis_get_custom_field('accom_starting_price') . ' per week</small></p>';
}

genesis();