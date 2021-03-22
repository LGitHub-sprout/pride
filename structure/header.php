<?php
/**
 * Header elements
 * @package pride
 *
 * studied from Generate Press
 * hand coded by Lester
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'pride_top_bar_widget' ) ) {
	//return; // Exit if function doesn't exist.
	add_action( 'pride_before_header', 'pride_top_bar_widget', 5 );
	/**
	 * Load Top Bar Widget
	 */
	function pride_top_bar_widget() {
		if ( ! is_active_sidebar( 'top-bar' ) ) {
			// echo "Default widgets";
		} else {
			dynamic_sidebar( 'top-bar' );
		}
	}
}