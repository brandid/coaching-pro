<?php
/**
 * Skin helper functions and overrides. Needs to load extremely early in functions.php.
 *
 * @package Coaching Pro Theme
 */

/**
 * Retrieve current skin config.
 *
 * @param string $skin Current skin.
 */
function coaching_pro_get_skin_appearance() {
	$config_appearance = get_option( 'coaching_pro_skin_selected', 'default' );
	$appearance        = genesis_get_config( sprintf( 'skins/%s/appearance', $config_appearance ) );
	return $appearance;
}

/**
 * Retrieve current skin slug.
 *
 * @param string $skin Current skin.
 */
function coaching_pro_get_active_skin_slug() {
	return get_option( 'coaching_pro_skin_selected', 'default' );
}

/**
 * Checks to see if an asset is activated or not.
 * Load early for skin importer to skip plugins already installed/activated.
 *
 * @param string $path Path to the asset.
 * @param string $type Type to check if it is activated or not.
 *
 * @return bool true if activated, false if not.
 */
function coaching_pro_is_plugin_activated( $path, $type = 'plugin' ) {

	// Gets all active plugins on the current site.
	$active_plugins = is_multisite() ? get_site_option( 'active_sitewide_plugins' ) : get_option( 'active_plugins', array() );
	if ( in_array( $path, $active_plugins, true ) ) {
		return true;
	}
	return false;
}

/**
 * Add the skin slug to the body class. Useful for custom styles.
 *
 * @param array $classes Array of current body classes.
 */
function coaching_pro_add_skin_body_class( $classes ) {
	$skin_slug = coaching_pro_get_active_skin_slug();
	$body_class = sprintf(
		'coaching-pro-skin-%s',
		$skin_slug
	);
	$classes[] = esc_attr( $body_class );
	return $classes;
}
add_filter( 'body_class', 'coaching_pro_add_skin_body_class' );