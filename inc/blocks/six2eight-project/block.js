/**
 * Six2Eight Project Gutenberg Block
 *
 * Block editor controls and configuration
 *
 * @package Six2Eight
 * @since 1.0.0
 */

const { registerBlockType } = wp.blocks;
const { InspectorControls, BlockControls, AlignmentToolbar } = wp.blockEditor;
const { PanelBody, RangeControl, SelectControl, ToolbarGroup, ToolbarButton } = wp.components;
const { __ } = wp.i18n;

registerBlockType( 'six2eight/project', {
	title: __( 'Six2Eight Project', 'six2eight' ),
	icon: 'grid-view',
	category: 'common',
	keywords: [
		__( 'project', 'six2eight' ),
		__( 'portfolio', 'six2eight' ),
		__( 'grid', 'six2eight' ),
	],
	attributes: {
		postsPerPage: {
			type: 'number',
			default: 6,
		},
		columns: {
			type: 'number',
			default: 3,
		},
		orderby: {
			type: 'string',
			default: 'date',
		},
		order: {
			type: 'string',
			default: 'DESC',
		},
		width: {
			type: 'string',
			default: 'wide',
		},
		align: {
			type: 'string',
			default: 'none',
		},
	},

	/**
	 * Edit function - Block editor UI
	 */
	edit: ( { attributes, setAttributes } ) => {
		const {
			postsPerPage,
			columns,
			orderby,
			order,
			width,
			align,
		} = attributes;

		return (
			<>
				{/* Block Controls - Top toolbar */}
				<BlockControls>
					<AlignmentToolbar
						value={ align }
						onChange={ ( newAlign ) =>
							setAttributes( { align: newAlign } )
						}
					/>
				</BlockControls>

				{/* Inspector Controls - Sidebar */}
				<InspectorControls>
					{/* Query Settings Panel */}
					<PanelBody
						title={ __( 'Query Settings', 'six2eight' ) }
						initialOpen={ true }
					>
						<RangeControl
							label={ __( 'Posts Per Page', 'six2eight' ) }
							value={ postsPerPage }
							onChange={ ( value ) =>
								setAttributes( { postsPerPage: value } )
							}
							min={ 1 }
							max={ 100 }
						/>

						<SelectControl
							label={ __( 'Order By', 'six2eight' ) }
							value={ orderby }
							options={ [
								{
									label: __( 'Date', 'six2eight' ),
									value: 'date',
								},
								{
									label: __( 'Title', 'six2eight' ),
									value: 'title',
								},
								{
									label: __( 'ID', 'six2eight' ),
									value: 'ID',
								},
								{
									label: __( 'Random', 'six2eight' ),
									value: 'rand',
								},
								{
									label: __( 'Menu Order', 'six2eight' ),
									value: 'menu_order',
								},
							] }
							onChange={ ( value ) =>
								setAttributes( { orderby: value } )
							}
						/>

						<SelectControl
							label={ __( 'Order', 'six2eight' ) }
							value={ order }
							options={ [
								{
									label: __( 'Descending', 'six2eight' ),
									value: 'DESC',
								},
								{
									label: __( 'Ascending', 'six2eight' ),
									value: 'ASC',
								},
							] }
							onChange={ ( value ) =>
								setAttributes( { order: value } )
							}
						/>
					</PanelBody>

					{/* Layout Settings Panel */}
					<PanelBody
						title={ __( 'Layout Settings', 'six2eight' ) }
						initialOpen={ true }
					>
						<RangeControl
							label={ __( 'Columns', 'six2eight' ) }
							value={ columns }
							onChange={ ( value ) =>
								setAttributes( { columns: value } )
							}
							min={ 1 }
							max={ 5 }
						/>

						<SelectControl
							label={ __( 'Block Width', 'six2eight' ) }
							value={ width }
							options={ [
								{
									label: __( 'Full Width', 'six2eight' ),
									value: 'full',
								},
								{
									label: __( 'Wide', 'six2eight' ),
									value: 'wide',
								},
								{
									label: __( 'Normal', 'six2eight' ),
									value: 'normal',
								},
							] }
							onChange={ ( value ) =>
								setAttributes( { width: value } )
							}
						/>
					</PanelBody>

					{/* Display Information Panel */}
					<PanelBody
						title={ __( 'Block Information', 'six2eight' ) }
						initialOpen={ false }
					>
						<p>
							{ __( 'Displays projects from Six2Eight Project post type.', 'six2eight' ) }
						</p>
						<p style={ { fontSize: '12px', color: '#666' } }>
							{ __( 'Current Settings:', 'six2eight' ) }
						</p>
						<p style={ { fontSize: '12px', color: '#666' } }>
							{ __( 'Posts Per Page: ', 'six2eight' ) }
							<strong>{ postsPerPage }</strong>
						</p>
						<p style={ { fontSize: '12px', color: '#666' } }>
							{ __( 'Columns: ', 'six2eight' ) }
							<strong>{ columns }</strong>
						</p>
						<p style={ { fontSize: '12px', color: '#666' } }>
							{ __( 'Order By: ', 'six2eight' ) }
							<strong>{ orderby }</strong>
						</p>
						<p style={ { fontSize: '12px', color: '#666' } }>
							{ __( 'Order: ', 'six2eight' ) }
							<strong>{ order }</strong>
						</p>
						<p style={ { fontSize: '12px', color: '#666' } }>
							{ __( 'Block Width: ', 'six2eight' ) }
							<strong>{ width }</strong>
						</p>
					</PanelBody>
				</InspectorControls>

				{/* Block Preview */}
				<div
					className={ `wp-block-six2eight-project align${ align } is-width-${ width }` }
					style={ {
						padding: '20px',
						border: '2px dashed #ccc',
						borderRadius: '4px',
						backgroundColor: '#f5f5f5',
						textAlign: 'center',
					} }
				>
					<p style={ { margin: 0, color: '#666' } }>
						📊 { __( 'Six2Eight Project Block', 'six2eight' ) }
					</p>
					<p style={ { margin: '10px 0 0 0', fontSize: '12px', color: '#999' } }>
						{ __( 'Showing', 'six2eight' ) } { postsPerPage }{ ' ' }
						{ __( 'projects in', 'six2eight' ) } { columns }{ ' ' }
						{ __( 'columns', 'six2eight' ) }
					</p>
					<p style={ { margin: '5px 0 0 0', fontSize: '12px', color: '#999' } }>
						{ __( 'Ordered by', 'six2eight' ) } <strong>{ orderby }</strong> ({ order })
					</p>
				</div>
			</>
		);
	},

	/**
	 * Save function - Returns null for dynamic block
	 * (Content rendered server-side in index.php)
	 */
	save: () => {
		return null;
	},
} );

