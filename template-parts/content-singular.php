<?php
/**
 * Template part for displaying singular posts
 *
 * This template is used to display single posts and pages.
 * It shows the full post/page content with all metadata and options.
 *
 * @link    https://developer.wordpress.org/themes/template-parts/
 * @package six2eight
 */

?>

<!-- ========================================
     SINGULAR POST/PAGE ITEM
     ======================================== -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>

	<!-- ========================================
	     SINGLE POST HEADER (TITLE & META)
	     ======================================== -->
	<header class="entry-header">
		<?php
		// Display the post/page title
		the_title( '<h1 class="post-title entry-title">', '</h1>' );

		// Display post meta information for posts (not pages)
		if ( 'post' === get_post_type() ) {
			?>
			<div class="post-meta entry-meta">
				<?php
				// Display author information
				esc_html_e( 'By', 'six2eight' );
				echo ' ';
				the_author_posts_link();
				echo ' | ';

				// Display publication date
				esc_html_e( 'Published on', 'six2eight' );
				echo ' ';
				the_time( get_option( 'date_format' ) );
				?>
			</div><!-- .post-meta -->
			<?php
		}
		?>
	</header><!-- .entry-header -->

	<!-- ========================================
	     FEATURED IMAGE
	     ======================================== -->
	<?php
	// Display featured image if set
	if ( has_post_thumbnail() ) {
		?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'large' ); ?>
		</div><!-- .post-thumbnail -->
		<?php
	}
	?>

	<!-- ========================================
	     POST/PAGE CONTENT
	     ======================================== -->
	<div class="post-content entry-content">
		<?php
		/*
		 * Display the full post/page content.
		 * This includes all text, images, and other content elements.
		 */
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'six2eight' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		/*
		 * Display page links for multi-page posts.
		 * This shows links to navigate between pages within a single post.
		 */
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'six2eight' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<!-- ========================================
	     POST FOOTER (CATEGORIES & TAGS)
	     ======================================== -->
	<footer class="entry-footer">
		<?php
		// Display categories and tags for posts only
		if ( 'post' === get_post_type() ) {
			// Display categories
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				echo esc_html__( 'Categories: ', 'six2eight' );
				echo wp_kses_post( get_the_category_list( ', ' ) );
				echo ' | ';
			}

			// Display tags
			$tags = get_the_tags();
			if ( ! empty( $tags ) ) {
				echo esc_html__( 'Tags: ', 'six2eight' );
				echo wp_kses_post( get_the_tag_list( '', ', ' ) );
			}
		}
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php
/*
 * If comments are open or there are existing comments,
 * display the comments template.
 */
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>

