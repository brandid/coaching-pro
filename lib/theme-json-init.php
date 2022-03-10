<?php
/**
 * Conditionally load the default theme.json file.
 *
 * @package coaching-pro
 */

/**
 * Override template directory if theme.json file is requested.
 *
 * @param string $template_dir ABS Path to active template.
 */
function coaching_pro_modify_current_theme_path( $template_dir ) {

	$debug = debug_backtrace(); // Yes, but isn't all WordPress a hack at points?

	$callback_class = $debug[4]['class'] ?? false;
	$callback_function = $debug[4]['function'] ?? false;
	if ( 'WP_Theme_JSON_Resolver' === $callback_class && 'get_file_path_from_theme' === $callback_function ) {
		// $option_value = get_option( 'some_option' );
		$option_value = 'default';

		$theme_json_dir = false;
		switch ( $option_value ) {
			case 'default':
				$theme_json_dir = '/skins/default';
				break;
			case 'red':
				$theme_json_dir = '/skins/red';
				break;
		}
		if ( $theme_json_dir && file_exists( $template_dir . $theme_json_dir . '/theme.json' ) ) {
			$template_dir .= $theme_json_dir;
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
}
add_action( 'after_setup_theme', 'coaching_pro_condtional_json_init', 10 );
