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


add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );

// Change sidebar to secondary
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
add_action( 'genesis_sidebar', 'genesis_do_sidebar_alt' );

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
    

genesis();