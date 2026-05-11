<?php
/**
 * The sidebar containing the main widget area
 *
 * This template displays the primary sidebar which contains widgets
 * configured in the WordPress admin panel. If no widgets are active,
 * this template returns early.
 *
 * @package six2eight
 * @link    https://example.com
 */

// Exit if the primary sidebar has no active widgets
if ( ! is_active_sidebar( 'primary-sidebar' ) ) {
	return;
}
?>

<!-- ========================================
     SIDEBAR WIDGET AREA
     ======================================== -->
<aside id="secondary" class="sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Primary Sidebar', 'six2eight' ); ?>">
	<?php
	/*
	 * Display all widgets assigned to the primary sidebar.
	 * Widgets are managed from WordPress admin under Appearance > Widgets.
	 */
	dynamic_sidebar( 'primary-sidebar' );
	?>
</aside><!-- #secondary -->

