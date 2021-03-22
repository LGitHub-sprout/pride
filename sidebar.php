<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage pride
 * @since 0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accssed directly.
}
?>

<?php if( ! is_active_sidebar( 'right-sidebar' ) ) : ?>
	<!-- Put default widgets in here soon. -->
	<?php echo "Poop! No sidebars are active"; ?>
<?php else : ?>
	<section id="secondary" class="right-sidebar" role="complementary">
	<div class="admin-login">
		<?php wp_register(); ?>			
	</div><!-- .admin-login -->
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
	
</section><!-- #secondary .right-sidebar -->
<?php endif; ?>


