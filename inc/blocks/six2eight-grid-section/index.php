<?php
/**
 * Six2Eight Grid Section Block — Dynamic Render Template
 *
 * Displays the grid section block with all configured boxes and content.
 * This template is called on the frontend to render the saved block data.
 *
 * Receives $attributes from the block's save.js output.
 *
 * @package Six2Eight
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_title = isset( $attributes['sectionTitle'] )
	? sanitize_text_field( $attributes['sectionTitle'] )
	: 'Grid Section Title';

$button_text = isset( $attributes['buttonText'] )
	? sanitize_text_field( $attributes['buttonText'] )
	: 'View More';

$button_link = isset( $attributes['buttonLink'] )
	? esc_url( $attributes['buttonLink'] )
	: '';

$columns = isset( $attributes['columns'] )
	? absint( $attributes['columns'] )
	: 3;

$box_content = isset( $attributes['boxContent'] )
	? $attributes['boxContent']
	: array();

$background_color = isset( $attributes['backgroundColor'] )
	? sanitize_hex_color( $attributes['backgroundColor'] )
	: '#ffffff';

$text_color = isset( $attributes['textColor'] )
	? sanitize_hex_color( $attributes['textColor'] )
	: '#2D2D34';

$section_style = sprintf(
	'background-color: %s; color: %s;',
	esc_attr( $background_color ),
	esc_attr( $text_color )
);

$grid_style = sprintf(
	'grid-template-columns: repeat(%d, 1fr);',
	esc_attr( $columns )
);
?>

<!-- Grid Section Block -->
<div class="six2eight-grid-section" style="<?php echo $section_style; ?>">

	<!-- Section Header -->
	<div class="six2eight-grid-section-header">
		<h2 class="six2eight-grid-section-title">
			<?php echo wp_kses_post( $section_title ); ?>
		</h2>
	</div>

	<!-- Grid Container -->
	<div class="six2eight-grid-section-grid" style="<?php echo $grid_style; ?>">
		<?php
		if ( ! empty( $box_content ) && is_array( $box_content ) ) {
			foreach ( $box_content as $box ) {
				$price = isset( $box['price'] ) ? sanitize_text_field( $box['price'] ) : '';
				$year = isset( $box['year'] ) ? sanitize_text_field( $box['year'] ) : '';
				$short_description = isset( $box['shortDescription'] ) ? sanitize_text_field( $box['shortDescription'] ) : '';
				$description = isset( $box['description'] ) ? sanitize_textarea_field( $box['description'] ) : '';
				?>

				<div class="six2eight-grid-box">

					<!-- Price -->
					<?php if ( ! empty( $price ) ) : ?>
						<div class="six2eight-box-price">
							<?php echo wp_kses_post( $price ); ?>
						</div>
					<?php endif; ?>

					<!-- Year -->
					<?php if ( ! empty( $year ) ) : ?>
						<div class="six2eight-box-year">
							<?php echo wp_kses_post( $year ); ?>
						</div>
					<?php endif; ?>

					<!-- Short Description -->
					<?php if ( ! empty( $short_description ) ) : ?>
						<div class="six2eight-box-short-description">
							<?php echo wp_kses_post( $short_description ); ?>
						</div>
					<?php endif; ?>

					<!-- Full Description -->
					<?php if ( ! empty( $description ) ) : ?>
						<div class="six2eight-box-description">
							<?php echo wp_kses_post( nl2br( $description ) ); ?>
						</div>
					<?php endif; ?>

				</div><!-- .six2eight-grid-box -->

			<?php
			}
		}
		?>
	</div><!-- .six2eight-grid-section-grid -->

	<!-- Call-to-Action Button -->
	<?php if ( ! empty( $button_text ) ) : ?>
		<div class="six2eight-grid-section-button-wrapper">
			<a href="<?php echo $button_link; ?>" class="six2eight-grid-section-button">
				<?php echo wp_kses_post( $button_text ); ?>
			</a>
		</div>
	<?php endif; ?>

</div><!-- .six2eight-grid-section -->

