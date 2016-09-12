<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Remove "Page Analysis" and SEO columns
 */

add_filter( 'wpseo_use_page_analysis', '__return_false' );

/**
 * Remove SEO menu from Admin bar
 */

add_action( 'wp_before_admin_bar_render', 'nlc_remove_admin_bar' );

if ( !function_exists( 'nlc_remove_admin_bar' ) ) {
	function nlc_remove_admin_bar() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wpseo-menu');
	}
}

/**
 * Make sure the SEO box is at the very bottom
 */

add_filter( 'wpseo_metabox_prio', 'nlc_seo_metabox_priority');

if ( !function_exists( 'nlc_seo_metabox_priority' ) ) {
	function nlc_seo_metabox_priority($in) {
		return 'low';
	}
}