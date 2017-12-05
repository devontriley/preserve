<?php get_header(); ?>
<?php include('components/hero.php'); ?>
<?php include('components/blog-nav.php'); ?>

	<div class="search-result-content">
			<h1>
				<?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>
			</h1>

			<?php get_template_part('loop'); ?>

		</section>
		<!-- /section -->
	</div> <!-- .search-result-content -->

<?php get_footer(); ?>
