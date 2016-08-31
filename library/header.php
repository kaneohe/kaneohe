<?php
if ( ! function_exists( 'header_include' ) ) :
	function header_include() {
?>
		<header class="header">
			<div class="row">
				<div class="small-12 medium-6 columns">
				<?php if ( $logo = get_field( 'logo', 'option' ) ) : ?>
					<a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['url']; ?>"></a>
				<?php endif; ?>
				</div>
				<div class="small-12 medium-6 columns">
					<div class="row">
						<div class="small-6 columns"><?php the_field( 'column_1', 'option' ); ?></div>
						<div class="small-6 columns"><?php the_field( 'column_2', 'option' ); ?></div>
					</div> <!-- .row -->
				</div> <!-- .small-12 -->

			</div>
		</header>
<?php 
	}
	add_action( 'foundationpress_layout_start', 'header_include', 2 );
endif;