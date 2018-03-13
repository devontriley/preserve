<?php
$nav = wp_nav_menu(array(
  'menu' => 'primary-nav',
  'container' => '',
  'echo' => false
));
?>

<div id="primary-header">
  <nav id="primary-nav">
    <?php echo $nav; ?>

    <?php include('/preserve/wp-content/themes/known_starter/src/inc/header-cart.php'); ?>

    <!-- <div class="social">
      <a href="https://twitter.com/preserve01" target="_blank">
  			<svg width="22" viewBox="0 0 30 25">
  				<use xlink:href="#twitter-icon"></use>
  			</svg>
  		</a>
      <a href="https://www.facebook.com/preservebrands/" target="_blank">
  			<svg width="22" viewBox="0 0 30 30">
  				<use xlink:href="#facebook-icon"></use>
  			</svg>
  		</a>
      <a href="https://www.pinterest.com/preservebrands/" target="_blank">
  			<svg width="22" viewBox="0 0 30 29">
  				<use xlink:href="#pinterest-icon"></use>
  			</svg>
  		</a>
      <a href="https://www.instagram.com/preservebrands/" target="_blank">
  			<svg width="22" viewBox="0 0 30 29">
  				<use xlink:href="#instagram-icon"></use>
  			</svg>
  		</a>
    </div> -->
    <div class="hamburger">
      <a href="#">
        <svg viewBox="0 0 20 12">
          <g id="close_paths">
            <rect x="9" y="-1.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.3137 8.8284)" width="2" height="14.9"/>
            <rect x="2.5" y="5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.3137 8.8284)" width="14.9" height="2"/>
          </g>
          <g id="hamburger_paths">
            <rect y="10" width="20" height="2"/>
            <rect y="5" width="20" height="2"/>
            <rect width="20" height="2"/>
          </g>
        </svg>
      </a>
    </div>
  </nav>

  <div id="primary-logo">
    <a href="<?php bloginfo('url'); ?>/">
      <svg width="101" viewBox="0 0 101 50">
  			<use xlink:href="#logo-horiz"></use>
  		</svg>
    </a>
  </div>

  <?php include('/preserve/wp-content/themes/known_starter/src/inc/header-cart.php'); ?>

  <a href="<?php bloginfo('url'); ?>/shop-coming-soon" class="shop">Shop</a>
</div>
