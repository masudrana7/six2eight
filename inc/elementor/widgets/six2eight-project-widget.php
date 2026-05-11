<?php
/**
 * Six2Eight Project Widget
 *
 * @package Six2Eight
 * @subpackage Elementor/Widgets
 * @since 1.0.0
 * @author Six2Eight Theme
 * @license GPL-2.0-or-later
 * @link https://example.com
 *
 * Description:
 * Professional Elementor widget for displaying projects with repeater functionality.
 * Features include customizable project cards with titles, descriptions, and images,
 * responsive grid layouts, and advanced styling controls.
 *
 * Usage:
 * The widget can be added to any Elementor-supported page or post. Users can add
 * multiple projects via the repeater control and customize the layout, spacing,
 * colors, and hover effects through the Elementor editor.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Six2eight_Project_Widget
 *
 * Main widget class that extends Elementor's Widget_Base.
 * Handles registration of controls and rendering of project grid.
 *
 * @since 1.0.0
 */
class Six2eight_Project_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieves the widget's unique name used internally by Elementor.
	 *
	 * @since 1.0.0
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'six2eight_project';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieves the widget's display name shown to users in the Elementor editor.
	 *
	 * @since 1.0.0
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Six2Eight Project', 'six2eight' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieves the widget icon displayed in the Elementor panel.
	 *
	 * @since 1.0.0
	 * @return string Widget icon class.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieves the list of categories this widget belongs to.
	 *
	 * @since 1.0.0
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Registers all content and style controls for the widget.
	 * Includes project repeater, layout options, and styling controls.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	protected function register_controls() {

		// ===========================
		// CONTENT SECTION - POST TYPE QUERY
		// ===========================
		$this->start_controls_section(
			'post_type_section',
			[
				'label' => esc_html__( 'Post Type Settings', 'six2eight' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Posts Per Page Control */
		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Posts Per Page', 'six2eight' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 100,
			]
		);

		/* Order By Control */
		$this->add_control(
			'orderby',
			[
				'label'   => esc_html__( 'Order By', 'six2eight' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'       => esc_html__( 'Date', 'six2eight' ),
					'title'      => esc_html__( 'Title', 'six2eight' ),
					'ID'         => esc_html__( 'ID', 'six2eight' ),
					'rand'       => esc_html__( 'Random', 'six2eight' ),
					'menu_order' => esc_html__( 'Menu Order', 'six2eight' ),
				],
			]
		);

		/* Order Direction Control */
		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', 'six2eight' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__( 'Descending', 'six2eight' ),
					'ASC'  => esc_html__( 'Ascending', 'six2eight' ),
				],
			]
		);

		/* Pagination Display Control */
		$this->add_control(
			'pagination_type',
			[
				'label'   => esc_html__( 'Pagination', 'six2eight' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'pagination',
				'options' => [
					'pagination' => esc_html__( 'Pagination', 'six2eight' ),
					'load_more'  => esc_html__( 'Load More Button', 'six2eight' ),
					'none'       => esc_html__( 'No Pagination', 'six2eight' ),
				],
			]
		);

		/* Load More Button Text */
		$this->add_control(
			'load_more_text',
			[
				'label'       => esc_html__( 'Load More Text', 'six2eight' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Load More Projects', 'six2eight' ),
				'placeholder' => esc_html__( 'Enter button text', 'six2eight' ),
				'condition'   => [ 'pagination_type' => 'load_more' ],
			]
		);

		/* Load More Button Link */
		$this->add_control(
			'load_more_link',
			[
				'label'       => esc_html__( 'Load More Link', 'six2eight' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://example.com', 'six2eight' ),
				'condition'   => [ 'pagination_type' => 'load_more' ],
			]
		);

		$this->end_controls_section();

		// ===========================
		// LAYOUT SECTION
		// ===========================
		$this->start_controls_section(
			'layout_section',
			[
				'label' => esc_html__( 'Layout', 'six2eight' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Column Layout Control - Choose number of columns
		$this->add_control(
			'columns',
			[
				'label'   => esc_html__( 'Columns', 'six2eight' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__( '1 Column', 'six2eight' ),
					'2' => esc_html__( '2 Columns', 'six2eight' ),
					'3' => esc_html__( '3 Columns', 'six2eight' ),
					'4' => esc_html__( '4 Columns', 'six2eight' ),
					'5' => esc_html__( '5 Columns', 'six2eight' ),
				],
			]
		);

		// Image Height Control - Responsive slider
		$this->add_responsive_control(
			'image_height',
			[
				'label'      => esc_html__( 'Image Height', 'six2eight' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 100,
						'max'  => 600,
						'step' => 10,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors'  => [
					'{{WRAPPER}} .six2eight-project-image img' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover;',
				],
			]
		);

		// Gap Between Items Control - Responsive spacing
		$this->add_responsive_control(
			'items_gap',
			[
				'label'      => esc_html__( 'Gap Between Items', 'six2eight' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 5,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors'  => [
					'{{WRAPPER}} .six2eight-projects-grid' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// ===========================
		// IMAGE STYLE SECTION
		// ===========================
		$this->start_controls_section(
			'image_style_section',
			[
				'label' => esc_html__( 'Image Style', 'six2eight' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Image Border Radius Control
		$this->add_responsive_control(
			'image_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'six2eight' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'    => [
					'top'    => 8,
					'right'  => 8,
					'bottom' => 8,
					'left'   => 8,
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .six2eight-project-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Image Hover Effect Control
		$this->add_control(
			'image_hover_effect',
			[
				'label'   => esc_html__( 'Hover Effect', 'six2eight' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'zoom',
				'options' => [
					'none'      => esc_html__( 'None', 'six2eight' ),
					'zoom'      => esc_html__( 'Zoom', 'six2eight' ),
					'grayscale' => esc_html__( 'Grayscale', 'six2eight' ),
				],
			]
		);

		$this->end_controls_section();


		// ===========================
		// TITLE STYLE SECTION
		// ===========================
		$this->start_controls_section(
			'title_style_section',
			[
				'label' => esc_html__( 'Title Style', 'six2eight' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Title Color Control
		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'six2eight' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#2D2D34',
				'selectors' => [
					'{{WRAPPER}} .six2eight-project-title' => 'color: {{VALUE}};',
				],
			]
		);

		// Title Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .six2eight-project-title',
			]
		);

		// Title Spacing Control
		$this->add_responsive_control(
			'title_margin_bottom',
			[
				'label'      => esc_html__( 'Spacing Below', 'six2eight' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 12,
				],
				'selectors'  => [
					'{{WRAPPER}} .six2eight-project-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// ===========================
		// DESCRIPTION STYLE SECTION
		// ===========================
		$this->start_controls_section(
			'description_style_section',
			[
				'label' => esc_html__( 'Description Style', 'six2eight' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Description Color Control
		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Color', 'six2eight' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#666666',
				'selectors' => [
					'{{WRAPPER}} .six2eight-project-description' => 'color: {{VALUE}};',
				],
			]
		);

		// Description Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .six2eight-project-description',
			]
		);

		$this->end_controls_section();


		// ===========================
		// CONTAINER STYLE SECTION
		// ===========================
		$this->start_controls_section(
			'container_style_section',
			[
				'label' => esc_html__( 'Container Style', 'six2eight' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Container Background Color Control
		$this->add_control(
			'container_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'six2eight' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .six2eight-project-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Container Padding Control
		$this->add_responsive_control(
			'container_padding',
			[
				'label'      => esc_html__( 'Padding', 'six2eight' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'    => [
					'top'    => 16,
					'right'  => 16,
					'bottom' => 16,
					'left'   => 16,
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .six2eight-project-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Container Border Color Control
		$this->add_control(
			'container_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'six2eight' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .six2eight-project-item' => 'border-color: {{VALUE}};',
				],
			]
		);

		// Container Border Width Control
		$this->add_responsive_control(
			'container_border_width',
			[
				'label'      => esc_html__( 'Border Width', 'six2eight' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors'  => [
					'{{WRAPPER}} .six2eight-project-item' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
				],
			]
		);

		// Container Border Radius Control
		$this->add_responsive_control(
			'container_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'six2eight' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default'    => [
					'top'    => 8,
					'right'  => 8,
					'bottom' => 8,
					'left'   => 8,
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .six2eight-project-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Container Shadow Control
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'container_box_shadow',
				'selector'  => '{{WRAPPER}} .six2eight-project-item',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on frontend.
	 *
	 * Generates the HTML markup for the project grid on the frontend.
	 * Iterates through projects from selected data source and outputs properly escaped content.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	protected function render() {

		$settings         = $this->get_settings_for_display();
		$columns          = isset( $settings['columns'] ) ? $settings['columns'] : '3';
		$hover_effect     = isset( $settings['image_hover_effect'] ) ? $settings['image_hover_effect'] : 'zoom';
		$pagination_type  = $settings['pagination_type'] ?? 'pagination';

		/* Get pagination */
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} else if ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		/* Build query arguments */
		$args = [
			'post_type'      => 'six2eight_project',
			'posts_per_page' => intval( $settings['posts_per_page'] ?? 6 ),
			'orderby'        => sanitize_text_field( $settings['orderby'] ?? 'date' ),
			'order'          => sanitize_text_field( $settings['order'] ?? 'DESC' ),
			'post_status'    => 'publish',
			'paged'          => $paged,
		];

		/* Execute query */
		$query = new \WP_Query( $args );

		if ( ! $query->have_posts() ) {
			echo '<p>' . esc_html__( 'No projects available.', 'six2eight' ) . '</p>';
			return;
		}

		?>
		<div class="six2eight-projects-wrapper">
			<div class="six2eight-projects-grid">
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
										<a href="<?php the_permalink();?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
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
									<div class="six2eight-project-image" data-hover="<?php echo esc_attr( $hover_effect ); ?>">
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
		/* Display pagination or load more button */
		if ( 'pagination' === $pagination_type ) {
			echo wp_kses_post( $this->get_pagination( $query ) );
		} elseif ( 'load_more' === $pagination_type ) {
			$load_more_text = $settings['load_more_text'] ?? esc_html__( 'Load More Projects', 'six2eight' );
			$load_more_link = isset( $settings['load_more_link']['url'] ) ? $settings['load_more_link']['url'] : '#';
			?>
			<div class="six2eight-load-more" style="text-align: center; margin-top: 30px;">
				<a class="six2eight-button" href="<?php echo esc_url( $load_more_link ); ?>"><?php echo esc_html( $load_more_text ); ?></a>
			</div>
			<?php
		}

		wp_reset_postdata();
	}

	/**
	 * Get pagination HTML
	 *
	 * Generates pagination links for project posts.
	 *
	 * @since 1.0.0
	 * @param \WP_Query $query The query object.
	 * @return string Pagination HTML.
	 */
	private function get_pagination( $query ) {
		if ( $query->max_num_pages <= 1 ) {
			return '';
		}

		$big   = 999999999;
		$paged = max( 1, get_query_var( 'paged' ) );

		$pagination_args = [
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'  => '?paged=%#%',
			'current' => $paged,
			'total'   => $query->max_num_pages,
			'type'    => 'html',
		];
		return paginate_links( $pagination_args );
	}
}
/* End of class Six2eight_Project_Widget */

