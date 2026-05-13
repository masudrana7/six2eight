/**
 * SIX2EIGHT PROJECT BLOCK - MODULAR STRUCTURE DOCUMENTATION
 * 
 * This file structure follows WordPress block development best practices.
 * 
 * @package Six2Eight
 * @version 1.0.0
 */

==============================================
BLOCK STRUCTURE OVERVIEW
==============================================

The Six2Eight Project block is now organized in a modular, maintainable structure:

blocks/
└── six2eight-project/
    ├── block.json              # Block configuration and metadata
    ├── index.js                # Main entry point (loads edit.js and save.js)
    ├── edit.js                 # Block editor UI and controls
    ├── save.js                 # Server-side rendering (returns null for dynamic blocks)
    ├── index.php               # PHP registration and render callback
    ├── editor.css              # Editor-only styles
    └── style.css               # Frontend and editor styles


==============================================
FILE DESCRIPTIONS
==============================================

1. block.json
   - Block configuration and metadata
   - Defines block name, title, category, icon
   - Lists all supported features and attributes
   - Points to editor script and styles
   - Category changed from "six2eight" to "common" for better discoverability

2. index.js
   - Main JavaScript entry point
   - Imports edit.js and save.js modules
   - Registers the block with WordPress
   - Uses block.json for configuration

3. edit.js
   - Block editor UI component
   - Inspector controls (sidebar panel)
   - Block toolbar controls
   - Block preview in editor
   - All JSX and block editing logic

4. save.js
   - Returns null (since this is a dynamic block)
   - Server-side rendering handled by PHP callback in index.php
   - Keeps block logic DRY

5. index.php
   - PHP block registration function
   - Enqueues and registers scripts/styles
   - Render callback for frontend output
   - Handles WP_Query for posts
   - Outputs block HTML markup

6. editor.css
   - Styles for the block editor only
   - Inspector panel styling
   - Editor preview styling
   - Component styling

7. style.css
   - Frontend-facing styles
   - Block wrapper and grid styling
   - Project item styling
   - Responsive design


==============================================
BLOCK ATTRIBUTES
==============================================

postsPerPage (number)
  Default: 6
  Range: 1-100
  Description: Number of projects to display per page

columns (number)
  Default: 3
  Range: 1-5
  Description: Number of grid columns

orderby (string)
  Default: 'date'
  Options: date, title, ID, rand, menu_order
  Description: Query order by field

order (string)
  Default: 'DESC'
  Options: ASC, DESC
  Description: Query sort order

width (string)
  Default: 'wide'
  Options: full, wide, normal
  Description: Block width style

align (string)
  Default: 'none'
  Options: left, center, right, wide, full
  Description: Block alignment


==============================================
HOW THE BLOCK WORKS
==============================================

1. REGISTRATION (index.php)
   - WordPress calls six2eight_register_project_block() on init hook
   - block.json is read from disk
   - Scripts and styles are registered with WordPress
   - Block is registered with render_callback

2. EDITOR (edit.js)
   - User sees block preview in editor
   - Inspector controls allow changing attributes
   - Changes update block attributes in real-time

3. FRONTEND (index.php render callback)
   - six2eight_render_project_block() is called
   - Receives block attributes
   - Executes WP_Query for six2eight_project posts
   - Returns HTML markup for frontend

4. STYLING
   - editor.css loads in block editor
   - style.css loads in both editor and frontend


==============================================
ADVANTAGES OF THIS STRUCTURE
==============================================

✓ Modular and maintainable
✓ Separates concerns (JS logic, UI, rendering)
✓ Easier to debug and extend
✓ Follows WordPress coding standards
✓ Better code organization
✓ Easier to unit test individual components
✓ Cleaner file dependencies
✓ Better for team collaboration


==============================================
MIGRATION NOTES
==============================================

Previous Structure:
- Single block.js file containing all logic
- Mixed registration and UI code
- Harder to maintain

New Structure:
- Separated into 7 focused files
- Clear responsibilities
- Easier to navigate and modify
- Old block.js can be removed

File Registration Updated:
- index.php now points to index.js (not block.js)
- block.json now has editorScript, editorStyle, style properties
- Automatic registration via block.json


==============================================
DEVELOPMENT WORKFLOW
==============================================

To modify block functionality:

1. Changing Editor UI → edit.js
2. Changing Block Configuration → block.json
3. Changing Frontend Output → index.php (render callback)
4. Adding Editor Styles → editor.css
5. Adding Frontend Styles → style.css
6. Changing PHP Logic → index.php

Each file has a specific purpose, making development faster and cleaner.


==============================================
PERFORMANCE CONSIDERATIONS
==============================================

✓ Modular loading - only needed files loaded
✓ Dynamic rendering - content generated server-side
✓ Efficient queries - optimized WP_Query
✓ Lazy loading - images use loading="lazy"
✓ Proper escaping - security best practices
✓ Cache-friendly - static CSS/JS can be cached


==============================================
EXTENDING THE BLOCK
==============================================

To add new features:

1. Add new attribute to block.json
2. Add UI control in edit.js
3. Pass attribute to render callback
4. Use attribute in index.php render output
5. Add CSS styling as needed

Example: Add background color control
- Add "backgroundColor" to attributes in block.json
- Add ColorPalette control to edit.js InspectorControls
- Pass backgroundColor to render callback
- Output inline style in index.php


==============================================
TESTING & DEBUGGING
==============================================

Block Not Showing:
- Check browser console for JS errors
- Verify block.json syntax
- Ensure index.php render callback exists
- Check that six2eight_project post type exists

Block Not Rendering:
- Check for WP_Query errors
- Verify posts exist in six2eight_project post type
- Check render callback output

Style Issues:
- Check editor.css for editor styles
- Check style.css for frontend styles
- Use browser dev tools to inspect
- Check for CSS conflicts with other plugins


==============================================
NEXT STEPS
==============================================

1. Delete old block.js (no longer needed)
2. Test block in editor
3. Verify rendering on frontend
4. Check console for any errors
5. Test with different attribute combinations
6. Add any additional features as needed


