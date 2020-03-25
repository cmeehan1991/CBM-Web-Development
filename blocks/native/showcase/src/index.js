import { registerBlockType } from '@wordpress/blocks';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, PanelRow, SelectControl, TextControl } from '@wordpress/components';
import  ServerSideRender  from '@wordpress/server-side-render';
import apiFetch from '@wordpress/api-fetch';
import $ from 'jquery';

const allCategories = [];

const categories = apiFetch({path: '/wp/v2/showcase_category'}).then(posts => {
	$.each(posts, function(k,v){
		allCategories.push({value: v.id, label: v.name});
	})
});


registerBlockType('cbm-native-blocks/cbm-showcase-block', {
	title: 'Showcase', 
	icon: 'screenoptions', 
	category: 'widgets',
	attributs: {
		layout: {
			type: 'array', 
			default: 'grid', 
		},
		category: {
			type: 'array', 
		},
		itemsToShow: {
			type: 'int', 
			default: '5',
		},
		sectionTitle: {
			type: 'string'
		}
	}, 
	edit(props){
		const {attributes:{layout, category, itemsToShow, sectionTitle}, setAttributes, className} = props;
		
		const onChangeLayout = (newVal) => {
			setAttributes({layout: newVal})
		};
		
		const onChangeCategory = (newVal) => {
			console.log(newVal);
			setAttributes({category: newVal})	
		};
		
		const onChangeItemsToShow = (newVal) => {
			setAttributes({itemsToShow: newVal})
		};
		
		const onChangeSectionTitle = (newVal) => {
			setAttributes({sectionTitle: newVal})
		};
		
		return (
			<div className={className}>
				{
					<InspectorControls>
						<PanelBody
							title="Showcase Settings"
							initialOpen={true}
						>
							<PanelRow>
								<TextControl
									label="Section Title"
									value={sectionTitle}
									onChange={onChangeSectionTitle}
								/>
							</PanelRow>
							<PanelRow>
								<SelectControl
									label="Layout"
									options={[
										{ label: 'Grid', value: 'grid' },
										{ label: 'Masonry', value: 'masonry' },
										{ label: 'List', value: 'list' },	
									]}
									value={layout}
									onChange={onChangeLayout}
								/>
							</PanelRow>
							
							<PanelRow>
								<SelectControl
									multiple
									label="Categories"
									options={allCategories}
									value={category}
									onChange={onChangeCategory}
								/>
							</PanelRow>
							
							<PanelRow>
								<TextControl
									label="Number to Display"
									type="number"
									value={itemsToShow}
									onChange={onChangeItemsToShow}
								/>
							</PanelRow>
						</PanelBody>
					</InspectorControls>
				}
				
				{
					<ServerSideRender
						block='cbm-native-blocks/cbm-showcase-block'
						attributes={props.attributes}
						className={props.className}
					/>
				}
			</div>
		);
	},
	save(props){
		return null;
	}
});