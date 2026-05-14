<?php
/**
 * Template part for full-width page content display
 *
 * @link    https://developer.wordpress.org/themes/template-parts/
 * @package six2eight
 * @since   1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'full-width-page-article' ); ?>>

	<!-- ========================================
	     PAGE HEADER
	     ======================================== -->
    <header class="entry-header">
        <div class="container">
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
        </div>
    </header><!-- .entry-header -->

	<!-- ========================================
	     PAGE CONTENT
	     ======================================== -->
	<div class="entry-content full-width-entry-content">



		<?php
		/* Display page content */
		the_content(
			sprintf(
				wp_kses(
					/* Translators: %s: post title */
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

		/* Display post pagination if needed */
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'six2eight' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<!-- ========================================
	     PAGE FOOTER / META INFO
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

