
<?php
/**
 * Archive Template for Six2Eight Projects
 *
 * This template is used to display project archive/listing pages including:
 * - Main project archive (/projects/)
 * - Project category archives (/project-category/category-name/)
 * - Project search results
 *
 * @package     Six2Eight
 * @subpackage  Templates
 * @since       1.0.0
 * @author      Six2Eight Theme
 * @license     GPL-2.0-or-later
 *
 * Template Hierarchy:
 * - archive-six2eight_project.php (THIS FILE)
 * - archive.php
 * - index.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<!-- ========================================
     ARCHIVE HEADER SECTION
     ======================================== -->
<div class="six2eight-archive-header">
	<div class="container">
		<div class="six2eight-archive-header-content">
			<?php
			/* Display archive title */
			if ( is_tax( 'six2eight_project_category' ) ) {
				$term = get_queried_object();
				?>
				<h1 class="six2eight-archive-title">
					<?php echo esc_html( $term->name ); ?>
				</h1>
				<?php if ( ! empty( $term->description ) ) : ?>
					<p class="six2eight-archive-description">
						<?php echo wp_kses_post( $term->description ); ?>
					</p>
				<?php endif;
			} else {
				?>
				<h1 class="six2eight-archive-title">
					<?php esc_html_e( 'Our Projects', 'six2eight' ); ?>
				</h1>
				<p class="six2eight-archive-description">
					<?php esc_html_e( 'Explore our latest projects and creative work', 'six2eight' ); ?>
				</p>
			<?php } ?>
		</div>
	</div>
</div>

<!-- ========================================
     MAIN CONTENT AREA
     ======================================== -->
<div class="container">
	<main id="main" class="site-content six2eight-projects-archive" role="main">

		<?php if ( have_posts() ) : ?>

			<!-- ========================================
			     PROJECTS GRID
			     ======================================== -->
			<div class="six2eight-projects-grid-archive">
				<?php
				while ( have_posts() ) :
					the_post();
					$post_id = get_the_ID();
					?>

					<article class="six2eight-project-archive-item">
						<div class="six2eight-project-archive-inner">

							<!-- Project Image -->
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="six2eight-project-archive-image">
									<a href="<?php the_permalink(); ?>" class="six2eight-project-archive-image-link">
										<?php the_post_thumbnail( 'six2eight-medium' ); ?>
										<div class="six2eight-project-archive-overlay">
											<span class="six2eight-project-view-btn">
												<?php esc_html_e( 'View Project', 'six2eight' ); ?>
											</span>
										</div>
									</a>
								</div>
							<?php endif; ?>

							<!-- Project Content -->
							<div class="six2eight-project-archive-content">

								<!-- Project Title -->
								<h2 class="six2eight-project-archive-title">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>

								<!-- Project Excerpt -->
								<?php
								$excerpt = get_the_excerpt();
								if ( ! empty( $excerpt ) ) :
									?>
									<div class="six2eight-project-archive-excerpt">
										<?php echo wp_kses_post( wp_trim_words( $excerpt, 20 ) ); ?>
									</div>
								<?php endif; ?>

								<!-- Project Meta -->
								<div class="six2eight-project-archive-meta">

									<!-- Categories -->
									<?php
									$categories = get_the_terms( $post_id, 'six2eight_project_category' );
									if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
										?>
										<div class="six2eight-project-archive-categories">
											<?php foreach ( $categories as $category ) : ?>
												<a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="six2eight-project-archive-category">
													<?php echo esc_html( $category->name ); ?>
												</a>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>

									<!-- Date -->
									<div class="six2eight-project-archive-date">
										<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
									</div>
								</div>

								<!-- Read More Link -->
								<a href="<?php the_permalink(); ?>" class="six2eight-project-archive-link">
									<?php esc_html_e( 'Read More →', 'six2eight' ); ?>
								</a>
							</div>

						</div>
					</article>

				<?php endwhile; ?>
			</div>

			<!-- ========================================
			     PAGINATION
			     ======================================== -->
			<div class="six2eight-archive-pagination">
				<?php
				the_posts_pagination(
					[
						'mid_size'           => 2,
						'prev_text'          => esc_html__( '← Previous', 'six2eight' ),
						'next_text'          => esc_html__( 'Next →', 'six2eight' ),
						'screen_reader_text' => esc_html__( 'Posts pagination', 'six2eight' ),
					]
				);
				?>
			</div>

		<?php else : ?>

			<!-- ========================================
			     NO PROJECTS MESSAGE
			     ======================================== -->
			<div class="six2eight-no-projects">
				<div class="six2eight-no-projects-icon">
					<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="40" cy="40" r="39" stroke="#e5e5e5" stroke-width="2"/>
						<path d="M30 35H50V50H30V35Z" stroke="#d0d0d0" stroke-width="2" fill="none"/>
						<path d="M35 30L45 30L45 40L35 40V30Z" stroke="#d0d0d0" stroke-width="1.5" fill="none"/>
					</svg>
				</div>
				<h2 class="six2eight-no-projects-title">
					<?php esc_html_e( 'No projects found', 'six2eight' ); ?>
				</h2>
				<p class="six2eight-no-projects-text">
					<?php esc_html_e( 'Sorry, no projects match your search criteria. Try adjusting your filters or browse all projects.', 'six2eight' ); ?>
				</p>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'six2eight_project' ) ); ?>" class="six2eight-button-primary">
					<?php esc_html_e( 'View All Projects', 'six2eight' ); ?>
				</a>
			</div>

		<?php endif; ?>

	</main>
</div>

<?php get_footer();

