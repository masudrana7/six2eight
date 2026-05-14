<?php
/**
 * Six2Eight Heading Block — server render template.
 *
 * Receives $attributes, $content, $block from register_block_type().
 *
 * @package Six2Eight
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$content        = isset( $attributes['content'] ) ? $attributes['content'] : '';
$level          = isset( $attributes['level'] ) ? intval( $attributes['level'] ) : 2;
$align          = isset( $attributes['align'] ) ? sanitize_text_field( $attributes['align'] ) : 'left';
$text_color     = isset( $attributes['textColor'] ) ? sanitize_hex_color( $attributes['textColor'] ) : '';
$font_size      = isset( $attributes['fontSize'] ) ? intval( $attributes['fontSize'] ) : 0;
$font_weight    = isset( $attributes['fontWeight'] ) ? sanitize_text_field( $attributes['fontWeight'] ) : '';
$line_height    = isset( $attributes['lineHeight'] ) ? intval( $attributes['lineHeight'] ) : 0;
$margin_top     = isset( $attributes['marginTop'] ) ? intval( $attributes['marginTop'] ) : 0;
$margin_bottom  = isset( $attributes['marginBottom'] ) ? intval( $attributes['marginBottom'] ) : 0;
$letter_spacing = isset( $attributes['letterSpacing'] ) ? sanitize_text_field( $attributes['letterSpacing'] ) : '0';

$level = max( 1, min( 6, $level ) );
$tag   = 'h' . $level;

$styles = array(
	'font-family: "Inter", sans-serif',
	'text-align: ' . esc_attr( $align ),
	'margin-top: ' . $margin_top . 'px',
	'margin-bottom: ' . $margin_bottom . 'px',
	'letter-spacing: ' . esc_attr( $letter_spacing ) . 'px',
);
if ( $text_color ) {
	$styles[] = 'color: ' . esc_attr( $text_color );
}
if ( $font_size ) {
	$styles[] = 'font-size: ' . $font_size . 'px';
}
if ( $font_weight ) {
	$styles[] = 'font-weight: ' . esc_attr( $font_weight );
}
if ( $line_height ) {
	$styles[] = 'line-height: ' . $line_height . 'px';
}

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class' => 'align' . $align,
		'style' => implode( '; ', $styles ),
	)
);

printf(
	'<%1$s %2$s>%3$s</%1$s>',
	esc_attr( $tag ),
	$wrapper_attributes,
	wp_kses_post( $content )
);
