# 🎨 CSS Variables Quick Reference Guide

## Copy & Paste Ready

### All CSS Variables in :root

```css
:root {
  /* ===== COLORS ===== */
  --color-primary: #0073aa;           /* Links, accents */
  --color-secondary: #005a87;         /* Hover state */
  --color-heading: #2D2D34;           /* All headings */
  --color-text: #2D2D34;              /* Body text */
  --color-border: #e5e5e5;            /* Borders */
  --color-bg: #f9f9f9;                /* Page background */
  --color-white: #fff;                /* White */
  --color-light-gray: #666;           /* Secondary text */

  /* ===== TYPOGRAPHY ===== */
  --font-primary: 'Inter', sans-serif;
  --font-weight-normal: 400;
  --font-weight-medium: 500;
  --font-weight-semibold: 600;
  --font-weight-bold: 700;

  /* ===== FONT SIZES ===== */
  --fs-h1: 60px;
  --fs-h2: 60px;
  --fs-h3: 40px;
  --fs-h4: 32px;
  --fs-h5: 24px;
  --fs-h6: 20px;
  --fs-body: 18px;
  --fs-small: 14px;

  /* ===== LINE HEIGHTS ===== */
  --lh-h1: 72px;
  --lh-h2: 72px;
  --lh-h3: 48px;
  --lh-h4: 40px;
  --lh-h5: 32px;
  --lh-h6: 28px;
  --lh-body: 28px;
  --lh-small: 22px;

  /* ===== SPACING ===== */
  --spacing-xs: 4px;
  --spacing-sm: 8px;
  --spacing-md: 16px;
  --spacing-lg: 20px;
  --spacing-xl: 40px;
  --spacing-2xl: 60px;

  /* ===== TRANSITIONS ===== */
  --transition: 0.3s ease;
}
```

---

## Common Use Cases

### Styling a Button

```css
.button {
  background-color: var(--color-primary);
  color: var(--color-white);
  padding: var(--spacing-md) var(--spacing-lg);
  font-size: var(--fs-body);
  font-weight: var(--font-weight-semibold);
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color var(--transition);
}

.button:hover {
  background-color: var(--color-secondary);
}
```

### Styling a Card

```css
.card {
  background-color: var(--color-white);
  border: 1px solid var(--color-border);
  padding: var(--spacing-lg);
  margin-bottom: var(--spacing-md);
  border-radius: 4px;
}

.card-title {
  color: var(--color-heading);
  font-size: var(--fs-h3);
  font-weight: var(--font-weight-bold);
  margin-bottom: var(--spacing-md);
}

.card-text {
  color: var(--color-text);
  font-size: var(--fs-body);
  line-height: var(--lh-body);
}
```

### Styling a Section

```css
.section {
  background-color: var(--color-bg);
  padding: var(--spacing-2xl) 0;
  margin: var(--spacing-xl) 0;
}

.section-title {
  color: var(--color-heading);
  font-size: var(--fs-h2);
  font-weight: var(--font-weight-bold);
  line-height: var(--lh-h2);
  margin-bottom: var(--spacing-lg);
}

.section-text {
  color: var(--color-text);
  font-size: var(--fs-body);
  line-height: var(--lh-body);
}
```

---

## Customization Examples

### Theme 1: Blue Professional

```css
:root {
  --color-primary: #0073aa;         /* Current */
  --color-secondary: #005a87;       /* Current */
  --color-heading: #2D2D34;         /* Current */
}
```

### Theme 2: Red Modern

```css
:root {
  --color-primary: #E63946;         /* Red accent */
  --color-secondary: #A4161A;       /* Darker red */
  --color-heading: #1D3557;         /* Dark blue */
}
```

### Theme 3: Green Natural

```css
:root {
  --color-primary: #2D9C78;         /* Green */
  --color-secondary: #1D7B6B;       /* Darker green */
  --color-heading: #264653;         /* Dark slate */
}
```

### Theme 4: Purple Creative

```css
:root {
  --color-primary: #7209B7;         /* Purple */
  --color-secondary: #5A189A;       /* Darker purple */
  --color-heading: #3A0F5C;         /* Very dark */
}
```

---

## Typography Scaling

### Small Size Theme

```css
:root {
  --fs-h1: 48px;    /* Was 60px */
  --fs-h2: 48px;
  --fs-h3: 32px;    /* Was 40px */
  --fs-h4: 28px;    /* Was 32px */
  --fs-h5: 20px;    /* Was 24px */
  --fs-h6: 18px;    /* Was 20px */
  --fs-body: 16px;  /* Was 18px */
  --fs-small: 12px; /* Was 14px */
}
```

### Large Size Theme

```css
:root {
  --fs-h1: 72px;    /* Was 60px */
  --fs-h2: 72px;
  --fs-h3: 48px;    /* Was 40px */
  --fs-h4: 40px;    /* Was 32px */
  --fs-h5: 32px;    /* Was 24px */
  --fs-h6: 24px;    /* Was 20px */
  --fs-body: 20px;  /* Was 18px */
  --fs-small: 16px; /* Was 14px */
}
```

---

## Mobile Responsive Adjustments

```css
/* Desktop (default) */
:root {
  --fs-body: 18px;
  --fs-h1: 60px;
  --spacing-lg: 20px;
}

/* Tablet */
@media (max-width: 768px) {
  :root {
    --fs-body: 17px;
    --fs-h1: 48px;
    --spacing-lg: 16px;
  }
}

/* Mobile */
@media (max-width: 480px) {
  :root {
    --fs-body: 16px;
    --fs-h1: 40px;
    --spacing-lg: 12px;
  }
}
```

---

## Dark Mode Example

```css
/* Light mode (default) */
:root {
  --color-bg: #f9f9f9;
  --color-text: #2D2D34;
  --color-heading: #2D2D34;
  --color-white: #fff;
}

/* Dark mode */
@media (prefers-color-scheme: dark) {
  :root {
    --color-bg: #1a1a1a;
    --color-text: #e0e0e0;
    --color-heading: #ffffff;
    --color-white: #2a2a2a;
  }
}
```

---

## Using Variables in Different Contexts

### In HTML with Inline Styles (not recommended)

```html
<!-- ❌ Don't do this -->
<div style="background-color: var(--color-primary);">
  This won't work in all browsers
</div>
```

### In CSS Files (correct)

```css
/* ✅ Do this instead */
.my-element {
  background-color: var(--color-primary);
}
```

### In JavaScript (ES6+)

```javascript
// Get a CSS variable
const primaryColor = getComputedStyle(document.documentElement)
  .getPropertyValue('--color-primary');

// Set a CSS variable
document.documentElement.style.setProperty('--color-primary', '#FF0000');
```

---

## Variable Naming Convention

### Format: `--[category]-[name]`

**Colors:**
- `--color-primary` (main color)
- `--color-secondary` (accent)
- `--color-heading` (headings)
- `--color-text` (body text)
- `--color-border` (borders)
- `--color-bg` (backgrounds)

**Typography:**
- `--font-primary` (font family)
- `--fs-*` (font sizes)
- `--lh-*` (line heights)
- `--font-weight-*` (weights)

**Spacing:**
- `--spacing-xs` (extra small)
- `--spacing-sm` (small)
- `--spacing-md` (medium)
- `--spacing-lg` (large)
- `--spacing-xl` (extra large)
- `--spacing-2xl` (2x large)

**Effects:**
- `--transition` (animations)
- `--shadow-*` (shadows)
- `--radius-*` (border radius)

---

## Fallback Support

### With Fallback (Safer)

```css
.element {
  color: var(--color-primary, #0073aa);
  /* If --color-primary doesn't exist, use #0073aa */
}
```

### Multiple Fallbacks

```css
.element {
  font-family: var(--font-primary, 'Inter', Arial, sans-serif);
  /* Try --font-primary, then Inter, then Arial, then sans-serif */
}
```

---

## Best Practices

✅ **DO:**
```css
/* Use variables in all CSS */
.button {
  background: var(--color-primary);
  padding: var(--spacing-md);
}
```

❌ **DON'T:**
```css
/* Hardcode values */
.button {
  background: #0073aa;
  padding: 16px;
}
```

✅ **DO:**
```css
/* Name variables semantically */
--color-primary
--fs-h1
--spacing-lg
```

❌ **DON'T:**
```css
/* Use vague names */
--color1
--size-big
--space-x
```

✅ **DO:**
```css
/* Group related variables */
:root {
  /* Colors */
  --color-primary: ...
  --color-secondary: ...
  
  /* Typography */
  --fs-h1: ...
  --fs-body: ...
}
```

❌ **DON'T:**
```css
/* Mix everything together */
:root {
  --color-primary: ...
  --fs-h1: ...
  --color-secondary: ...
  --fs-body: ...
}
```

---

## Browser Support

| Feature | Chrome | Firefox | Safari | Edge |
|---------|--------|---------|--------|------|
| CSS Variables | ✅ 49+ | ✅ 31+ | ✅ 9.1+ | ✅ 15+ |
| Fallback | ✅ Yes | ✅ Yes | ✅ Yes | ✅ Yes |
| Dark Mode | ✅ 76+ | ✅ 67+ | ✅ 12.1+ | ✅ 79+ |

---

## Performance Tips

✅ **Single Import**
```css
/* Use one font import for all weights */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700');
```

✅ **Minimize Calculations**
```css
/* Let browser handle the calculations */
.element {
  padding: var(--spacing-lg);
}
```

✅ **Use Appropriate Sizes**
```css
/* Don't use overly large or small values */
--fs-body: 18px;  /* Good */
--fs-body: 32px;  /* Usually too large */
--fs-body: 10px;  /* Usually too small */
```

---

## Quick Conversion Cheat Sheet

| Old Way | New Way |
|---------|---------|
| `color: #0073aa;` | `color: var(--color-primary);` |
| `font-size: 60px;` | `font-size: var(--fs-h1);` |
| `margin: 20px;` | `margin: var(--spacing-lg);` |
| `padding: 16px;` | `padding: var(--spacing-md);` |
| `line-height: 28px;` | `line-height: var(--lh-body);` |
| `font-weight: 700;` | `font-weight: var(--font-weight-bold);` |

---

## Summary

✅ 30+ CSS variables defined  
✅ Professional naming convention  
✅ Easy to customize  
✅ Production-ready  
✅ Interview-ready  

**Copy the `:root` CSS variables and use them throughout your stylesheets!** 🎉

---

**File**: CSS_Variables_Quick_Reference.md  
**Status**: Ready to use  
**Quality**: ⭐⭐⭐⭐⭐

