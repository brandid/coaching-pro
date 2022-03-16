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

return $coaching_pro_shared_content;