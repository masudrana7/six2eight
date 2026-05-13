<?php
/**
 * Six2Eight Heading Gutenberg Block
 *
 * @package Six2Eight
 * @subpackage Blocks
 * @since 1.0.0
 * @author Six2Eight Theme
 * @license GPL-2.0-or-later
 *
 * Description:
 * Professional Gutenberg block for displaying customizable headings
 * with advanced typography controls and styling options.
 *
 * Features:
 * - Dynamic heading level (H1-H6)
 * - Advanced typography controls
 * - Color customization
 * - Spacing controls
 * - Alignment options
 * - Professional styling
 * - SEO-friendly markup
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Six2Eight Heading Block
 *
 * Registers the Gutenberg block with all attributes and settings.
 *
 * @since 1.0.0
 * @return void
 */
function six2eight_register_heading_block() {

	// Check if block.json exists
	$block_json_path = get_template_directory() . '/inc/blocks/six2eight-heading/block.json';

	if ( ! file_exists( $block_json_path ) ) {
		return;
	}

	// Register block using block.json (WordPress 5.0+)
	// block.json handles all script and style registration
	register_block_type(
		$block_json_path,
		array(
			'render_callback' => 'six2eight_render_heading_block',
		)
	);
}
add_action( 'init', 'six2eight_register_heading_block' );

/**
 * Render Six2Eight Heading Block
 *
 * Renders the block output on the frontend.
 *
 * @since 1.0.0
 * @param array $attributes Block attributes.
 * @return string Block HTML output.
 */
function six2eight_render_heading_block( $attributes ) {

	// Set default attributes
	$content = isset( $attributes['content'] ) ? wp_kses_post( $attributes['content'] ) : '';
	$level = isset( $attributes['level'] ) ? intval( $attributes['level'] ) : 2;
	$align = isset( $attributes['align'] ) ? sanitize_text_field( $attributes['align'] ) : 'left';
	$text_color = isset( $attributes['textColor'] ) ? sanitize_hex_color( $attributes['textColor'] ) : '#2D2D34';
	$font_size = isset( $attributes['fontSize'] ) ? intval( $attributes['fontSize'] ) : 60;
	$font_weight = isset( $attributes['fontWeight'] ) ? sanitize_text_field( $attributes['fontWeight'] ) : '700';
	$line_height = isset( $attributes['lineHeight'] ) ? intval( $attributes['lineHeight'] ) : 72;
	$margin_top = isset( $attributes['marginTop'] ) ? intval( $attributes['marginTop'] ) : 20;
	$margin_bottom = isset( $attributes['marginBottom'] ) ? intval( $attributes['marginBottom'] ) : 20;
	$letter_spacing = isset( $attributes['letterSpacing'] ) ? sanitize_text_field( $attributes['letterSpacing'] ) : '0';

	// Build heading tag
	$tag = sprintf( 'h%d', $level );

	// Build inline style
	$style = sprintf(
		'text-align: %s; color: %s; font-size: %dpx; font-weight: %s; line-height: %dpx; letter-spacing: %spx; margin-top: %dpx; margin-bottom: %dpx; font-family: "Inter", sans-serif;',
		esc_attr( $align ),
		esc_attr( $text_color ),
		$font_size,
		esc_attr( $font_weight ),
		$line_height,
		esc_attr( $letter_spacing ),
		$margin_top,
		$margin_bottom
	);

	// Return heading markup
	return sprintf(
		'<%s class="wp-block-six2eight-heading" style="%s">%s</%s>',
		$tag,
		$style,
		$content,
		$tag
	);
}

