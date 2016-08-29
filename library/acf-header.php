<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_57c47131c953b',
	'title' => 'Header',
	'fields' => array (
		array (
			'key' => 'field_57c4718f71ec2',
			'label' => 'Logo',
			'name' => 'logo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'fp-small',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_57c471ca71ec3',
			'label' => 'Column 1',
			'name' => 'column_1',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'visual',
			'toolbar' => 'full',
			'media_upload' => 1,
		),
		array (
			'key' => 'field_57c4720871ec4',
			'label' => 'Column 2',
			'name' => 'column_2',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'visual',
			'toolbar' => 'full',
			'media_upload' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-header',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;