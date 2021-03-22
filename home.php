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
<?php get_header();
			//get_header( 'custom' ); 
?>

<section id="primary" class="content-area">
	<p style="background:red;color:linen;">This is home.php</p>

	<div class="gallery">
	<?php // needs to be a function in a plugin
		$args = array(
			'post_type'				=> 'attachment',
			'post_mime_type'	=> 'image',
			'order_by'				=> 'post_date',
			'oder'						=> 'asc',
			'posts_per_page'	=> '30',
			'post_status'			=> 'inherit',
			'category_name'		=> 'lavendergays',
			);
		$loop = new WP_Query( $args );

			while( $loop->have_posts() ) :

				$loop->the_post();

		$image = wp_get_attachment_image_src( get_the_ID(), 'full' );

		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'thumbnail' );

		wp_reset_postdata();
	?>
		<figure>
			<a href="<?php echo $image[0]; ?>"><img src="<?php echo $thumb[0]; ?>" alt=""></a>
		</figure>

	<?php endwhile; ?>

	</div><!-- .gallery -->

	<?php // start the loop
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php if ( ! $post = get_post() ) {
			echo $post;
		} ?>

	<?php
	/**
	 * Carl Alexander's Array Functions article.
	 *
	 * Validating post_meta_key thru a function calling post_meta_key
	 * on the $post object? I'm not sure.
	 *
	 * @link https://carlalexander.ca/php-array-functions-instead-loops/
	 */
		$posts_with_meta_key = get_posts( array(
			'meta_key' => 'post_meta_key',
		) );
		$posts_with_valid_meta_key = array();

		foreach ($posts_with_meta_key as $post) {
			if ( pride_is_meta_key_valid( $post->post_meta_key ) ) {
				$posts_with_valid_meta_key[] = $post;
			}
		}
	?>
<pre>
	<?php // var_dump( $post ); ?>
</pre>

	
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
	
	<?php get_template_part( 'template-parts/404' ); ?>
	
	<?php endif; // end of loop	?>
	
	<?php //rewind_posts(); ?>
	
	<?php //while( have_posts() ) : the_post(); ?>
	<?php //endwhile; ?>
	
	<?php //get_template_part( 'template-parts/content', get_post_format() ); ?>
</section><! #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
