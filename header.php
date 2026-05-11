<?php
/**
 * The header for our theme
 *
 * This template is used to display the header of every page on the site.
 * It includes the DOCTYPE declaration, head section with meta tags,
 * and the main header/navigation area.
 *
 * @package six2eight
 * @link    https://example.com
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Character set declaration -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!-- Viewport meta tag for responsive design -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- XFN profile link for social networking metadata -->
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- WordPress head hook for wp_head() output -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Skip link for accessibility - allows users to skip to main content -->
	<a class="skip-link screen-reader-text" href="#main">
		<?php esc_html_e( 'Skip to content', 'six2eight' ); ?>
	</a>

	<!-- ========================================
	     HEADER & SITE BRANDING
	     ======================================== -->
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<!-- Site branding section with logo and title -->
			<div class="site-branding">
				<?php
				// Display custom logo if set, otherwise show site title
				if ( has_custom_logo() ) {
					the_custom_logo();
				}
				?>
				<div class="site-info">
					<?php
					// Display site title as h1 on front page, p elsewhere
					if ( is_front_page() && is_home() ) {
						?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
						<?php
					} else {
						?>
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</p>
						<?php
					}

					// Display site description/tagline if set
					$six2eight_description = get_bloginfo( 'description', 'display' );
					if ( $six2eight_description || is_customize_preview() ) {
						?>
						<p class="site-description">
							<?php echo esc_html( $six2eight_description ); ?>
						</p>
						<?php
					}
					?>
				</div>
			</div><!-- .site-branding -->

			<!-- ========================================
			     DESKTOP NAVIGATION
			     ======================================== -->
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'six2eight' ); ?>">
				<?php
				/*
				 * Display primary navigation menu.
				 * If no menu is assigned, WordPress will display a fallback list of pages.
				 */
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => 'wp_page_menu',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

			<!-- ========================================
			     MOBILE MENU TOGGLE BUTTON
			     ======================================== -->
			<button id="menu-toggle" class="menu-toggle" aria-label="<?php esc_attr_e( 'Toggle Menu', 'six2eight' ); ?>" aria-expanded="false" aria-controls="canvas-menu">
				<!-- Hamburger icon -->
				<span class="hamburger"></span>
			</button>
		</div><!-- .container -->
	</header><!-- #masthead -->

	<!-- ========================================
	     CANVAS MENU OVERLAY (MOBILE SIDEBAR)
	     ======================================== -->
	<!-- Overlay backdrop that appears when canvas menu is opened -->
	<div id="canvas-overlay" class="canvas-overlay" role="presentation"></div>

	<!-- Slide-out canvas menu for mobile navigation -->
	<div id="canvas-menu" class="canvas-menu" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'six2eight' ); ?>">
		<!-- Close button for canvas menu -->
		<button id="canvas-close" class="canvas-menu-close" aria-label="<?php esc_attr_e( 'Close Menu', 'six2eight' ); ?>">
			<!-- Close icon -->
			<span>&times;</span>
		</button>

		<!-- Primary navigation menu in canvas (mobile) version -->
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'canvas-menu-list',
				'fallback_cb'    => 'wp_page_menu',
				'container'      => false,
				'depth'          => 3,
			)
		);
		?>
	</div><!-- #canvas-menu -->

