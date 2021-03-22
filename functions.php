<?php
/**
 * Pride functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage pride
 * @since 0.1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'pride_setup_theme' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
 *
 * @since pride 0.1.0
 */
	function pride_setup_theme() {

		add_theme_support( 'editor-color-palette', array(
			array(
				'name'	=> __( 'strong magenta', 'themeLangDomain' ),
				'slug'	=> 'strong-magenta',
				'color'	=>'#a156b4',
				) ) );

		// https://wordpress.org/support/article/post-formats/
		add_theme_support( 'post-formats',
			['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat']
		);

		// https://codex.wordpress.org/Post_Thumbnails
		add_theme_support( 'post-thumbnails' );
		//set_post_thumbnail_size( 50, 50, true );
		//set_post_thumbnail_size( 169, 999, true );


		// https://codex.wordpress.org/Custom_Backgrounds
		add_theme_support( 'custom-background' );

		/**
		 * https://codex.wordpress.org/Function_Reference/register_default_headers
		 * must register the header image before it can be used as a default in theme
		 * https://codex.wordpress.org/Custom_Headers
		 */
		 register_default_headers( array(
			'graffiti'	=> array(
				'url'						=> '%s/images/graffiti-bg.jpg',
				'thumbnail_url'	=> '%s/images/graffiti-bg.jpg',
				'description'		=> __( 'Graffiti', 'pride' )
			),
		) );
		// https://codex.wordpress.org/Custom_Headers
		$defaults = array(
			'default-image'						=> get_template_directory_uri() . '/images/graffiti-bg.jpg',
			// comment out due to cropping error in customizer, image upload
			// https://wordpress.org/support/topic/there-has-been-an-error-cropping-your-image-5/
			// 'width'									=> 1100,
			// 'height'									=> 300,
			'flex-height'							=> false,
			'flex-width'							=> true,
			'uploads'									=> false,
			'random-default'					=> false,
			'header-text'							=> true,
			'default-text-color'			=> '',
			'wp-head-callback'				=> '',
			'admin-head-callback'			=> '',
			'admin-preview-callback'	=> '',
			);
		add_theme_support( 'custom-header', $defaults );

		// https://codex.wordpress.org/Theme_Logo
		add_theme_support( 'custom-logo' );

		// https://codex.wordpress.org/Automatic_Feed_Links
		add_theme_support( 'automatic-feed-links' );

		// https://codex.wordpress.org/Theme_Markup
		add_theme_support( 'html5',
			['comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ]);

		// https://codex.wordpress.org/Title_Tag
		add_theme_support( 'title-tag' );

		// https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
		add_theme_support( 'customize-selective-refresh-widgets' );

		register_nav_menus( array(
			'primary_menu'	=> __( 'Primary Menu', 'pride' ),
			'social_menu'		=> __( 'Social Menu', 'pride' ),
			) );

		add_theme_support( 'starter-content' );
	}
endif;
add_action( 'after_setup_theme', 'pride_setup_theme', 10 );

/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 */
function wpdocs_custom_taxonomies_terms_links() {
    // Get post by post ID.
    if ( ! $post = get_post() ) {
        return '';
    }
 
     // Get post type by post.
    $post_type = $post->post_type;
 
    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
            $out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "\n</ul>\n";
        }
    }
    return implode( '', $out );
}

/** 
 * Never knew about wp_meta 
 * adds link to Sidebar Meta Widget
 * example from 
 *
 * @link https://developer.wordpress.org/reference/functions/wp_meta/
 *
 * todo: use sprint()
 */ 
if ( ! function_exists( 'pride_my_fav_link' ) ) :
	function pride_my_fav_link() {
		echo '<li><a href="http://www.example.com">' . __( 'My Favourite Link', 'pride' ) . '</a></li>';
	}
	endif;
add_action( 'wp_meta', 'pride_my_fav_link', 10 );

/**
 * Load Theme structure
 */
require get_template_directory() . '/inc/featured-image.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/post-meta.php';
require get_template_directory() . '/inc/general.php';

require get_template_directory() . '/structure/header.php';

/**
 * Customizing Read More [&hellip]
 * from zac gordon udemy tuts, see also notes below
 * just adding function w nothing in it removes ugly square brackets (clapping sound)
 * 
 * see generatepress inc/structure/post-meta.php 
 *
 * need global $post since $param is $more_string (string)
 *
 * @todo use sprintf
 * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
 * 
 * here using global $post
 * @link https://codex.wordpress.org/Customizing_the_Read_More
 */
if ( ! function_exists( 'pride_more_link_text' ) ) :
	function pride_more_link_text( $unused_link_var ) {

		global $post;

		$new_more_link	=	'... <a href=" ' 
											. esc_url( get_the_permalink( $post->ID ) )
											. ' " class="name" style="color:red;"> ' 
											. esc_html__( 'Continue Reading &#8883;', 'pride' )
											. ' </a> ';

		return $new_more_link;

	}
endif;
add_filter( 'excerpt_more', 'pride_more_link_text', 10 );

/**
 * Register categories for simple media image gallery.
 *
 * According to article, this init function is prerequisite, but seems to work without it.
 *
 * @package
 *
 * Functionality used with thanks to:
 * @link https://www.taniarascia.com/how-to-build-a-responsive-image-gallery-with-flexbox/#wordpress-gallery
 *
 */
if ( ! function_exists( 'pride_add_category_for_attachments' ) ) {
	add_action( 'init', 'pride_add_category_for_attachments' );

	function pride_add_category_for_attachments() {
		register_taxonomy_for_object_type( 'category', 'attachment' );
	}
}

/**
 * WordPress
 * Example of action hook using anon function for callable
 */ 
add_action( 'pride_before_mytest_chaining_methods', function() {
	if ( ! is_home() ) {
		return;
	}
	?>
	<h1>Some New Hache-one Tag</h1>
	<?php
} );






































