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
	$content_override    = get_option( 'coaching_pro_skin_content_override' );
	$selected_skin       = get_option( 'coaching_pro_skin_selected' );

	// Now remove the options in case this step fails.
	delete_option( 'coaching_pro_skin_customizer_override' );
	delete_option( 'coaching_pro_skin_content_override' );

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

		// Remove extra contact us forms.
		$maybe_contact_form = get_page_by_path( 'contact-me', OBJECT, array( 'wpforms' ) );
		if ( null !== $maybe_contact_form ) {
			wp_delete_post( $maybe_contact_form->ID, true );
		}
	}

	if ( function_exists( 'wpforms_encode' ) ) {
		// Begin WP Forms import. (file: wpforms-lite/src/Admin/Tools/Views/import.php)
		$forms_to_import = genesis_get_config( 'import/forms/wpforms-form-export.json' );
		$forms    = json_decode( current( $forms_to_import ), true );
		
		// This will get the form ID and store it in an option.
		foreach ( $forms as $form ) {
			$title  = ! empty( $form['settings']['form_title'] ) ? $form['settings']['form_title'] : '';
			$desc   = ! empty( $form['settings']['form_desc'] ) ? $form['settings']['form_desc'] : '';
			$new_id = wp_insert_post(
				[
					'post_title'   => $title,
					'post_status'  => 'publish',
					'post_type'    => 'wpforms',
					'post_excerpt' => $desc,
				]
			);

			if ( $new_id ) {
				$form['id'] = $new_id;

				wp_update_post(
					[
						'ID'           => $new_id,
						'post_content' => wpforms_encode( $form ),
					]
				);
			}
			update_option( 'coaching-pro-wp-forms-contact-id', $new_id );
		}
	}

	
	
}
add_action( 'genesis_onboarding_before_import_content', 'coaching_pro_maybe_pre_cleanup', 1 );

/**
 * Run after importing the content. Clears theme.json cache..
 *
 * Also searches contact page for placeholder and replaces it with a form ID.
 */
function coaching_pro_after_import_content() {

	// Clear theme.json cache.
	WP_Theme_JSON_Resolver::clean_cached_data();

	// Find the contact page and replace {{form_id}} with actual form id.
	$maybe_contact_page = get_page_by_path( 'contact-me', OBJECT, array( 'page' ) );

	if ( $maybe_contact_page ) {
		$page_id      = $maybe_contact_page->ID;
		$page_content = $maybe_contact_page->post_content;

		// Search post content for placeholder and replace it with created form ID.
		if ( strstr( $page_content, '{{form_id}}' ) ) {
			$form_id = absint( get_option( 'coaching-pro-wp-forms-contact-id', 0 ) );
			$maybe_contact_page->post_content = str_replace( '{{form_id}}', $form_id, $maybe_contact_page->post_content );
			 wp_update_post( $maybe_contact_page );
		}
		
	}
}
add_action( 'genesis_onboarding_after_import_content', 'coaching_pro_after_import_content' );
