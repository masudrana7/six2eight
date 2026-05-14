<?php
/**
 * Template Name: Full Width
 * Template Post Type: page
 *
 * Full width page template without sidebar
 *
 * This template displays pages in a full-width layout,
 * removing the sidebar and extending content to use the entire page width.
 * Ideal for landing pages, feature showcases, and hero sections.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package six2eight
 * @since   1.0.0
 */

get_header();
?>

	<!-- ========================================
	     FULL WIDTH PAGE CONTENT AREA
	     ======================================== -->
	<div class="full-width-page-wrapper">
		<main id="main" class="site-content full-width-content" role="main">

			<?php
			/* Loop through posts on page */
			while ( have_posts() ) {
				the_post();

				/* Get full width template part for content */
				get_template_part( 'template-parts/content', 'full-width' );

				/* Comments section if enabled */
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}
			?>

		</main><!-- #main -->
	</div><!-- .full-width-page-wrapper -->

<?php
get_footer();

