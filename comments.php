<?php
/**
 * The template for displaying comments
 *
 * This template displays the comments section, comment list, and comment form.
 * It handles password-protected posts and displays appropriate messages.
 *
 * @package six2eight
 * @link    https://example.com
 */

// Exit if post is password protected and password is not provided
if ( post_password_required() ) {
	return;
}
?>

<!-- ========================================
     COMMENTS SECTION
     ======================================== -->
<div id="comments" class="comments-area">

	<?php
	// Check if there are any comments
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			/*
			 * Display the number of comments with proper pluralization.
			 * Example: "One thought on "Title"" or "5 thoughts on "Title""
			 */
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				esc_html_e( 'One thought on &ldquo;', 'six2eight' );
				the_title();
				esc_html_e( '&rdquo;', 'six2eight' );
			} else {
				printf(
					esc_html( _nx( '%s thought on &ldquo;%s&rdquo;', '%s thoughts on &ldquo;%s&rdquo;', $comments_number, 'comments title', 'six2eight' ) ),
					number_format_i18n( $comments_number ),
					wp_kses_post( get_the_title() )
				);
			}
			?>
		</h2><!-- .comments-title -->

		<!-- List of comments -->
		<ol class="comment-list">
			<?php
			/*
			 * Display the list of comments with threaded reply support.
			 * Each comment is displayed using WordPress's comment callback.
			 */
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 50,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<!-- Comment pagination -->
		<?php
		// Display pagination for comments if there are multiple pages
		the_comments_pagination(
			array(
				'prev_text' => esc_html__( 'Older Comments', 'six2eight' ),
				'next_text' => esc_html__( 'Newer Comments', 'six2eight' ),
			)
		);
	}

	/*
	 * If comments are closed and there are comments,
	 * display a message to the user.
	 */
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		?>
		<p class="no-comments">
			<?php esc_html_e( 'Comments are closed.', 'six2eight' ); ?>
		</p>
		<?php
	}

	/*
	 * Display the comment form.
	 * This allows visitors to leave new comments on the post.
	 */
	comment_form(
		array(
			'logged_in_as'      => '<p class="logged-in-as">' . sprintf(
				wp_kses(
					__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>', 'six2eight' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				),
				esc_url( admin_url( 'profile.php' ) ),
				wp_kses_post( $GLOBALS['current_user']->display_name ),
				esc_url( wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) )
			) . '</p>',
			'title_reply'       => esc_html__( 'Leave a Comment', 'six2eight' ),
			'label_submit'      => esc_html__( 'Post Comment', 'six2eight' ),
			'comment_field'     => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'six2eight' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" required aria-required="true"></textarea></p>',
		)
	);
	?>

</div><!-- #comments -->

