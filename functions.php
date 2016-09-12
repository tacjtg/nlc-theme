<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 *	Load necessary PHP files.
 */

// Enqueue Parent Theme Styles, Favicons, Fonts, Custom Styles
require_once( get_stylesheet_directory() . '/includes/parent-styles.php' );
require_once( get_stylesheet_directory() . '/includes/favicon.php' );
require_once( get_stylesheet_directory() . '/includes/fonts.php' );

// Load Storefront Customizations
require_once( get_stylesheet_directory() . '/includes/custom.php' );

// Remove all comment functionality
require_once( get_stylesheet_directory() . '/includes/remove-comments.php' );

// Load Plugin Customizations
if( class_exists( 'Tribe__Events__Main' ) ) {
	require_once( get_stylesheet_directory() . '/includes/tribe-events.php' );
}
if( class_exists( 'WooCommerce' ) ) {
	require_once( get_stylesheet_directory() . '/includes/woocommerce.php' );
}
if( class_exists( 'WooThemes_Sensei' ) ) {
	require_once( get_stylesheet_directory() . '/includes/sensei.php' );
}
if( class_exists( 'UM_API' ) && class_exists( 'WooCommerce' ) ) {
	require_once( get_stylesheet_directory() . '/includes/ultimate-member.php' );
}
if( defined( 'WPSEO_VERSION' ) ) {
	require_once( get_stylesheet_directory() . '/includes/seo.php' );
}
