<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside class="sidebar">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>

	<?php if ( have_rows( 'sidebar_content', 'options' ) ) : ?>
		<?php while ( have_rows( 'sidebar_content', 'options' ) ) : the_row(); ?>
			<?php echo kaneohe_flex_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</aside>
