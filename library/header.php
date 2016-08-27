<?php
if ( ! function_exists( 'header_widgets' ) ) :
	function header_widgets() {
?>
			<div class="row">
				<div class="small-12 medium-4 columns">
					<?php dynamic_sidebar('header-widget-1'); ?>	
				</div>
				<div class="small-12 medium-8 columns">
					<div class="row">
						<div class="small-12 small-6 columns">
							<?php dynamic_sidebar('header-widget-2'); ?>
						</div>
						<div class="small-12 small-6 columns">
							<?php dynamic_sidebar('header-widget-3'); ?>
						</div>
					</div> <!-- .row -->
				</div> 
			</div> <!-- .row -->
<?php 
	}
	add_action( 'foundationpress_layout_start', 'header_widgets', 2 );
endif;