<?php
/**
 * Coaching Pro - Run Genesis Pre-skin install functions.
 *
 * @package Coaching Pro
 */

// Set the Appearance settings defaults.
$appearance = genesis_get_config( 'appearance' );

function coaching_pro_maybe_pre_cleanup() {
	// Retrieve saved options.
	$customizer_override = get_option( 'coaching_pro_skin_customizer_override' );
	$content_override = get_option( 'coaching_pro_skin_customizer_override' );
	$selected_skin = get_option( 'coaching_pro_skin_selected' );

	// Now remove the options in case this step fails.
	delete_option( 'coaching_pro_skin_customizer_override' );
	delete_option( 'coaching_pro_skin_customizer_override' );

	// Override customizer options with skin colors.
}
add_action( 'genesis_onboarding_before_import_content', 'coaching_pro_maybe_pre_cleanup' );

