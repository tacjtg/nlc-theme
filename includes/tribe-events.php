<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Fix Event 404 titles.
 */

add_action('template_include', 'nlc_avoid_404_event_titles', 1);

if ( !function_exists( 'nlc_avoid_404_event_titles' ) ) {
	function nlc_avoid_404_event_titles($template) {
        global $wp_query;
        if (property_exists($wp_query, 'tribe_is_event') && $wp_query->tribe_is_event and $wp_query->is_404){
            $wp_query->is_404 = false;
        }
        return $template;
	}
}

/**
 * Hide Events for Users who are not logged in.
 */

//add_action('template_redirect', 'nlc_hide_events', 99);

if ( !function_exists( 'nlc_hide_events' ) ) {
	function nlc_hide_events() {
		if (tribe_is_event_query() && (!is_user_logged_in() || !current_user_can('read_tribe_event'))) {
			$join_page = home_url() . '/members-only/';
			wp_redirect( $join_page );
			exit;
		}
	}
}

/**
 * Optimize TEC Scripts
 * Remove TEC styles, and scripts from non TEC pages.
 */

add_action( 'wp_enqueue_scripts', 'nlc_dequeue_tec_scripts', 100 );

if ( !function_exists( 'nlc_dequeue_tec_scripts' ) ) {
	function nlc_dequeue_tec_scripts() {
		if ( !tribe_is_event_query() ) {
			wp_dequeue_script('tribe-events-calendar');
			wp_dequeue_script('tribe-events-calendar-script');
			wp_dequeue_script('tribe-events-bootstrap-datepicker');
			wp_dequeue_script('tribe-events-admin');
			wp_dequeue_script('tribe-events-settings');
			wp_dequeue_script('tribe-events-ecp-plugins');
			wp_dequeue_script('tribe-events-bar');
			wp_dequeue_script('tribe-events-calendar');
			wp_dequeue_script('tribe-events-list');
			wp_dequeue_script('tribe-events-ajax-day');
			wp_dequeue_script('tribe-mini-calendar');
			wp_dequeue_script('tribe-events-pro-slimscroll');
			wp_dequeue_script('tribe-events-pro-week');
			wp_dequeue_script('tribe-events-pro-isotope');
			wp_dequeue_script('tribe-events-pro-photo');
			wp_dequeue_script('tribe-events-pro-geoloc');
			wp_dequeue_script('tribe-meta-box');
			wp_dequeue_script('tribe-jquery-ui');
			wp_dequeue_script('tribe-jquery-ui');
			wp_dequeue_script('tribe-timepicker');
			wp_dequeue_script('tribe-fac');
			wp_dequeue_script('tribe-events-pro');
		}
	}
}

/**
 * Remove TEC Admin Bar Menu
 */

define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);