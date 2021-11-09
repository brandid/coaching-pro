<?php
/**
 * This template displays the default Archive page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add a body class for the Archive page.
add_filter( 'body_class', 'coaching_pro_edd_archive_body_class' );
function coaching_pro_edd_archive_body_class( $classes ) {
	$classes[] = 'page-archive';
	return $classes;
}

// Force full-width page layout.
add_filter( 'genesis_pre_get_option_site_layout', 'coaching_pro_edd_archive_page_layout' );
function coaching_pro_edd_archive_page_layout() {
	return 'full-width-content';
}

// Reposition Featured Images to display before Post Titles.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

// Wrap blog post titles in h2 tags.
add_filter( 'genesis_entry_title_wrap', 'coaching_pro_post_title_wrap' );
function coaching_pro_post_title_wrap( $wrap ) {
	$wrap = 'h2';
	return $wrap;
}

// Customize the post header meta.
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
	$post_info = '[post_date format="M j, Y"]';
	return $post_info;
}

// Remove the post footer meta.
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

genesis();