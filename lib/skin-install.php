<?php
/**
 * Coaching Pro - Run Genesis Pre-skin install functions.
 *
 * @package Coaching Pro
 */

// Set the Appearance settings defaults.
$appearance = coaching_pro_get_skin_appearance();

/**
 * Updates settings *before* content is imported from the Skin switcher (found in WPADMIN->Genesis->Child Theme Settings).
 *
 * 
 * Filter: genesis_onboarding_before_import_content
 * 
 */
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

		// Set colors.
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

		// Set fonts.
		$default_fonts = $appearance['default-fonts'];
		set_theme_mod( 'coachpro_theme_font_h1_setting', $default_fonts['h1'] );
		set_theme_mod( 'coachpro_theme_font_h2_setting', $default_fonts['h2'] );
		set_theme_mod( 'coachpro_theme_font_h3_setting', $default_fonts['h3'] );
		set_theme_mod( 'coachpro_theme_font_h4_setting', $default_fonts['h4'] );
		set_theme_mod( 'coachpro_theme_font_h5_setting', $default_fonts['h5'] );
		set_theme_mod( 'coachpro_theme_font_h6_setting', $default_fonts['h6'] );
		set_theme_mod( 'coachpro_theme_font_navmenu_setting', $default_fonts['navmenu'] );
		set_theme_mod( 'coachpro_theme_font_body_setting', $default_fonts['body'] );
	}

	if ( 'true' === $content_override ) {
		// Try to remove generated content based on meta.
		$post_query_args = array(
			'post_type'      => array( 'post', 'page', 'socialproofslider' ),
			'post_status'    => 'publish',
			'posts_per_page' => 100,
			'meta_query'     => array(
				array(
					'key'   => '_generated_page',
					'value' => '1',
				),
			),
		);

		$items_to_remove = new WP_Query( $post_query_args );
		$items_to_remove = $items_to_remove->get_posts();
		foreach ( $items_to_remove as $item_to_remove ) {
			$item_id = $item_to_remove->ID;
			wp_delete_post( $item_id, true );
		}

		// Now let's try to delete by slug.
		$config = genesis_get_config( 'onboarding-shared' );
		$content = $config['content'] ?? array();
		foreach ( $content as $content_item ) {
			$slug = sanitize_title( $content_item['post_title'] );
			$maybe_post = get_page_by_path( $slug, OBJECT, array( 'post', 'page', 'socialproofslider' ) );
			if ( null !== $maybe_post ) {
				wp_delete_post( $maybe_post->ID, true );
			}
		}
	}
}
add_action( 'genesis_onboarding_before_import_content', 'coaching_pro_maybe_pre_cleanup' );
