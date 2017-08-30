<?php

/**
 * tinyMCE Custom Styles
 *
 * @package   Gorton
 * @since     1.0.0
 * @author    Kate Amann
 * @link      http://kateamann.com
 * @license   GNU General Public License 2.0+
 *
 */
namespace Gorton;

add_filter( 'mce_buttons_2', __NAMESPACE__ . '\my_mce_buttons_2' );
/**
 * Add the Styles dropdown to the TinyMCE editor
 *
 * @since 1.0.0
 *
 * @return void
 */
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\my_mce_before_init' );
/**
 * Populate the Styles dropdown in TinyMCE with custom style
 *
 * @since 1.0.0
 *
 * @return void
 */
function my_mce_before_init( $settings ) {

    $style_formats = array(
        array(
        	'title' => 'Feature Text',
        	'block' => 'p',
        	'classes' => 'feature-text'
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
