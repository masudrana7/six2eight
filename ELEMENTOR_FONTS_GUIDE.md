# 🎨 How to Use Custom Fonts in Elementor Typography

## Overview

Your theme has custom fonts (PP Editorial Old) available. This guide shows how to use them in Elementor's typography settings.

---

## ✅ Step 1: Verify Fonts Are Registered

Your `style.css` already has the fonts declared via `@font-face`:

```css
@font-face {
  font-family: 'PP Editorial Old';
  src: url('/wp-content/themes/six2eight/assets/fonts/ppeditorialold-ultrabold.otf');
  font-weight: 900;
}
```

This makes the fonts available globally, including in Elementor.

---

## 📋 Step 2: Access Elementor Typography Settings

### In Elementor Editor:

1. **Edit any element** (heading, text, etc.)
2. **Go to Style tab** (right panel)
3. **Scroll to Typography** section
4. **Click on Font Family dropdown**

---

## 🎯 Step 3: Select Custom Font

### Finding Your Font:

1. Click the **Font Family** dropdown
2. Scroll down to find **PP Editorial Old**
3. Select it

The font dropdown shows:
- **Google Fonts** (top)
- **System Fonts** (middle)
- **Custom Fonts** (your theme fonts at bottom)

---

## 📊 Available Custom Fonts

Your theme provides:

| Font Name | Weight | Style |
|-----------|--------|-------|
| PP Editorial Old | 400 | Normal |
| PP Editorial Old | 400 | Italic |
| PP Editorial Old | 900 | Normal (Ultra-bold) |
| PP Editorial Old | 900 | Italic |
| PP Editorial Old | 300 | Normal (Light) |
| PP Editorial Old | 300 | Italic (Light) |

---

## 🔧 Using Custom Fonts in Elementor

### Example 1: Heading with PP Editorial Old

**In Elementor Heading Widget:**

1. Add a Heading element
2. **Style Tab** → **Typography**
3. **Font Family**: Select "PP Editorial Old"
4. **Font Weight**: Choose 900 (ultra-bold) for impact
5. **Font Size**: 48px-72px
6. **Font Style**: Normal or Italic

**Result**: Bold, editorial-style heading

---

### Example 2: Body Text with Inter Tight

**In Elementor Text/Paragraph:**

1. Add Text widget
2. **Style Tab** → **Typography**
3. **Font Family**: Select "Inter Tight"
4. **Font Weight**: 400
5. **Font Size**: 16px
6. **Line Height**: 1.6

**Result**: Clean, readable body text

---

### Example 3: Mix Fonts for Impact

**For a section title:**

1. Heading: PP Editorial Old (900, 48px)
2. Subheading: Inter Tight (600, 24px)
3. Body: Inter Tight (400, 16px)

**Result**: Professional hierarchy

---

## 🎨 Custom Font Classes

You can also add these classes to Elementor elements:

```css
.font-secondary {
  font-family: var(--font-secondary);  /* PP Editorial Old */
}

.font-weight-400 {
  font-weight: var(--font-weight-normal);  /* Regular weight */
}
```

**Usage in Elementor:**
1. Select element
2. **Advanced** → **CSS Classes**
3. Add `font-secondary` or `font-weight-400`

---

## 📱 Typography in Different Contexts

### For Headings
✅ **Best**: PP Editorial Old (900)  
- Attention-grabbing
- Editorial style
- Good contrast

### For Body Text
✅ **Best**: Inter Tight (400)  
- Highly readable
- Professional
- Clean appearance

### For Accents/Quotes
✅ **Best**: PP Editorial Old (300 or 900)  
- Stylish
- Draws attention
- Adds personality

### For Buttons/CTAs
✅ **Best**: Inter Tight (600-700)  
- Clear and bold
- Professional
- Good readability

---

## 🔗 CSS Variables Available

Your theme provides these CSS variables:

```css
/* Font families */
--font-family: 'Inter Tight', sans-serif;
--font-heading: 'Inter Tight', sans-serif;
--font-body: 'Inter Tight', sans-serif;
--font-secondary: 'PP Editorial Old', 'Inter Tight', sans-serif;

/* Font weights */
--font-weight-normal: 400;
--font-weight-medium: 500;
--font-weight-semibold: 600;
--font-weight-bold: 700;
--font-weight-ultrabold: 900;
--font-weight-ultralight: 300;

/* Font sizes */
--fs-h1: 72px;
--fs-h2: 60px;
--fs-h3: 40px;
--fs-h4: 32px;
--fs-h5: 24px;
--fs-h6: 20px;
--fs-body: 16px;
--fs-small: 14px;
```

---

## 💡 Pro Tips for Elementor

### Tip 1: Font Fallback
If PP Editorial Old doesn't load:
1. It falls back to Inter Tight
2. Then to system sans-serif
3. Text always displays!

### Tip 2: Font Preloading
Your theme preloads both fonts:
- PP Editorial Old from `/assets/fonts/`
- Inter Tight from Google Fonts

### Tip 3: Performance
- Local fonts (PP Editorial Old) load faster
- No external delays
- Cached by browser

### Tip 4: Preview in Elementor
- Real-time preview as you change fonts
- Responsive preview on different screens
- Undo/redo available

---

## 🎬 Step-by-Step Tutorial

### Create a Professional Section in Elementor:

**1. Add Heading Widget**
   - Text: "Welcome to Our Site"
   - Font: PP Editorial Old
   - Weight: 900
   - Size: 60px
   - Color: Teal (#00B98B)

**2. Add Paragraph Widget**
   - Font: Inter Tight
   - Weight: 400
   - Size: 16px
   - Line Height: 1.6
   - Color: Dark gray (#2D2D34)

**3. Add Button Widget**
   - Text: "Get Started"
   - Font: Inter Tight
   - Weight: 700
   - Background: Teal (#00B98B)
   - Hover: Dark teal (#008B6F)

**Result**: Professional, cohesive design!

---

## 🔍 Troubleshooting

### Custom Font Not Showing?

**Solution 1: Hard Refresh**
- Ctrl+Shift+R (Windows)
- Cmd+Shift+R (Mac)
- Clears cache

**Solution 2: Check Elementor Cache**
- Elementor → Settings
- → Performance
- → Regenerate CSS

**Solution 3: Verify Font Files**
- Check `/assets/fonts/` folder
- Ensure all .otf files exist
- Check file permissions

### Font Looks Different?

**Possible Reasons:**
- Different font weight selected
- Browser caching old version
- Screen rendering difference

**Fix:**
- Clear browser cache
- Try different weight
- Check in different browser

---

## 📋 Best Practices

✅ **DO:**
- Use PP Editorial Old for headings (bold, 900)
- Use Inter Tight for body (regular, 400)
- Limit to 2-3 font families per page
- Test on mobile devices
- Use consistent weights

❌ **DON'T:**
- Mix too many font weights
- Use custom fonts for large paragraphs (readability)
- Change fonts too frequently
- Forget fallbacks

---

## 🎨 Color + Font Combinations

### Bold Editorial Look
- Font: PP Editorial Old (900)
- Size: 48-72px
- Color: Teal (#00B98B)
- Weight: Ultra-bold

### Professional Body
- Font: Inter Tight (400)
- Size: 16px
- Color: Dark gray (#2D2D34)
- Weight: Normal

### Accent/Quote
- Font: PP Editorial Old (300 or 900)
- Size: 24-32px
- Color: Teal (#00B98B)
- Style: Italic (optional)

---

## 🚀 Advanced: Custom Font Presets

You can create custom font combinations:

**In Elementor:**
1. Style any element perfectly
2. Click **Save Style** (if available)
3. Name it (e.g., "Editorial Heading")
4. Reuse across project

---

## 📊 Font Stack Reference

```
Your Theme Fonts:

PP Editorial Old
├── 300 (Light)
├── 300 Italic
├── 400 (Regular)
├── 400 Italic
├── 900 (Ultra-bold)
└── 900 Italic

Inter Tight
├── 400 (Normal)
├── 500 (Medium)
├── 600 (Semibold)
└── 700 (Bold)
```

---

## ✨ Summary

**Your custom fonts are ready for Elementor:**

✅ PP Editorial Old - Available in all weights  
✅ Inter Tight - Modern fallback  
✅ Full typography control  
✅ Real-time preview  
✅ Professional results  

**To use in Elementor:**
1. Open element properties
2. Go to Style → Typography
3. Select font from dropdown
4. Adjust size, weight, style
5. Done!

---

## 🎓 Next Steps

1. **Create elements** using custom fonts
2. **Experiment** with different weights
3. **Save presets** for consistency
4. **Test on mobile** to ensure readability
5. **Check performance** with Elementor tools

---

**Status**: Ready to use! 🎉

Your theme fonts are fully integrated with Elementor and ready for professional typography design.

