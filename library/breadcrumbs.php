<?php
if ( ! is_home() && ! is_front_page() ) {
	add_action('foundationpress_page_before_entry_content', 'foundationpress_breadcrumb');
}