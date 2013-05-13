<?php
/**
 * Planet3.0 functions and definitions
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Planet3.0 3.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'planet3_0_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Planet3.0 3.0
 */
function planet3_0_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Planet3.0, use a find and replace
	 * to change 'planet3_0' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'planet3_0', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	// and now register custom sizes
	set_post_thumbnail_size( 600, 350, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus(array(
		'top-bar' => 'Top Bar' // registers the menu in the WordPress admin menu editor
	));

	// the top bar
function foundation_top_bar() {
	wp_nav_menu(array( 
		'container' => false,                           // remove nav container
		'container_class' => 'menu',                    // class of container
		'menu' => '',                                   // menu name
		'menu_class' => 'top-bar-menu',                 // adding custom nav class
		'theme_location' => 'top-bar',                  // where it's located in the theme
		'before' => '',                                 // before each link <a> 
		'after' => '',                                  // after each link </a>
		'link_before' => '',                            // before each link text
		'link_after' => '',                             // after each link text
		'depth' => 5,                                   // limit the depth of the nav
		'fallback_cb' => false,                         // fallback function (see below)
		'walker' => new top_bar_walker()
	));
} // end top bar

//Customize the output of menus for Foundation top bar classes
class top_bar_walker extends Walker_Nav_Menu {

	function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
		$element->has_children = !empty($children_elements[$element->ID]);
		$element->classes[] = ($element->current || $element->current_item_ancestor) ? 'active' : '';
		$element->classes[] = ($element->has_children) ? 'has-dropdown' : '';
		
		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}

	function start_el(&$output, $item, $depth, $args) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);	

		$output .= ($depth == 0) ? '<li class="divider"></li>' : '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;	

		if(in_array('section', $classes)) {
			$output .= '<li class="divider"></li>';
			$item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html);
		}

		$output .= $item_html;
	}

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"sub-menu dropdown\">\n";
	}

} // end top bar walker

	/**
	 * Enable support for Post Formats
	 */
	// add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // planet3_0_setup
add_action( 'after_setup_theme', 'planet3_0_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function planet3_0_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'planet3_0_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'planet3_0_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Planet3.0 3.0
 */
function planet3_0_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'planet3_0' ),
		'id'            => 'footer-widgets',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

		register_sidebar( array(
		'name'          => __( 'Comment Widget Area', 'planet3_0' ),
		'id'            => 'comments-widgets',
		'before_widget' => '<aside id="%1$s" class="widget %2$s, comment-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title comment-widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'planet3_0_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function planet3_0_scripts() {

	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto:400,700,400italic|Roboto+Slab:400,700');

	wp_enqueue_style( 'style', get_stylesheet_uri() );


	wp_enqueue_script( 'foundation_modernizr', get_template_directory_uri() . '/js/custom.modernizr.js', array(), false, false );

	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.js', array( ('jquery') ), false, true );

	wp_enqueue_script( 'foundation-topbar', get_template_directory_uri() . '/js/foundation.topbar.js', array( ('foundation') ), false, true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'planet3_0_scripts' );

/**
 * Implement the Gravitar Validator
 */
require( get_template_directory() . '/inc/gravitar.php' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );


function planet3_0_custom_contact_information($contactmethods) {
	// Remove these fields
	unset($contactmethods['aim']);
	unset($contactmethods['yim']);
	unset($contactmethods['jabber']);

	// Add these fields
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['gplus'] = 'Google+';

return $contactmethods;
}
add_filter('user_contactmethods', 'planet3_0_custom_contact_information');



// show admin bar only for admins and editors
if (!current_user_can('edit_others_posts')) {
 add_filter('show_admin_bar', '__return_false');
}

/* Moderate subscribers
	filter for the Never Moderate Registered Users plugin */
add_filter( 'c2c_never_moderate_registered_users_caps', 'dont_moderate_contributors' );
function dont_moderate_contributors( $caps ) {
    $caps[] = 'contributor';
    return $caps;
}
