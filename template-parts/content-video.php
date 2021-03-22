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

<!-- <p style="color:purple;background:linen;">this is content.php</p> -->

<!-- i need more experience w pagination, which to use and when -->
<!-- also see below for same -->
<?php //the_posts_pagination(); ?>
<?php wp_link_pages(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<header id="entry-header">

		<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
		<?php printf( '<span class="featured">%s</span>', _x( 'Featured', 'post', 'pride' ) ); ?>

		<?php endif; ?>

		<?php if ( is_home() || is_front_page() && ! is_paged() ) : ?>
		<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_the_permalink() ) ), '</a></h2>' ); ?>

		<?php else : ?>
		<span style="background:pink;width:50px;height:50px;padding-top:15px;border:solid 2px red;" class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span><?php the_title( '<h1 style="background:pink" class="entry-title" itemprop="headline">', '</h1>' ); ?>

		<?php endif; ?>

		<h3 style="color:magenta"><?php esc_html_e( 'This is the VIDEO post-format', 'pride' ); ?></h3>

		
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

		<div class="entry-comments-meta">
			<?php comments_popup_link( 'Start a Conversation!' ); ?>
		</div><!-- .entry-comments-meta -->
	</header>

		<?php 
		/**
		 * pride_after_comments_popup_link
		 *
		 * @since 0.1
		 * exemplified by generatepress. hand-coded by Lester 
		 * 
		 * @hooked pride_featured_image - 10
		 */
		do_action( 'pride_after_comments_popup_link' );
	  ?>

	<div id="entry-content" itemprop="text">

		<?php //the_excerpt(); ?>
		<?php
		/**
		 * the_content( string $more_link_text = null, bool $strip_teaser = false )
		 * 
		 * $strip_teaser bool, optional, strip teaser content before the more text.
		 * default is false
		 */; ?>
		<?php the_content( 'Continue reading...', 'false' ); ?>

		<?php	// wp_link_pages doesn't work
		$args = [
    'before'            => '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'pride' ) . '</span>',
    'after'             => '</div>',
    'link_before'       => '<span class="page-link">',
    'link_after'        => '</span>',
    'next_or_number'    => 'next',
    'separator'         => ' | ',
    'nextpagelink'      => __( 'Next &raquo', 'pride' ),
    'previouspagelink'  => __( '&laquo Previous', 'pride' ),
		];
		wp_link_pages( $args );

		// renders links but doesn't work
		wp_link_pages( array(
		'before'						=> '<div class="pages-something">' . __( 'Pages', 'pride' ),
		'after'							=> '</div>',
		'nextpagelink'      => _e( 'Next Shite &raquo', 'textdomain' ),
    'previouspagelink'  => _e( '&laquo Previous Shite', 'textdomain' ),
		) ); ?>

		<?php next_post_link(); ?>
		<?php previous_post_link(); ?>

	</div><!-- #entry-content -->

	<footer class="entry-meta entry-tags entry-category">
		<span class="cat-links"><?php the_category(); ?><span class="screen-reader-text">Tags</span>
		</span><!-- .cat-links -->
		<span class="tag-links"><?php the_tags(); ?></span><span class="screen-reader-text">Categories</span><!-- categories -->
	</footer><!-- .entry-meta --> 

</article><!-- #post-<?php the_ID(); ?> --> 

<nav id="content-paging-navigation" class="content-navigation" role="navigation">
	<?php the_posts_pagination(); ?>

	<!-- i need more understanding w pagination, which to use and when -->
	<!-- ask why this no workie: -->
	<?php 
	/**
	 * NOT WORKING
	 * 
	 * @link https://developer.wordpress.org/reference/functions/wp_link_pages/
	 *
	 * If the content of a page (or post) has at least one <!--nextpage--> tag (and this code is in The Loop), 
	 * this prints linked page numbers (“Pages: 1 2 3”), without a link on current page number, and by default within <p> tags:
	 */
	wp_link_pages( array(
		'before'						=> '<div class="pages-something">' . __( 'Pages', 'pride' ),
		'after'							=> '</div>',
		'nextpagelink'      => __( 'Next Shite &raquo', 'textdomain' ),
    'previouspagelink'  => __( '&laquo Previous Shite', 'textdomain' ),
) ); ?>
</nav><!-- .entry-content-footer -->










