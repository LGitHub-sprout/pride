<?php
/**
 * Post meta elements
 *
 * @package Pride 0.1
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Output post-meta
 *
 * couldn't get avatar inside function
 * couldn't get time() to move after posted-by
 * 
 * @since 0.1 pride
 *
 */
if ( ! function_exists( 'pride_post_meta' ) ) {
	add_action( 'pride_after_entry_title', 'pride_post_meta', 10 );

	function pride_post_meta() { 

		echo get_avatar( get_the_author_meta( 'ID' ), 42 );

		echo apply_filters( 'pride_post_meta_output', 

			sprintf( '<span style="color:red;" class="entry-meta"> %1$s</span>', 

				sprintf( '<span class="posted-by">%1$s %2$s</span><span class="posted-on">%3$s</span>', 

					__( 'Written by', 'pride' ),
					get_the_author_posts_link(),

					__( ' on ', 'pride' )
				)
		) ); the_time( 'F j, Y' );
	}
}










