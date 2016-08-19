<?php
if ( ! function_exists( 'kaneohe_wpml' ) ) :
	function kaneohe_wpml_header() {
		if ( function_exists('icl_object_id') ) : ?>
			<div class="languages">
				<div class="row">
					<div class="small-12"><?php do_action('wpml_add_language_selector'); ?></div>
				</div>
			</div>
		<?php endif;
	}
	add_action( 'foundationpress_layout_start', 'kaneohe_wpml_header' );
endif;