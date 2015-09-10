<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package weps_louise
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'weps_louise' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding" style="float:left">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-t.itle"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
		
		</div><!-- .site-branding -->
		<div id="intro-nav" style="float:left">
			<nav id="site-navigation-intro" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'intro' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
		<div id="menu-main-onepage" style="clear:both;">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'weps_louise' ); ?></button>

			<?php wp_nav_menu( array( 'theme_location' => 'primary','walker' => new mono_walker() ) ); ?>
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->			
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">








