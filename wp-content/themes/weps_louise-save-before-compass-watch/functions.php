<?php
/**
 * weps_louise functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package weps_louise
 */

if ( ! function_exists( 'weps_louise_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function weps_louise_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on weps_louise, use a find and replace
	 * to change 'weps_louise' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'weps_louise', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Menu de la onePage', 'weps_louise' ),
		'intro' => __( 'Menu d\'introduction' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'weps_louise_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // weps_louise_setup
add_action( 'after_setup_theme', 'weps_louise_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function weps_louise_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'weps_louise_content_width', 640 );
}
add_action( 'after_setup_theme', 'weps_louise_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function weps_louise_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'weps_louise' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'weps_louise_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function weps_louise_scripts() {
	wp_enqueue_style( 'weps_louise-style', get_stylesheet_uri() );

	wp_enqueue_script( 'weps_louise-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'weps_louise-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'weps_louise_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*=========================== */
/* fonction pour les galerportfolioies */
/*=========================== */



/*=========================== */
/* fonction pour les galeries */
/*=========================== */

add_action('init', 'galleryPao_init');     // Initialisation de Wordpress

/**
* Permet d'initialiser les fonctionalités
**/

function galleryPao_init(){

    $labels = array(
      'name' => 'GALERIE PÀO',
      'singular_name' => 'oeuvre',
      'add_new' => 'Ajouter une Œuvre',
      'add_new_item' => 'Ajouter une nouvelle Œuvre',
      'edit_item' => 'Editer une Œuvre',
      'new_item' => 'Nouvelle Œuvre',
      'view_item' => 'Voir l\'Œuvre',
      'search_items' => 'Rechercher une Œuvre',
      'not_found' =>  'Aucune Œuvre',
      'not_found_in_trash' => 'Aucun Œuvre dans la corbeille',
      'parent_item_colon' => _x( 'Produit parent :', 'Œuvre' ),
      'menu_name' => 'Œuvres'
    );

$args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Les Œuvre de PÀO.',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
        'taxonomies' => array( 'category', 'post_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'produit', $args );

} /* fin galleryPao_init */



/*=========================== */
/* fin / fonction pour les portfolio */
/*=========================== */



/*==================================*/
/* MENU DEVIENT SCROLL POUR ONEPAGE */
/*==================================*/

class mono_walker extends Walker_Nav_Menu{
 function start_el(&$output, $item, $depth, $args){
  global $wp_query;
  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  $class_names = $value = '';
  $classes = empty( $item->classes ) ? array() : (array) $item->classes;

  $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
  $class_names = ' class="'. esc_attr( $class_names ) . '"';


  $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

  $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
  $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
  $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

  //Récupère l'URL DE l'item
  $parsedURL = parse_url( esc_attr( $item->url ));

  //Supprime le dernier '/' de l'url
  $cleanURL = substr_replace($parsedURL['path'],'',-1);//remove last '/';

  //On split la chaine sur les '/'
  $pathTab = explode('/',$cleanURL);

  //On modifie la chaine derrière le dernier '/'
  $pathTab[sizeof($pathTab)-1] = '#'.$pathTab[sizeof($pathTab)-1];

  //On reconstitue l'URL complète modifiée
  $path = implode('/',$pathTab );

  //On injecte la nouvelle URL dans le href de l'item
  $attributes .= ! empty( $item->url )        ? ' href="'   . $path .'"' : '';
  $attributes .= ! empty( $item->url )        ? ' data-title="'   .   sanitize_title($item->title) .'"' : '';
  $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';


  if($depth != 0) $description = "";

  $item_output = $args->before;
  $item_output .= '<a'. $attributes .'>';
  $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
  $item_output .= $description.$args->link_after;
  $item_output .= '</a>';
  $item_output .= $args->after;


  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
 }
}

/*========================================*/
/* fin / MENU DEVIENT SCROLL POUR ONEPAGE */
/*========================================*/


