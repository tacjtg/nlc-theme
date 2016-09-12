<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add Custom Panels to Ultimate Member.
 */

// Addresses Tab
add_filter('um_account_page_default_tabs_hook', 'nlc_umtab_address', 1000 );
function nlc_umtab_address( $tabs ) {
	$tabs[800]['address']['icon'] = 'um-faicon-home';
	$tabs[800]['address']['title'] = 'Addresses';
	$tabs[800]['address']['custom'] = true;
	return $tabs;
}

add_action('um_account_tab__address', 'um_account_tab__address');
function um_account_tab__address( $info ) {
	global $ultimatemember;
	extract( $info );
	$output = $ultimatemember->account->get_tab_output('address');
	if ( $output ) { echo $output; }
}

add_filter('um_account_content_hook_address', 'um_account_content_hook_address');
function um_account_content_hook_address( $output ){
	ob_start();
	?>
	
	<div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-home"></i>Addresses</div>
	<div class="wc-address-page">
		<?php wc_get_template( 'myaccount/my-address.php' ); ?>
	</div>
	
	<?php 

	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}

// Courses Tab
add_filter('um_account_page_default_tabs_hook', 'nlc_umtab_courses', 1001 );
function nlc_umtab_courses( $tabs ) {
	$tabs[800]['courses']['icon'] = 'um-faicon-mortar-board';
	$tabs[800]['courses']['title'] = 'Courses';
	$tabs[800]['courses']['custom'] = true;
	return $tabs;
}

add_action('um_account_tab__courses', 'um_account_tab__courses');
function um_account_tab__courses( $info ) {
	global $ultimatemember;
	extract( $info );
	$output = $ultimatemember->account->get_tab_output('courses');
	if ( $output ) { echo $output; }
}

add_filter('um_account_content_hook_courses', 'um_account_content_hook_courses');
function um_account_content_hook_courses( $output ){
	ob_start();
	?>
	
	<div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-mortar-board"></i>Courses</div>
	<?php echo do_shortcode( '[usercourses]');

	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}

// Orders Tab
add_filter('um_account_page_default_tabs_hook', 'nlc_umtab_orders', 1002 );
function nlc_umtab_orders( $tabs ) {
	$tabs[800]['orders']['icon'] = 'um-faicon-shopping-cart';
	$tabs[800]['orders']['title'] = 'Orders';
	$tabs[800]['orders']['custom'] = true;
	return $tabs;
}

add_action('um_account_tab__orders', 'um_account_tab__orders');
function um_account_tab__orders( $info ) {
	global $ultimatemember;
	extract( $info );
	$output = $ultimatemember->account->get_tab_output('orders');
	if ( $output ) { echo $output; }
}

add_filter('um_account_content_hook_orders', 'um_account_content_hook_orders');
function um_account_content_hook_orders( $output ){
	ob_start();
	?>
	
	<div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-shopping-cart"></i>Orders</div>
	<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) );

	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}

// Subscriptions Tab
add_filter('um_account_page_default_tabs_hook', 'nlc_umtab_subscriptions', 1003 );
function nlc_umtab_subscriptions( $tabs ) {
	$tabs[800]['subscriptions']['icon'] = 'um-faicon-refresh';
	$tabs[800]['subscriptions']['title'] = 'Subscriptions';
	$tabs[800]['subscriptions']['custom'] = true;
	return $tabs;
}

add_action('um_account_tab__subscriptions', 'um_account_tab__subscriptions');
function um_account_tab__subscriptions( $info ) {
	global $ultimatemember;
	extract( $info );
	$output = $ultimatemember->account->get_tab_output('subscriptions');
	if ( $output ) { echo $output; }
}

add_filter('um_account_content_hook_subscriptions', 'um_account_content_hook_subscriptions');
function um_account_content_hook_subscriptions( $output ){
	ob_start();
	
	?>

	<div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-refresh"></i>Subscriptions</div>
		
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

						<p class="no_subscriptions"><?php printf( esc_html__( 'You have no active subscriptions. Find your first subscription in the %sNLC Shop%s.', 'woocommerce-subscriptions' ), '<a href="' . esc_url( apply_filters( 'woocommerce_subscriptions_message_store_url', get_permalink( woocommerce_get_page_id( 'shop' ) ) ) ) . '">', '</a>' ); ?></p>

					<?php endif; ?>

				</div><!-- /.woocommerce_account_subscriptions -->
	
	<?php

	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}

// Downloads Tab
add_filter('um_account_page_default_tabs_hook', 'nlc_umtab_downloads', 1004 );
function nlc_umtab_downloads( $tabs ) {
	$tabs[800]['downloads']['icon'] = 'um-faicon-download';
	$tabs[800]['downloads']['title'] = 'Downloads';
	$tabs[800]['downloads']['custom'] = true;
	return $tabs;
}

add_action('um_account_tab__downloads', 'um_account_tab__downloads');
function um_account_tab__downloads( $info ) {
	global $ultimatemember;
	extract( $info );
	$output = $ultimatemember->account->get_tab_output('downloads');
	if ( $output ) { echo $output; }
}

add_filter('um_account_content_hook_downloads', 'um_account_content_hook_downloads');
function um_account_content_hook_downloads( $output ){
	ob_start();
	?>
	
	<div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-download"></i>Downloads</div>
	
	<?php wc_get_template( 'myaccount/my-downloads.php' );

	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}