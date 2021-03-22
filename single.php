<?php
/**
 * The template file for displaying single posts.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage pride
 * @since 0.1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><?php get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php echo wpdocs_custom_taxonomies_terms_links(); ?>

		<?php 
		$terms = get_the_terms( get_the_ID(), 'newgays' );
		//echo $terms;
		?>

		<?php 
		//$term_obj_list = get_the_terms( $post->ID, 'category' );
		//$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
		echo $terms_string;
		?>

		<!-- <p style="color:red;">This is single.php</p> -->

		<?php
		/**
		 * Inside section content hook
		 * for category plugin exercise
		 */
		do_action( 'inside_primary_section_content', 10 );
		?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
		<?php endif; ?>

		<?php endwhile; else : ?>

		<?php get_template_part( 'template-parts/404' ); ?>

		<?php endif; // end of loop.
		?>

	</main>
</section><! #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
