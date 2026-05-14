/**
 * Six2Eight Grid Section Block - Frontend Output
 *
 * @package Six2Eight
 * @since 1.0.0
 */

import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save( { attributes } ) {
	const { sectionTitle, buttonText, buttonLink, columns, boxContent, backgroundColor, textColor } = attributes;

	const blockProps = useBlockProps.save( {
		style: {
			backgroundColor: backgroundColor,
			color: textColor,
		},
		className: 'six2eight-grid-section',
	} );

	return (
		<div { ...blockProps }>
			{/* Section Header */}
			<div className="six2eight-grid-section-header">
				<RichText.Content tagName="h2" className="six2eight-grid-section-title" value={ sectionTitle } />
			</div>

			{/* Grid Container */}
			<div
				className="six2eight-grid-section-grid"
				style={ {
					display: 'grid',
					gridTemplateColumns: `repeat(${columns}, 1fr)`,
					gap: '24px',
					padding: '24px',
				} }
			>
				{/* Render each box */}
				{ boxContent.map( ( box ) => (
					<div key={ box.id } className="six2eight-grid-box">
						{/* Price */}
						<div className="six2eight-box-price">{ box.price }</div>

						{/* Year */}
						<div className="six2eight-box-year">{ box.year }</div>

						{/* Short Description */}
						<div className="six2eight-box-short-description">{ box.shortDescription }</div>

						{/* Description */}
						<div className="six2eight-box-description">{ box.description }</div>
					</div>
				) ) }
			</div>

			{/* Call-to-Action Button */}
			{ buttonText && (
				<div className="six2eight-grid-section-button-wrapper">
					<a href={ buttonLink } className="six2eight-grid-section-button">
						{ buttonText }
					</a>
				</div>
			) }
		</div>
	);
}

