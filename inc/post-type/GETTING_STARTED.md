# ✅ ACTION CHECKLIST - Getting Started

## Start Using Your Custom Post Type

Follow this step-by-step checklist to get your custom post type up and running.

---

## 🎯 Phase 1: Verify Installation (5 minutes)

- [ ] **Access WordPress Admin Dashboard**
  - [ ] Log in to WordPress
  - [ ] You should see a new "Projects" menu item (with briefcase icon)
  - [ ] Menu appears between "Posts" and "Pages"

- [ ] **Check Admin Menu**
  - [ ] Click: Dashboard → Projects
  - [ ] You should see the projects list (currently empty)
  - [ ] Look for "Add New", "Categories", "Tags" options

- [ ] **Verify Post Type Works**
  - [ ] Click: Projects → Add New
  - [ ] Page should load with post editor
  - [ ] You should see: Title field, content editor, featured image, category field

✅ **If all checks pass, installation is successful!**

---

## 🎯 Phase 2: Create Sample Projects (10 minutes)

### Project 1: Design Portfolio
- [ ] Click: Projects → Add New
- [ ] **Title:** "E-Commerce Website Design"
- [ ] **Description (Content Editor):**
  ```
  Designed and developed a modern e-commerce platform with 
  responsive layout, product filtering, and checkout system. 
  Features include customer reviews, wishlist, and advanced search.
  ```
- [ ] **Featured Image:** Select project screenshot/mockup
- [ ] **Category:** Create new category called "Web Design"
  - [ ] Click: "+ Add New Category"
  - [ ] Name: "Web Design"
  - [ ] Click: "Add New Category"
  - [ ] Select it in the category dropdown
- [ ] Click: **Publish**
- [ ] ✅ Project 1 created!

### Project 2: Mobile App Development
- [ ] Click: Projects → Add New
- [ ] **Title:** "Fitness Tracking Mobile App"
- [ ] **Description (Content Editor):**
  ```
  Developed iOS and Android fitness tracking application 
  with real-time data sync, workout logging, and social features. 
  Built with React Native and Node.js backend.
  ```
- [ ] **Featured Image:** Select app screenshot
- [ ] **Category:** Create new category called "Mobile App"
  - [ ] Name: "Mobile App"
  - [ ] Click: "Add New Category"
  - [ ] Select it
- [ ] Click: **Publish**
- [ ] ✅ Project 2 created!

### Project 3: Another Project
- [ ] Click: Projects → Add New
- [ ] **Title:** "Your Project Name"
- [ ] **Description:** Add project details
- [ ] **Featured Image:** Select image
- [ ] **Category:** Select "Web Design" or "Mobile App"
- [ ] Click: **Publish**
- [ ] ✅ Project 3 created!

✅ **Now you have sample projects!**

---

## 🎯 Phase 3: Check Admin Interface (5 minutes)

- [ ] **View Projects List**
  - [ ] Go to: Projects
  - [ ] You should see all your projects
  - [ ] Check the columns:
    - [ ] Checkbox column
    - [ ] Image column (shows thumbnail)
    - [ ] Title column
    - [ ] Category column
    - [ ] Date column

- [ ] **Try Admin Features**
  - [ ] **Search:** Type in search box at top
  - [ ] **Filter:** Click category filter
  - [ ] **Sort:** Click column headers to sort
  - [ ] **Edit:** Click project title to edit
  - [ ] **Bulk Select:** Check multiple projects checkbox

- [ ] **Manage Categories**
  - [ ] Click: Projects → Categories
  - [ ] You should see your created categories
  - [ ] Try adding another category

✅ **Admin interface working perfectly!**

---

## 🎯 Phase 4: Add Widget to Page (15 minutes)

### Step 1: Create/Edit a Page
- [ ] Click: Pages → Add New (or edit existing)
- [ ] **Title:** "Our Projects" (or similar)
- [ ] Click: **Edit with Elementor**

### Step 2: Add Widget
- [ ] Look for: "Add Element" (usually a plus icon)
- [ ] Search for: "Six2Eight Project"
- [ ] Click the widget to add it to page
- [ ] You should see the widget placeholder

### Step 3: Configure Widget
- [ ] In left panel, find: "Data Source"
- [ ] Change from "Repeater" to "Post Type (Six2eight Project)"
- [ ] Look for section: "Post Type Settings" (should appear)
- [ ] Configure:
  - [ ] Posts Per Page: 6
  - [ ] Order By: Date
  - [ ] Order: Descending

### Step 4: Customize Appearance (Optional)
- [ ] In left panel:
  - [ ] "Layout" → Set columns (2, 3, or 4)
  - [ ] "Image Style" → Adjust border radius
  - [ ] "Title Style" → Adjust color/font
  - [ ] "Container Style" → Adjust padding/background

### Step 5: Publish
- [ ] Click: **Publish** button
- [ ] ✅ Page with widget published!

---

## 🎯 Phase 5: View Frontend (5 minutes)

- [ ] **Visit Your Page**
  - [ ] Click: "View Page" on publication
  - [ ] OR go to page in new tab
  - [ ] You should see all your projects displayed in a grid

- [ ] **Check Display**
  - [ ] All projects show
  - [ ] Images display correctly
  - [ ] Grid layout looks good
  - [ ] Responsive on mobile (squeeze browser to test)

- [ ] **Test Interactive Features**
  - [ ] Hover over project (should show description)
  - [ ] Click project (if clickable)
  - [ ] Mobile view (resize browser to test)

✅ **Everything displaying beautifully!**

---

## 🎯 Phase 6: Verify REST API (Optional, 5 minutes)

- [ ] **Open Browser Developer Tools**
  - [ ] Right-click → Inspect
  - [ ] Go to Console tab

- [ ] **Test REST Endpoint**
  - [ ] Copy and paste in console:
  ```javascript
  fetch('/wp-json/wp/v2/six2eight-projects')
    .then(r => r.json())
    .then(data => console.log(data))
  ```
  - [ ] Should see your projects in console
  - [ ] ✅ REST API working!

---

## 📋 Troubleshooting Checklist

### Projects Menu Not Showing?
- [ ] Flush permalinks: Settings → Permalinks → Save
- [ ] Disable caching plugin temporarily
- [ ] Clear browser cache
- [ ] Refresh page

### Widget Not Showing Projects?
- [ ] Ensure at least one project is **Published** (not draft)
- [ ] Check "Data Source" is set to "Post Type"
- [ ] Save and refresh page in Elementor

### Images Not Displaying?
- [ ] Check featured images are set for projects
- [ ] Image files are uploading properly
- [ ] Try on different browser

### Categories Not Appearing?
- [ ] Create at least one category
- [ ] Assign a project to that category
- [ ] Go back to editor and refresh

---

## 📞 Quick Reference

### Common Admin Paths
```
Create Project:     Dashboard → Projects → Add New
View All Projects:  Dashboard → Projects
Manage Categories:  Dashboard → Projects → Categories
Edit Project:       Dashboard → Projects → Click title
Delete Project:     Dashboard → Projects → Hover → Delete
```

### Common Frontend URLs
```
Projects Archive:   /projects/
Single Project:     /project/project-name/
Category Archive:   /project-category/category-name/
```

### Elementor Widget
```
Widget Name:  Six2Eight Project
Data Source:  Post Type (Six2eight Project)
Location:     Add element → General → Six2Eight Project
```

---

## ✅ FINAL CHECKLIST - Ready to Showcase

- [ ] Projects created (at least 3)
- [ ] Categories assigned
- [ ] Widget added to page
- [ ] Projects displaying on frontend
- [ ] Admin interface working
- [ ] Mobile responsive confirmed
- [ ] Images loading correctly
- [ ] No errors in console
- [ ] Ready for portfolio/interview

---

## 🎉 YOU'RE ALL SET!

You now have a professional custom post type system with:
- ✅ WordPress native post type
- ✅ Category organization
- ✅ Admin management interface
- ✅ Elementor widget display
- ✅ Frontend archive/single pages
- ✅ REST API access

**Next Steps:**
1. Add more projects
2. Refine styling with Elementor
3. Customize content as needed
4. Showcase in your portfolio!

---

**Need Help?**
- Check documentation files (README.md files)
- Review code comments in PHP files
- Test in a staging environment first
- All code is production-ready!

**Last Updated:** May 11, 2026
**Status:** ✅ Ready to Use

