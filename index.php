<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display archive pages, search results, and other query pages.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package six2eight
 */

get_header();
?>

	<!-- ========================================
	     MAIN CONTENT AREA
	     ======================================== -->
	<div class="container">
		<div class="content-area">
			<main id="main" class="site-content" role="main">

				<?php
				/*
				 * Check if there are any posts to display.
				 * If yes, loop through them and display them using the appropriate template part.
				 * If no, display the "no posts found" message.
				 */
				if ( have_posts() ) {
					// Start the WordPress loop
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the appropriate template part based on post type.
						 * - Singular posts use template-parts/content-singular.php
						 * - Archive/list posts use template-parts/content.php
						 */
						if ( is_singular() ) {
							get_template_part( 'template-parts/content', 'singular' );
						} else {
							get_template_part( 'template-parts/content' );
						}
					}

					/*
					 * Display pagination for post archives.
					 * This shows Previous/Next links for browsing through pages of posts.
					 */
					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => esc_html__( 'Previous', 'six2eight' ),
							'next_text' => esc_html__( 'Next', 'six2eight' ),
						)
					);
				} else {
					/*
					 * If no posts found, include the "no posts found" template.
					 * This displays a message when there are no posts to display.
					 */
					get_template_part( 'template-parts/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<!-- ========================================
			     SIDEBAR
			     ======================================== -->
			<?php get_sidebar(); ?>

		</div><!-- .content-area -->
	</div><!-- .container -->

<?php
get_footer();

