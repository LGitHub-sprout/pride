<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage pride
 * @since 0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php the_posts_pagination(); ?>
<?php wp_link_pages(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<header id="entry-header">

		<h1 style="color:magenta;">content-page.php</h1>

		<?php 
		/**
		 * pride_after_comments_popup_link
		 *
		 * @since 0.1
		 * @author: Tom Usborne
		 * Modified by Lester for Pride
		 *
		 * @hooked pride_featured_image - 10
		 */
		do_action( 'pride_after_comments_popup_link' );

	  /**
	   * pride_before_entry_title
	   *
	   * @since 0.1
		 * @author: Tom Usborne
		 * Modified by Lester for Pride
	   */
	  do_action( 'pride_before_entry_title' );
	  ?>

		<?php if ( is_sticky() || is_single() ): ?>
		<?php printf( '<span class="featured" style="text-transform:lowercase;">%s</span>', _x( 'Maybe make a &ldquo;Quick Summary&rdquo; section here a la smashing.. OR Social Media!?', 'post', 'pride' ) ); ?>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php
			/**
		   * pride_after_entry_title
		   *
		   * @since 0.1
		   *
		   * inspired by generatepress; coded by Lester
		   * 
		   * @hooked pride_post_meta - 10
		   */
		  do_action( 'pride_after_entry_title' );
		  ?>
		</div><!-- .entry-meta -->
	</header>

	<div id="entry-content" itemprop="text">
		<?php the_content();

		the_posts_pagination();

		$args = array(
    'before'            => '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'pride' ) . '</span>',
    'after'             => '</div>',
    'link_before'       => '<span class="page-link">',
    'link_after'        => '</span>',
    'next_or_number'    => 'next',
    'separator'         => ' | ',
    'nextpagelink'      => __( 'Next &raquo', 'pride' ),
    'previouspagelink'  => __( '&laquo Previous', 'pride' ),
		);
		wp_link_pages( $args );

		wp_link_pages( array(
			'before'		=> '<div class="something">' . __( 'Pages: ', 'pride' ),
			'after'			=> '</div>',
			) );
		?>

	</div><!-- #entry-content -->

	<footer class="entry-meta entry-tags entry-category">
		<span class="cat-links"><?php the_category(); ?><span class="screen-reader-text">Tags</span>
		</span><!-- .cat-links -->
		<span class="tag-links"><?php the_tags(); ?></span><span class="screen-reader-text">Categories</span><!-- categories -->
	</footer><!-- .entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->

<nav id="content-paging-navigation" class="content-navigation" role="navigation">
<?php next_post_link(); ?>
<?php previous_post_link(); ?>
</nav><!-- #content-paging-navigation .content-navigation -->

