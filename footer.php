<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage pride
 * @since 0.1.0.0
 */

if ( ! defined ( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
			</div><!-- #content .site-content -->
		</div><!-- #page .site -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="inside-site-footer">

				<div class="copyright-bar">
					<span>&copy;<?php echo date( 'Y' ); ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
							<?php bloginfo( 'name' ); ?></a>
							&bullet;
							<?php _e( 'Powered by ', 'pride' ); ?> 
							<a target="blank" itemprop="url" href="<?php echo esc_url( 'https://wordpress.org/' );?> ">
						<?php _e( 'WordPress', 'pride' ); ?></a>
					</span>
				</div><!-- .copyright-bar -->
				
			</div><!-- .inside-site-footer -->			
		</footer>

	<?php wp_footer(); ?>
	</body>
</html>
