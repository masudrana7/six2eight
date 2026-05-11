# Six2Eight Project Post Type

## Quick Reference

### Admin Access
- **Location:** WordPress Admin → Projects
- **Add New:** Projects → Add New
- **Edit:** Click on project title
- **Delete:** Click project → Trash

### Post Type Slug
```
six2eight_project
```

### Taxonomy (Categories)
```
six2eight_project_category
```

### URLs
| Type | URL Pattern |
|------|------------|
| Archive | `/projects/` |
| Single | `/project/my-project/` |
| Category | `/project-category/design/` |

### Features
- ✅ Title
- ✅ Content Editor
- ✅ Excerpt
- ✅ Featured Image
- ✅ Custom Fields (post meta)
- ✅ Revisions
- ✅ Categories (taxonomy)

### REST API Endpoints
```
/wp-json/wp/v2/six2eight-projects
/wp-json/wp/v2/six2eight-categories
```

### Getting Project Data in Templates

```php
<?php
// Get project title
$title = get_the_title( $post_id );

// Get project content
$content = get_the_content( '', false, $post_id );

// Get project excerpt
$excerpt = get_the_excerpt( $post_id );

// Get featured image
$image = get_the_post_thumbnail_url( $post_id, 'full' );

// Get project categories
$categories = get_the_terms( $post_id, 'six2eight_project_category' );

// Get custom field (if using ACF or Meta Box)
$description = get_post_meta( $post_id, '_project_description', true );
?>
```

### Querying Projects

```php
<?php
$args = [
    'post_type'      => 'six2eight_project',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
];

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Display project
    }
    wp_reset_postdata();
}
?>
```

### Admin Columns
The admin list view displays:
1. Featured Image Thumbnail
2. Project Title
3. Project Category
4. Publication Date

### Class Location
```
/inc/post-type/class-six2eight-project-post-type.php
```

### Theme Integration
Automatically loaded from:
```
/functions.php (line ~256)
```

### Files Modified
- ✅ `/inc/post-type/class-six2eight-project-post-type.php` (NEW)
- ✅ `/functions.php` (MODIFIED - added post type init)

---

**Created:** May 11, 2026
**Status:** Production Ready ✅

