# Six2Eight Project Widget - Developer Guide

## Widget Code Structure

### Class Definition
```php
class Six2eight_Project_Widget extends \Elementor\Widget_Base
```

### Widget Registration
Located in: `/inc/elementor/elementor-init.php`

```php
function six2eight_register_elementor_widgets( $widgets_manager ) {
    require_once __DIR__ . '/widgets/six2eight-project-widget.php';
    $widgets_manager->register( new \Six2eight_Project_Widget() );
}
add_action( 'elementor/widgets/register', 'six2eight_register_elementor_widgets' );
```

---

## Repeater Structure

### Repeater Fields Definition

```php
$repeater = new \Elementor\Repeater();

// Title Field
$repeater->add_control(
    'project_title',
    [
        'label'       => esc_html__( 'Project Title', 'six2eight' ),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default'     => esc_html__( 'Project Title', 'six2eight' ),
        'placeholder' => esc_html__( 'Enter project title', 'six2eight' ),
        'label_block' => true,
    ]
);

// Description Field
$repeater->add_control(
    'project_description',
    [
        'label'       => esc_html__( 'Project Description', 'six2eight' ),
        'type'        => \Elementor\Controls_Manager::TEXTAREA,
        'default'     => esc_html__( 'Enter project description here...', 'six2eight' ),
        'placeholder' => esc_html__( 'Enter project description', 'six2eight' ),
        'rows'        => 5,
    ]
);

// Image Field
$repeater->add_control(
    'project_image',
    [
        'label'   => esc_html__( 'Project Image', 'six2eight' ),
        'type'    => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);
```

---

## Control Sections

### 1. Content Section - Projects
- Repeater control with 3 fields (Title, Description, Image)
- Default items for demo

### 2. Layout Section
- Columns control (1-4 options)
- Image height responsive slider
- Gap between items responsive slider

### 3. Style Sections
- Image Style (border radius, hover effects)
- Title Style (color, typography, spacing)
- Description Style (color, typography)
- Container Style (background, padding, borders, shadows)

---

## Frontend Output (render method)

```php
protected function render() {
    $settings = $this->get_settings_for_display();
    $projects = $settings['projects_list'];
    $columns = $settings['columns'];
    $hover_effect = isset( $settings['image_hover_effect'] ) ? $settings['image_hover_effect'] : 'zoom';

    if ( empty( $projects ) ) {
        echo '<p>' . esc_html__( 'No projects added yet.', 'six2eight' ) . '</p>';
        return;
    }

    // Grid HTML with dynamic columns
    echo '<div class="six2eight-projects-wrapper">';
    echo '<div class="six2eight-projects-grid" style="display: grid; grid-template-columns: repeat(' . esc_attr( $columns ) . ', 1fr);">';
    
    foreach ( $projects as $project ) {
        // Render each project card
    }
    
    echo '</div></div>';
}
```

---

## Data Processing

### Settings Retrieval
```php
$settings = $this->get_settings_for_display();
$projects = $settings['projects_list'];
```

### Project Item Structure
```php
[
    'project_title' => 'Project Name',
    'project_description' => 'Project description text',
    'project_image' => [
        'url' => 'https://example.com/image.jpg',
        'id' => 123,
    ]
]
```

---

## CSS Styling Approach

### Responsive Grid
```css
.six2eight-projects-grid {
    display: grid;
    grid-template-columns: repeat(var(--columns), 1fr);
}
```

### Image Container
```css
.six2eight-project-image {
    width: 100%;
    height: 300px;
    overflow: hidden;
    position: relative;
}
```

### Hover Effects
```css
/* Zoom effect */
.six2eight-project-image[data-hover="zoom"] img:hover {
    transform: scale(1.08);
}

/* Grayscale effect */
.six2eight-project-image[data-hover="grayscale"] img {
    filter: grayscale(100%);
}
.six2eight-project-image[data-hover="grayscale"] img:hover {
    filter: grayscale(0%);
}
```

---

## Elementor Template (Editor Preview)

```php
protected function content_template() {
    ?>
    <div class="six2eight-projects-wrapper">
        <div class="six2eight-projects-grid" 
             data-columns="{{{ settings.columns }}}"
             style="display: grid; grid-template-columns: repeat({{{ settings.columns }}}, 1fr);">
            
            <# _.each( settings.projects_list, function( project ) { #>
                <div class="six2eight-project-item">
                    <# if ( project.project_image.url ) { #>
                        <div class="six2eight-project-image" data-hover="{{{ settings.image_hover_effect }}}">
                            <img src="{{{ project.project_image.url }}}" alt="{{{ project.project_title }}}" />
                        </div>
                    <# } #>
                    
                    <div class="six2eight-project-content">
                        <# if ( project.project_title ) { #>
                            <h3 class="six2eight-project-title">{{{ project.project_title }}}</h3>
                        <# } #>
                        
                        <# if ( project.project_description ) { #>
                            <div class="six2eight-project-description">{{{ project.project_description }}}</div>
                        <# } #>
                    </div>
                </div>
            <# }); #>
        </div>
    </div>
    <?php
}
```

---

## Escaping & Security

### Output Escaping
```php
// Text outputs
echo esc_html( $project['project_title'] );

// URLs
echo esc_url( $project['project_image']['url'] );

// Attributes
echo esc_attr( $settings['columns'] );

// HTML/Posts
echo wp_kses_post( nl2br( $project['project_description'] ) );
```

### Input Sanitization (Handled by Elementor)
```php
// Elementor automatically sanitizes inputs from controls
// No additional sanitization needed in widget
```

---

## Adding Custom Fields to Repeater

### Example: Add Project URL
```php
$repeater->add_control(
    'project_url',
    [
        'label'       => esc_html__( 'Project URL', 'six2eight' ),
        'type'        => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__( 'https://example.com', 'six2eight' ),
    ]
);
```

### Example: Add Category Tag
```php
$repeater->add_control(
    'project_category',
    [
        'label'       => esc_html__( 'Category', 'six2eight' ),
        'type'        => \Elementor\Controls_Manager::SELECT,
        'options'     => [
            'web' => 'Web Design',
            'graphic' => 'Graphic Design',
            'branding' => 'Branding',
        ],
    ]
);
```

---

## Modifying Grid Behavior

### Change Default Columns
```php
// In register_controls():
$this->add_control(
    'columns',
    [
        'label'   => esc_html__( 'Columns', 'six2eight' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => '2', // Changed from 3
        'options' => [
            '1' => esc_html__( '1 Column', 'six2eight' ),
            '2' => esc_html__( '2 Columns', 'six2eight' ),
            '3' => esc_html__( '3 Columns', 'six2eight' ),
        ],
    ]
);
```

### Add Masonry Layout
```css
.six2eight-projects-grid {
    column-count: 3;
    column-gap: 20px;
}

.six2eight-project-item {
    break-inside: avoid;
    margin-bottom: 20px;
}
```

---

## Performance Optimization

### Lazy Load Images
```php
<img src="{{{ project.project_image.url }}}" 
     alt="{{{ project.project_title }}}"
     loading="lazy" />
```

### CSS Variables
```css
:root {
    --color-primary: #00B98B;
    --color-heading: #2D2D34;
    --fs-body: 18px;
}
```

### Minimize DOM Nodes
- Use semantic HTML
- Avoid unnecessary divs
- Combine multiple elements when possible

---

## Advanced: Custom Controls

### Add Animation Control
```php
$this->add_control(
    'item_animation',
    [
        'label'   => esc_html__( 'Animation', 'six2eight' ),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'fade' => 'Fade In',
            'slide' => 'Slide In',
            'zoom' => 'Zoom In',
        ],
    ]
);
```

### Add Responsive Visibility
```php
$this->add_responsive_control(
    'item_visibility',
    [
        'label'      => esc_html__( 'Visibility', 'six2eight' ),
        'type'       => \Elementor\Controls_Manager::HIDDEN,
        'devices'    => [ 'desktop', 'tablet' ],
    ]
);
```

---

## File Locations

| File | Purpose |
|------|---------|
| `/inc/elementor/widgets/six2eight-project-widget.php` | Main widget class |
| `/inc/elementor/elementor-init.php` | Widget registration |
| `/style.css` | CSS styles and responsive design |
| `/inc/elementor/PROJECT_WIDGET_GUIDE.md` | Full documentation |
| `/inc/elementor/QUICK_START.md` | Quick reference guide |

---

## Testing Checklist

- [ ] Widget appears in Elementor editor
- [ ] Repeater fields work correctly
- [ ] Images display properly
- [ ] Columns responsive on mobile
- [ ] Hover effects work
- [ ] Colors apply correctly
- [ ] Typography displays properly
- [ ] No console errors
- [ ] Responsive at 1024px breakpoint
- [ ] Performance is acceptable

---

## Common Issues & Solutions

### Widget Not Registered
**Issue**: Widget doesn't appear in editor
**Solution**: Verify class extends `\Elementor\Widget_Base` and is registered in `elementor-init.php`

### Images Not Loading
**Issue**: Images show broken icon
**Solution**: Check image URL validity, verify media library permissions

### Styles Not Applied
**Issue**: Widget styling looks wrong
**Solution**: Clear Elementor cache, rebuild CSS in settings

### Repeater Not Working
**Issue**: Can't add/edit project items
**Solution**: Verify `\Elementor\Repeater()` is instantiated correctly, check field definitions

---

## Version History

- **v1.0.0** (May 2026) - Initial release with repeater functionality

---

**Created**: May 9, 2026
**Theme**: Six2Eight WordPress Theme
**Framework**: Elementor

