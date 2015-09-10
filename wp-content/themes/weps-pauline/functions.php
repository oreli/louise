<?php
/**
 * weps Pauline functions and definitions
 *
 * @package weps Pauline
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'weps_pauline_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function weps_pauline_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on weps Pauline, use a find and replace
	 * to change 'weps-pauline' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'weps-pauline', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'weps-pauline' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		/*'aside', */'image'/*, 'video', 'quote', 'link'*/
	) );



	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'weps_pauline_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // weps_pauline_setup
add_action( 'after_setup_theme', 'weps_pauline_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function weps_pauline_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'weps-pauline' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'weps_pauline_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function weps_pauline_scripts() {
	wp_enqueue_style( 'weps-pauline-style', get_stylesheet_uri() );

	wp_enqueue_script( 'weps-pauline-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'weps-pauline-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'weps_pauline_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/* image à la une */
    // ====================================
// = WordPress 2.9+ Thumbnail Support =
// ====================================
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 155, 110, true ); // 305 pixels wide by 380 pixels tall, set last parameter to true for hard crop mode
add_image_size( 'matiere-sticky', 220, 250, true ); // Set thumbnail size
add_image_size( 'matiere', 460, 520, true ); // Set thumbnail size
add_image_size( 'actu-sticky', 460, 220, true ); // Set thumbnail size
add_image_size( 'actu-full', 500, 160, true ); // Set thumbnail size
add_image_size( 'actu', 220, 220, true ); // Set thumbnail size


/* extrait*/
function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 99 );







/* portfolio */
add_action('init', 'project_custom_init'); 
 
/*-- Custom Post Init Begin --*/
function project_custom_init()
{
  $labels = array(
    'name' => _x('Projects', 'post type general name'),
    'singular_name' => _x('Project', 'post type singular name'),
    'add_new' => _x('Add New', 'project'),
    'add_new_item' => __('Add New Project'),
    'edit_item' => __('Edit Project'),
    'new_item' => __('New Project'),
    'view_item' => __('View Project'),
    'search_items' => __('Search Projects'),
    'not_found' =>  __('No projects found'),
    'not_found_in_trash' => __('No projects found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'portolio'
 
  );
   
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );
  // The following is the main step where we register the post.
  register_post_type('project',$args);
   
  // Initialize New Taxonomy Labels
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => __( 'Parent Tag' ),
    'parent_item_colon' => __( 'Parent Tag:' ),
    'edit_item' => __( 'Edit Tags' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
  );
    // Custom taxonomy for Project Tags
    register_taxonomy('tagportfolio',array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag-portfolio' ),
  ));
   
}
/*-- Custom Post Init Ends --*/


/*--- Custom Messages - project_updated_messages ---*/
add_filter('post_updated_messages', 'project_updated_messages');
 
function project_updated_messages( $messages ) {
  global $post, $post_ID;
 
  $messages['project'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Project updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Project saved.'),
    8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
 
  return $messages;
}
 
/*--- #end SECTION - project_updated_messages ---*/

/*--- Demo URL meta box ---*/
 
add_action('admin_init','portfolio_meta_init');
 
function portfolio_meta_init()
{
    // add a meta box for WordPress 'project' type
    add_meta_box('portfolio_meta', 'Project Infos', 'portfolio_meta_setup', 'project', 'side', 'low');
  
    // add a callback function to save any data a user enters in
    add_action('save_post','portfolio_meta_save');
}
 
function portfolio_meta_setup()
{
    global $post;
      
    ?>
        <div class="portfolio_meta_control">
            <label>URL</label>
            <p>
                <input type="text" name="_url" value="<?php echo get_post_meta($post->ID,'_url',TRUE); ?>" style="width: 100%;" />
            </p>
        </div>
    <?php
 
    // create for validation
    echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
 
function portfolio_meta_save($post_id)
{
    // check nonce
    if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
    return $post_id;
    }
 
    // check capabilities
    if ('post' == $_POST['post_type']) {
    if (!current_user_can('edit_post', $post_id)) {
    return $post_id;
    }
    } elseif (!current_user_can('edit_page', $post_id)) {
    return $post_id;
    }
 
    // exit on autosave
    if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
    return $post_id;
    }
 
    if(isset($_POST['_url']))
    {
        update_post_meta($post_id, '_url', $_POST['_url']);
    } else
    {
        delete_post_meta($post_id, '_url');
    }
}
 
/*--- #end  Demo URL meta box ---*/

/*
function enqueue_filterable()
{
    wp_register_script( 'filterable', get_template_directory_uri() . '/js/filterable.js', array( 'jquery' ) );
    wp_enqueue_script( 'filterable' );
}
add_action('wp_enqueue_scripts', 'enqueue_filterable');
*/






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


