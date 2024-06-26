<?php

/**
 * Sidebar/widgetised area HTML markup structure
 *
 * @package   Gorton
 * @since     1.0.0
 * @author    Kate Amann
 * @link      http://kateamann.com
 * @license   GNU General Public License 2.0+
 *
 */
namespace Gorton;

function unregister_sidebar_callbacks() {
    unregister_sidebar( 'header-right' );
}

add_action( 'genesis_setup', __NAMESPACE__ . '\register_widget_areas', 15 );
/**
 * Register Homepage widget areas
 *
 * @since  1.0.0
 *
 * @return void
 */
function register_widget_areas() {
	$widget_areas = array(
		array(
			'id'          => 'home-feature-left',
			'name'        => __( 'Home Feature Left', CHILD_THEME_NAME ),
			'description' => __( 'Home left side featured link', CHILD_THEME_NAME ),
		),
		array(
			'id'          => 'home-feature-right',
			'name'        => __( 'Home Feature Right', CHILD_THEME_NAME ),
			'description' => __( 'Home right side featured link', CHILD_THEME_NAME ),
		),
	);
	foreach ( $widget_areas as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}