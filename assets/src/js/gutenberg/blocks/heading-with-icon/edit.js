/**
 * Internal Dependencies.
 */
import { getIconComponent } from './icons-map';
import { RichText, InspectorControls } from '@wordpress/block-editor';

/**
 * WordPress Dependencies.
 */
import {PanelBody,RadioControl} from '@wordpress/components';
import { __ } from '@wordpress/i18n';


const Edit = ( { className, attributes, setAttributes } ) => {
	const { option, content } = attributes;

	const HeadingIcon = getIconComponent( option );

	return (
		<div className="aquila-icon-heading">
	      <span className="aquila-icon-heading__heading">
	        <HeadingIcon/>
	      </span>
			{/* You can also pass formattingControls={ [ 'bold', 'italic' ] } to allow the content to be made bold or italic, but do not allow other formatting options */}
			<RichText
				tagName="h4" 
				className={ className }
				value={ content } 
				onChange={ ( content ) => setAttributes( { content } ) } 
				placeholder={ __( 'Heading...', 'aquila' ) } 
			/>
			<InspectorControls>
				<PanelBody
					title={ __( 'Block Settings', 'aquila' ) }
				>
					<RadioControl
						label={ __(
							'Select the icon',
							'aquila'
						) }
						help={ __(
							'Controls icon selection',
							'aquila'
						) }
						selected={ option }
						options={ [
							{ label: 'Dos', value: 'dos' },
							{ label: 'Dont\'s', value: 'donts' },
						] }
						onChange={ ( option ) => {
							setAttributes( { option } );
						} }
					/>
				</PanelBody>
			</InspectorControls>
		</div>
	);
};

export default Edit;
