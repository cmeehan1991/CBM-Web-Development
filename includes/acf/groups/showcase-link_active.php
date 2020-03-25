<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e791f2921ded',
	'title' => 'Showcase Link',
	'fields' => array(
		array(
			'key' => 'field_5e791f2ac2a1d',
			'label' => 'Link To',
			'name' => 'link_to',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'self' => 'Self',
				'external' => 'External',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'self',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e791f64c2a1e',
			'label' => 'External URL',
			'name' => 'external_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e791f2ac2a1d',
						'operator' => '==',
						'value' => 'external',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'showcase',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;