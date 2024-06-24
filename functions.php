<?php
/**
 * skirmish functions and definitions
 *
 * @package Skirmish
 * @since Skirmish 2.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since skirmish 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 740; /* pixels */

if ( ! function_exists( 'skirmish_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since skirmish 1.0
 */
function skirmish_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on skirmish, use a find and replace
	 * to change 'skirmish' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'skirmish', get_template_directory() . '/languages' );

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
	 * Block Editor Support
	 */
	add_theme_support( "align-wide" );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skirmish' ),
		'social' => esc_html__( 'Social', 'skirmish' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );

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

	// Enable post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 50, 50, true );
	add_image_size( 'index-post-thumbnail', 125, 125, true );
	add_image_size( 'skirmish-image', 740, 300, true );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'skirmish_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri() . '/assets/img/pattern.jpg',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // skirmish_setup
add_action( 'after_setup_theme', 'skirmish_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since skirmish 1.0
 */
function skirmish_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'skirmish' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'skirmish_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function skirmish_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/assets/js/small-menu.js', 'jquery', '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Font Awesome
	wp_register_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), null );
	wp_enqueue_style( 'font-awesome' );

	// Google Fonts
	wp_register_style( 'google-fonts', get_stylesheet_directory_uri() . '/assets/fonts/google/stylesheet.css', array(), null );
	wp_enqueue_style( 'google-fonts' );

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/assets/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'skirmish_scripts' );

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates
 */
require( get_template_directory() . '/inc/tweaks.php' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
