<?php
/**
 * The template for displaying search results pages
 *
 * This template is displayed when users search for posts using the WordPress search form.
 * It shows a list of posts that match the search query with pagination controls.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package six2eight
 */

get_header();
?>

	<!-- ========================================
	     SEARCH RESULTS CONTENT AREA
	     ======================================== -->
	<div class="container">
		<div class="content-area">
			<main id="main" class="site-content" role="main">

				<!-- Search results header -->
				<header class="page-header">
					<h1 class="page-title">
						<?php
						/*
						 * Display the search query results heading.
						 * Shows "Search Results for: [query]"
						 */
						printf(
							esc_html__( 'Search Results for: %s', 'six2eight' ),
							'<span class="search-query">' . esc_html( get_search_query() ) . '</span>'
						);
						?>
					</h1>
				</header><!-- .page-header -->

				<!-- Search results loop -->
				<?php
				/*
				 * Loop through the search results.
				 * Display each matching post using the content template part.
				 */
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content' );
					}

					/*
					 * Display pagination for search results.
					 * This allows users to browse through multiple pages of results.
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
					 * If no posts match the search query,
					 * display the "no results found" template.
					 */
					get_template_part( 'template-parts/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<!-- ========================================
			     SEARCH SIDEBAR
			     ======================================== -->
			<?php get_sidebar(); ?>

		</div><!-- .content-area -->
	</div><!-- .container -->

<?php
get_footer();

<?php
get_footer();

