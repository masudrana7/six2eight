# Six2Eight Project Widget - Documentation

## Overview
The **Six2Eight Project Widget** is a professional Elementor repeater addon that allows you to display projects in a beautiful grid layout with images, titles, and descriptions.

## Widget Features

### Fields (Repeater)
1. **Project Title** (Text) - The name/title of the project
2. **Project Description** (Textarea) - Detailed description of the project
3. **Project Image** (Media) - Project image/thumbnail

### Content Controls
- **Columns** - Choose between 1, 2, 3, or 4 column layouts
- **Image Height** - Responsive control to adjust image height (100px - 600px)
- **Gap Between Items** - Control spacing between project items
- **Image Hover Effect** - Choose between:
  - None
  - Zoom (default)
  - Grayscale

### Style Tabs

#### Image Style
- Border Radius - Customize corner roundness
- Hover Effect - Zoom or Grayscale effect on hover

#### Title Style
- Color - Change title text color (default: #2D2D34)
- Typography - Font, size, weight, line-height controls
- Spacing Below - Adjust bottom margin of titles

#### Description Style
- Color - Change description text color (default: #666666)
- Typography - Font, size, weight, line-height controls

#### Container Style
- Background Color - Card background (default: #ffffff)
- Padding - Inner spacing of project cards
- Border Color - Card border color (default: #e5e5e5)
- Border Width - Card border thickness
- Border Radius - Container corner roundness
- Box Shadow - Add professional shadow effects

## CSS Classes

The widget uses the following CSS classes that can be customized in your theme's style.css:

```css
.six2eight-projects-wrapper      /* Main wrapper */
.six2eight-projects-grid         /* Grid container */
.six2eight-project-item          /* Individual project card */
.six2eight-project-image         /* Image container */
.six2eight-project-image img     /* Image element */
.six2eight-project-content       /* Content area */
.six2eight-project-title         /* Project title */
.six2eight-project-description   /* Project description */
```

## Responsive Breakpoints

The widget includes responsive styles for different screen sizes:

- **Desktop**: Full columns as selected
- **Tablet (≤768px)**: Automatically switches to 2 columns
- **Mobile (≤480px)**: Switches to single column

## How to Use in Elementor

1. **Open Elementor Editor** on your page or post
2. **Search for "Six2Eight Project"** in the widgets panel
3. **Drag the widget** to your desired location
4. **Add Projects**:
   - Click "Add Item" to add a new project
   - Fill in the Title, Description, and Image
   - Repeat to add more projects
5. **Customize Layout**:
   - Choose the number of columns
   - Adjust image height and gap spacing
6. **Style Your Widget**:
   - Go to Style tabs to customize colors, typography, and effects
   - Use hover effects for interactivity

## Features

✅ Repeater field with multiple projects
✅ Responsive grid layout (1-4 columns)
✅ Customizable image hover effects (Zoom/Grayscale)
✅ Professional typography controls
✅ Advanced styling options
✅ Mobile-first responsive design
✅ Shadow and border customization
✅ Text overflow handling (ellipsis)
✅ Smooth transitions and animations
✅ Full Elementor integration

## Default Values

- **Columns**: 3
- **Image Height**: 300px
- **Gap**: 20px
- **Title Color**: #2D2D34 (Primary heading color)
- **Description Color**: #666666 (Light gray)
- **Background**: #ffffff (White)
- **Border**: 1px solid #e5e5e5
- **Border Radius**: 8px
- **Hover Effect**: Zoom

## Technical Details

- **Widget Class**: `Six2eight_Project_Widget`
- **Widget Name**: `six2eight_project`
- **Icon**: Gallery Grid (eicon-gallery-grid)
- **Category**: General
- **File Location**: `/inc/elementor/widgets/six2eight-project-widget.php`
- **Initialization**: `/inc/elementor/elementor-init.php`

## Typography

All text elements use:
- **Font Family**: Inter Tight (via CSS variables)
- **Fallback**: sans-serif
- **Title**: Font weight 700, size 24px
- **Description**: Font weight 400, size 16px

## Browser Compatibility

- Chrome/Edge (Latest)
- Firefox (Latest)
- Safari (Latest)
- Mobile browsers

## Performance

- Optimized CSS with variables
- Smooth transitions (0.3s ease)
- Efficient grid layout
- Image lazy loading supported
- Minimal DOM footprint

## Customization Tips

### Change default colors:
Modify CSS variables in style.css:
```css
--color-heading: #2D2D34;
--color-primary: #00B98B;
```

### Modify spacing:
Update in Container Style tab or edit:
```css
--spacing-md: 16px;
```

### Add custom effects:
Extend the CSS classes in your custom CSS:
```css
.six2eight-project-item:hover {
    /* Add your custom hover effects */
}
```

## Troubleshooting

**Widget not showing?**
- Make sure Elementor is active
- Clear WordPress cache
- Check browser console for errors

**Images not displaying?**
- Verify image URLs are correct
- Check image media library
- Ensure sufficient permissions

**Styles not applying?**
- Clear Elementor cache
- Rebuild CSS in Elementor settings
- Check CSS priority/specificity

---

Created: 2026-05-09
Version: 1.0.0
Theme: Six2Eight WordPress Theme

