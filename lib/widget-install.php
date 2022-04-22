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
	$widgets = genesis_get_config( 'import/content/widgets/sidebar-widgets' );

	$footer_widget_block_content  = array(); // Let's store footer block content here.
	$sidebar_widget_block_content = array(); // Let's store sidebar block content here.

	$block_widgets       = array(); // Clear block widgets to prevent memory leaks.
	$block_widgets_index = 0;
	$count               = $block_widgets_index + 1; // This is to identify the widgets in option `sidebars_widgets`.

	// Let's get the footer widgets.
	$footer_widgets = $widgets['footer'] ?? false;
	if ( $footer_widgets ) {
		foreach ( $footer_widgets as $index => $widget ) {
			$widget_content = $widget['content'] ?? false;
			if ( $widget_content ) {
				// Let's store footer widgets here and also in the block widgets.
				$footer_widget_block_content[ $count ]['content'] = $widget_content; // We'll need this in the next section.
				$block_widgets[ $count ]['content']               = $widget_content; // This is the variable we'll save for the block widgets.
				$count++;
			}
		}
	}

	// Let's get the sidebar widgets.
	$sidebar_widgets = $widgets['sidebar'] ?? false; // this var is overwritten below.
	if ( $sidebar_widgets ) {
		foreach ( $sidebar_widgets as $index => $widget ) {
			$widget_content = $widget['content'] ?? false;
			if ( $widget_content ) {
				// Let's store footer widgets here and also in the block widgets.
				$sidebar_widget_block_content[ $count ]['content'] = $widget_content; // We'll need this in the next section.
				$block_widgets[ $count ]['content']                = $widget_content; // This is the variable we'll save for the block widgets.
				$count++;
			}
		}
	}

	$sidebar_widgets = get_option( 'sidebars_widgets', array() ); // Get existing widget areas and contents.

	// Now lets overwrite the `footer-1` widget area.
	$footer_one = array();
	foreach ( $footer_widget_block_content as $index => $content ) {
		$footer_one[] = 'block-' . $index;
	}
	$sidebar_widgets['footer-1'] = $footer_one;

	// Now lets overwrite the `sidebar` widget area.
	$sidebar = array();
	foreach ( $sidebar_widget_block_content as $index => $content ) {
		$sidebar[] = 'block-' . $index;
	}
	$sidebar_widgets['sidebar'] = $sidebar;

	// Now let's save.
	update_option( 'sidebars_widgets', $sidebar_widgets );
	update_option( 'widget_block', $block_widgets );
}


add_action( 'genesis_onboarding_after_import_content', 'coaching_pro_after_import_widgets' );
// add_action( 'init', 'coaching_pro_after_import_widgets' );
