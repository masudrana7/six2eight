<?php
/**
 * Single Six2Eight Project Post Template
 *
 * This template is used to display individual project posts for the
 * 'six2eight_project' custom post type. It includes professional styling,
 * featured images, project details, and related project display.
 *
 * @package     Six2Eight
 * @subpackage  Templates
 * @since       1.0.0
 * @author      Six2Eight Theme
 * @license     GPL-2.0-or-later
 *
 * Template Hierarchy:
 * - single-six2eight_project.php (THIS FILE)
 * - single.php
 * - index.php
 *
 * Displays:
 * - Featured image (hero section)
 * - Project title
 * - Project description/content
 * - Project metadata (category, date)
 * - Related projects
 * - Navigation to previous/next projects
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<!-- ========================================
     PROJECT HERO SECTION
     ======================================== -->
<div class="six2eight-project-hero tttttttttt">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="six2eight-project-hero-image">
			<?php the_post_thumbnail( 'six2eight-hero', [ 'class' => 'six2eight-hero-img' ] ); ?>
		</div>
	<?php endif; ?>

	<div class="six2eight-project-hero-overlay">
		<div class="container">
			<div class="six2eight-project-hero-content">
				<h1 class="six2eight-project-title-hero">
					<?php the_title(); ?>
				</h1>

				<?php
				/* Display project category */
				$categories = get_the_terms( get_the_ID(), 'six2eight_project_category' );
				if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
					?>
					<div class="six2eight-project-categories">
						<?php foreach ( $categories as $category ) : ?>
							<a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="six2eight-project-category-badge">
								<?php echo esc_html( $category->name ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<!-- Project date -->
				<div class="six2eight-project-meta">
					<span class="six2eight-project-date">
						<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ========================================
     MAIN CONTENT AREA
     ======================================== -->
<div class="container">
	<div class="six2eight-project-content-wrapper">
		<main id="main" class="site-content six2eight-project-main" role="main">
			<!-- ========================================
			     PROJECT CONTENT
			     ======================================== -->
			<div class="six2eight-project-content">

				<?php
				/* Display the main project description/content */
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>

						<div class="six2eight-project-description">
							<?php the_content(); ?>
						</div>

						<?php
						/* Display post navigation (Previous/Next) */
						the_posts_navigation(
							[
								'prev_text' => esc_html__( '← Previous Project', 'six2eight' ),
								'next_text' => esc_html__( 'Next Project →', 'six2eight' ),
							]
						);

					endwhile;
				endif;
				?>

			</div>

			<!-- ========================================
			     PROJECT SIDEBAR
			     ======================================== -->
			<aside class="six2eight-project-sidebar">

				<!-- Project Details Box -->
				<div class="six2eight-project-details-box">
					<h3><?php esc_html_e( 'Project Details', 'six2eight' ); ?></h3>

					<?php
					/* Display categories in sidebar */
					$categories = get_the_terms( get_the_ID(), 'six2eight_project_category' );
					if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
						?>
						<div class="six2eight-project-detail-item">
							<strong><?php esc_html_e( 'Category:', 'six2eight' ); ?></strong>
							<div class="six2eight-detail-value">
								<?php
								$category_links = array_map(
									function( $cat ) {
										return '<a href="' . esc_url( get_term_link( $cat ) ) . '">' . esc_html( $cat->name ) . '</a>';
									},
									$categories
								);
								echo wp_kses_post( implode( ', ', $category_links ) );
								?>
							</div>
						</div>
					<?php endif; ?>

					<!-- Publication date -->
					<div class="six2eight-project-detail-item">
						<strong><?php esc_html_e( 'Date:', 'six2eight' ); ?></strong>
						<div class="six2eight-detail-value">
							<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
						</div>
					</div>

					<!-- Author info -->
					<div class="six2eight-project-detail-item">
						<strong><?php esc_html_e( 'Author:', 'six2eight' ); ?></strong>
						<div class="six2eight-detail-value">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
								<?php the_author(); ?>
							</a>
						</div>
					</div>

				</div>

				<!-- Related Projects Widget -->
				<div class="six2eight-related-projects-widget">
					<h3><?php esc_html_e( 'Related Projects', 'six2eight' ); ?></h3>

					<?php
					/* Query related projects */
					$current_post_id = get_the_ID();
					$categories      = get_the_terms( $current_post_id, 'six2eight_project_category' );
					$category_ids    = ! empty( $categories ) && ! is_wp_error( $categories )
						? wp_list_pluck( $categories, 'term_id' )
						: [];

					$related_args = [
						'post_type'           => 'six2eight_project',
						'posts_per_page'      => 3,
						'post__not_in'        => [ $current_post_id ],
						'orderby'             => 'rand',
						'post_status'         => 'publish',
					];

					if ( ! empty( $category_ids ) ) {
						$related_args['tax_query'] = [
							[
								'taxonomy' => 'six2eight_project_category',
								'field'    => 'term_id',
								'terms'    => $category_ids,
							],
						];
					}

					$related_projects = new WP_Query( $related_args );

					if ( $related_projects->have_posts() ) :
						?>
						<div class="six2eight-related-projects-list">
							<?php
							while ( $related_projects->have_posts() ) :
								$related_projects->the_post();
								?>
								<div class="six2eight-related-project-item">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="six2eight-related-project-image">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( [ 150, 150 ] ); ?>
											</a>
										</div>
									<?php endif; ?>

									<div class="six2eight-related-project-content">
										<h4 class="six2eight-related-project-title">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h4>
										<div class="six2eight-related-project-date">
											<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<?php
					endif;

					wp_reset_postdata();
					?>

				</div>

			</aside>
		</main>

	</div>
</div>

<!-- ========================================
     COMMENTS SECTION
     ======================================== -->
<?php
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
?>

<?php
get_footer();

