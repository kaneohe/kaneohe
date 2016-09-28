<?php
if ( ! function_exists( 'kaneohe_flex_content' ) ) :

	function kaneohe_flex_content() {

		$content = '';

		// Button
		if ( get_row_layout() == 'button' ) :
			$content .= kaneohe_button();
		endif;

		// Media Object
		if ( get_row_layout() == 'media_object' ) :
			$content .= kaneohe_media_object();
		endif;

		// Image
		if ( get_row_layout() == 'image' ) :
			$content .= kaneohe_image();
		endif;

		// Slideshow
		if ( get_row_layout() == 'slideshow' ) :
			$content .= kaneohe_slideshow();
		endif;

		// Gallery
		if ( get_row_layout() == 'gallery' ) :
			$content .= kaneohe_gallery();
		endif;

		// Text currently supports 1, 2, or 3 columns
		if ( get_row_layout() == 'text' ) :
			$content .= kaneohe_text();
		endif;

		return $content;
	}

endif;

if ( ! function_exists( 'kaneohe_acf' ) ) :

	function kaneohe_acf( $content ) {
		global $post;

		if ( have_rows( 'content', $post->ID ) ) :

			while ( have_rows( 'content', $post->ID ) ) : the_row();

				$content .= kaneohe_flex_content();

			endwhile;

		endif;

		return $content;
	}
	add_filter( 'the_content', 'kaneohe_acf' );
endif;
