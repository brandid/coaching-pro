<?php
/**
 * Loads the scripts and stylesheets for Coaching Pro theme.
 *
 * @package Coaching Pro
 */

// Remove the default stylesheet loading action.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

/**
 * Loads the main stylesheet.
 */
function coaching_pro_enqueue_main_stylesheet() {
	$handle = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';
	wp_enqueue_style( $handle, CHILD_THEME_URI . '/style.css', false, CHILD_THEME_VERSION );
}
add_action( 'genesis_meta', 'coaching_pro_enqueue_main_stylesheet', 5 );

/**
 * Enqueues theme scripts and styles.
 */
function coaching_pro_enqueue_scripts_styles() {
	$suffix = ( defined( 'COACHING_PRO_DEBUG' ) && COACHING_PRO_DEBUG ) ? '' : '.min';

	$googlefonts_url = 'https://fonts.googleapis.com/css?family=' . get_fonts_list();

	// Google fonts.
	wp_enqueue_style( 'coaching-pro-fonts', $googlefonts_url, array(), CHILD_THEME_VERSION );

	// Dashicons.
	wp_enqueue_style( 'dashicons' );

	// Global scripts.
	wp_enqueue_script( 'global-scripts', CHILD_THEME_URI . '/js/global.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Smooth scroll.
	wp_enqueue_script( 'homepage-scripts', CHILD_THEME_URI . '/js/smooth-scroll.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Responsive menu.
	wp_enqueue_script( 'coaching-pro-responsive-menu', CHILD_THEME_URI . '/js/responsive-menus.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'coaching-pro-responsive-menu',
		'genesis_responsive_menu',
		coaching_pro_responsive_menu_settings()
	);

}
add_action( 'wp_enqueue_scripts', 'coaching_pro_enqueue_scripts_styles' );

/**
 * Enqueues the Block Editor Assets.
 */
function coachingpro_enqueue_block_editor_scripts() {
	// Enqueue Block Style Variations.
	wp_enqueue_script( 'blockstylevariations-js', get_stylesheet_directory_uri() . '/js/block-style-variations.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
}
add_action( 'enqueue_block_editor_assets', 'coachingpro_enqueue_block_editor_scripts' );

/**
 * Enqueues the Custom Block styles.
 */
function coachingpro_enqueue_block_styles() {
	wp_enqueue_style( 'custom-block-styles', get_stylesheet_directory_uri() . '/css/custom-block-styles.css', '', CHILD_THEME_VERSION );
}
add_action( 'enqueue_block_assets', 'coachingpro_enqueue_block_styles' );

/**
 * Enqueues custom styles for Third-Party plugins.
 */
function coachingpro_custom_plugin_styles() {

	// WooCommerce styles.
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_woocommerce() || is_page( array( 'cart', 'checkout' ) ) ) {
			wp_enqueue_style( genesis_get_theme_handle() . '-woocommerce-custom-styles', get_stylesheet_directory_uri() . '/css/woocommerce.css', array(), genesis_get_theme_version() );
		}
	}

	// Easy Digital Downloads styles.
	if ( class_exists( 'Easy_Digital_Downloads' ) ) {
		if ( is_post_type_archive( 'download' ) || is_singular( 'download' ) || edd_is_checkout() ) {
			wp_enqueue_style( genesis_get_theme_handle() . '-edd-custom-styles', get_stylesheet_directory_uri() . '/css/easydigitaldownloads.css', array(), genesis_get_theme_version() );
		}
	}

	// WPForms.
	if ( class_exists( 'WPForms' ) ) {
		wp_enqueue_style( genesis_get_theme_handle() . '-wpforms-custom-styles', get_stylesheet_directory_uri() . '/css/wpforms.css', array(), genesis_get_theme_version() );
	}

}
add_action( 'wp_enqueue_scripts', 'coachingpro_custom_plugin_styles' );

/**
 * Returns a list of Google Fonts.
 *
 * @return array $output A URL-encoded list of Google Fonts to enqueue.
 */
function get_fonts_list() {

	// Get the appearance settings array.
	$appearance = genesis_get_config( 'appearance' );

	// Get the list of fonts from the appearance array.
	$editor_fonts = $appearance['editor-fonts'];

	// Create empty var for all text output.
	$output = '';

	// Create array to hold all escaped font names.
	$esc_fontlist = array();

	// Output a list of all chosen fonts.
	foreach ( $editor_fonts as $font ) {

		$fontfamily_escaped  = '';
		$fontfamily_escaped .= str_replace( ' ', '+', $font['font'] );
		$fontfamily_escaped .= ':400,700';

		if ( in_array( $fontfamily_escaped, $esc_fontlist, true ) === false ) {
			$esc_fontlist[] = $fontfamily_escaped;
		}
	}

	$allfonts_str = implode( '|', $esc_fontlist );

	$output .= $allfonts_str;

	return $output;

}

// ADMIN SCRIPTS.
// ----------------------------------------------------------------------------.

/**
 * Defines the responsive menu settings.
 * @return array $settings An array of the responsive menu settings.
 */
function coaching_pro_responsive_menu_settings() {
	$settings = array(
		'mainMenu'          => __( 'Menu', 'coaching-pro' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'coaching-pro' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);
	return $settings;
}

/**
 * Enqueue admin scripts on Genesis getting started screen.
 *
 * @param string $hook Current screen.
 */
function coaching_pro_add_skin_settings_js( string $hook ) {
	if ( 'genesis_page_genesis-getting-started' !== $hook ) {
		return;
	}
	/**
	 * This section enqueue's a script on the Genesis getting started page.
	 * The script clones the button, attaches its own event and popup (using SWAL) for options
	 * to override customizer/pages. When completed, custom button is disabled, while original
	 * button is shown and is clicked programmatically. Genesis hook genesis_onboarding_before_import_content
	 * is run and reads in the options saved and performs customizer / post cleanup.
	 * 
	 * See Ajax callback below. See js/theme-skin-prompt.js. See config/theme-setup.php.
	 */
	wp_enqueue_script(
		'coaching-pro-sweet-alert-js',
		get_stylesheet_directory_uri() . '/js/sweetalert2/sweetalert2.all.min.js',
		array(),
		CHILD_THEME_VERSION,
		true
	);
	wp_enqueue_script(
		'coaching-pro-sweet-alert-skin-js',
		get_stylesheet_directory_uri() . '/js/theme-skin-prompt.js',
		array( 'wp-i18n', 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
	$skin_ajax_nonce_value = wp_create_nonce( 'coaching-pro-ajax-skin-select' );
	wp_add_inline_script( 'coaching-pro-sweet-alert-skin-js', 'var adminSkinNonce = "' . esc_js( $skin_ajax_nonce_value ) .'"', 'before' );
	wp_enqueue_style(
		'coaching-pro-sweet-alert-css',
		get_stylesheet_directory_uri() . '/js/sweetalert2/sweetalert2.min.css',
		array(),
		CHILD_THEME_VERSION,
		'all'
	);
	wp_add_inline_style( 'coaching-pro-sweet-alert-css', '.wp-core-ui .pack-actions button:not(.pack-prompt) { display: none; }' );
	wp_add_inline_style( 'coaching-pro-sweet-alert-css', '.swal2-html-container { overflow: hidden !important; }',  );
}
add_action( 'admin_enqueue_scripts', 'coaching_pro_add_skin_settings_js' );

/**
 * Ajax callback for saving pre-import settings in the installer.
 */
function coaching_pro_save_import_settings() {
	// todo: nonce
	$customizer_option = filter_input( INPUT_POST, 'customizerOption', FILTER_DEFAULT );
	$content_override_option = filter_input( INPUT_POST, 'postsOption', FILTER_DEFAULT );
	$skin = filter_input( INPUT_POST, 'skin', FILTER_DEFAULT );
	$nonce = filter_input( INPUT_POST, 'nonce', FILTER_DEFAULT );
	if ( ! wp_verify_nonce( $nonce, 'coaching-pro-ajax-skin-select' ) || ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array() );
	}

	update_option( 'coaching_pro_skin_customizer_override', sanitize_text_field( $customizer_option ) );
	update_option( 'coaching_pro_skin_content_override', sanitize_text_field( $content_override_option ) );
	update_option( 'coaching_pro_skin_selected', sanitize_text_field( $skin ) );

	wp_send_json_success( array() );
}
add_action( 'wp_ajax_coaching_pro_save_import_settings', 'coaching_pro_save_import_settings' );