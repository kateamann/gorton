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
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


add_action( 'genesis_after_loop', __NAMESPACE__ . '\home_accommodation_list', 1 );


function home_accommodation_list() {
	$args = array(
		'post_type' => 'hb_accommodation', 
		'posts_per_page' => 5,
	);

	$loop = new \WP_Query( $args ); 


	if( $loop->have_posts() ) { ?>

	<h2>Our Cottages</h2>
	<div class="home-accom-loop">

	<?php
	while( $loop->have_posts() ): $loop->the_post(); ?>

		<div class="cottage-link">
			<a class="cottage-image-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<div class="feature-as-background">
				<?php the_post_thumbnail( 'featured-image' ); ?>
			</div>
			<div class="cottage-feature-link">
				<h3> <?php the_title(); ?> </h3>
				<p>Sleeps <?php echo genesis_get_custom_field('accom_max_occupancy'); ?> • from £<?php echo genesis_get_custom_field('accom_starting_price'); ?> per week</p>
			</div>
			</a>
		</div>

		<?php
	endwhile;
	} 
	
	wp_reset_query();
}



//* Add the widgets

add_action( 'genesis_after_content_sidebar_wrap', __NAMESPACE__ . '\gorton_home_feature_widgets', 5 );
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

genesis();