<?php

/**
 * Comments HTML markup structure
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
 * Unregister comments callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_comments_callbacks() {

}

add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar' );

/**
 * Modify size of the Gravatar in the entry comments.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return mixed
 */
function setup_comments_gravatar( array $args ) {

	$args['avatar_size'] = 60;

	return $args;
}