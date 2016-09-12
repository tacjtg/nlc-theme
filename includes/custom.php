<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Customizations to the Storefront theme.
 */

add_action( 'wp_before_admin_bar_render', 'nlc_custom_admin_bar', 7 );

if ( !function_exists( 'nlc_custom_admin_bar' ) ) {
	function nlc_custom_admin_bar() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('search');
		$wp_admin_bar->remove_menu('comments');
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('wpseo-menu');
		$wp_admin_bar->remove_menu('stats');
	}
}

// Change the Mobile Navigation Menu Title Text
add_filter( 'storefront_menu_toggle_text', 'nlc_storefront_menu_toggle_text' );

function nlc_storefront_menu_toggle_text( $text ) {
	$text = __( 'Menu' );
	return $text;
}

// Remove WooThemes Updater Notification
remove_action( 'admin_notices', 'woothemes_updater_notice' );

// Storefront Theme Blog Loop Customization
add_action( 'init', 'nlc_storefront_blog' );

if ( !function_exists( 'nlc_storefront_blog' ) ) {
	function nlc_storefront_blog() {
		remove_action( 'storefront_loop_post', 'storefront_post_header', 10 );
		remove_action( 'storefront_loop_post', 'storefront_post_meta', 20 );
		remove_action( 'storefront_loop_post', 'storefront_post_content', 30 );

		add_action( 'storefront_loop_post', 'nlc_storefront_post_meta', 10 );
		add_action( 'storefront_loop_post', 'nlc_storefront_post_image', 20 );
		add_action( 'storefront_loop_post', 'storefront_post_header', 30 );
	}
}

if ( !function_exists( 'nlc_storefront_post_meta' ) ) {
	function nlc_storefront_post_meta() {
		?>
		<aside class="entry-meta nlc-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'storefront' ) );
			if ( $categories_list ) : ?>
				<span class="cat-links">
					<?php
					echo '<span class="screen-reader-text">' . esc_attr( __( 'Categories: ', 'storefront' ) ) . '</span>';
					echo wp_kses_post( $categories_list );
					?>
				</span>
			<?php endif; // End if categories ?>

			<?php endif; // End if 'post' == get_post_type() ?>

		</aside>
		<?php
	}
}

if ( !function_exists( 'nlc_storefront_post_image' ) ) {
	function nlc_storefront_post_image() {
		?>
		<div class="entry-content" itemprop="articleBody">
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
				</a>
			<? } ?>
		</div><!-- .entry-content -->
	<?php }
}

// Custom Excerpt More Text
add_filter('excerpt_more', 'nlc_storefront_post_excerpt');

if ( !function_exists( 'nlc_storefront_post_excerpt' ) ) {
	function nlc_storefront_post_excerpt( $more ) {
		return '...<br /><br /><br /><a href="' . get_permalink() . '" class="nlc-excerpt-more">Continue Reading</a>';
	}
}

// Storefront Theme Single Post Customization
add_action( 'init', 'nlc_storefront_single_post' );

if ( !function_exists( 'nlc_storefront_single_post' ) ) {
	function nlc_storefront_single_post() {
		remove_action( 'storefront_single_post', 'storefront_post_header', 10 );
		remove_action( 'storefront_single_post', 'storefront_post_meta', 20 );
		remove_action( 'storefront_single_post', 'storefront_post_content', 30 );

		add_action( 'storefront_single_post', 'nlc_storefront_single_post_header', 10 );
		add_action( 'storefront_single_post', 'storefront_post_content', 20 );
		add_action( 'storefront_single_post', 'nlc_storefront_single_post_meta', 30 );
	}
}

if ( !function_exists( 'nlc_storefront_single_post_header' ) ) {
	function nlc_storefront_single_post_header() { ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title" itemprop="name headline">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php }
}

if ( !function_exists( 'nlc_storefront_single_post_meta' ) ) {
	function nlc_storefront_single_post_meta( $more ) {
		?>
		<aside class="entry-meta nlc-single-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

			<?php if ( is_single() ) {
				storefront_posted_on();
			} ?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'storefront' ) );
			if ( $categories_list ) : ?>
				<span class="cat-links">
					<?php
					echo '<span class="screen-reader-text">' . esc_attr( __( 'Categories: ', 'storefront' ) ) . '</span>';
					echo wp_kses_post( $categories_list );
					?>
				</span>
			<?php endif; // End if categories ?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'storefront' ) );
			if ( $tags_list ) : ?>
				<span class="tags-links">
					<?php
					echo '<span class="screen-reader-text">' . esc_attr( __( 'Tags: ', 'storefront' ) ) . '</span>';
					echo wp_kses_post( $tags_list );
					?>
				</span>
			<?php endif; // End if $tags_list ?>

			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'storefront' ), __( '1 Comment', 'storefront' ), __( '% Comments', 'storefront' ) ); ?></span>
			<?php endif; ?>
		</aside>
	<?php }
}