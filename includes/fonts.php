<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Fonts
 */

// Remove default fonts
wp_dequeue_style( 'twentyfifteen-fonts');

// Add 'Montserrat' Google Font.
add_action( 'wp_enqueue_scripts', 'nlc_enqueue_fonts' );

if ( !function_exists( 'nlc_enqueue_fonts' ) ) {
	function nlc_enqueue_fonts() {
		echo '<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">' . "\n";
		echo '<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400italic,700italic" rel="stylesheet" type="text/css">' . "\n";
	}
}
