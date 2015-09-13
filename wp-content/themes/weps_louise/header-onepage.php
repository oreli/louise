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

	<header id="masthead" class="site-header" role="banner">

	<div id="introOnepage" class="contentFullW">
	<div class="content1280W">
		<div id="logo">

<img src="<?php bloginfo( url ); ?>/wp-content/themes/weps_louise/img/pao-logo.png">

			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-t.itle"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<div id="intro-nav">
			<nav id="site-navigation-intro" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'intro' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</div>
	<div class="bgImgStickyL"></div>
	</div>

<div id="alaUne" class="contentFullW">
<div class="content1280W">
		<?php
		$recentPosts = new WP_Query();
		$sticky = get_option('sticky_posts');
		$args = array(
		 'showposts' => 1,
		 'post__in' => $sticky,
		 'caller_get_posts' => 1,
		 'orderby' => 'date',
		 );
		$recentPosts->query($args);
		while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
		<?php if ( has_post_thumbnail()) : ?>
			<!-- Retrouve l'URL de l'image originale associée au thumbnail -->
			<?php
			  $image_id = get_post_thumbnail_id();
			  $image_url = wp_get_attachment_image_src($image_id,'large');
			  $image_url = $image_url[0];
			  $name = $term->name;
			?>
		<div class="bgImgStickyL" style="background-image:url('<?php echo $image_url; ?>')">
		<?php the_title_attribute(); ?>
		</div> <!-- fin bgImgStickyL -->
		<div class="content">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		
		<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
		<?php endwhile; ?>
</div> <!-- fin .content1280W -->
</div> <!-- fin #alaUne -->
	<div class="contentFullW">
		<div id="menu-main-onepage" >
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'weps_louise' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary','walker' => new mono_walker() ) ); ?>
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->			
		</div>
		<div id="menuJaune"><?php wp_nav_menu( array( 'theme_location' => 'jaune' ) ); ?></div>
	</div>	

	</header><!-- #masthead -->

	<div id="content" class="site-content">








