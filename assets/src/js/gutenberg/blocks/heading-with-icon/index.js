
/**
 * Heading with Icon block.
 *
 * @package Aquila
 */

import { getIconComponent } from './icons-map';

/**
 * Internal dependencies.
 */
import Edit from './edit';


import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';

/**
 * Register block type.
 */
registerBlockType( 'aquila-blocks/heading', {

	title: __( 'Heading with Icon', 'aquila' ),


	icon: 'admin-customizer',

	description: __( 'Add Heading and select Icons', 'aquila' ),

	category: 'aquila',

	attributes: {
		option: {
			type: 'string',
			default: 'dos'
		},
		content: {
			type: 'string',
			source: 'html',
			selector: 'h4',
			default: __( 'Dos', 'aquila' )
		}
	},

	edit: Edit,

	save( { attributes: { option, content } } ) {
		console.warn('save', option, content)
		const HeadingIcon = getIconComponent( option );

		return (
			<div className="aquila-icon-heading">
		        <span className="aquila-icon-heading__heading">
		          <HeadingIcon/>
		        </span>
				{/* Saves <h2>Content added in the editor...</h2> to the database for frontend display */}
				<RichText.Content tagName="h4" value={ content } />
			</div>
		);
	},
} );
