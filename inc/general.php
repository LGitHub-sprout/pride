<?php
/**
 * General functions.
 *
 * @package pride
 * @subpackage WordPress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register widgetized area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * Using loop per GeneratePress, general.php
 */
if ( ! function_exists( 'pride_widgets_init' ) ) {
	add_action( 'widgets_init', 'pride_widgets_init' );
	/**
	 * Register widgetized areas.
	 * $widget array
	 */
	function pride_widgets_init() {
		$widgets = array(
			'right-sidebar'			=> __( 'Right Sidebar', 'pride' ),
			'top-bar'						=> __( 'Top Bar', 'pride' ),
			);

		foreach ( $widgets as $id => $name )
			register_sidebar( array(
				'name'						=> $name,
				'id'							=> $id,
				'before_widget'		=> '<aside id="new-widget-loop %1$s" class="widget %2$s">',
				'after_widget'		=> '</aside>',
				) );
	}
}
/**
 * Register widgetized area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
// if ( ! function_exists( 'pride_widgets_init' ) ) :
// function pride_widgets_init() {
// register_sidebar( array(
// 	'name'					=> __( 'Right Sidebar', 'pride' ),
// 	'id'						=> 'right-sidebar',
// 	'description'		=> __( 'Widgets in this area show on all posts and pages', 'pride' ),
// 	'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
// 	'after_widget'	=> '</aside>',
// 	//'before_title'	=> '<h2 class="widget-title"',
// 	//'after_widget'	=> '</h2>',
// 	) );
// }
// endif;
// add_action( 'widgets_init', 'pride_widgets_init', 10 );
