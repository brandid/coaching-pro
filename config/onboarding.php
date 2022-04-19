<?php
/**
 * Coaching Pro - One-Click Theme Setup settings
 *
 * Onboarding config to load plugins and demo page content on theme activation.
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

$coaching_pro_shared_content  = genesis_get_config( 'onboarding-shared' );

$coaching_pro_starter_packs = [
	'starter_packs' => [
		'default'  => [
			'title'       => __( 'Default', 'coaching-pro' ),
			'description' => __( 'Default theme style and appearance.', 'coaching-pro' ),
			'thumbnail'   => get_stylesheet_directory_uri() . '/config/skins/default/screenshot.png',
			'demo_url'    => 'https://coachingpro.com',
			'config'      => [
				'dependencies'     => [
					'plugins' => $coaching_pro_shared_content['dependencies']['plugins'],
				],
				'content'          => $coaching_pro_shared_content['content'],
				'navigation_menus' => $coaching_pro_shared_content['navigation_menus'],
				'widgets'          => $coaching_pro_shared_content['widgets'],
			],
		],
		'nutrition'  => [
			'title'       => __( 'Nutrition', 'coaching-pro' ),
			'description' => __( 'Nutrition theme style and appearance.', 'coaching-pro' ),
			'thumbnail'   => get_stylesheet_directory_uri() . '/config/skins/nutrition/screenshot.png',
			'demo_url'    => 'https://coachingpro.com',
			'config'      => [
				'dependencies'     => [
					'plugins' => $coaching_pro_shared_content['dependencies']['plugins'],
				],
				'content'          => $coaching_pro_shared_content['content'],
				'navigation_menus' => $coaching_pro_shared_content['navigation_menus'],
				'widgets'          => $coaching_pro_shared_content['widgets'],
			],
		],
	],
];

return $coaching_pro_starter_packs;
