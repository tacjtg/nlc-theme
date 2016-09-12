<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */

add_action( 'wp_enqueue_scripts', 'nlc_manage_woocommerce_styles', 99 );

if ( !function_exists( 'nlc_manage_woocommerce_styles' ) ) {
	function nlc_manage_woocommerce_styles() {

		// Remove generator meta tag
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

		if ( function_exists( 'is_woocommerce' ) ) {
			if ( !is_woocommerce() && !is_cart() && !is_checkout() ) {
				wp_dequeue_style( 'woocommerce_frontend_styles' );
				wp_dequeue_style( 'woocommerce_fancybox_styles' );
				wp_dequeue_style( 'woocommerce_chosen_styles' );
				wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'prettyPhoto' );
				wp_dequeue_script( 'prettyPhoto-init' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'jquery-placeholder' );
				wp_dequeue_script( 'fancybox' );
				wp_dequeue_script( 'jqueryui' );
			}
		}
	}
}

/*
 * Remove WooCommerce Breadcrumbs from Pages
 */

add_action( 'init', 'nlc_remove_woocommerce_breadcrumbs' );

if ( !function_exists( 'nlc_remove_woocommerce_breadcrumbs' ) ) {
	function nlc_remove_woocommerce_breadcrumbs() {
		remove_action( 'storefront_content_top', 'woocommerce_breadcrumb', 10 );
	}
}

/*
 * Add tabs.js to the My Account Page
 */

if ( !function_exists( 'nlc_add_tab_js' ) ) {
	function nlc_add_tab_js() {
		echo '<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/tabcontent.js" type="text/javascript"></script>';
	}
}

/*
 * Add My Account Page
 */

if ( !function_exists( 'nlc_add_tab_js' ) ) {
	function nlc_add_tab_js() {

		<<<HTML

		<div class="nlc-my-account-section">
	<div class="nlc-tabs-menu">
		<ul class="tabs" data-persist="true">
			<li><a href="#view1">My Profile</a></li>
			<li><a href="#view2">My Addresses</a></li>
			<li><a href="#view3">My Payment Methods</a></li>
			<li><a href="#view4">My Courses</a></li>
			<li><a href="#view5">My Downloads</a></li>
			<li><a href="#view6">My Orders</a></li>
			<li><a href="#view7">My Subscriptions</a></li>
		</ul>
	</div><!-- /.nlc-tabs-menu -->

	<div class="nlc-tabs-content">
		<div class="tabcontents">

			<div id="view1">
				<p class="myaccount_user">
					<?php echo 'Hello ' . $current_user->first_name . '.'; ?>
				</p>
			</div>

			<div id="view2">
				<?php wc_get_template( 'myaccount/my-address.php' ); ?>
			</div>

			<div id="view3">
			</div>

			<div id="view4">
				<?php echo do_shortcode( '[usercourses]'); ?>
			</div>

			<div id="view5">
				<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>
			</div>

			<div id="view6">
				<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
			</div>

			<div id="view7">
				<div class="woocommerce_account_subscriptions">

					<h2><?php esc_html_e( 'My Subscriptions', 'woocommerce-subscriptions' ); ?></h2>

					<?php if ( ! empty( $subscriptions ) ) : ?>
					<table class="shop_table shop_table_responsive my_account_subscriptions my_account_orders">

					<thead>
						<tr>
							<th class="subscription-id order-number"><span class="nobr"><?php esc_html_e( 'Subscription', 'woocommerce-subscriptions' ); ?></span></th>
							<th class="subscription-status order-status"><span class="nobr"><?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?></span></th>
							<th class="subscription-next-payment order-date"><span class="nobr"><?php esc_html_e( 'Next Payment', 'woocommerce-subscriptions' ); ?></span></th>
							<th class="subscription-total order-total"><span class="nobr"><?php esc_html_e( 'Total', 'woocommerce-subscriptions' ); ?></span></th>
							<th class="subscription-actions order-actions">&nbsp;</th>
						</tr>
					</thead>

					<tbody>
					<?php foreach ( $subscriptions as $subscription_id => $subscription ) : ?>
						<tr class="order">
							<td class="subscription-id order-number" data-title="<?php esc_attr_e( 'ID', 'woocommerce-subscriptions' ); ?>">
								<a href="<?php echo esc_url( $subscription->get_view_order_url() ); ?>"><?php echo esc_html( $subscription->get_order_number() ); ?></a>
								<?php do_action( 'woocommerce_my_subscriptions_after_subscription_id', $subscription ); ?>
							</td>
							<td class="subscription-status order-status" style="text-align:left; white-space:nowrap;" data-title="<?php esc_attr_e( 'Status', 'woocommerce-subscriptions' ); ?>">
								<?php echo esc_attr( wcs_get_subscription_status_name( $subscription->get_status() ) ); ?>
							</td>
							<td class="subscription-next-payment order-date" data-title="<?php esc_attr_e( 'Next Payment', 'woocommerce-subscriptions' ); ?>">
								<?php echo esc_attr( $subscription->get_date_to_display( 'next_payment' ) ); ?>
								<?php if ( ! $subscription->is_manual() && $subscription->has_status( 'active' ) && $subscription->get_time( 'next_payment' ) > 0 ) : ?>
									<?php $payment_method_to_display = sprintf( __( 'Via %s', 'woocommerce-subscriptions' ), $subscription->get_payment_method_to_display() ); ?>
									<?php $payment_method_to_display = apply_filters( 'woocommerce_my_subscriptions_payment_method', $payment_method_to_display, $subscription ); ?>
								&nbsp;<small><?php echo esc_attr( $payment_method_to_display ); ?></small>
								<?php endif; ?>
							</td>
							<td class="subscription-total order-total">
								<?php echo wp_kses_post( $subscription->get_formatted_order_total() ); ?>
							</td>
							<td class="subscription-actions order-actions">
								<a href="<?php echo esc_url( $subscription->get_view_order_url() ) ?>" class="button view"><?php esc_html_e( 'View', 'woocommerce-subscriptions' ); ?></a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>

					</table>
					<?php else : ?>

						<p class="no_subscriptions"><?php printf( esc_html__( 'You have no active subscriptions. Find your first subscription in the %sstore%s.', 'woocommerce-subscriptions' ), '<a href="' . esc_url( apply_filters( 'woocommerce_subscriptions_message_store_url', get_permalink( woocommerce_get_page_id( 'shop' ) ) ) ) . '">', '</a>' ); ?></p>

					<?php endif; ?>

				</div><!-- /.woocommerce_account_subscriptions -->

			</div><!-- /.view7 -->

		</div><!-- /.tabcontents -->
	</div><!-- /.nlc-tabs-content -->
</div><!-- /.nlc-my-account-section -->

HTML;


	}
}