<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Load Parent Theme Styles.
 */

add_action( 'wp_enqueue_scripts', 'nlc_load_parent_theme_styles' );

if ( !function_exists( 'nlc_load_parent_theme_styles' ) ) {
	function nlc_load_parent_theme_styles() {
    	wp_enqueue_style( 'storefront-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'storefront-style' ) );
	}
}