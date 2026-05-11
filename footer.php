<?php
/**
 * The footer for our theme
 *
 * This template displays the footer section of every page on the site.
 * It includes the footer widget areas and copyright information.
 *
 * @package six2eight
 * @link    https://example.com
 */

?>

	<!-- ========================================
	     FOOTER SECTION
	     ======================================== -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<!-- Footer widget area - displays widgets assigned to footer-sidebar -->
			<?php
			if ( is_active_sidebar( 'footer-sidebar' ) ) {
				?>
				<div class="footer-widgets">
					<?php dynamic_sidebar( 'footer-sidebar' ); ?>
				</div><!-- .footer-widgets -->
				<?php
			}
			?>

			<!-- Site info and copyright information -->
			<div class="site-info">
				<p class="copyright">
					&copy; <?php echo esc_html( date_i18n( __( 'Y', 'six2eight' ) ) ); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-link">
						<?php bloginfo( 'name' ); ?>
					</a>.
					<?php esc_html_e( 'All rights reserved.', 'six2eight' ); ?>
				</p>
				<p class="powered-by">
					<?php esc_html_e( 'Proudly powered by WordPress and Six2Eight Theme', 'six2eight' ); ?>
				</p>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->

	<!-- WordPress footer hook for wp_footer() output -->
	<?php wp_footer(); ?>

</body>
</html>

