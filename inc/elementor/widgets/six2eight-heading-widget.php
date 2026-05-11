<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Six2eight_Title_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'six2eight_title';
    }

    public function get_title() {
        return esc_html__( 'Six2Eight Heading Widget', 'six2eight' );
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        /* =======================
         * CONTENT SECTION
         * ======================= */
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'six2eight' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Title
        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'six2eight' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Heading Title', 'six2eight' ),
                'placeholder' => esc_html__( 'Enter title', 'six2eight' ),
            ]
        );

        // Title Tag
        $this->add_control(
            'title_tag',
            [
                'label'   => esc_html__( 'Title HTML Tag', 'six2eight' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            ]
        );

        // Subtitle
        $this->add_control(
            'subtitle',
            [
                'label'   => esc_html__( 'Subtitle', 'six2eight' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Subtitle here', 'six2eight' ),
            ]
        );

        // Short Description (NEW)
        $this->add_control(
            'short_description',
            [
                'label'   => esc_html__( 'Short Description', 'six2eight' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Short description here...', 'six2eight' ),
                'rows'    => 3,
            ]
        );

        // Description
        $this->add_control(
            'description',
            [
                'label'   => esc_html__( 'Description', 'six2eight' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Write description here...', 'six2eight' ),
                'rows'    => 5,
            ]
        );

        $this->end_controls_section();


        /* =======================
         * TITLE STYLE
         * ======================= */
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__( 'Title Style', 'six2eight' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'six2eight' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .six2eight-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .six2eight-title',
            ]
        );

        $this->end_controls_section();


        /* =======================
         * SUBTITLE STYLE
         * ======================= */
        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => esc_html__( 'Subtitle Style', 'six2eight' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => esc_html__( 'Color', 'six2eight' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .six2eight-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .six2eight-subtitle',
            ]
        );

        $this->end_controls_section();


        /* =======================
         * SHORT DESCRIPTION STYLE
         * ======================= */
        $this->start_controls_section(
            'short_desc_style_section',
            [
                'label' => esc_html__( 'Short Description Style', 'six2eight' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'short_desc_color',
            [
                'label'     => esc_html__( 'Color', 'six2eight' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .six2eight-short-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'short_desc_typography',
                'selector' => '{{WRAPPER}} .six2eight-short-description',
            ]
        );

        $this->add_responsive_control(
            'short_desc_width',
            [
                'label' => esc_html__( 'Width', 'six2eight' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px' ],
                'range' => [
                    '%' => [ 'min' => 10, 'max' => 100 ],
                    'px' => [ 'min' => 100, 'max' => 1200 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .six2eight-short-description' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'short_desc_align',
            [
                'label' => esc_html__( 'Alignment', 'six2eight' ),
                'type'  => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'six2eight' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'six2eight' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'six2eight' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .six2eight-short-description' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        /* =======================
         * DESCRIPTION STYLE
         * ======================= */
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__( 'Description Style', 'six2eight' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__( 'Color', 'six2eight' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .six2eight-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'selector' => '{{WRAPPER}} .six2eight-description',
            ]
        );

        $this->end_controls_section();
    }


    /* =======================
     * FRONTEND OUTPUT
     * ======================= */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $title              = $settings['title'];
        $title_tag          = $settings['title_tag'];
        $subtitle           = $settings['subtitle'];
        $short_description  = $settings['short_description'];
        $description        = $settings['description'];

        ?>

        <div class="six2eight-heading-widget">

        <?php if ( ! empty( $title ) ) : ?>
            <<?php echo esc_attr( $title_tag ); ?> class="six2eight-title">
            <?php echo esc_html( $title ); ?>

            <?php if ( ! empty( $subtitle ) ) : ?>
                <span class="six2eight-subtitle">
                            <?php echo esc_html( $subtitle ); ?>
                        </span>
            <?php endif; ?>

            </<?php echo esc_attr( $title_tag ); ?>>
        <?php endif; ?>


        <?php if ( ! empty( $short_description ) ) : ?>
            <div class="six2eight-short-description">
                <?php echo esc_html( $short_description ); ?>
            </div>
        <?php endif; ?>


        <?php if ( ! empty( $description ) ) : ?>
            <div class="six2eight-description">
                <?php echo wp_kses_post( nl2br( $description ) ); ?>
            </div>
        <?php endif; ?>

        </div>

        <?php
    }
}