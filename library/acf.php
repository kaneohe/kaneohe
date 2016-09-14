<?php
if ( ! function_exists( 'kaneohe_acf' ) ) :
	
	function kaneohe_acf( $content ) {
		global $post;
		
		if ( have_rows( 'content', $post->ID ) ) : 
		
			while ( have_rows( 'content', $post->ID ) ) : the_row();
			
				// Media Object
				if ( get_row_layout() == 'media_object' ) :
				
					if ( $img = get_sub_field( 'image' ) ) :
					
						$content .= '<section class="kaneohe-media-object">';
						$content .= '	<div class="row">';
						$content .= '		<div class="small-12 columns">';
						$content .= '			<div class="media-object">';
						$content .= '				<div class="row">';
						$content .= '					<div class="small-12 medium-6 columns">';
						$content .= '						<div class="media-object-section">';
						$content .= '							<img src="' . $img['url'] . '">';
						$content .= '						</div> <!-- .media-object-section -->';
						$content .= '					</div> <!-- .small-12 -->';
						$content .= '					<div class="small-12 medium-6 columns">';
						$content .= '						<div class="media-object-section">';
						$content .= '							<h4>' . get_sub_field( 'heading' ) . '</h4>';
						$content .= 							get_sub_field( 'content' );
						$content .= '						</div> <!-- .media-object-section -->';
						$content .= '					</div> <!-- .small-12 -->';
						$content .= '				</div><!-- .row -->';
						$content .= '			</div> <!-- .media-object -->';
						$content .= '		</div> <!-- .small-12 -->';
						$content .= '	</div> <!-- .row -->';
						$content .= '</section>';
					
					endif;
				
				endif;
				
				// Slideshow
				if ( get_row_layout() == 'slideshow' ) :
				
				
					$num_slides = get_sub_field( 'slides' );
					$column_class = 'small-4 columns';
					switch ( $num_slides ) {
						case 1 : $column_class = 'small-12 columns'; break;
						case 2 : $column_class = 'small-6 columns'; break;
						case 3 : $column_class = 'small-4 columns'; break;
						case 4 : $column_class = 'small-3 columns'; break;
						case 6 : $column_class = 'small-2 columns'; break;
						case 12 : $column_class = 'small-1 columns'; break;
						default : break;
					}
					
					if ( have_rows( 'slide' ) ) : 
					
						$content .= '<section class="kaneohe-gallery">';
						$content .= '<div class="row">';
						$content .= '<div class="slideshow">';
						
						while ( have_rows( 'slide' ) ) : the_row();
						
							$photo = get_sub_field( 'photo' );
							$content .= '<div class="' . $column_class . '">';
							
							$link = get_sub_field( 'link' );
							
							if ( $link ) {
								$content .= '<a href="' . $link . '">';
							}
							
							$content .= '<img src="' . $photo['url'] . '" alt="' . $photo['alt'] . '" />';
							
							if ( $link ) {
								$content .= '</a>';
							}
							
							//$content .= '<p>' . $image['caption'] . '</p>';
							$content .= '</div>';
							
						endwhile;
						
						$content .= '</div><!-- .slidshow -->';
						$content .= '</div><!-- .row -->';
						$content .= '</section>';
					
					
					endif;
					
				endif;
			
				// Gallery
				if ( get_row_layout() == 'gallery' ) :
					
					$gallery = get_sub_field( 'gallery' );
					
					if ( $gallery ) : 
					
						$content .= '<section class="kaneohe-gallery">';
						$content .= '<div class="row">';
						$content .= '<div class="small-6 medium-3 columns">';
						foreach ( $gallery as $image ) : 
							$content .= '<a href="' . $image['url'] . '">';
							$content .= '<img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] . '" />';
							$content .= '</a>';
							//$content .= '<p>' . $image['caption'] . '</p>';
						endforeach;
						$content .= '</div>';
						$content .= '</div><!-- .row -->';
						$content .= '</section>';
						
					endif;
					
				endif;
				
				// Text current supports 1, 2, or 3 columns
				if ( get_row_layout() == 'text' ) : 
				
					$content .= '<section class="kaneohe-text">';
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
					$content .= '</section>';
				
				endif;
			
			endwhile;
		
		endif;
		
		return $content;
	}
	add_filter( 'the_content', 'kaneohe_acf' );
endif;

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}
