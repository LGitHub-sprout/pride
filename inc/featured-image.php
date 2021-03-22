<?php
/**
 * Featured image elements.
 *
 * @package pride
 */

if( ! defined( 'ABSPATH' ) ) {
	return; // Exit if accessed directly.
}

 /**
 * Prints Featured Image to Posts (and pages?)
 *
 * Studied from GeneratePress theme.
 * Modified and coded by Lester.
 *
 * @since 0.1
 *
 * @hooked pride_featured_image_default_size
 */
if ( ! function_exists( 'pride_featured_image' ) ) :
		function pride_featured_image() {
			if ( ! has_post_thumbnail() ) {
				return; // If there's no featured image, return.
			}
			echo apply_filters( 'pride_featured_image_output', 
				sprintf(
				'<figure id="post-image" itemprop="image" class="align-right">
					<a href="%1$s">
						%2$s
					</a>
				</figure>',
				
				esc_url( get_permalink() ),

				get_the_post_thumbnail( get_the_ID(), 
					apply_filters( 'pride_featured_image_default_size', 'medium_large' ) )
				) );
		}
	endif;
		add_action( 'pride_after_comments_popup_link', 'pride_featured_image', 10 );



















