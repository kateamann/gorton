<?php

/**
* Menu HTML markup structure
*
* @package   Gorton
* @since     1.0.0
* @author    Kate Amann
* @link      http://kateamann.com
* @license   GNU General Public License 2.0+
*
*/
namespace Gorton;

/**
 * Unregister menu callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_menu_callbacks() {
    remove_action( 'genesis_after_header', 'genesis_do_subnav' );
    remove_action( 'genesis_after_header', 'genesis_do_nav' );
}

// Reposition the primary navigation menu.

add_action( 'genesis_header', 'genesis_do_nav', 15 );

// Reposition the secondary navigation menu
add_action( 'genesis_before_header', 'genesis_do_subnav', 5 );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\setup_secondary_menu_args' );

/**
 * Reduce the secondary navigation menu to one level depth.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function setup_secondary_menu_args( array $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;
}