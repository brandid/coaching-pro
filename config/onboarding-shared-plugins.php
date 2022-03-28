<?php
/**
 * Coaching Pro - One-Click Theme Setup settings
 *
 * Onboarding plugin config - Don't try to install/activate plugins already installed/active (to speed things up).
 *
 * @package Coaching Pro
 */

/*
 * EDD DOWNLOADS
 * ---------------------
 * Easy Digital Downloads products can be imported using the included CSV file:
 * /config/import/edd/sample-edd-downloads.csv
 *
 *
 * WOOCOMMERCE PRODUCTS
 * ---------------------
 * WooCommerce products can be imported using the included CSV file:
 * /config/import/woo/sample-woocommerce-products.csv
 *
 */

// Get plugin dependencies.
$coaching_pro_plugin_deps = array(
		
	array(
		'name'       => __( 'Easy Digital Downloads', 'coursemaker' ),
		'slug'       => 'easy-digital-downloads/easy-digital-downloads.php',
		'public_url' => 'https://wordpress.org/plugins/easy-digital-downloads/',
	),
	array(
		'name'       => __( 'Genesis Blocks', 'coursemaker' ),
		'slug'       => 'genesis-blocks/genesis-blocks.php',
		'public_url' => 'https://wordpress.org/plugins/genesis-blocks/',
	),
	array(
		'name'       => __( 'Social Proof (Testimonials) Slider', 'coursemaker' ),
		'slug'       => 'social-proof-testimonials-slider/social-proof-slider.php',
		'public_url' => 'https://wordpress.org/plugins/social-proof-testimonials-slider/',
	),
	array(
		'name'       => __( 'WooCommerce', 'coursemaker' ),
		'slug'       => 'woocommerce/woocommerce.php',
		'public_url' => 'https://wordpress.org/plugins/woocommerce/',
	),
	array(
		'name'       => __( 'WP Forms Lite', 'coursemaker' ),
		'slug'       => 'wpforms-lite/wpforms.php',
		'public_url' => 'https://wordpress.org/plugins/wpforms-lite/',
	),
);

// Loop through each to make sure they are active or not.
foreach ( $coaching_pro_plugin_deps as $index => $plugin ) {
	// coaching_pro_is_plugin_activated is defined in /lib/skin-install.php.
	if ( coaching_pro_is_plugin_activated( $plugin['slug'] ) ) {
		unset( $coaching_pro_plugin_deps[ $index ] );
	}
}

return array(
	'plugins' => $coaching_pro_plugin_deps,
);
