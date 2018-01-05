<?php include('components/newsletter-signup.php'); ?>

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

<!--
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/bower_components/jquery/dist/jquery.min.js" /></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/bower_components/bxslider-4/dist/jquery.bxslider.min.js" /></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/scripts.js" /></script>
-->

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
