<?php

/**
 * Organi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Organi
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function organi_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Organi, use a find and replace
		* to change 'organi' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('organi', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'organi'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'organi_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'organi_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function organi_content_width()
{
	$GLOBALS['content_width'] = apply_filters('organi_content_width', 640);
}
add_action('after_setup_theme', 'organi_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function organi_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'organi'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'organi'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar( array(
        'name'          => __( 'Footer Widget', 'organi' ),
        'id'            => 'footer',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'organi' ),
        'before_widget' => '<ul id="%1$s" class="widget %2$s">',
        'after_widget'  => '</ul>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Shop', 'organi' ),
        'id'            => 'footer_shop',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'organi' ),
        'before_widget' => '<ul id="%1$s" class="widget %2$s">',
        'after_widget'  => '</ul>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );
}
add_action('widgets_init', 'organi_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function organi_scripts()
{

	wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap', array(), _S_VERSION, 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('elegant-icons', get_template_directory_uri() . '/css/elegant-icons.css', array(), _S_VERSION, 'all');
	//wp_enqueue_style('nice-select', get_template_directory_uri() . '/css/nice-select.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('slicknav', get_template_directory_uri() . '/css/slicknav.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('organi-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('organi-style', 'rtl', 'replace');

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), _S_VERSION, true);
	//wp_enqueue_script('nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('mixitup', get_template_directory_uri() . '/js/mixitup.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('organi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'organi_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// ACF Option Setting
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Contact Settings',
        'menu_title'    => 'Contact',
        'parent_slug'   => 'theme-general-settings',
    ));

}


