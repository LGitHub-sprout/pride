<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage pride
 * @since 0.1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php get_header(); ?>
<?php //get_header( 'custom' ); ?>

<section id="primary" class="content-area">
	
	<p style="background:teal;color:linen;padding:5px;">This is page.php</p>
	
	<?php // start the loop
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php 
	 /** Post-Format-specific templates are supported.
		 * 
		 * If you want to override the default content.php w a supported post-format template in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name, such as content-gallery.php) and that will be used instead.
		 * 
		 * @author:  Tom Usborne GeneratePress.com
		 * Modified by Lester for Pride
		 *
		 * @link https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		// need conditional for post-formats or only for index?
	 get_template_part( 'template-parts/content', 'page' );
	?>
	
	<?php endwhile; else : ?>
	
	<?php //get_template_part( 'template-parts/404' ); ?>
	
	<?php endif; // end of loop	?>
	
	<?php //rewind_posts(); ?>
	
	<?php //while( have_posts() ) : the_post(); ?>
	<?php //endwhile; ?>
	
	<?php //get_template_part( 'template-parts/content', get_post_format() ); ?>
</section><! #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
