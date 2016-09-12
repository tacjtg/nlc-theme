<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Favicon.
 */

add_action( 'wp_head', 'nlc_favicon' );

if ( !function_exists( 'nlc_favicon' ) ) {
	function nlc_favicon() {
		echo '<link rel="apple-touch-icon" sizes="57x57" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-57x57.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="60x60" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-60x60.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="72x72" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-72x72.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="76x76" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-76x76.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="114x114" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-114x114.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="120x120" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-120x120.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="144x144" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-144x144.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="152x152" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-152x152.png">' . "\n";
		echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_stylesheet_directory_uri() .'/favicons/apple-touch-icon-180x180.png">' . "\n";
		echo '<link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() .'/favicons/favicon-32x32.png" sizes="32x32">' . "\n";
		echo '<link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() .'/favicons/favicon-194x194.png" sizes="194x194">' . "\n";
		echo '<link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() .'/favicons/favicon-96x96.png" sizes="96x96">' . "\n";
		echo '<link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() .'/favicons/android-chrome-192x192.png" sizes="192x192">' . "\n";
		echo '<link rel="icon" type="image/png" href="' . get_stylesheet_directory_uri() .'/favicons/favicon-16x16.png" sizes="16x16">' . "\n";
		echo '<link rel="manifest" href="' . get_stylesheet_directory_uri() .'/favicons/manifest.json">' . "\n";
		echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() .'/favicons/favicon.ico">' . "\n";
		echo '<meta name="msapplication-TileColor" content="#ffffff">' . "\n";
		echo '<meta name="msapplication-TileImage" content="' . get_stylesheet_directory_uri() .'/favicons/mstile-144x144.png">' . "\n";
		echo '<meta name="msapplication-config" content="' . get_stylesheet_directory_uri() .'/favicons/browserconfig.xml">' . "\n";
		echo '<meta name="theme-color" content="#ffffff">' . "\n";
	}
}