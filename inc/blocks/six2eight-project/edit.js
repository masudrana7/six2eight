/**
 * Six2Eight Project Block - Editor UI
 *
 * Block editor controls and configuration
 *
 * @package Six2Eight
 * @since 1.0.0
 */

import { InspectorControls, BlockControls, AlignmentToolbar, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, RangeControl, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Edit function - Block editor UI
 *
 * @param {Object} attributes Block attributes
 * @param {Function} setAttributes Function to update attributes
 * @return {JSX} Block editor UI
 */
const edit = ( { attributes, setAttributes } ) => {
	const {
		postsPerPage,
		columns,
		orderby,
		order,
		width,
		align,
	} = attributes;

	const blockProps = useBlockProps( {
		className: `align${ align } is-width-${ width }`,
	} );

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
					{/* Posts Per Page Control */}
					<RangeControl
						label={ __( 'Posts Per Page', 'six2eight' ) }
						value={ postsPerPage }
						onChange={ ( value ) =>
							setAttributes( { postsPerPage: value } )
						}
						min={ 1 }
						max={ 100 }
					/>

					{/* Order By Control */}
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

					{/* Order Control */}
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
					{/* Columns Control */}
					<RangeControl
						label={ __( 'Columns', 'six2eight' ) }
						value={ columns }
						onChange={ ( value ) =>
							setAttributes( { columns: value } )
						}
						min={ 1 }
						max={ 5 }
					/>

					{/* Block Width Control */}
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
					{/* Block Description */}
					<p>
						{ __( 'Displays projects from Six2Eight Project post type.', 'six2eight' ) }
					</p>

					{/* Current Settings Display */}
					<p style={ { fontSize: '12px', color: '#666', marginTop: '10px' } }>
						{ __( 'Current Settings:', 'six2eight' ) }
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Posts Per Page: ', 'six2eight' ) }
						<strong>{ postsPerPage }</strong>
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Columns: ', 'six2eight' ) }
						<strong>{ columns }</strong>
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Order By: ', 'six2eight' ) }
						<strong>{ orderby }</strong>
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Order: ', 'six2eight' ) }
						<strong>{ order }</strong>
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Block Width: ', 'six2eight' ) }
						<strong>{ width }</strong>
					</p>
				</PanelBody>
			</InspectorControls>

			{/* Block Preview in Editor */}
			<div
				{ ...blockProps }
				style={ {
					...blockProps.style,
					padding: '20px',
					border: '2px dashed #ccc',
					borderRadius: '4px',
					backgroundColor: '#f5f5f5',
					textAlign: 'center',
				} }
			>
				{/* Block Title */}
				<p style={ { margin: 0, color: '#666', fontWeight: 'bold' } }>
					{ __( 'Six2Eight Project Block', 'six2eight' ) }
				</p>

				{/* Display Configuration */}
				<p style={ { margin: '10px 0 0 0', fontSize: '12px', color: '#999' } }>
					{ __( 'Showing', 'six2eight' ) } { postsPerPage }{ ' ' }
					{ __( 'projects in', 'six2eight' ) } { columns }{ ' ' }
					{ __( 'columns', 'six2eight' ) }
				</p>

				{/* Display Order Info */}
				<p style={ { margin: '5px 0 0 0', fontSize: '12px', color: '#999' } }>
					{ __( 'Ordered by', 'six2eight' ) } <strong>{ orderby }</strong> ({ order })
				</p>
			</div>
		</>
	);
};

export default edit;

