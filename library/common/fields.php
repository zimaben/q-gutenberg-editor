<?php

//BLOCK ACCORDION
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5d47cd0f6fa91',
	'title' => 'Bootstrap Content Accordion',
	'fields' => array(
		array(
			'key' => 'field_5d47cd9630ae9',
			'label' => 'Content Accordion',
			'name' => 'content_accordion',
			'type' => 'repeater',
			'instructions' => 'A list of expandable panels where the content is shown on click of the title',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 88,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5d47ce4f30aea',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => 'Panel Title, clicked to expand the content panel below',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'Panel Title',
					'prepend' => '',
					'append' => '',
					'maxlength' => 120,
				),
				array(
					'key' => 'field_5d47cec330aeb',
					'label' => 'Panel Content',
					'name' => 'panel_content',
					'type' => 'wysiwyg',
					'instructions' => 'Fill in accordion content here',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/bs-accordion',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

// BLOCK CARDS
acf_add_local_field_group(array(
	'key' => 'group_5d4b1f56ef04b',
	'title' => 'Bootstrap Linked Cards',
	'fields' => array(
		array(
			'key' => 'field_5d4b1f9f2b72f',
			'label' => 'Linked Card Images',
			'name' => 'linked_cards',
			'type' => 'repeater',
			'instructions' => 'Add stylish image cards to feature linked pages',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 16,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5d4b21372b733',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => 'Add title',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'Title',
					'prepend' => '',
					'append' => '',
					'maxlength' => 126,
				),
				array(
					'key' => 'field_5d4b215d2b734',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'text',
					'instructions' => 'Description text',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'Add description (optional)',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5d4b217f2b735',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'Upload Image',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg, jpeg, png, svg, bmp',
				),
				array(
					'key' => 'field_5d4b21ac2b736',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'url',
					'instructions' => 'Please enter a valid URL',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'https://example.com/valid/link/',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/bs-card',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


endif;



?>