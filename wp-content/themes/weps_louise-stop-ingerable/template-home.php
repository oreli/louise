<?php
/**
 * Template Name: Accueil  
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package weps_louise
 */

 if ( is_front_page() ) :
	// lorsque le page d'accueil du site est affiché
	// https://developer.wordpress.org/themes/basics/conditional-tags/
	get_header( 'onepage' );
	// affiche header-onepage.php
	// https://codex.wordpress.org/Function_Reference/get_header
elseif ( is_page( '' ) ) :
    // get_header( 'about' );
else:
    get_header();
endif; ?>

<?php


$menu_items = wp_get_nav_menu_items('onepage');
if( $menu_items ) {
foreach ($menu_items as $menu_item ) {
$args = array('p' => $menu_item->object_id,'post_type' => 'any');
 
global $wp_query;
$wp_query = new WP_Query($args);
$templatePart = ($menu_item->title == 'Réalisations') ? 'realisations' : $menu_item->object;

?>
 
<section <?php post_class('sep'); ?> id="<?php echo sanitize_title($menu_item->title); ?> ">
<?php echo $templatePart; ?>
<?php 
if ( have_posts() ){
   include(locate_template('template-gallery.php'));
} ?>
</section>

<?php }}; ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
