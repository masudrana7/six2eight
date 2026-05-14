/**
 * Six2Eight Grid Section Block - Editor View
 *
 * @package Six2Eight
 * @since 1.0.0
 */

import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	BlockControls,
	InspectorControls,
	ColorPalette,
} from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	RangeControl,
	Button,
	ButtonGroup,
} from '@wordpress/components';
import { useState } from '@wordpress/element';
import './editor.css';

export default function Edit( { attributes, setAttributes } ) {
	const {
		sectionTitle,
		buttonText,
		buttonLink,
		columns,
		boxContent,
		backgroundColor,
		textColor,
	} = attributes;

	const [ selectedBoxIndex, setSelectedBoxIndex ] = useState( 0 );

	const blockProps = useBlockProps( {
		style: {
			backgroundColor: backgroundColor,
			color: textColor,
		},
	} );

	/**
	 * Add a new box to the repeater
	 */
	const addBox = () => {
		const newBox = {
			id: Math.max( ...boxContent.map( ( box ) => box.id ), 0 ) + 1,
			price: '$0',
			year: new Date().getFullYear().toString(),
			shortDescription: 'Short description',
			description: 'Full detailed description',
		};
		setAttributes( { boxContent: [ ...boxContent, newBox ] } );
		setSelectedBoxIndex( boxContent.length );
	};

	/**
	 * Remove a box from the repeater
	 */
	const removeBox = ( index ) => {
		const updatedBoxes = boxContent.filter( ( _, i ) => i !== index );
		setAttributes( { boxContent: updatedBoxes } );
		if ( selectedBoxIndex >= updatedBoxes.length ) {
			setSelectedBoxIndex( Math.max( 0, updatedBoxes.length - 1 ) );
		}
	};

	/**
	 * Update box field
	 */
	const updateBoxField = ( index, field, value ) => {
		const updatedBoxes = [ ...boxContent ];
		updatedBoxes[ index ] = {
			...updatedBoxes[ index ],
			[ field ]: value,
		};
		setAttributes( { boxContent: updatedBoxes } );
	};

	/**
	 * Duplicate a box
	 */
	const duplicateBox = ( index ) => {
		const boxToDuplicate = { ...boxContent[ index ] };
		boxToDuplicate.id = Math.max( ...boxContent.map( ( box ) => box.id ), 0 ) + 1;
		const updatedBoxes = [
			...boxContent.slice( 0, index + 1 ),
			boxToDuplicate,
			...boxContent.slice( index + 1 ),
		];
		setAttributes( { boxContent: updatedBoxes } );
	};

	return (
		<>
			{/* Block Controls */}
			<BlockControls></BlockControls>

			{/* Inspector Controls - Sidebar */}
			<InspectorControls>
				{/* Section Settings */}
				<PanelBody title={ __( 'Section Settings', 'six2eight' ) } initialOpen={ true }>
					<TextControl
						label={ __( 'Section Title', 'six2eight' ) }
						value={ sectionTitle }
						onChange={ ( value ) => setAttributes( { sectionTitle: value } ) }
						placeholder={ __( 'Enter section title', 'six2eight' ) }
					/>

					<TextControl
						label={ __( 'Button Text', 'six2eight' ) }
						value={ buttonText }
						onChange={ ( value ) => setAttributes( { buttonText: value } ) }
						placeholder={ __( 'Enter button text', 'six2eight' ) }
					/>

					<TextControl
						label={ __( 'Button Link', 'six2eight' ) }
						value={ buttonLink }
						onChange={ ( value ) => setAttributes( { buttonLink: value } ) }
						placeholder={ __( 'Enter button URL', 'six2eight' ) }
						type="url"
					/>

					<RangeControl
						label={ __( 'Grid Columns', 'six2eight' ) }
						value={ columns }
						onChange={ ( value ) => setAttributes( { columns: value } ) }
						min={ 1 }
						max={ 4 }
						step={ 1 }
					/>
				</PanelBody>

				{/* Color Settings */}
				<PanelBody title={ __( 'Color Settings', 'six2eight' ) } initialOpen={ false }>
					<div>
						<label>{ __( 'Background Color', 'six2eight' ) }</label>
						<input
							type="color"
							value={ backgroundColor }
							onChange={ ( e ) => setAttributes( { backgroundColor: e.target.value } ) }
							style={ { width: '100%', height: '40px', cursor: 'pointer' } }
						/>
					</div>

					<div style={ { marginTop: '12px' } }>
						<label>{ __( 'Text Color', 'six2eight' ) }</label>
						<input
							type="color"
							value={ textColor }
							onChange={ ( e ) => setAttributes( { textColor: e.target.value } ) }
							style={ { width: '100%', height: '40px', cursor: 'pointer' } }
						/>
					</div>
				</PanelBody>

				{/* Box Content Settings */}
				<PanelBody title={ __( 'Box Content Editor', 'six2eight' ) } initialOpen={ true }>
					<div style={ { marginBottom: '16px' } }>
						<label style={ { display: 'block', marginBottom: '8px', fontWeight: 'bold' } }>
							{ __( 'Total Boxes', 'six2eight' ) }: { boxContent.length }
						</label>

						{/* Box Selector Tabs */}
						<div style={ { marginBottom: '12px', display: 'flex', gap: '4px', flexWrap: 'wrap' } }>
							{ boxContent.map( ( box, index ) => (
								<button
									key={ box.id }
									onClick={ () => setSelectedBoxIndex( index ) }
									style={ {
										padding: '6px 12px',
										backgroundColor: selectedBoxIndex === index ? '#00B98B' : '#f0f0f0',
										color: selectedBoxIndex === index ? '#fff' : '#2D2D34',
										border: '1px solid #ddd',
										borderRadius: '4px',
										cursor: 'pointer',
										fontWeight: selectedBoxIndex === index ? 'bold' : 'normal',
										fontSize: '12px',
									} }
								>
									{ __( 'Box', 'six2eight' ) } { index + 1 }
								</button>
							) ) }
						</div>

						{/* Edit Current Selected Box */}
						{ boxContent[ selectedBoxIndex ] && (
							<div style={ { border: '1px solid #ddd', padding: '12px', borderRadius: '4px' } }>
								<TextControl
									label={ __( 'Price', 'six2eight' ) }
									value={ boxContent[ selectedBoxIndex ].price }
									onChange={ ( value ) => updateBoxField( selectedBoxIndex, 'price', value ) }
									placeholder={ __( 'e.g. $99', 'six2eight' ) }
								/>

								<TextControl
									label={ __( 'Year', 'six2eight' ) }
									value={ boxContent[ selectedBoxIndex ].year }
									onChange={ ( value ) => updateBoxField( selectedBoxIndex, 'year', value ) }
									placeholder={ __( 'e.g. 2024', 'six2eight' ) }
								/>

								<TextControl
									label={ __( 'Short Description', 'six2eight' ) }
									value={ boxContent[ selectedBoxIndex ].shortDescription }
									onChange={ ( value ) =>
										updateBoxField( selectedBoxIndex, 'shortDescription', value )
									}
									placeholder={ __( 'Brief description', 'six2eight' ) }
								/>

								<TextControl
									label={ __( 'Description', 'six2eight' ) }
									value={ boxContent[ selectedBoxIndex ].description }
									onChange={ ( value ) => updateBoxField( selectedBoxIndex, 'description', value ) }
									placeholder={ __( 'Full description', 'six2eight' ) }
									help={ __( 'Detailed description for this box', 'six2eight' ) }
								/>

								{/* Action Buttons */}
								<div
									style={ {
										marginTop: '12px',
										display: 'flex',
										gap: '8px',
										flexWrap: 'wrap',
									} }
								>
									<Button
										variant="secondary"
										onClick={ () => duplicateBox( selectedBoxIndex ) }
										size="small"
									>
										{ __( 'Duplicate', 'six2eight' ) }
									</Button>

									{ boxContent.length > 1 && (
										<Button
											variant="tertiary"
											isDestructive
											onClick={ () => removeBox( selectedBoxIndex ) }
											size="small"
										>
											{ __( 'Delete', 'six2eight' ) }
										</Button>
									) }
								</div>
							</div>
						) }

						{/* Add New Box Button */}
						<Button variant="primary" onClick={ addBox } style={ { marginTop: '12px', width: '100%' } }>
							{ __( '+ Add New Box', 'six2eight' ) }
						</Button>
					</div>
				</PanelBody>
			</InspectorControls>

			{/* Block Preview */}
			<div { ...blockProps } className="six2eight-grid-section-editor">
				<div className="six2eight-grid-section-header">
					<RichText
						tagName="h2"
						className="six2eight-grid-section-title"
						value={ sectionTitle }
						onChange={ ( value ) => setAttributes( { sectionTitle: value } ) }
						placeholder={ __( 'Section Title', 'six2eight' ) }
					/>
				</div>

				{/* Grid Preview */}
				<div
					className="six2eight-grid-section-grid"
					style={ {
						display: 'grid',
						gridTemplateColumns: `repeat(${columns}, 1fr)`,
						gap: '24px',
						padding: '24px',
					} }
				>
					{ boxContent.map( ( box, index ) => (
						<div
							key={ box.id }
							className={
								selectedBoxIndex === index
									? 'six2eight-grid-box selected'
									: 'six2eight-grid-box'
							}
							onClick={ () => setSelectedBoxIndex( index ) }
							style={ {
								border: selectedBoxIndex === index ? '2px solid #00B98B' : '1px solid #ddd',
								padding: '20px',
								borderRadius: '8px',
								backgroundColor: '#f9f9f9',
								cursor: 'pointer',
								transition: 'all 0.3s ease',
							} }
						>
							<div className="box-price" style={ { fontSize: '24px', fontWeight: 'bold', color: '#00B98B', marginBottom: '8px' } }>
								{ box.price }
							</div>
							<div className="box-year" style={ { fontSize: '14px', color: '#666', marginBottom: '12px' } }>
								{ box.year }
							</div>
							<div className="box-short-description" style={ { fontSize: '16px', fontWeight: '600', marginBottom: '8px' } }>
								{ box.shortDescription }
							</div>
							<div className="box-description" style={ { fontSize: '14px', color: '#666', lineHeight: '1.5' } }>
								{ box.description }
							</div>
						</div>
					) ) }
				</div>

				{/* Button Preview */}
				<div style={ { padding: '24px', textAlign: 'center' } }>
					<button
						style={ {
							backgroundColor: '#00B98B',
							color: '#fff',
							border: 'none',
							padding: '12px 32px',
							borderRadius: '4px',
							fontSize: '16px',
							fontWeight: '600',
							cursor: 'pointer',
						} }
					>
						{ buttonText }
					</button>
				</div>
			</div>
		</>
	);
}

