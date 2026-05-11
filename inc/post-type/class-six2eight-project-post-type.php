<?php
/**
 * Six2Eight Project Post Type
 *
 * @package Six2Eight
 * @subpackage PostType
 * @since 1.0.0
 * @author Six2Eight Theme
 * @license GPL-2.0-or-later
 * @link https://example.com
 *
 * Description:
 * Registers custom post type 'Six2eight Project' with professional configuration.
 * Includes support for featured images, custom fields, and admin customization.
 * Provides admin menu integration and archive/single page support.
 *
 * Usage:
 * This class is automatically instantiated in the theme and registers
 * the custom post type on the 'init' hook. No additional configuration needed.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Six2Eight_Project_Post_Type
 *
 * Handles registration and configuration of the Six2eight Project custom post type.
 *
 * @since 1.0.0
 */
class Six2Eight_Project_Post_Type {

	/**
	 * Constructor
	 *
	 * Initializes the post type registration hooks.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'register_post_type' ], 10 );
	}

	/**
	 * Register Six2eight Project Post Type
	 *
	 * Registers the custom post type with all necessary arguments including
	 * labels, supports, capabilities, and UI settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function register_post_type() {

		/* Post Type Labels */
		$labels = [
			'name'                  => esc_html_x( 'Six2Eight Projects', 'Post Type General Name', 'six2eight' ),
			'singular_name'         => esc_html_x( 'Six2Eight Project', 'Post Type Singular Name', 'six2eight' ),
			'menu_name'             => esc_html__( 'Projects', 'six2eight' ),
			'name_admin_bar'        => esc_html__( 'Six2Eight Project', 'six2eight' ),
			'archives'              => esc_html__( 'Project Archives', 'six2eight' ),
			'attributes'            => esc_html__( 'Project Attributes', 'six2eight' ),
			'parent_item_colon'     => esc_html__( 'Parent Project:', 'six2eight' ),
			'all_items'             => esc_html__( 'All Projects', 'six2eight' ),
			'add_new_item'          => esc_html__( 'Add New Project', 'six2eight' ),
			'add_new'               => esc_html__( 'Add New', 'six2eight' ),
			'new_item'              => esc_html__( 'New Project', 'six2eight' ),
			'edit_item'             => esc_html__( 'Edit Project', 'six2eight' ),
			'update_item'           => esc_html__( 'Update Project', 'six2eight' ),
			'view_item'             => esc_html__( 'View Project', 'six2eight' ),
			'view_items'            => esc_html__( 'View Projects', 'six2eight' ),
			'search_items'          => esc_html__( 'Search Projects', 'six2eight' ),
			'not_found'             => esc_html__( 'Not found', 'six2eight' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'six2eight' ),
			'featured_image'        => esc_html__( 'Featured Image', 'six2eight' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'six2eight' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'six2eight' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'six2eight' ),
			'insert_into_item'      => esc_html__( 'Insert into project', 'six2eight' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this project', 'six2eight' ),
			'items_list'            => esc_html__( 'Projects list', 'six2eight' ),
			'items_list_navigation' => esc_html__( 'Projects list navigation', 'six2eight' ),
			'filter_items_list'     => esc_html__( 'Filter projects list', 'six2eight' ),
		];

		/* Post Type Arguments */
		$args = [
			'label'                 => esc_html__( 'Six2Eight Project', 'six2eight' ),
			'description'           => esc_html__( 'Custom post type for managing project showcases', 'six2eight' ),
			'labels'                => $labels,
			'supports'              => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ],
			'taxonomies'            => [ 'six2eight_project_category' ],
			'hierarchical'          => false,
			'public'                => true,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'show_in_rest'          => true,
			'rest_base'             => 'six2eight-projects',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive'           => 'projects',
			'exclude_from_search'   => false,
			'capability_type'       => 'post',
			'map_meta_cap'          => true,
			'can_export'            => true,
			'delete_with_user'      => false,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-grid-view',
			'rewrite'               => [
				'slug'       => 'project',
				'with_front' => true,
				'pages'      => true,
				'feeds'      => true,
			],
		];

		/* Register the post type */
		register_post_type( 'six2eight_project', $args );
	}
}

/* End of class Six2Eight_Project_Post_Type */

