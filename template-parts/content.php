<?php
/**
 * Template part for displaying posts in archive/listing context
 *
 * This template is used to display individual posts in archive pages,
 * search results, and home page. It shows the post excerpt along with
 * title, meta information, and featured image.
 *
 * @link    https://developer.wordpress.org/themes/template-parts/
 * @package six2eight
 */

?>

<!-- ========================================
     POST ITEM
     ======================================== -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>

	<!-- ========================================
	     POST HEADER (TITLE & META)
	     ======================================== -->
	<header class="entry-header">
		<?php
		/*
		 * Display the post title.
		 * On archive pages, wrap it in a link to the full post.
		 * On single pages, use a heading without a link.
		 */
		if ( is_singular() ) {
			the_title( '<h1 class="post-title entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="post-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

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
	     POST FEATURED IMAGE
	     ======================================== -->
	<?php
	// Display featured image if set
	if ( has_post_thumbnail() ) {
		?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'medium' ); ?>
		</div><!-- .post-thumbnail -->
		<?php
	}
	?>

	<!-- ========================================
	     POST CONTENT
	     ======================================== -->
	<div class="post-content entry-content">
		<?php
		/*
		 * Display post content.
		 * On archive pages, show the excerpt (summary).
		 * On single pages, show the full content.
		 */
		if ( is_singular() ) {
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
		} else {
			the_excerpt();
		}

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
	<?php
	// Display categories and tags only on single posts
	if ( is_singular() ) {
		?>
		<footer class="entry-footer">
			<?php
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
			?>
		</footer><!-- .entry-footer -->
		<?php
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->

