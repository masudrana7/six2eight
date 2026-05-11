# 🎨 How to Use Custom Fonts - PP Editorial Old

## Overview

Your theme now uses **two professional fonts** from the assets/fonts folder:

1. **PP Editorial Old** - For headings (stylish, editorial)
2. **Inter Tight** - For body text (readable, modern)

---

## 📁 Font Files Location

All custom fonts are stored in:
```
/wp-content/themes/six2eight/assets/fonts/
```

Available files:
- `ppeditorialold-regular.otf` (Normal weight)
- `ppeditorialold-italic.otf` (Italic style)
- `ppeditorialold-ultrabold.otf` (Font weight: 900)
- `ppeditorialold-ultrabolditalic.otf` (Bold + Italic)
- `ppeditorialold-ultralight.otf` (Light weight: 300)
- `ppeditorialold-ultralightitalic.otf` (Light + Italic)

---

## 🎯 Font Usage in Your Theme

### Headings (H1-H6)
```css
/* All headings use PP Editorial Old */
h1, h2, h3, h4, h5, h6 {
  font-family: 'PP Editorial Old', fallback;
  font-weight: 900;  /* Ultra-bold for impact */
}
```

**Result**: Large, bold, editorial style headings

### Body Text
```css
/* Body paragraphs use Inter Tight */
body, p {
  font-family: 'Inter Tight', sans-serif;
  font-weight: 400;  /* Regular weight */
}
```

**Result**: Clean, readable body text

---

## 📊 Font Weights Available

| Font | Weight | Usage |
|------|--------|-------|
| PP Editorial Old | 300 | Light headings |
| PP Editorial Old | 400 | Normal text |
| PP Editorial Old | 900 | Bold headings |
| Inter Tight | 400 | Body text |
| Inter Tight | 500 | Medium emphasis |
| Inter Tight | 600 | Semi-bold |
| Inter Tight | 700 | Bold |

---

## 🔧 How @font-face Works

The fonts are loaded using `@font-face` declarations at the top of your CSS:

```css
@font-face {
  font-family: 'PP Editorial Old';
  src: url('/wp-content/themes/six2eight/assets/fonts/ppeditorialold-regular.otf') format('opentype');
  font-weight: 400;
  font-style: normal;
}

@font-face {
  font-family: 'PP Editorial Old';
  src: url('/wp-content/themes/six2eight/assets/fonts/ppeditorialold-ultrabold.otf') format('opentype');
  font-weight: 900;
  font-style: normal;
}
```

This tells the browser:
1. Font name: "PP Editorial Old"
2. File location: `/wp-content/themes/six2eight/assets/fonts/`
3. Font weight: 400 (regular) or 900 (ultra-bold)
4. Format: OpenType (.otf)

---

## 💻 CSS Variables

Your theme uses CSS variables for easy customization:

```css
:root {
  /* Font families */
  --font-family: 'PP Editorial Old', 'Inter Tight', sans-serif;
  --font-heading: 'PP Editorial Old', 'Inter Tight', sans-serif;
  --font-body: 'Inter Tight', sans-serif;
  
  /* Font weights */
  --font-weight-normal: 400;
  --font-weight-bold: 700;
  --font-weight-ultrabold: 900;
  --font-weight-ultralight: 300;
}
```

### Usage in CSS:
```css
h1 {
  font-family: var(--font-heading);     /* PP Editorial Old */
  font-weight: var(--font-weight-ultrabold);  /* 900 */
}

p {
  font-family: var(--font-body);        /* Inter Tight */
  font-weight: var(--font-weight-normal);     /* 400 */
}
```

---

## 🎨 Typography Hierarchy

### H1 & H2 (Main Titles)
- Font: PP Editorial Old
- Size: 72px / 60px
- Weight: 900 (ultra-bold)
- Style: Bold, editorial

### H3 (Section Titles)
- Font: PP Editorial Old
- Size: 40px
- Weight: 900 (ultra-bold)

### H4-H6 (Minor Titles)
- Font: PP Editorial Old
- Size: 32px - 20px
- Weight: 900 (ultra-bold)

### Body Text
- Font: Inter Tight
- Size: 16px
- Weight: 400 (normal)

---

## ✨ How It Looks

```
┌─────────────────────────────────────────┐
│ H1: PP Editorial Old - Ultra-Bold       │  ← Headings (PP Editorial Old)
├─────────────────────────────────────────┤
│ This is body text in Inter Tight font.  │  ← Body (Inter Tight)
│ It's clean and readable.                │
│                                         │
│ H2: Another Section Title               │  ← Headings (PP Editorial Old)
├─────────────────────────────────────────┤
│ More body text here.                    │  ← Body (Inter Tight)
└─────────────────────────────────────────┘
```

---

## 🚀 How to Customize

### Change Heading Font
```css
:root {
  --font-heading: 'Your Font Name', fallback;
}
```

### Change Body Font
```css
:root {
  --font-body: 'Your Font Name', fallback;
}
```

### Change Heading Weight
```css
h1 {
  font-weight: 300;  /* Light */
  font-weight: 400;  /* Normal */
  font-weight: 900;  /* Bold */
}
```

---

## 🔗 Font Stack Explained

```css
font-family: 'PP Editorial Old', 'Inter Tight', sans-serif;
```

This reads: "Use PP Editorial Old, if not available use Inter Tight, if not available use any sans-serif"

**Priority order:**
1. PP Editorial Old (first choice - from assets/fonts)
2. Inter Tight (fallback - from Google Fonts)
3. sans-serif (last resort - system default)

---

## ✅ Font Rendering

### How Browsers Load Fonts

1. Browser downloads CSS
2. Finds `@font-face` declaration
3. Downloads font file from `/assets/fonts/`
4. Applies font to matching selectors
5. If font fails to load, uses fallback

### Performance Notes
- Fonts are loaded locally (no CDN delay)
- OTF format is well-supported
- Fallback fonts ensure readability

---

## 📱 Mobile & Desktop

Fonts work consistently on all devices:
- ✅ Desktop browsers
- ✅ Tablets
- ✅ Mobile phones
- ✅ All modern browsers

---

## 🎓 Examples

### Use PP Editorial Old for Custom Elements
```css
.custom-heading {
  font-family: 'PP Editorial Old', sans-serif;
  font-weight: 900;
  font-style: italic;
}
```

### Use Light Weight
```css
.light-text {
  font-family: 'PP Editorial Old', sans-serif;
  font-weight: 300;
}
```

### Combine with Colors
```css
h1 {
  font-family: var(--font-heading);      /* PP Editorial Old */
  color: var(--color-primary);           /* Teal #00B98B */
  font-weight: 900;
  letter-spacing: -0.02em;               /* Tight spacing */
}
```

---

## 🔍 Check if Fonts Load

1. Open Developer Tools (F12)
2. Go to Network tab
3. Filter for ".otf" files
4. Check if files load successfully
5. Go to Elements tab
6. Inspect heading - check Computed styles

---

## ⚠️ Troubleshooting

### Fonts Not Showing
1. Check file paths are correct
2. Verify files exist in `/assets/fonts/`
3. Hard refresh browser (Ctrl+Shift+R)
4. Check browser console for errors

### Font Files Not Found
- Ensure `/assets/fonts/` folder exists
- Check file names are exact
- Use absolute path from server root

### Fallback Fonts Used
- PP Editorial Old didn't load
- Browser used Inter Tight instead
- Then falls back to system sans-serif

---

## 📊 Current Setup

```
Your Theme Typography:

┌─────────────────────────────────────┐
│ Headings (H1-H6)                    │
│ Font: PP Editorial Old              │
│ Weight: 900 (ultra-bold)            │
│ Color: #2D2D34 (dark gray)          │
│ Style: Editorial, professional      │
├─────────────────────────────────────┤
│ Body Text                           │
│ Font: Inter Tight                   │
│ Weight: 400 (normal)                │
│ Color: #2D2D34 (dark gray)          │
│ Style: Clean, readable              │
├─────────────────────────────────────┤
│ Primary Color: #00B98B (teal)       │
│ Secondary: #008B6F (dark teal)      │
└─────────────────────────────────────┘
```

---

## ✨ Summary

**Your custom fonts are ready to use!**

- ✅ PP Editorial Old for headings (stylish)
- ✅ Inter Tight for body text (readable)
- ✅ CSS variables for easy customization
- ✅ Fallbacks ensure reliability
- ✅ Mobile and desktop compatible

**The fonts are automatically applied to:**
- All headings (H1-H6)
- All body text
- All interactive elements
- Entire theme typography

No additional setup needed! 🎉

---

**Status**: ✅ COMPLETE  
**Fonts**: PP Editorial Old + Inter Tight  
**Quality**: Professional Grade  
**Ready**: ✅ YES

