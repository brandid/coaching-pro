<?php
/**
 * Coaching Pro - Run Genesis Pre-skin install functions.
 *
 * @package Coaching Pro
 */

// Set the Appearance settings defaults.
$appearance = coaching_pro_get_skin_appearance();

function coaching_pro_maybe_pre_cleanup() {
	// Retrieve saved options.
	$customizer_override = get_option( 'coaching_pro_skin_customizer_override' );
	$content_override    = get_option( 'coaching_pro_skin_customizer_override' );
	$selected_skin       = get_option( 'coaching_pro_skin_selected' );

	// Now remove the options in case this step fails.
	delete_option( 'coaching_pro_skin_customizer_override' );
	delete_option( 'coaching_pro_skin_customizer_override' );

	$appearance = genesis_get_config( sprintf( 'skins/%s/appearance', $selected_skin ) );
	if ( 'true' === $customizer_override ) {
		// todo - get colors.
		$color_palette = $appearance['editor-color-palette'];
		$colors        = array();
		foreach ( $color_palette as $palette ) {
			$slug            = $palette['slug'];
			$colors[ $slug ] = $palette['color'];
		}
		set_theme_mod( 'coachpro_theme_color_1_setting', $colors['color1'] );
		set_theme_mod( 'coachpro_theme_color_2_setting', $colors['color2'] );
		set_theme_mod( 'coachpro_theme_color_3_setting', $colors['color3'] );
		set_theme_mod( 'coachpro_theme_color_4_setting', $colors['color4'] );
		set_theme_mod( 'coachpro_theme_textcolor_1_setting', $colors['textcolor1'] );
		set_theme_mod( 'coachpro_theme_textcolor_2_setting', $colors['textcolor2'] );
		set_theme_mod( 'coachpro_theme_bgcolor_1_setting', $colors['bgcolor1'] );
		set_theme_mod( 'coachpro_theme_bgcolor_2_setting', $colors['bgcolor2'] );
	}

	if ( 'true' === $content_override ) {

	}

	// Override customizer options with skin colors.
}
add_action( 'genesis_onboarding_before_import_content', 'coaching_pro_maybe_pre_cleanup' );

