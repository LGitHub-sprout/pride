<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage pride
 * @since 01.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="stylesheet" media="all" href="/wp-content/themes/pride/style.css" />
	<?php wp_head(); ?>
</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

	<a href="#content" class="screen-reader-text skip-link" itemprop="url"><?php _e( 'Skip to content', 'pride' ); ?></a>

	<?php
	/**
		* pride_before_header hook.
		*
		* @since 0.1
		*
		* @author Tom Usborne generatepress.com
		* Modified by Lester for Pride
		*
		* @hooked pride_skip_to_link - 2
		* @hooked pride_top_bar_widget - 5
		* @hooked pride_navigation_before_header - 5
		*/
		do_action( 'pride_before_header' );
	?>

	<header id="masthead" class="site-header" role="banner">
		<?php //if ( has_nav_menu( 'primary_menu' ) ) : ?>
		<!-- <button id="menu-toggle" class="menu-toggle" aria-expanded="true"><?php //_e( 'Menu', 'pride' ); ?>
		</button> -->

		<div id="site-header-menu" class="site-header-menu" role="navigation">
			<?php if ( has_nav_menu( 'primary_menu' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'pride' ); ?>">
			<?php 
				/** 
				 * navigation based partially on GeneratePress $args inc/structure/navigation.php as well as
				 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/#parameters
				 */
				wp_nav_menu( array(
					'theme_location'	=> 'primary_menu',
					'menu_class'			=> '', // ul element class: empty in geneartepress...?
					'menu_id'					=> '', // not used in generatepress
					'container_class'	=> 'main-nav', // works if i don't use 'container' $arg
					'container_id'		=> 'primary-nav', // works if i don't use 'container' $arg
					'items_wrap'			=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
					)	); ?>
			</nav>
				<?php endif; ?>
			</div><!-- #site-header-menu .site-header-menu -->
		<?php //endif; ?>

		<div class="site-branding">
			<span class="custom-logo">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php endif; ?>						
			</span><!-- .custom-logo -->
			<!-- implement $disable_title function  -->
				<?php if ( is_home() || is_front_page() && ! is_paged() ) : ?>
					<h1 class="site-title" itemprop="headline" role="home"><a href="<?php echo esc_url( home_url( '/' ) ) ;?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ) ;?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>	
				<?php endif; ?>
				<p class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></p>

			<!-- <div class="site-branding-container"> -->

			<!-- <div class="custom-header"> -->
				<!-- check whether i need the .custom-header container -->
				<!-- should it always link home_url()? -->
				<!-- if not in div, s/b in figure tag? -->
				<!-- <img src="<?php header_image(); ?>
				 height="<?php echo get_custom_header()->height; ?>"
				 width="<?php echo get_custom_header()->width ?>" alt="custom header image" /> -->
			<!-- </div> --><!-- .custom-header -->

			<!-- </div> --><!-- .site-branding-container -->				
		</div><!-- .site-branding -->
				<?php the_custom_header_markup(); ?>
	</header>

	<div id="page" class="site">
		<div id="content" class="site-content" itemprop="text">
