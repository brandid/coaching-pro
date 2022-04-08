<?php
/**
 * Conditionally load the default theme.json file.
 *
 * Assumes directory structure of /theme-name/skins/skin-name/theme.json.
 *
 * @package coaching-pro
 */

/**
 * Override template directory if theme.json file is requested.
 *
 * If skin isn't found, no theme.json file is loaded.
 *
 * @param string $template_dir ABS Path to active template.
 */
function coaching_pro_modify_current_theme_path( $template_dir ) {

	$debug = debug_backtrace(); // Use debug backtrace to get caller.

	/**
	 * Todo: Update this function once WordPress supports conditional theme.json files. Should be in WP 6.0.
	 */
	$callback_class = $debug[4]['class'] ?? false;
	$callback_function = $debug[4]['function'] ?? false;
	if ( ( 'WP_Theme_JSON_Resolver' === $callback_class || 'WP_Theme_JSON_Resolver_5_9' === $callback_class ) && 'get_file_path_from_theme' === $callback_function ) {
		remove_filter( 'stylesheet_directory', 'coaching_pro_modify_current_theme_path', 10, 1 );
		$stylesheet_directory = get_stylesheet_directory();
		add_filter( 'stylesheet_directory', 'coaching_pro_modify_current_theme_path', 10, 1 );
		$active_skin = coaching_pro_get_active_skin_slug(); // This function is defined in /lib/skins-setup.php.

		$theme_json_dir = '/config/skins/' . $active_skin;
		if ( $theme_json_dir && file_exists( $stylesheet_directory . $theme_json_dir . '/theme.json' ) ) {
			$template_dir = $stylesheet_directory . $theme_json_dir;
		}
	}
	return $template_dir;
}

/**
 * Conditionally load theme JSON files.
 *
 * Action Must be initialized *before* Genesis init file.
 */
function coaching_pro_condtional_json_init() {
	add_filter( 'stylesheet_directory', 'coaching_pro_modify_current_theme_path', 10, 1 );

	// Only if you need a parent > child theme.json.
	add_filter( 'template_directory', 'coaching_pro_modify_current_theme_path', 10, 1 );

	WP_Theme_JSON_Resolver::clean_cached_data();
}
add_action( 'after_setup_theme', 'coaching_pro_condtional_json_init', 10 );
