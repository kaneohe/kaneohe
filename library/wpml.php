<?php
if ( ! function_exists( 'kaneohe_wpml' ) ) :
	function kaneohe_wpml_header() {
		if ( function_exists('icl_object_id') ) : ?>
			<div class="languages">
				<div class="row">
					<div class="title-bar" data-responsive-toggle="site-navigation">
						<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
					</div>
					<?php do_action('wpml_add_language_selector'); ?>
					
				</div>
			</div>
		<?php endif;
	}
	add_action( 'foundationpress_layout_start', 'kaneohe_wpml_header', 1 );
endif;