<?php
if ( ! function_exists( 'get_column_class_by_columns' ) ) :
	function get_column_class_by_columns( $columns = 1 ) {

		switch ( $columns ) {
			case 2 : $class = 'small-6 medium-6 columns'; break;
			case 3 : $class = 'small-4 medium-4 columns'; break;
			case 4 : $class = 'small-6 medium-3 columns'; break;
			case 5 : case 6 : $class = 'small-6 medium-2 columns'; break;
			case 7 : case 8 : case 9 : case 10 : case 11 : case 12 :
				$class = 'small-6 medium-1 columns'; break;
			case 1 : default : $class = 'small-12 medium-12 columns'; break;

		}
		return $class;
	}
endif;

if ( ! function_exists( 'header_include' ) ) :
	function header_include() {
?>
		<header class="header">
			<div class="row">

				<div class="small-12 medium-3 columns">
				<?php if ( $logo = get_field( 'logo', 'option' ) ) : ?>
					<a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['url']; ?>"></a>
				<?php endif; ?>
				</div>

				<div class="small-12 medium-6 medium-offset-3 columns">
					<div class="row">
						<?php if ( have_rows( 'columns', 'options' ) ) :
							$columns = get_field( 'columns', 'option' );
							$num_columns = count( $columns );
							$column_class = get_column_class_by_columns( $num_columns );
							while ( have_rows( 'columns', 'options' ) ) : the_row(); ?>
								<div class="<?php echo $column_class; ?>">
									<?php if ( have_rows( 'content' ) ) : ?>
										<?php while ( have_rows( 'content' ) ) : the_row(); ?>
											<?php echo kaneohe_flex_content(); ?>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div><!-- .row -->
		</header>
<?php
	}
	add_action( 'foundationpress_layout_start', 'header_include', 2 );
endif;
