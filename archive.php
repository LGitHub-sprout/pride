<?php
/**
 * The template for displaying the archive pages.
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
<?php get_header();
			//get_header( 'custom' ); 
?>
<section id="primary" class="content-area">
	<p style="background:red;color:linen;">This is archive.php</p>

	<?php // start the loop
	if ( have_posts() ) : 

		echo 'This is the term description' . term_description( '4' );



		while ( have_posts() ) : the_post(); ?>

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
		get_template_part( 'template-parts/content', get_post_format() );
	?>
	
	<?php endwhile; else : ?>
	
	<?php //get_template_part( 'template-parts/404' ); ?>
	
	<?php endif; // end of loop	?>
	
</section><! #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>