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

return array(
	'dependencies'     => array(
		'plugins' => array(
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
		),
	),
	'content'          => array(
		'homepage'      => array(
			'post_title'     => 'Home',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/homepage.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array(
				'_genesis_layout'               => 'full-width-content',
				'_genesis_hide_title'           => '1',
				'page_transparent_header_value' => '1',
				'_generated_page'               => '1',
			),
		),
		'about'         => array(
			'post_title'     => 'About',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/about.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array(
				'_generated_page' => '1',
			),
		),
		'services'      => array(
			'post_title'     => 'Services',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/services.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array(
				'_genesis_layout' => 'full-width-content',
				'_generated_page' => '1',
			),
		),
		'blog'          => array(
			'post_title'     => 'Blog',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array(
				'_genesis_layout' => 'full-width-content',
				'_generated_page' => '1',
			),
		),
		'contact-me'    => array(
			'post_title'     => 'Contact Me',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/contact-me.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array(
				'_genesis_layout' => 'full-width-content',
				'_generated_page' => '1',
			),
		),
		/* BLOG POSTS */
		'blog-post-1'   => array(
			'post_title'     => 'Use your coaching strengths to your advantage',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-1.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-1.jpg', // Source: {https://unsplash.com/photos/RgPQNvoIcdg}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-2'   => array(
			'post_title'     => 'Start planning for professional leadership',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-2.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-2.jpg', // Source: {https://unsplash.com/photos/--kQ4tBklJI}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-3'   => array(
			'post_title'     => 'How to find your creative balance',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-3.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-3.jpg', // Source: {https://unsplash.com/photos/VtKoSy_XzNU}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-4'   => array(
			'post_title'     => 'Learn these helpful methods of leadership to achieve success',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-4.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-4.jpg', // Source: {https://unsplash.com/photos/5U_28ojjgms}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-5'   => array(
			'post_title'     => 'The top five business questions you should be asking yourself',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-5.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-5.jpg', // Source: {https://unsplash.com/photos/-8DAN9_oi8g}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'blog-post-6'   => array(
			'post_title'     => 'Tips for visualizing your priorities',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-6.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-6.jpg', // Source: {https://unsplash.com/photos/DXobXpIa9_4}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-7'   => array(
			'post_title'     => 'How to select a coach who is just right for your needs',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-7.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-7.jpg', // Source: {https://unsplash.com/photos/Be5aVKFv9ho}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-8'   => array(
			'post_title'     => 'Helpful tips for creative professionals facing the effects of Coronavirus',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-8.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-8.jpg', // Source: {https://unsplash.com/photos/8tvoDBqOHZU}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-9'   => array(
			'post_title'     => 'Why having a personal brand can help you gain new clients',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-9.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-9.jpg', // Source: {https://unsplash.com/photos/Hcfwew744z4}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		'blog-post-10'  => array(
			'post_title'     => 'The importance of developing your personal brand as a coach',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog/blog-post-10.php',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-blog-post-10.jpg', // Source: {https://unsplash.com/photos/TXxiFuQLBKQ}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_generated_page' => '1' ),
		),
		/* TESTIMONIALS */
		'testimonial-1' => array(
			'post_title'     => 'Julie J.',
			'post_content'   => '',
			'post_type'      => 'socialproofslider',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-testimonial-1.jpg', // Source: {https://unsplash.com/photos/TXxiFuQLBKQ}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => require dirname( __FILE__ ) . '/import/content/testimonials/sample-testimonial-1.php',
		),
		'testimonial-2' => array(
			'post_title'     => 'Cameron W.',
			'post_content'   => '',
			'post_type'      => 'socialproofslider',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-testimonial-2.jpg', // Source: {https://unsplash.com/photos/k-BWMCE1FNo}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => require dirname( __FILE__ ) . '/import/content/testimonials/sample-testimonial-2.php',
		),
		'testimonial-3' => array(
			'post_title'     => 'Marc B.',
			'post_content'   => '',
			'post_type'      => 'socialproofslider',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-testimonial-3.jpg', // Source: {https://unsplash.com/photos/RQhV1Kj9uXY}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => require dirname( __FILE__ ) . '/import/content/testimonials/sample-testimonial-3.php',
		),
		'testimonial-4' => array(
			'post_title'     => 'Brenda M.',
			'post_content'   => '',
			'post_type'      => 'socialproofslider',
			'post_status'    => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/demo-testimonial-4.jpg', // Source: {https://unsplash.com/photos/VtKoSy_XzNU}.
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => require dirname( __FILE__ ) . '/import/content/testimonials/sample-testimonial-4.php',
		),
	),
	'navigation_menus' => array(
		'primary' => array(
			'homepage'   => array(
				'title' => 'Home',
			),
			'about'      => array(
				'title' => 'About',
			),
			'services'   => array(
				'title' => 'Services',
			),
			'blog'       => array(
				'title' => 'Blog',
			),
			'contact-me' => array(
				'title' => 'Contact Me',
			),
		),
	),
	/* WIDGET IMPORT */
	'widgets'          => array(
		'footer-1' => array(
			array(
				'type' => 'text',
				'args' => array(
					'title'  => 'About Coaching Pro',
					'text'   => '<p>This theme is packed full of features and functionality to help you coach others to reach their full potential.</p>',
					'filter' => 1,
					'visual' => 1,
				),
			),
		),
	),
);
