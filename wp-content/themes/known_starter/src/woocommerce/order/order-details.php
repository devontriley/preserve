<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! $order = wc_get_order( $order_id ) ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}
?>
<section class="woocommerce-order-details">

	<div class="order-received-header">
    <h2 class="woocommerce-order-details__title">
      <?php _e( 'Order Received!', 'woocommerce' ); ?>
    </h2>
    <p>Thank you for choosing Preserve. Your order has been received.</p>
  </div>

  <h3>Order Details</h3>

  <div id="order-received-details">
    <div class="inner">
      <div class="col">
        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
          <tbody>
            <tr>
                <td>
                  Order Number:<br />
                  <strong><?php echo $order->get_order_number(); ?></strong>
                </td>
            </tr>
            <tr>
                <td>
                  Order Date:<br />
                  <strong><?php echo $order->order_date; ?></strong>
                </td>
            </tr>
            <tr>
                <td>
                  Total:<br />
                  <strong>$<?php echo $order->get_total(); ?></strong>
                </td>
            </tr>
            <tr>
                <td>
                  Payment Method:<br />
                  <strong><?php echo $order->get_payment_method(); ?></strong>
                </td>
            </tr>
          </tbody>
        </table>
      </div><!-- .col -->

      <div class="col">
				<table class="woocommerce-table shop_table">
        <?php
  				foreach ( $order_items as $item_id => $item ) {
  					$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );

  					wc_get_template( 'order/order-details-item.php', array(
  						'order'			     => $order,
  						'item_id'		     => $item_id,
  						'item'			     => $item,
  						'show_purchase_note' => $show_purchase_note,
  						'purchase_note'	     => $product ? $product->get_purchase_note() : '',
  						'product'	         => $product,
  					) );
  				}
  			?>
				</table>
        <?php do_action( 'woocommerce_order_items_table', $order ); ?>
      </div><!-- .col -->
    </div>
  </div>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

</section>

<?php
if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
?>

<div id="get-inspired">
  <img src="<?php bloginfo('template_directory'); ?>/img/shop/preserve_brands-order_confirmation-floral.png" />
  <h2>Get Inspired!</h2>
  <p>Exicted about getting your Preserve products? Head on over to our blog to get some inspiration for your gift giving!<p>
    <a href="<?php bloginfo('url');?>/inspiration" class="btn outline"><span>Preserve Inspiration</span><svg class="right-arrow" height="10" viewBox="0 0 5.41 10"><use href="#right-arrow"></use></svg></a>
</div><!-- #get-inspired -->
