<?php
/**
 * Template part for displaying a message when no posts are found
 *
 * This template is displayed when:
 * - No posts match the current query (search, archive, etc.)
 * - The blog is empty and the user has permission to create posts
 *
 * @link    https://developer.wordpress.org/themes/template-parts/
 * @package six2eight
 */

?>

<!-- ========================================
     NO RESULTS SECTION
     ======================================== -->
<section class="no-results not-found">

	<!-- Section header -->
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Nothing here', 'six2eight' ); ?>
		</h1>
	</header><!-- .page-header -->

	<!-- Section content -->
	<div class="page-content">
		<?php
		/*
		 * Display different messages based on the context:
		 * - Home page with no posts: Show "Get started" link for admins
		 * - Search with no results: Show search form to try again
		 * - Other archives: Show search form to find what they're looking for
		 */
		if ( is_home() && current_user_can( 'publish_posts' ) ) {
			printf(
				'<p>' . wp_kses(
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'six2eight' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);
		} elseif ( is_search() ) {
			?>
			<p>
				<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'six2eight' ); ?>
			</p>
			<?php
			// Display the search form
			get_search_form();
		} else {
			?>
			<p>
				<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'six2eight' ); ?>
			</p>
			<?php
			// Display the search form
			get_search_form();
		}
		?>
	</div><!-- .page-content -->

</section><!-- .no-results -->

