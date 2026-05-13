/**
 * Six2Eight Project Block
 *
 * Main entry point for block registration
 *
 * @package Six2Eight
 * @since 1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import edit from './edit.js';
import save from './save.js';
import './editor.css';
import './style.css';

/**
 * Register the Six2Eight Project block
 */
registerBlockType( metadata.name, {
	...metadata,
	edit,
	save,
} );

