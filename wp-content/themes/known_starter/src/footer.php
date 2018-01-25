<?php
//if( class_exists('woocommerce') ) :

	//if( is_cart() || is_checkout() ) : ?>

	<!-- <div id="cart-footer">
		<div class="inner">
			<div class="logo">
				<svg viewBox="0 0 101 29">
  				<use xlink:href="#logo-horiz"></use>
  			</svg>
			</div>
			<div class="cards">
				<img src="<?php bloginfo('template_directory'); ?>/img/shop/preserve_brands-cart-visa.jpg" alt="Visa"/>
				<img src="<?php bloginfo('template_directory'); ?>/img/shop/preserve_brands-cart-mastercard.jpg" alt="Mastercard"/>
			</div>
			<div class="contact">
				<a href="<?php bloginfo('url'); ?>/contact">CONTACT US</a>
			</div>
		</div>
	</div> -->

<?php //else : ?>

<?php if(!is_page('shop-coming-soon')){ include('components/newsletter-signup.php'); } ?>

<div id="primary-footer">
	<div class="logo">
		<svg width="160" viewBox="0 0 101 50">
			<use xlink:href="#logo-vert"></use>
		</svg>
	</div>
	<nav>
		<?php wp_nav_menu(array('menu' => 'footer')); ?>
	</nav>
	<div class="icons">
		<a href="https://twitter.com/preserve01" target="_blank">
			<svg width="22" viewBox="0 0 30 25">
				<use xlink:href="#twitter-icon"></use>
			</svg>
		</a>
		<a href="https://www.instagram.com/preservebrands/" target="_blank">
			<svg width="22" viewBox="0 0 30 29">
				<use xlink:href="#instagram-icon"></use>
			</svg>
		</a>
		<a href="https://www.pinterest.com/preservebrands/" target="_blank">
			<svg width="22" viewBox="0 0 30 29">
				<use xlink:href="#pinterest-icon"></use>
			</svg>
		</a>
		<a href="https://www.facebook.com/preservebrands/" target="_blank">
			<svg width="22" viewBox="0 0 30 30">
				<use xlink:href="#facebook-icon"></use>
			</svg>
		</a>
	</div>
	<p class="copyright">
		Copyright &copy; <?php echo date('Y'); ?> Preserve Brands. All Rights Reserved
	</p>
</div>

<?php
	//endif;
//endif;
?>

<?php //include('components/newsletter-modal.php'); ?>

<?php wp_footer(); ?>

<!-- analytics -->
<script>
(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
ga('send', 'pageview');
</script>

</body>
</html>
