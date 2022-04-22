<?php
/**
 * Coaching Pro - Run Widget installation after skin switch.
 *
 * @package Coaching Pro
 */

/**
 * Import widgets afer skin installation.
 */
function coaching_pro_after_import_widgets() {
	$widgets = genesis_get_config( 'import/content/widgets/footer-sidebar-widgets' );

	// Let's store block content here.
	$widget_block_content = array();

	// Let's get existing block widgets and get the last index.
	$block_widgets       = get_option( 'widget_block', array() );
	$block_widgets_index = 0;
	foreach ( $block_widgets as $index => $value ) { // We just need the index.
		if ( is_int( $index ) ) {
			$block_widgets_index = $index;
		}
	}

	$count = $block_widgets_index + 1; // This is to identify the widgets in option `sidebars_widgets`.

	// Let's get the footer widgets.
	$footer_widgets = $widgets['footer'] ?? false;
	if ( $footer_widgets ) {
		foreach ( $footer_widgets as $index => $widget ) {
			$widget_content = $widget['content'] ?? false;
			if ( $widget_content ) {
				// Let's store footer widgets here and also in the block widgets.
				$widget_block_content[ $count ]['content'] = $widget_content; // We'll need this in the next section.
				$block_widgets[ $count ]['content']        = $widget_content; // This is the variable we'll save for the block widgets.
				$count++;
			}
		}
	}

	// Now lets get the sidebar widgets and overwrite the `footer-1` widget area.
	$sidebar_widgets = get_option( 'sidebars_widgets', array() );
	$footer_one      = array();
	foreach ( $widget_block_content as $index => $content ) {
		$footer_one[] = 'block-' . $index;
	}

	// Now overwrite footer one.
	$sidebar_widgets['footer-1'] = $footer_one;

	// Now let's save.
	update_option( 'sidebars_widgets', $sidebar_widgets );
	update_option( 'widget_block', $block_widgets );
}


add_action( 'genesis_onboarding_after_import_content', 'coaching_pro_after_import_widgets' );
// add_action( 'init', 'coaching_pro_after_import_widgets' );
