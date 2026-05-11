<?php
/**
 * Six2Eight Project Gutenberg Block
 *
 * @package Six2Eight
 * @subpackage Blocks
 * @since 1.0.0
 * @author Six2Eight Theme
 * @license GPL-2.0-or-later
 *
 * Description:
 * Professional Gutenberg block for displaying Six2Eight Project post type
 * with dynamic content, responsive grid layout, and style controls.
 *
 * Features:
 * - Dynamic post type query
 * - Responsive grid layout
 * - Width style control
 * - Block styling options
 * - Columns configuration
 * - Pagination support
 * - SEO-friendly markup
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Six2Eight Project Block
 *
 * Registers the Gutenberg block with all attributes and settings.
 *
 * @since 1.0.0
 * @return void
 */
function six2eight_register_project_block() {

	// Register block script
	wp_register_script(
		'six2eight-project-block',
		get_template_directory_uri() . '/inc/blocks/six2eight-project/block.js',
		[
			'wp-blocks',
			'wp-element',
			'wp-editor',
			'wp-components',
			'wp-i18n',
		],
		filemtime( get_template_directory() . '/inc/blocks/six2eight-project/block.js' )
	);

	// Register block styles
	wp_register_style(
		'six2eight-project-block',
		get_template_directory_uri() . '/inc/blocks/six2eight-project/style.css',
		[],
		filemtime( get_template_directory() . '/inc/blocks/six2eight-project/style.css' )
	);

	// Register block editor styles
	wp_register_style(
		'six2eight-project-block-editor',
		get_template_directory_uri() . '/inc/blocks/six2eight-project/editor.css',
		[ 'wp-edit-blocks' ],
		filemtime( get_template_directory() . '/inc/blocks/six2eight-project/editor.css' )
	);

	// Register the block
	register_block_type(
		get_template_directory() . '/inc/blocks/six2eight-project',
		[
			'editor_script'   => 'six2eight-project-block',
			'script'          => 'six2eight-project-block',
			'style'           => 'six2eight-project-block',
			'editor_style'    => 'six2eight-project-block-editor',
			'render_callback' => 'six2eight_render_project_block',
		]
	);
}
add_action( 'init', 'six2eight_register_project_block' );

/**
 * Render Six2Eight Project Block
 *
 * Renders the block output on the frontend.
 *
 * @since 1.0.0
 * @param array $attributes Block attributes.
 * @return string Block HTML output.
 */
function six2eight_render_project_block( $attributes ) {

	// Set default attributes
	$posts_per_page = isset( $attributes['postsPerPage'] ) ? intval( $attributes['postsPerPage'] ) : 6;
	$columns        = isset( $attributes['columns'] ) ? intval( $attributes['columns'] ) : 3;
	$orderby        = isset( $attributes['orderby'] ) ? sanitize_text_field( $attributes['orderby'] ) : 'date';
	$order          = isset( $attributes['order'] ) ? sanitize_text_field( $attributes['order'] ) : 'DESC';
	$width          = isset( $attributes['width'] ) ? sanitize_text_field( $attributes['width'] ) : 'wide';
	$alignment      = isset( $attributes['align'] ) ? sanitize_text_field( $attributes['align'] ) : 'none';

	/* Get current page for pagination */
	$paged = max( 1, get_query_var( 'paged' ) ?: 1 );

	/* Build query arguments */
	$args = [
		'post_type'      => 'six2eight_project',
		'posts_per_page' => $posts_per_page,
		'orderby'        => $orderby,
		'order'          => $order,
		'post_status'    => 'publish',
		'paged'          => $paged,
	];

	/* Execute query */
	$query = new WP_Query( $args );

	if ( ! $query->have_posts() ) {
		return '<p class="six2eight-no-projects">' . esc_html__( 'No projects available.', 'six2eight' ) . '</p>';
	}

	/* Build wrapper classes */
	$wrapper_classes = [
		'six2eight-projects-wrapper',
		'align' . $alignment,
		'is-width-' . $width,
	];

	/* Start output buffering */
	ob_start();
	?>

	<div class="<?php echo esc_attr( implode( ' ', $wrapper_classes ) ); ?>">
		<div class="six2eight-projects-grid" style="--columns: <?php echo intval( $columns ); ?>;">
			<?php while ( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
				<?php $post_id = get_the_ID(); ?>

				<div class="six2eight-project-item">
					<div class="six2eight-project-content">
						<?php if ( ! empty( get_the_title( $post_id ) ) ) : ?>
							<div class="six2eight-normal-content">
								<div class="six2eight-icon">
									<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M35.625 19C35.625 28.1675 28.1675 35.625 19 35.625C9.8325 35.625 2.375 28.1675 2.375 19C2.375 9.8325 9.8325 2.375 19 2.375C28.1675 2.375 35.625 9.8325 35.625 19ZM4.75 19C4.75 26.8613 11.1388 33.25 19 33.25C26.8613 33.25 33.25 26.8613 33.25 19C33.25 11.1388 26.8613 4.75 19 4.75C11.1388 4.75 4.75 11.1388 4.75 19Z" fill="#9C9CA7"/>
										<path d="M27.3125 19C27.3125 19.665 26.79 20.1875 26.125 20.1875L11.875 20.1875C11.21 20.1875 10.6875 19.665 10.6875 19C10.6875 18.335 11.21 17.8125 11.875 17.8125L26.125 17.8125C26.79 17.8125 27.3125 18.335 27.3125 19Z" fill="#9C9CA7"/>
										<path d="M20.1875 11.875L20.1875 26.125C20.1875 26.79 19.665 27.3125 19 27.3125C18.335 27.3125 17.8125 26.79 17.8125 26.125L17.8125 11.875C17.8125 11.21 18.335 10.6875 19 10.6875C19.665 10.6875 20.1875 11.21 20.1875 11.875Z" fill="#9C9CA7"/>
									</svg>
								</div>
								<h3 class="six2eight-project-title-visible">
									<?php echo esc_html( get_the_title( $post_id ) ); ?>
								</h3>
							</div>
						<?php endif; ?>

						<div class="project-active-content">
							<?php if ( ! empty( get_the_title( $post_id ) ) ) : ?>
								<h3 class="six2eight-project-title">
									<a href="<?php the_permalink(); ?>">
										<?php echo esc_html( get_the_title( $post_id ) ); ?>
									</a>
								</h3>
							<?php endif; ?>

							<?php $project_description = get_post_meta( $post_id, '_project_description', true ) ?: get_the_excerpt( $post_id ); ?>
							<?php if ( ! empty( $project_description ) ) : ?>
								<div class="six2eight-project-description">
									<?php echo wp_kses_post( nl2br( $project_description ) ); ?>
								</div>
							<?php endif; ?>

							<?php $project_image = get_the_post_thumbnail_url( $post_id, 'full' ); ?>
							<?php if ( ! empty( $project_image ) ) : ?>
								<div class="six2eight-project-image">
									<img src="<?php echo esc_url( $project_image ); ?>"
										 alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>"
										 loading="lazy" />
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
		</div>
	</div>

	<?php

	/* Get output */
	$output = ob_get_clean();

	/* Reset query */
	wp_reset_postdata();

	return $output;
}

