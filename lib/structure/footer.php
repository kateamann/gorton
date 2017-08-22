<?php

/**
 * Footer HTML markup structure
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
 * Unregister footer callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_footer_callbacks() {
	remove_action( 'genesis_footer', 'genesis_do_footer' );
}

//* Customize the site footer
add_action( 'genesis_footer', __NAMESPACE__ . '\gorton_footer' );
function gorton_footer() { ?>
	
	<p>&copy; <?php echo date("Y"); ?> <a href="<?php echo get_site_url(); ?>">Gorton House & Cottages</a> &middot; Site by <a href="http://www.kateamann.com" target="_blank">Kate Amann</a></p>
	<?php
}