<?php
	
if ( ! function_exists( 'kaneohe_acf_save' ) ) :
	function kaneohe_acf_save( $path ) {
	    
	    // update path
	    $path = get_stylesheet_directory() . '/assets/acf-json';
	    
	    
	    // return
	    return $path;
	    
	}
	add_filter('acf/settings/save_json', 'kaneohe_acf_save');
endif;

if ( ! function_exists( 'kaneohe_acf' ) ) :
	
	function kaneohe_acf( $content ) {
		global $post;
		
		if ( have_rows( 'content', $post->ID ) ) : 
		
			while ( have_rows( 'content', $post->ID ) ) : the_row();
			
				// Gallery
				if ( get_row_layout() == 'gallery' ) :
					
					$gallery = get_sub_field( 'gallery' );
					
					if ( $gallery ) : 
					
						if ( get_sub_field( 'slideshow' ) ) : 
						
							$content .= '<div class="gallery">';
							foreach ( $gallery as $image ) : 
								$content .= '<div>';
								//$content .= '<a href="' . $image['url'] . '">';
								//$content .= '<img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] . '" />';
								$content .= '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
								//$content .= '</a>';
								//$content .= '<p>' . $image['caption'] . '</p>';
								$content .= '</div>';
							endforeach;
							$content .= '</div><!-- .row -->';
						
						else :
					
							$content .= '<div class="row">';
							$content .= '<div class="small-6 medium-3 columns">';
							foreach ( $gallery as $image ) : 
								$content .= '<a href="' . $image['url'] . '">';
								$content .= '<img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] . '" />';
								$content .= '</a>';
								$content .= '<p>' . $image['caption'] . '</p>';
							endforeach;
							$content .= '</div>';
							$content .= '</div><!-- .row -->';
						
						endif;
						
					endif;
					
				endif;
				
				// Text current supports 1, 2, or 3 columns
				if ( get_row_layout() == 'text' ) : 
				
					$content .= '<div class="row">';
					
					switch ( get_sub_field( 'columns' ) ) {
						
						case '1' : 
							$content .= '<div class="small-12 columns">';
							$content .= get_sub_field('column_1');
							$content .= '</div>';
							break;
							
						case '2' : 
							$content .= '<div class="small-12 medium-6 columns">';
							$content .= get_sub_field('column_1');
							$content .= '</div>';
							$content .= '<div class="small-12 medium-6 columns">';
							$content .= get_sub_field('column_2');
							$content .= '</div>';
							break;
							
						case '3' : 
							$content .= '<div class="small-12 medium-4 columns">';
							$content .= get_sub_field('column_1');
							$content .= '</div>';
							$content .= '<div class="small-12 medium-4 columns">';
							$content .= get_sub_field('column_2');
							$content .= '</div>';
							$content .= '<div class="small-12 medium-4 columns">';
							$content .= get_sub_field('column_2');
							$content .= '</div>';
							break;
							
					}
					
					$content .= '</div><!-- .row -->';
				
				endif;
			
			endwhile;
		
		endif;
		
		return $content;
	}
	add_filter( 'the_content', 'kaneohe_acf' );
endif;

/*
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_57c07f9822c07',
	'title' => 'Flexible Content',
	'fields' => array (
		array (
			'key' => 'field_57c07fa399fd9',
			'label' => 'Content',
			'name' => 'content',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'button_label' => 'Add Content Block',
			'min' => '',
			'max' => '',
			'layouts' => array (
				array (
					'key' => '57c07fae1d45b',
					'name' => 'text',
					'label' => 'Text',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_57c0801d99fda',
							'label' => 'Columns',
							'name' => 'columns',
							'type' => 'select',
							'instructions' => '',
							'required' => '',
							'conditional_logic' => '',
							'wrapper' => array (
								'width' => 10,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								1 => 1,
								2 => 2,
								3 => 3,
							),
							'default_value' => array (
								0 => 1,
							),
							'allow_null' => '',
							'multiple' => '',
							'ui' => '',
							'ajax' => '',
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57c0806a99fdb',
							'label' => 'Column 1',
							'name' => 'column_1',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 28,
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'visual',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_57c080af99fdd',
							'label' => 'Column 2',
							'name' => 'column_2',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_57c0801d99fda',
										'operator' => '==',
										'value' => '2',
									),
								),
								array (
									array (
										'field' => 'field_57c0801d99fda',
										'operator' => '==',
										'value' => '3',
									),
								),
							),
							'wrapper' => array (
								'width' => 28,
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'visual',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_57c080ba99fde',
							'label' => 'Column 3',
							'name' => 'column_3',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_57c0801d99fda',
										'operator' => '==',
										'value' => '3',
									),
								),
							),
							'wrapper' => array (
								'width' => 28,
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'visual',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57c0811d99fdf',
					'name' => 'gallery',
					'label' => 'Gallery',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_57c0823999fe2',
							'label' => 'Slideshow',
							'name' => 'slideshow',
							'type' => 'true_false',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 10,
								'class' => '',
								'id' => '',
							),
							'message' => 'Display photos as a slideshow?',
							'default_value' => 1,
						),
						array (
							'key' => 'field_57c0813599fe0',
							'label' => 'Gallery',
							'name' => 'gallery',
							'type' => 'gallery',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 90,
								'class' => '',
								'id' => '',
							),
							'min' => '',
							'max' => '',
							'insert' => 'append',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;*/
