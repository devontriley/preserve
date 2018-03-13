<?php global $woocommerce; ?>

<div class="cart-count">
  <a href="<?php echo $woocommerce->cart->get_cart_url() ?>/">
    <svg width="34px" height="27px" viewBox="0 0 33.68 26.88">

      <?php
      $cartCount = WC()->cart->get_cart_contents_count();
      if($cartCount == 0) {
        echo '<text transform="translate(15 11.32)">0</text>';
      } elseif($cartCount < 10) {
        echo '<text transform="translate(15 11.32)">'.$cartCount.'</text>';
      } elseif($cartCount < 100) {
        echo '<text transform="translate(11.32 11.32)">'.$cartCount.'</text>';
      } elseif($cartCount >= 100) {
        echo '<circle r="5" transform="translate(18 8)"></circle>';
      }
      ?>

      <path d="M33.65,7.7c-.13-.19-.35-.3-1.07-.3L29,17.49H9.85L5.1.52A.72.72,0,0,0,4.41,0H.71a.72.72,0,0,0,0,1.43H3.87l4.5,16.06a3,3,0,1,0,.05,6.06h.91a2.34,2.34,0,1,0,4.3,0h7.56a2.3,2.3,0,0,0-.23,1,2.33,2.33,0,0,0,4.66,0h0a2.3,2.3,0,0,0-.23-1h1.26a.72.72,0,0,0,0-1.43H8.42a1.61,1.61,0,0,1-.25-3.21H29.56a.71.71,0,0,0,.7-.6l3.38-9.65C33.81,8.09,33.78,7.88,33.65,7.7Zm-10.36,16a.91.91,0,1,1-.91.91h0a.9.9,0,0,1,.86-.94h.05Zm-11.81-.11a.91.91,0,1,1-.91.91h0a.91.91,0,0,1,.87-.95h0Z" transform="translate(-0.07)"/>
    </svg>
  </a>
</div>
