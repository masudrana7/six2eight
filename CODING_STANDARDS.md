/**
 * Six2Eight Theme - Coding Standards & Best Practices
 * 
 * This document outlines the professional coding standards
 * implemented throughout the Six2Eight WordPress theme.
 * 
 * Perfect for job interviews demonstrating code quality awareness.
 */

/* ========================================
   1. PHP CODING STANDARDS
   ======================================== */

/**
 * FILE HEADERS
 * 
 * Every PHP file should start with a proper DocBlock:
 */

<?php
/**
 * File description
 *
 * Detailed explanation of what this file does.
 * Can span multiple lines.
 *
 * @package     six2eight
 * @subpackage  admin
 * @author      Your Name <email@example.com>
 * @license     GPL-2.0-or-later
 * @link        https://example.com
 * @since       1.0.0
 */

// Prevent direct access to file
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

/* ========================================
   FUNCTION DOCUMENTATION
   ======================================== */

<?php
/**
 * Brief one-line description of function
 *
 * Longer description explaining what the function does,
 * its purpose, and any important considerations.
 * Can span multiple lines.
 *
 * @since   1.0.0
 * @param   string $param1 Description of parameter
 * @param   int    $param2 Description of parameter
 * @return  bool           Description of return value
 *
 * @throws  Exception When something goes wrong
 *
 * @example
 *   $result = my_function( 'value', 123 );
 *   if ( $result ) {
 *       echo 'Success!';
 *   }
 *
 * @see     other_function() For related functionality
 * @see     https://example.com Link to documentation
 */
function my_function( $param1, $param2 ) {
    // Implementation here
}
?>

/* ========================================
   2. ESCAPING & SANITIZATION
   ======================================== */

/**
 * OUTPUT ESCAPING
 * 
 * Always escape when outputting user-controlled data
 */

<?php
// ❌ UNSAFE - Never do this
echo $user_input;
echo $database_value;

// ✅ SAFE - HTML content
echo esc_html( $user_input );
echo esc_html__( 'Translatable text', 'textdomain' );

// ✅ SAFE - Attributes
echo esc_attr( $value );
echo esc_attr__( 'Translatable attr', 'textdomain' );

// ✅ SAFE - URLs
echo esc_url( $url );
echo esc_url_raw( $url ); // For database/header

// ✅ SAFE - JavaScript
echo wp_json_encode( $data );

// ✅ SAFE - HTML markup (limited tags)
echo wp_kses_post( $content );
echo wp_kses( $content, $allowed_tags );

// ✅ SAFE - Admin contexts
echo wp_admin_notice( $message );
?>

/**
 * INPUT SANITIZATION
 * 
 * Always sanitize when receiving user input
 */

<?php
// ❌ UNSAFE
$value = $_POST['field'];

// ✅ SAFE - Text input
$value = sanitize_text_field( $_POST['field'] );

// ✅ SAFE - Email
$email = sanitize_email( $_POST['email'] );

// ✅ SAFE - URL
$url = esc_url_raw( $_POST['url'] );

// ✅ SAFE - HTML
$html = wp_kses_post( $_POST['content'] );

// ✅ SAFE - File path
$file = sanitize_file_name( $_FILES['file']['name'] );
?>

/* ========================================
   3. NONCE SECURITY
   ======================================== */

/**
 * CREATING NONCES
 * 
 * Use nonces to verify form submissions
 */

<?php
// In your form template
wp_nonce_field( 'action_nonce_name', 'security_field_name' );

// Retrieve in processing code
$nonce = isset( $_POST['security_field_name'] ) ? sanitize_text_field( $_POST['security_field_name'] ) : '';

if ( ! wp_verify_nonce( $nonce, 'action_nonce_name' ) ) {
    wp_die( esc_html__( 'Security check failed', 'textdomain' ) );
}
?>

/* ========================================
   4. HOOKS & FILTERS
   ======================================== */

/**
 * USING ACTIONS
 * 
 * Actions are for executing functions
 */

<?php
// Attach function to action
add_action( 'hook_name', 'my_callback_function', 10, 2 );

function my_callback_function( $param1, $param2 ) {
    // Execute code
}

// Fire the action
do_action( 'hook_name', 'value1', 'value2' );
?>

/**
 * USING FILTERS
 * 
 * Filters are for modifying data
 */

<?php
// Attach filter
add_filter( 'filter_name', 'my_filter_function', 10, 2 );

function my_filter_function( $value, $param2 ) {
    // Modify $value
    return $value;
}

// Apply filter
$result = apply_filters( 'filter_name', $value, $param2 );
?>

/* ========================================
   5. NAMING CONVENTIONS
   ======================================== */

/**
 * CLASS NAMES
 * - Use PascalCase
 * - Should be descriptive
 */

class Six2eight_Theme_Setup {
    // Implementation
}

/**
 * FUNCTION NAMES
 * - Use snake_case
 * - Prefix with theme name to avoid conflicts
 * - Should be descriptive
 */

function six2eight_get_featured_posts() {
    // Implementation
}

/**
 * VARIABLE NAMES
 * - Use snake_case
 * - Be descriptive
 * - Avoid single letters except in loops
 */

$user_email    = 'user@example.com';
$post_count    = 10;
$is_published  = true;

/**
 * CONSTANT NAMES
 * - Use UPPER_SNAKE_CASE
 * - Should be defined at top of file
 */

define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_DIR', get_template_directory() );
?>

/* ========================================
   6. DATABASE QUERIES
   ======================================== */

/**
 * SAFE DATABASE QUERIES
 * 
 * Always use prepared statements
 */

<?php
global $wpdb;

// ❌ UNSAFE
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE ID = " . $id );

// ✅ SAFE - Using prepare()
$results = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM {$wpdb->posts} WHERE ID = %d",
        $id
    )
);

// ✅ SAFE - Using WP_Query
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 10,
    's'              => sanitize_text_field( $_GET['search'] ),
);
$query = new WP_Query( $args );
?>

/* ========================================
   7. CODE ORGANIZATION
   ======================================== */

/**
 * SECTION SEPARATORS
 * 
 * Use clear section separators for readability
 */

<?php
// ========================================
// SETUP & INITIALIZATION
// ========================================

function setup() {
    // Code here
}

// ========================================
// TEMPLATE TAGS
// ========================================

function display_post_title() {
    // Code here
}

// ========================================
// UTILITIES
// ========================================

function utility_function() {
    // Code here
}
?>

/* ========================================
   8. CONDITIONAL LOADING
   ======================================== */

/**
 * CONDITIONAL INCLUSION
 * 
 * Load files only when needed
 */

<?php
// Load admin files only in admin
if ( is_admin() ) {
    require_once THEME_DIR . '/admin/admin-functions.php';
}

// Load frontend files only on frontend
if ( ! is_admin() ) {
    require_once THEME_DIR . '/inc/frontend-functions.php';
}

// Check for function existence before defining
if ( ! function_exists( 'my_function' ) ) {
    function my_function() {
        // Implementation
    }
}
?>

/* ========================================
   9. JAVASCRIPT STANDARDS
   ======================================== */

/**
 * JAVASCRIPT FILE STRUCTURE
 * 
 * Use IIFE pattern for scope protection
 */

(function() {
    'use strict';

    // ========================================
    // CONSTANTS & SELECTORS
    // ========================================

    const SELECTOR_BUTTON = '.my-button';
    const SELECTOR_MODAL = '.modal';

    // ========================================
    // EVENT HANDLERS
    // ========================================

    /**
     * Handle button click event
     *
     * @param {Event} event The click event
     */
    function handleClick( event ) {
        event.preventDefault();
        // Implementation
    }

    // ========================================
    // INITIALIZATION
    // ========================================

    /**
     * Initialize module
     */
    function init() {
        const button = document.querySelector( SELECTOR_BUTTON );
        if ( button ) {
            button.addEventListener( 'click', handleClick );
        }
    }

    // ========================================
    // DOM READY
    // ========================================

    if ( document.readyState === 'loading' ) {
        document.addEventListener( 'DOMContentLoaded', init );
    } else {
        init();
    }
})();

/* ========================================
   10. ACCESSIBILITY STANDARDS
   ======================================== */

/**
 * ARIA ATTRIBUTES
 * 
 * Use proper ARIA labels and roles
 */

<!-- ❌ Not accessible -->
<button>Menu</button>

<!-- ✅ Accessible -->
<button 
    id="menu-toggle" 
    aria-label="Toggle navigation menu"
    aria-expanded="false"
    aria-controls="main-menu"
>
    Menu
</button>

<!-- Keyboard navigation support -->
<ul id="main-menu" role="navigation">
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
</ul>

<!-- Skip link for accessibility -->
<a href="#main" class="skip-link">Skip to main content</a>

/* ========================================
   11. PERFORMANCE BEST PRACTICES
   ======================================== */

/**
 * TRANSIENTS FOR CACHING
 * 
 * Use transients for expensive operations
 */

<?php
function get_expensive_data() {
    // Check if cached
    $data = get_transient( 'my_expensive_data' );

    if ( false === $data ) {
        // Not in cache, compute it
        $data = run_expensive_query();

        // Cache for 1 hour
        set_transient( 'my_expensive_data', $data, HOUR_IN_SECONDS );
    }

    return $data;
}

// Clear cache when data changes
add_action( 'post_save', function() {
    delete_transient( 'my_expensive_data' );
});
?>

/**
 * LAZY LOADING IMAGES
 * 
 * Load images only when needed
 */

<!-- Native lazy loading -->
<img src="image.jpg" loading="lazy" alt="Description" />

<?php
// WordPress function
the_post_thumbnail( 'medium', array( 'loading' => 'lazy' ) );
?>

/* ========================================
   12. DOCUMENTATION COMMENTS
   ======================================== */

/**
 * INLINE COMMENTS
 * 
 * Use to explain complex logic
 */

<?php
// ✅ Good - Explains WHY
foreach ( $posts as $post ) {
    // Skip posts that are private or not published
    if ( 'publish' !== $post->post_status ) {
        continue;
    }

    // Process post
}

// ❌ Bad - Explains WHAT (redundant)
foreach ( $posts as $post ) {
    // Loop through posts
    if ( 'publish' !== $post->post_status ) {
        // Skip if not published
        continue;
    }
}
?>

/* ========================================
   13. ERROR HANDLING
   ======================================== */

<?php
/**
 * PROPER ERROR HANDLING
 */

// ✅ Good - Check before use
$post = get_post( $post_id );

if ( is_null( $post ) ) {
    return; // or show error
}

echo esc_html( $post->post_title );

// ✅ Good - Check capability
if ( ! current_user_can( 'edit_posts' ) ) {
    wp_die( esc_html__( 'Unauthorized', 'textdomain' ) );
}

// ✅ Good - Validate data
$page = absint( $_GET['page'] ) ?: 1;
?>

/* ========================================
   14. CODE REVIEW CHECKLIST
   ======================================== */

/**
 * BEFORE COMMIT:
 * 
 * ☐ All strings are internationalized (i18n)
 * ☐ All user input is sanitized
 * ☐ All output is escaped
 * ☐ Nonces used for form submissions
 * ☐ Comments explain complex logic
 * ☐ No hardcoded URLs
 * ☐ No console.log() left in JS
 * ☐ No var_dump() left in PHP
 * ☐ PHPCS/ESLint pass
 * ☐ Tests pass
 * ☐ Cross-browser tested
 * ☐ Mobile responsive checked
 * ☐ Accessibility features present
 * ☐ Performance optimized
 */

/* ========================================
   INTERVIEW TALKING POINTS
   ======================================== */

/**
 * DISCUSS THESE STANDARDS:
 * 
 * 1. Security First
 *    - "Every user input is sanitized"
 *    - "Every output is properly escaped"
 *    - "Nonce verification on all forms"
 * 
 * 2. Code Quality
 *    - "Comprehensive documentation"
 *    - "Following WordPress standards"
 *    - "DRY principle throughout"
 * 
 * 3. Performance
 *    - "Lazy loading for images"
 *    - "Caching with transients"
 *    - "Optimized database queries"
 * 
 * 4. Accessibility
 *    - "WCAG 2.1 compliant"
 *    - "ARIA labels where needed"
 *    - "Keyboard navigation support"
 * 
 * 5. Maintainability
 *    - "Clear naming conventions"
 *    - "Professional documentation"
 *    - "Version control (Git)"
 */

