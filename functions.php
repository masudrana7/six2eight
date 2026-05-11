<?php
/**
 * Six2Eight Theme Functions and Definitions
 *
 * This file contains all the core theme functions and hook definitions.
 * It sets up theme defaults, registers support for WordPress features,
 * and enqueues scripts and styles.
 *
 * @package     six2eight
 * @author      Your Name
 * @license     GPL-2.0-or-later
 * @link        https://example.com
 */

// Prevent direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define theme constants for better code maintainability.
 */
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

// ========================================
// THEME SETUP & SUPPORT
// ========================================

if ( ! function_exists( 'six2eight_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note, this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @return void
	 */
	function six2eight_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'six2eight', THEME_DIR . '/languages' );

		/*
		 * Add default posts and comments RSS feed links to head.
		 * This feature lets WordPress automatically add RSS feed links to the header of your site.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Add support for post thumbnails.
		 * This allows featured images to be set on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Register navigation menus.
		 * These menus can be managed from the WordPress admin under Appearance > Menus.
		 */
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'six2eight' ),
				'footer'  => esc_html__( 'Footer Menu', 'six2eight' ),
			)
		);

		/*
		 * Add support for custom logo.
		 * Allows users to upload and configure a custom site logo.
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		/*
		 * Add support for HTML5 markup.
		 * This tells WordPress that the theme uses HTML5 for markup.
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

		/*
		 * Add theme support for selective refresh for widgets.
		 * This allows widgets to refresh independently in the customizer.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Add support for block styles.
		 */
		add_theme_support( 'wp-block-styles' );

		/*
		 * Add support for wide alignment of blocks.
		 */
		add_theme_support( 'align-wide' );

		/*
		 * Set default image sizes for various contexts.
		 */
		set_post_thumbnail_size( 200, 200, true );
		add_image_size( 'six2eight-hero', 1200, 400, true );
		add_image_size( 'six2eight-medium', 600, 400, true );
	}
}
add_action( 'after_setup_theme', 'six2eight_setup' );

// ========================================
// ENQUEUE SCRIPTS & STYLES
// ========================================

if ( ! function_exists( 'six2eight_scripts' ) ) {
	/**
	 * Enqueue scripts and styles for the front-end.
	 *
	 * This function loads all CSS and JavaScript files required by the theme.
	 * It uses wp_enqueue_style() and wp_enqueue_script() to properly load assets
	 * with dependency management and versioning.
	 *
	 * @return void
	 */
	function six2eight_scripts() {
		/*
		 * Enqueue the main theme stylesheet.
		 * This contains all the theme's CSS, including responsive design rules.
		 */
		wp_enqueue_style(
			'six2eight-style',
			THEME_URI . '/style.css',
			array(),
			THEME_VERSION,
			'all'
		);

		/*
		 * Enqueue single project page styles.
		 * This loads CSS specific to the six2eight_project single post template.
		 */
		if ( is_singular( 'six2eight_project' ) ) {
			wp_enqueue_style(
				'six2eight-single-project',
				THEME_URI . '/assets/css/single-project.css',
				array( 'six2eight-style' ),
				THEME_VERSION,
				'all'
			);
		}

		/*
		 * Enqueue archive project page styles.
		 * This loads CSS for the six2eight_project archive template.
		 */
		if ( is_post_type_archive( 'six2eight_project' ) || is_tax( 'six2eight_project_category' ) ) {
			wp_enqueue_style(
				'six2eight-archive-project',
				THEME_URI . '/assets/css/archive-project.css',
				array( 'six2eight-style' ),
				THEME_VERSION,
				'all'
			);
		}

		/*
		 * Enqueue the navigation and menu interaction script.
		 * This handles canvas menu toggle, dropdown menus, and accessibility features.
		 */
		wp_enqueue_script(
			'six2eight-custom',
			THEME_URI . '/assets/js/custom.js',
			array(),
			THEME_VERSION,
			true
		);

		/*
		 * Load WordPress comment-reply script if needed.
		 * This enables threaded comment reply functionality.
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'six2eight_scripts' );

// ========================================
// REGISTER WIDGET AREAS
// ========================================

if ( ! function_exists( 'six2eight_widgets_init' ) ) {
	/**
	 * Register widget areas (sidebars).
	 *
	 * This function registers all the widget areas that can be populated
	 * with widgets from the WordPress admin panel.
	 *
	 * @return void
	 */
	function six2eight_widgets_init() {
		/*
		 * Register the primary sidebar widget area.
		 * This sidebar appears on the right side of post/page content.
		 */
		register_sidebar(
			array(
				'name'          => esc_html__( 'Primary Sidebar', 'six2eight' ),
				'id'            => 'primary-sidebar',
				'description'   => esc_html__( 'Main sidebar widget area', 'six2eight' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		/*
		 * Register the footer widget area.
		 * This sidebar appears in the footer section of the site.
		 */
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget Area', 'six2eight' ),
				'id'            => 'footer-sidebar',
				'description'   => esc_html__( 'Footer widget area for footer content', 'six2eight' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'six2eight_widgets_init' );

// ========================================
// ELEMENTOR ADDON INITIALIZATION
// ========================================

if ( ! function_exists( 'six2eight_init_elementor_addon' ) ) {
	/**
	 * Initialize Elementor addon
	 *
	 * Loads the custom Elementor widgets and addons for the theme.
	 * Checks if Elementor is active before loading.
	 *
	 * @return void
	 */
	function six2eight_init_elementor_addon() {
		// Check if Elementor is active
		if ( ! defined( 'ELEMENTOR_PATH' ) ) {
			return;
		}

		// Load Elementor addon
		require_once THEME_DIR . '/elementor-addon/class-elementor-addon.php';
	}
}
add_action( 'plugins_loaded', 'six2eight_init_elementor_addon' );

// ========================================
// CUSTOM POST TYPES INITIALIZATION
// ========================================

if ( ! function_exists( 'six2eight_init_post_types' ) ) {
	/**
	 * Initialize custom post types
	 *
	 * Loads the custom post types for the theme.
	 * Registers Six2Eight Project post type and related taxonomies.
	 *
	 * @return void
	 */
	function six2eight_init_post_types() {
		require_once THEME_DIR . '/inc/post-type/class-six2eight-project-post-type.php';
		new Six2Eight_Project_Post_Type();
	}
}
add_action( 'init', 'six2eight_init_post_types', 0 );

// ========================================
// CUSTOM THEME FUNCTIONS
// ========================================

if ( ! function_exists( 'six2eight_get_custom_logo' ) ) {
	/**
	 * Get and display the custom logo with proper fallback.
	 *
	 * This function returns HTML for the custom logo if set,
	 * otherwise it falls back to the site title.
	 *
	 * @return string The HTML for the logo.
	 */
	function six2eight_get_custom_logo() {
		$custom_logo_id = get_theme_mod( 'custom_logo' );

		if ( $custom_logo_id ) {
			return sprintf(
				'<div class="site-logo">%s</div>',
				wp_kses_post( get_custom_logo() )
			);
		}

		return '';
	}
}
add_action( 'widgets_init', 'six2eight_widgets_init' );

/**
 * Add custom classes to the body tag.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function six2eight_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'six2eight_body_classes' );

/**
 * Load Elementor files only when Elementor plugin is active.
 */
if ( class_exists( '\Elementor\Plugin' ) ) {
    require_once get_template_directory() . '/inc/elementor/elementor-init.php';
}

