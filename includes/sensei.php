<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Compatibility with WooTheme's Sensei plugin.
 * Source: https://support.woothemes.com/hc/en-us/articles/203604495-Twenty-Fifteen-Sensei-integration
 */

// Add Sensei Support Declaration
add_action( 'after_setup_theme', 'nlc_sensei_support' );

if ( !function_exists( 'nlc_sensei_support' ) ) {
	function nlc_sensei_support() {
    	add_theme_support( 'sensei' );
	}
}

// Remove the default Sensei wrappers
global $woothemes_sensei;
remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

// Add The storefront custom  Sensei content  wrappers
add_action('sensei_before_main_content','nlc_storefront_sensei_wrapper_start', 10);
add_action('sensei_after_main_content','nlc_storefront_sensei_wrapper_end', 10);

if ( !function_exists( 'nlc_storefront_sensei_wrapper_start' ) ) {
	function nlc_storefront_sensei_wrapper_start (){
	    echo '<div id="primary" class="content-area">';
	    echo '<div id="main" class="site-main" role="main">';
	}
}

if ( !function_exists( 'nlc_storefront_sensei_wrapper_end' ) ) {
	function nlc_storefront_sensei_wrapper_end (){
	    echo'</div> <!-- end #main -->';
	    echo'</div> <!-- end #primary -->';
	    get_sidebar();
	}
}