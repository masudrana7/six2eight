<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Elementor Widgets
 */
function six2eight_register_elementor_widgets( $widgets_manager ) {

    /* Register Heading Widget */
    require_once __DIR__ . '/widgets/six2eight-heading-widget.php';
    $widgets_manager->register(
        new \Six2eight_Title_Widget()
    );

    /* Register Project Widget */
    require_once __DIR__ . '/widgets/six2eight-project-widget.php';
    $widgets_manager->register(
        new \Six2eight_Project_Widget()
    );
}

add_action(
    'elementor/widgets/register',
    'six2eight_register_elementor_widgets'
);