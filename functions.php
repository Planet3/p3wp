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
//require( get_template_directory() . '/inc/jetpack.php' );

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
	 * Custom widgets
	 */
	// require( get_template_directory() . '/inc/widgets.php' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add support for custok backgrounds
	 */
	add_theme_support( 'custom-background' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	// and now register custom sizes
	set_post_thumbnail_size( 640, 360, true );
	add_image_size( 'small_thumbnail', 320, 180, true );

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
	 * Suppoorted formats: 'aside', 'image', 'video', 'quote', 'link' 
	 */
	// add_theme_support( 'post-formats', array( 'image', 'video', 'quote' ) );
}
endif; // planet3_0_setup
add_action( 'after_setup_theme', 'planet3_0_setup' );


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Planet3.0 3.0
 */
function planet3_0_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer Widget Area',
		'id'            => 'footer-widgets',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

		register_sidebar( array(
		'name'          => 'Comment Widget Area',
		'id'            => 'comments-widgets',
		'before_widget' => '<aside id="%1$s" class="widget %2$s, comment-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title comment-widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'planet3_0_widgets_init' );


/**
 * Creates an autogeneted excerpt if no custom excerpt exists.
 * Replaces the wpcore fuction wp_tim_excerpt()
 *
 * @since Planet3.0 3.0
 */
function planet3_0_trim_excerpt( $text ) {
	global $post;
	if ( ! is_feed() ) {
		// Setting the global $more variable to 0 forces the content to be truncated at the <!--more--> tag
		global $more;
		$original_more = $more;
		$more = 0;
	}

	if ( '' == $text ) {

		// The text to be displayed at the end of the excerpt
		$excerpt_end = ' <a class="moretag" href="'. get_permalink($post->ID) . '">[more]</a>';


		// Word length of the excerpt. This is exact or NOT depending on the $finish_sentence variable.
		$length = 50; 

		// Set to 1 if you want the excerpt to cut off at the end of the sentence rather than after $length words. Might result in longer excerpts
		$finish_sentence = 1; 

		$text = get_the_content( $excerpt_end );
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);

		$allowed_tags = array(
			'p' => array(),
			'br' => array(),
			'a' => array(
				'href' => array(),
				'title' => array()
			),
			'em' => array(),
			'strong' => array(),
			'blockquote' => array()
		);
		$text = wp_kses( $text, $allowed_tags );


		$tokens = array();
		$word = 0;

		// Divide the string into tokens; HTML tags, or words, followed by any whitespace.
		$regex = '/(<[^>]+>|[^<>\s]+)\s*/u';
		preg_match_all( $regex, $text, $tokens );
		foreach ( $tokens[0] as $t ) {
			// Parse each token
			if ( $word >= $length && !$finish_sentence ) {
				// Limit reached
				break;
			}
			if ( $t[0] != '<' ) {
				// Token is not a tag. 
				// Regular expression that checks for the end of the sentence: '.', '?' or '!'
				$regex1 = '/[\?\.\!]\s*$/uS';
				if ( $word >= $length && $finish_sentence && preg_match( $regex1, $t ) == 1) {
					// Limit reached, continue until ? . or ! occur to reach the end of the sentence.
					$out .= trim($t);
					break;
				}
				$word++;
			}
			// Append what's left of the token.
			$out .= $t;
		}

	// Append the excerpt ending to the token. 
	if ( trim( force_balance_tags( $text ) ) != trim( force_balance_tags( $out ) ) ) {
		$out .= $excerpt_end;
	}

	$text = trim( force_balance_tags( $out ) );

	}

	if ( ! is_feed() ) {
		// reset the global $more 
		$more = $original_more;
	}

	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'planet3_0_trim_excerpt');


/**
 * Replaces the auto-generated excerpt "more" text by a link
 * Not needed if we use planet3_0_trim_excerpt()
 */
//function planet3_0_excerpt_more($more) {
//	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">[more]</a>';
//}
//add_filter( 'excerpt_more', 'planet3_0_excerpt_more' );

/**
 * Adds a "more link to the custom excerpts
 *
 * @since  Planet3.0 3.0
 */
function planet3_0_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= ' <a class="moretag" href="'. get_permalink($post->ID) . '">[more]</a>';
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'planet3_0_custom_excerpt_more' );



/**
 * Make all thumbnails link to post 
 *
 * @since Planet3.0 3.0
 */
add_filter( 'post_thumbnail_html', 'planet3_0_thumbnail_link', 10, 3 );

function planet3_0_thumbnail_link ( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
	return $html;
}

/**
 * required scripts and functions for the planet3.0 lightbox login form.
 * 
 * @since Planet3.0 3.0
 */
function planet3_0_login_init(){

	wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/login-script.min.js', array('jquery') ); 
	wp_enqueue_script('ajax-login-script');

	wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => 'http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"],
		'loadingmessage' => __('Logging in, please wait...')
	));

	// Enable the user with no privileges to run ajax_login() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxlogin', 'planet3_0_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
	add_action('init', 'planet3_0_login_init');
}

function planet3_0_login(){

	// First check the nonce, if it fails the function will break
	check_ajax_referer( 'ajax-login-nonce', 'security' );

	// Nonce is checked, get the POST data and sign user on
	$info = array();
	$info['user_login'] = $_POST['username'];
	$info['user_password'] = $_POST['password'];
	$info['remember'] = true;

	$user_signon = wp_signon( $info, false );
	if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
	} else {
		echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
	}

	die();
}


/**
 * Remove the Jetpack social sharing widget that show up after a post
 * 
 * @since Planet3.0 3.0
 */
//function planet3_0_remove_share() {
//	remove_filter( 'the_content', 'sharing_display',19 );
//	remove_filter( 'the_excerpt', 'sharing_display',19 );
//}

//add_action( 'loop_end', 'planet3_0_remove_share' );

/**
 * Enqueue scripts and styles
 */
function planet3_0_scripts() {

	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Vollkorn:400|Droid+Serif:400,700,400italic');

	wp_enqueue_style( 'style', get_stylesheet_uri() );


	wp_enqueue_script( 'foundation_modernizr', get_template_directory_uri() . '/js/custom.modernizr.min.js', array(), false, false );

	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array( ('jquery') ), false, true );

	wp_enqueue_script( 'foundation-topbar', get_template_directory_uri() . '/js/foundation.topbar.min.js', array( ('foundation') ), false, true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

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


function planet3_0_custom_contact_information($contactmethods) {
	// Remove these fields
	if ( isset( $contactmethods['yim'] ) ) 
	unset( $contactmethods['yim'] ); 
	if ( isset( $contactmethods['aim'] ) ) 
	unset( $contactmethods['aim'] ); 
	if ( isset( $contactmethods['jabber'] ) ) 
	unset( $contactmethods['jabber'] ); 
	if ( isset( $contactmethods['twitter'] ) ) 
	unset( $contactmethods['twitter'] ); 
	if ( isset( $contactmethods['facebook'] ) ) 
	unset( $contactmethods['facebook'] ); 
	if ( isset( $contactmethods['googleplus'] ) ) 
	unset( $contactmethods['googleplus'] ); 

	// Add these fields
	if ( !isset( $contactmethods['twitter'] ) ) 
	$contactmethods['twitter'] = 'Twitter Profile URL'; 
	if ( !isset( $contactmethods['facebook'] ) ) 
	$contactmethods['facebook'] = 'Facebook Profile URL'; 
	if ( !isset( $contactmethods['googleplus'] ) ) 
	$contactmethods['googleplus'] = 'Google+ Profile URL'; 
	if ( !isset( $contactmethods['linkedin'] ) ) 
	$contactmethods['linkedin'] = 'LinkedIn Profile URL'; 
	if ( !isset( $contactmethods['reddit'] ) ) 
	$contactmethods['reddit'] = 'Reddit Profile URL'; 

return $contactmethods;
}
add_filter('user_contactmethods', 'planet3_0_custom_contact_information');



// show admin bar only for admins and editors
if (!current_user_can('edit_others_posts')) {
 add_filter('show_admin_bar', '__return_false');
}

/**
 * Moderate subscribers
 * filter for the Never Moderate Registered Users plugin 
 */
add_filter( 'c2c_never_moderate_registered_users_caps', 'dont_moderate_contributors' );
function dont_moderate_contributors( $caps ) {
	$caps[] = 'contributor';
	return $caps;
}

/**
 * Reduce the default refresh time of the RSS widget to 600 seconds
 */
add_filter( 'wp_feed_cache_transient_lifetime', 
	create_function('$a', 'return 600;') );
