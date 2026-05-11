# Six2Eight Project Widget - Quick Start

## ✅ What Was Created

### Files Created:
1. **six2eight-project-widget.php** - Main widget class with repeater fields
2. **PROJECT_WIDGET_GUIDE.md** - Complete documentation

### Files Updated:
1. **elementor-init.php** - Registered the new widget
2. **style.css** - Added professional CSS styles

---

## 🚀 Quick Start Guide

### Step 1: Verify Installation
The widget should now be available in your Elementor editor as **"Six2Eight Project"**

### Step 2: Add to Your Page
1. Open Elementor page editor
2. Click the "+" to add a widget
3. Search for "Six2Eight Project"
4. Drag it to your page

### Step 3: Configure Projects
```
Content Tab → Projects
├── Project 1
│   ├── Title: "My First Project"
│   ├── Description: "Project description..."
│   └── Image: Upload image
├── Project 2
│   ├── Title: "My Second Project"
│   ├── Description: "Project description..."
│   └── Image: Upload image
└── (Add more projects as needed)
```

### Step 4: Layout Settings
```
Content Tab → Layout
├── Columns: Select 1, 2, 3, or 4
├── Image Height: Adjust height (default: 300px)
└── Gap Between Items: Space between cards (default: 20px)
```

### Step 5: Styling
Go to Style tabs to customize:
- **Image Style**: Border radius, hover effects
- **Title Style**: Color, typography, spacing
- **Description Style**: Color, typography
- **Container Style**: Background, padding, borders, shadows

---

## 🎨 Widget Features

### Repeater Fields
- ✅ **Project Title** (Text input)
- ✅ **Project Description** (Textarea)
- ✅ **Project Image** (Media library)

### Layout Options
- ✅ 1, 2, 3, or 4 column layouts
- ✅ Responsive (automatic adjustments on tablet/mobile)
- ✅ Customizable gaps and spacing

### Hover Effects
- ✅ **Zoom**: Image scales on hover
- ✅ **Grayscale**: Converts to grayscale on hover
- ✅ **None**: No hover effect
- ✅ **Card lift**: Subtle shadow increase

### Styling Controls
- ✅ Custom colors for all elements
- ✅ Full typography control
- ✅ Border radius, shadows, padding
- ✅ Responsive controls for mobile

---

## 📱 Responsive Behavior

| Screen Size | Layout |
|------------|--------|
| Desktop (> 768px) | As selected (1-4 columns) |
| Tablet (≤ 768px) | 2 columns |
| Mobile (≤ 480px) | 1 column |

---

## 🎯 CSS Classes Reference

Use these classes for custom styling:

```css
/* Main container */
.six2eight-projects-wrapper { }

/* Grid container */
.six2eight-projects-grid { }

/* Individual project card */
.six2eight-project-item { }

/* Image container */
.six2eight-project-image { }

/* Project image */
.six2eight-project-image img { }

/* Content container */
.six2eight-project-content { }

/* Project title */
.six2eight-project-title { }

/* Project description */
.six2eight-project-description { }
```

---

## 🎨 Default Styling

```
Title Color:          #2D2D34 (Dark gray)
Description Color:    #666666 (Medium gray)
Background:           #ffffff (White)
Border:               1px solid #e5e5e5 (Light gray)
Border Radius:        8px
Image Height:         300px
Column Gap:           20px
Hover Effect:         Zoom
Font Family:          Inter Tight
```

---

## 🔧 Customization Examples

### Change All Project Titles to Green
1. Go to Style → Title Style
2. Click Color picker
3. Set to `#00B98B` (Primary color)

### Make Images Square
1. Go to Content → Layout
2. Set Image Height to match container width

### Add More Spacing
1. Go to Content → Layout
2. Increase "Gap Between Items" to 40px

### Dark Theme Cards
1. Go to Style → Container Style
2. Background Color: `#2D2D34`
3. Title Color → Title Style: `#ffffff`
4. Description Color → Description Style: `#e0e0e0`

---

## 📋 Required Setup

✅ WordPress with Elementor Pro/Free
✅ Theme: Six2Eight
✅ PHP 7.4+
✅ Elementor 3.0+

---

## 🐛 Troubleshooting

### Widget not visible in editor?
- Refresh the page
- Clear Elementor cache (Elementor → Settings → Tools)
- Check WordPress plugins for conflicts

### Images not showing?
- Verify image URL is accessible
- Check media library permissions
- Try re-uploading the image

### Styles not applying?
- Rebuild CSS in Elementor settings
- Clear WordPress cache
- Check for conflicting CSS

---

## 📞 Support

For issues or customization help:
1. Check PROJECT_WIDGET_GUIDE.md for detailed docs
2. Review CSS classes in style.css
3. Inspect element in browser dev tools
4. Check WordPress/Elementor error logs

---

## Version Info

- **Widget Version**: 1.0.0
- **Created**: May 2026
- **Theme**: Six2Eight WordPress Theme
- **Requires**: Elementor
- **PHP**: 7.4+

---

**✨ Your Six2Eight Project Widget is ready to use!**

