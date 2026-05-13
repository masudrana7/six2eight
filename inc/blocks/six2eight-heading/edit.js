/**
 * Six2Eight Heading Block - Editor UI
 *
 * Block editor controls and configuration
 *
 * @package Six2Eight
 * @since 1.0.0
 */

const { InspectorControls, BlockControls, AlignmentToolbar } = wp.blockEditor;
const { PanelBody, RangeControl, SelectControl, TextControl } = wp.components;
const { __ } = wp.i18n;

/**
 * Edit function - Block editor UI
 *
 * @param {Object} attributes Block attributes
 * @param {Function} setAttributes Function to update attributes
 * @return {JSX} Block editor UI
 */
const edit = ( { attributes, setAttributes } ) => {
	const {
		content,
		level,
		align,
		textColor,
		fontSize,
		fontWeight,
		lineHeight,
		marginTop,
		marginBottom,
		letterSpacing,
	} = attributes;

	/* Heading tag based on level */
	const headingTag = `h${ level }`;

	/* Color palette options */
	const colors = [
		{ name: 'Black', color: '#000000' },
		{ name: 'White', color: '#FFFFFF' },
		{ name: 'Primary Dark', color: '#2D2D34' },
		{ name: 'Primary Green', color: '#00B98B' },
		{ name: 'Secondary', color: '#64748B' },
		{ name: 'Light Gray', color: '#F5F5F5' },
	];

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
				{/* Heading Settings Panel */}
				<PanelBody
					title={ __( 'Heading Settings', 'six2eight' ) }
					initialOpen={ true }
				>
					{/* Heading Level Control */}
					<SelectControl
						label={ __( 'Heading Level', 'six2eight' ) }
						value={ level }
						options={ [
							{ label: __( 'H1', 'six2eight' ), value: 1 },
							{ label: __( 'H2', 'six2eight' ), value: 2 },
							{ label: __( 'H3', 'six2eight' ), value: 3 },
							{ label: __( 'H4', 'six2eight' ), value: 4 },
							{ label: __( 'H5', 'six2eight' ), value: 5 },
							{ label: __( 'H6', 'six2eight' ), value: 6 },
						] }
						onChange={ ( value ) =>
							setAttributes( { level: parseInt( value ) } )
						}
					/>
				</PanelBody>

				{/* Typography Panel */}
				<PanelBody
					title={ __( 'Typography', 'six2eight' ) }
					initialOpen={ true }
				>
					{/* Font Size Control */}
					<RangeControl
						label={ __( 'Font Size (px)', 'six2eight' ) }
						value={ fontSize }
						onChange={ ( value ) =>
							setAttributes( { fontSize: value } )
						}
						min={ 12 }
						max={ 120 }
						step={ 1 }
					/>

					{/* Font Weight Control */}
					<SelectControl
						label={ __( 'Font Weight', 'six2eight' ) }
						value={ fontWeight }
						options={ [
							{ label: __( 'Normal (400)', 'six2eight' ), value: '400' },
							{ label: __( 'Medium (500)', 'six2eight' ), value: '500' },
							{ label: __( 'Semi-Bold (600)', 'six2eight' ), value: '600' },
							{ label: __( 'Bold (700)', 'six2eight' ), value: '700' },
							{ label: __( 'Extra Bold (800)', 'six2eight' ), value: '800' },
							{ label: __( 'Black (900)', 'six2eight' ), value: '900' },
						] }
						onChange={ ( value ) =>
							setAttributes( { fontWeight: value } )
						}
					/>

					{/* Line Height Control */}
					<RangeControl
						label={ __( 'Line Height (px)', 'six2eight' ) }
						value={ lineHeight }
						onChange={ ( value ) =>
							setAttributes( { lineHeight: value } )
						}
						min={ 20 }
						max={ 150 }
						step={ 1 }
					/>

					{/* Letter Spacing Control */}
					<TextControl
						label={ __( 'Letter Spacing (px)', 'six2eight' ) }
						value={ letterSpacing }
						onChange={ ( value ) =>
							setAttributes( { letterSpacing: value } )
						}
						type="number"
						step="0.5"
					/>
				</PanelBody>

				{/* Color Panel */}
				<PanelBody
					title={ __( 'Color', 'six2eight' ) }
					initialOpen={ false }
				>
					{/* Text Color Display */}
					<p style={ { marginBottom: '10px', fontWeight: 'bold' } }>
						{ __( 'Text Color', 'six2eight' ) }
					</p>

					{/* Color Palette */}
					<div
						style={ {
							display: 'grid',
							gridTemplateColumns: 'repeat(6, 1fr)',
							gap: '10px',
							marginBottom: '15px',
						} }
					>
						{ colors.map( ( color ) => (
							<button
								key={ color.color }
								onClick={ () =>
									setAttributes( { textColor: color.color } )
								}
								style={ {
									backgroundColor: color.color,
									border: textColor === color.color ? '3px solid #000' : '1px solid #ccc',
									borderRadius: '4px',
									height: '40px',
									cursor: 'pointer',
									title: color.name,
								} }
								title={ color.name }
							/>
						) ) }
					</div>

					{/* Custom Color Input */}
					<TextControl
						label={ __( 'Custom Color', 'six2eight' ) }
						value={ textColor }
						onChange={ ( value ) =>
							setAttributes( { textColor: value } )
						}
						type="text"
						placeholder="#2D2D34"
					/>
				</PanelBody>

				{/* Spacing Panel */}
				<PanelBody
					title={ __( 'Spacing', 'six2eight' ) }
					initialOpen={ false }
				>
					{/* Margin Top Control */}
					<RangeControl
						label={ __( 'Margin Top (px)', 'six2eight' ) }
						value={ marginTop }
						onChange={ ( value ) =>
							setAttributes( { marginTop: value } )
						}
						min={ 0 }
						max={ 100 }
						step={ 5 }
					/>

					{/* Margin Bottom Control */}
					<RangeControl
						label={ __( 'Margin Bottom (px)', 'six2eight' ) }
						value={ marginBottom }
						onChange={ ( value ) =>
							setAttributes( { marginBottom: value } )
						}
						min={ 0 }
						max={ 100 }
						step={ 5 }
					/>
				</PanelBody>

				{/* Display Information Panel */}
				<PanelBody
					title={ __( 'Block Information', 'six2eight' ) }
					initialOpen={ false }
				>
					{/* Block Description */}
					<p>
						{ __( 'A professional, customizable heading block with advanced typography controls.', 'six2eight' ) }
					</p>

					{/* Current Settings Display */}
					<p style={ { fontSize: '12px', color: '#666', marginTop: '10px' } }>
						{ __( 'Current Settings:', 'six2eight' ) }
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Heading Level: ', 'six2eight' ) }
						<strong>H{ level }</strong>
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Font Size: ', 'six2eight' ) }
						<strong>{ fontSize }px</strong>
					</p>
					<p style={ { fontSize: '12px', color: '#666', margin: '5px 0' } }>
						{ __( 'Font Weight: ', 'six2eight' ) }
						<strong>{ fontWeight }</strong>
					</p>
				</PanelBody>
			</InspectorControls>

			{/* Block Preview in Editor */}
			<div
				style={ {
					marginTop: `${ marginTop }px`,
					marginBottom: `${ marginBottom }px`,
					textAlign: align,
				} }
			>
				<textarea
					tagName={ headingTag }
					contentEditable={ true }
					value={ content }
					onChange={ ( e ) =>
						setAttributes( { content: e.target.value } )
					}
					placeholder={ __( 'Enter heading text', 'six2eight' ) }
					style={ {
						display: 'block',
						width: '100%',
						color: textColor,
						fontSize: `${ fontSize }px`,
						fontWeight: fontWeight,
						lineHeight: `${ lineHeight }px`,
						letterSpacing: `${ letterSpacing }px`,
						fontFamily: 'Inter, sans-serif',
						border: 'none',
						outline: '2px solid #00B98B',
						padding: '10px',
						borderRadius: '4px',
						resize: 'vertical',
						minHeight: '100px',
						margin: '0',
					} }
				/>
			</div>
		</>
	);
};

export default edit;

