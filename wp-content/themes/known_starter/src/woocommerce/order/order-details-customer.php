<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="woocommerce-customer-details">

	<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

		<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">

			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

				<?php endif; ?>

				<h3 class="woocommerce-column__title"><?php _e( 'Billing address', 'woocommerce' ); ?></h3>

				<address>
					<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
					<?php if ( $order->get_billing_phone() ) : ?>
						<p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
					<?php endif; ?>
					<?php if ( $order->get_billing_email() ) : ?>
						<p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
					<?php endif; ?>
				</address>

				<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

			</div><!-- /.col-1 -->

			<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">

				<h3 class="woocommerce-column__title"><?php _e( 'Shipping address', 'woocommerce' ); ?></h3>

				<address>
					<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
				</address>

			</div><!-- /.col-2 -->

		</section><!-- /.col2-set -->

	<?php endif; ?>

</section>
