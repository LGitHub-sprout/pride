<?php
/**
 * Builds our Customizer controls.
 *
 * https://premium.wpmudev.org/blog/wordpress-theme-customizer-guide/
 * https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
 * https://codex.wordpress.org/Theme_Customization_API#Adding_a_New_Section
 * https://gist.github.com/danielpataki/cbea8009110a48b5021725c0cd0ae323
 *
 * @package pride
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// sections, settings and controls

// sections
// represent the navigation within the Customizer.
// defining a sectin creates a new entry in customizer navigation.

// controls
// visual elements, user interface, that allow settings manipulation.
// may be input fields, text areas, color selectors, other types of controls for UX

// settings
// represent the data that our theme accepts and uses.
// create controls to allow users to manipulate settings easily.
// informs WP our theme will be using value that can be modified by user.


add_action( 'customize_register', 'pride_customizer_settings' );
	function pride_customizer_settings( $wp_customize ) {

		// adds a section:  $wp_customize->add_section
		$wp_customize->add_section( 'pride_colors', array(
			'title'			=> __( 'Visible Section Name', 'pride' ),
			'priority'	=> 30,

		//$wp_customize->add_setting( )

			) );

	}