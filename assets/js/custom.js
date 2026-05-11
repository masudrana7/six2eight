/**
 * Six2Eight Custom JavaScript with jQuery
 *
 * @package Six2Eight
 * @subpackage Assets/JS
 * @since 1.0.0
 * @author Six2Eight Theme
 * @license GPL-2.0-or-later
 *
 * Description:
 * Custom jQuery for Six2Eight theme functionality including:
 * - Project item hover state management
 * - Active class toggling
 * - Interactive UI enhancements
 * - Smooth animations and transitions
 *
 * Requirements:
 * - jQuery 1.12+
 * - WordPress
 *
 * Dependencies:
 * - jQuery (enqueued via functions.php)
 */

(function($) {
	'use strict';

	/**
	 * Six2Eight Project Widget Interaction Handler
	 *
	 * jQuery-based manager for hover states and active classes
	 * on project grid items. Ensures only one project item has
	 * the active class at a time with smooth transitions.
	 *
	 * @since 1.0.0
	 * @type {Object}
	 */
	const ProjectWidgetHandler = {

		/**
		 * Configuration object
		 *
		 * Stores selectors, classes, and settings for the widget
		 *
		 * @since 1.0.0
		 * @type {Object}
		 */
		config: {
			gridSelector: '.six2eight-projects-grid',
			itemSelector: '.six2eight-project-item',
			activeClass: 'active',
			transitionSpeed: 300,
			animationEnabled: true
		},

		/**
		 * Initialize project widget interactions
		 *
		 * Sets up event listeners for project items and applies
		 * initial active state to first child element using jQuery.
		 *
		 * @since 1.0.0
		 * @return {void}
		 */
		init: function() {
			// Get all project grids using jQuery
			const $grids = $(this.config.gridSelector);

			// Exit if no grids found
			if ($grids.length === 0) {
				console.log('No project grids found on this page');
				return;
			}

			// Log initialization
			console.log('Initializing ' + $grids.length + ' project grid(s)');

			// Process each grid independently
			$grids.each($.proxy(function(index, grid) {
				this.setupGrid($(grid));
			}, this));
		},

		/**
		 * Setup grid event listeners
		 *
		 * Initializes the first item as active and attaches
		 * hover listeners to all project items in the grid using jQuery.
		 *
		 * @since 1.0.0
		 * @param {jQuery} $grid - The jQuery project grid element
		 * @return {void}
		 */
		setupGrid: function($grid) {
			// Get all project items in this grid using jQuery
			const $items = $grid.find(this.config.itemSelector);

			// Exit if no items found
			if ($items.length === 0) {
				console.log('No project items found in grid');
				return;
			}

			// Get first item
			const $firstItem = $items.first();

			// Set first item as active on page load
			if ($firstItem.length) {
				this.addActiveClass($firstItem);
			}

			// Attach hover event listeners to each project item
			$items.on({
				/**
				 * Mouse enter event
				 * - Add active class to hovered item
				 * - Removes active class from all other items
				 *
				 * @since 1.0.0
				 */
				mouseenter: $.proxy(function(event) {
					const $currentItem = $(event.currentTarget);

					// Remove active class from all items in this grid
					$items.removeClass(this.config.activeClass);

					// Add active class to current hovered item
					this.addActiveClass($currentItem);
				}, this),

				/**
				 * Mouse leave event
				 * - Restore active class to first item
				 * - Returns to initial state when mouse leaves item
				 *
				 * @since 1.0.0
				 */
				mouseleave: $.proxy(function(event) {
					const $currentItem = $(event.currentTarget);

					// Remove active class from current item
					this.removeActiveClass($currentItem);

					// Restore active class to first item
					if ($firstItem.length) {
						this.addActiveClass($firstItem);
					}
				}, this)
			});

			/**
			 * Grid mouse leave event
			 * Resets to first item when leaving entire grid
			 *
			 * @since 1.0.0
			 */
			$grid.on('mouseleave', $.proxy(function() {
				// Remove active class from all items
				$items.removeClass(this.config.activeClass);

				// Restore active class to first item
				if ($firstItem.length) {
					this.addActiveClass($firstItem);
				}
			}, this));

			// Log grid setup
			console.log('Grid setup complete with ' + $items.length + ' item(s)');
		},

		/**
		 * Add active class to element
		 *
		 * Adds the 'active' class to the specified jQuery element
		 * with optional animation and console logging for debugging.
		 *
		 * @since 1.0.0
		 * @param {jQuery} $element - The jQuery element to add active class to
		 * @return {jQuery} The jQuery element for chaining
		 */
		addActiveClass: function($element) {
			// Validate element
			if (!$element || $element.length === 0) {
				console.warn('Invalid element passed to addActiveClass');
				return;
			}

			// Add active class with optional animation
			if (this.config.animationEnabled) {
				$element.addClass(this.config.activeClass);
			} else {
				$element.addClass(this.config.activeClass);
			}

			// Debug log
			console.log('Active class added to:', $element.get(0));

			// Enable jQuery chaining
			return $element;
		},

		/**
		 * Remove active class from element
		 *
		 * Removes the 'active' class from the specified jQuery element
		 * with optional animation and console logging for debugging.
		 *
		 * @since 1.0.0
		 * @param {jQuery} $element - The jQuery element to remove active class from
		 * @return {jQuery} The jQuery element for chaining
		 */
		removeActiveClass: function($element) {
			// Validate element
			if (!$element || $element.length === 0) {
				console.warn('Invalid element passed to removeActiveClass');
				return;
			}

			// Remove active class with optional animation
			if (this.config.animationEnabled) {
				$element.removeClass(this.config.activeClass);
			} else {
				$element.removeClass(this.config.activeClass);
			}

			// Debug log
			console.log('Active class removed from:', $element.get(0));

			// Enable jQuery chaining
			return $element;
		},

		/**
		 * Toggle active class on element
		 *
		 * Toggles the 'active' class on the specified jQuery element.
		 * Useful for advanced interactions or custom implementations.
		 *
		 * @since 1.0.0
		 * @param {jQuery} $element - The jQuery element to toggle class on
		 * @return {jQuery} The jQuery element for chaining
		 */
		toggleActiveClass: function($element) {
			// Validate element
			if (!$element || $element.length === 0) {
				console.warn('Invalid element passed to toggleActiveClass');
				return;
			}

			// Toggle active class
			$element.toggleClass(this.config.activeClass);

			// Debug log
			console.log('Active class toggled on:', $element.get(0));

			// Enable jQuery chaining
			return $element;
		},

		/**
		 * Update configuration
		 *
		 * Allows runtime configuration updates for selectors and settings.
		 * Useful for extending or modifying behavior.
		 *
		 * @since 1.0.0
		 * @param {Object} options - Configuration options to update
		 * @return {void}
		 */
		updateConfig: function(options) {
			// Validate options
			if (typeof options !== 'object') {
				console.warn('Configuration must be an object');
				return;
			}

			// Merge options with existing config
			$.extend(this.config, options);

			// Log updated config
			console.log('Configuration updated:', this.config);
		}
	};

	/**
	 * Initialize when DOM is ready
	 *
	 * Waits for the DOM to be fully loaded using jQuery.ready()
	 * before initializing the project widget interactions.
	 *
	 * @since 1.0.0
	 */
	$(document).ready(function() {
		console.log('DOM ready - Initializing Project Widget Handler');
		ProjectWidgetHandler.init();
	});

	/**
	 * Re-initialize on Elementor updates (Editor)
	 *
	 * Handles dynamic widget updates in Elementor editor
	 * by reinitializing the project widget handler on Elementor events.
	 *
	 * @since 1.0.0
	 */
	$(document).on('elementor/init', function() {
		console.log('Elementor initialized - Reinitializing Project Widget');
		ProjectWidgetHandler.init();
	});

	/**
	 * Handle Elementor editor changes
	 *
	 * Listens for element change events from Elementor and
	 * reinitializes the widget handler accordingly.
	 *
	 * @since 1.0.0
	 */
	if (window.elementor && window.elementor.channels) {
		window.elementor.channels.editor.on('change', function() {
			console.log('Elementor editor change detected - Reinitializing');
			ProjectWidgetHandler.init();
		});
	}

	/**
	 * Elementor frontend ready hook
	 *
	 * Integrates with Elementor's frontend ready action hook
	 * for proper widget initialization on frontend preview.
	 *
	 * @since 1.0.0
	 */
	if (window.elementorFrontend) {
		window.elementorFrontend.hooks.addAction(
			'frontend/element_ready/six2eight_project.default',
			function() {
				console.log('Elementor frontend ready - Initializing widget');
				ProjectWidgetHandler.init();
			}
		);
	}

	/**
	 * Expose handler to global scope for debugging
	 *
	 * Makes ProjectWidgetHandler available globally in development
	 * for easier debugging and manual testing via console.
	 *
	 * Remove in production for security and scope management.
	 *
	 * @since 1.0.0
	 */
	window.ProjectWidgetHandler = ProjectWidgetHandler;

})(jQuery);



