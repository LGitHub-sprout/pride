<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pride
 *
 * @since 0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly. 
}

get_header();
?>
	<p style="color:red;">This is the NEW and IMPROVED 404.php</p>

	<h1 class="404"><?php _e( '404', 'pride' ); ?></h1>

	<p><?php _e( 'Lester, come back to this page and style it, please.', 'pride' ); ?></p>

<?php get_search_form(); ?>

<?php get_footer(); ?>