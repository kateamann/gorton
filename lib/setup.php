<?php

/**
 * Setup the child theme
 *
 * @package   Gorton
 * @since     1.0.0
 * @author    Kate Amann
 * @link      http://kateamann.com
 * @license   GNU General Public License 2.0+
 *
 */
namespace Gorton;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );

/**
 * Setup child theme
 *
 * @since  1.0.0
 * 
 * @return void
 */
function setup_child_theme() {

    // Set Localization
    load_child_theme_textdomain( CHILD_TEXT_DOMAIN, CHILD_THEME_DIR . '/languages' );

    unregister_genesis_callbacks();
    
    add_theme_supports();
    add_new_image_sizes();  
}

/**
 * Unregister Genesis callbacks - because child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
    unregister_menu_callbacks();
    unregister_sidebar_callbacks();
    unregister_footer_callbacks();
    //add each of the unregister structure callbacks here
}

/**
 * Adds theme supports to the site
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_theme_supports() {
    $config = array(
        'html5' => array( 
            'caption', 
            'comment-form', 
            'comment-list', 
            'gallery', 
            'search-form' 
        ),
        'genesis-accessibility' => array( 
            '404-page', 
            'drop-down-menu', 
            'headings', 
            'rems', 
            'search-form', 
            'skip-links' 
        ),
        'genesis-responsive-viewport' => null,
        'custom-header' => array(
            'width'           => 600,
            'height'          => 160,
            'header-selector' => '.site-title a',
            'header-text'     => false,
            'flex-height'     => true,
        ),
        'custom-background' => null,
        'genesis-after-entry-widget-area' => null,
        'genesis-footer-widgets' => 3,
        'genesis-menus'=> array( 
            'primary' => __( 'Primary Navigation Menu', CHILD_TEXT_DOMAIN ), 
            'secondary' => __( 'Feature Menu', CHILD_TEXT_DOMAIN ) 
        ),
        'genesis-structural-wraps', array(
            'header',
            // 'menu-primary',
            'menu-secondary',
            'footer-widgets',
            'footer'
        ),
    );
    
    foreach( $config as $feature => $args ) {
       add_theme_support( $feature, $args ); 
    }

      //* Add Excerpt support to Pages
    add_post_type_support( 'page', 'excerpt' );
    
}


/**
 * Adds new image sizes to the site
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_new_image_sizes() {
    $config = array(
        'featured-image' =>  array(
            'width' => 900, 
            'height' => 500, 
            'crop' => TRUE,
        ),
    );
    
    foreach( $config as $name => $args ) {
        $crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;
        add_image_size( $name, $args['width'], $args['height'], $crop );
    }
}


add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );

/**
 * Sets theme setting defaults
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function set_theme_settings_defaults( array $defaults ) {
    $config = get_theme_settings_defaults();
    $defaults = wp_parse_args( $config, $defaults );
    
    return $defaults;
}


add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );

/**
 * Updates theme setting defaults
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults() {
    
    $config = get_theme_settings_defaults();

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( $config );

	}

	update_option( 'posts_per_page', $config['blog_cat_num'] );
    
}


/**
 * Get the theme settings defaults
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_theme_settings_defaults() { 
    return array(
			'blog_cat_num'              => 6,
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		);
}