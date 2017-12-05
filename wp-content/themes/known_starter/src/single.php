
<?php get_header(); ?>

<img class="blog-hero" src="<?php the_field('cover_photo'); ?>" />

<?php include('components/blog-nav.php'); ?>

<div class="wysiwyg-content">

<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post(); ?>

		<h2 class="post-title">
				<?php the_title(); ?>
		</h2> <!-- .post-title -->
		<p class="byline">
			By <?php the_field('post_author');?> | <?php the_date('m/d/Y'); ?>
		</p>

		<div class="content-wrapper">
			<?php the_content(); ?>
		</div> <!-- .content-wrapper -->

	<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>

</div> <!-- .wysiwyg-content -->

<div id="author-about">
	<img id="about-logo" alt="preserve seal" src="<?bloginfo('template_directory');?>/img/blog/about-logo.png" />


	<div id="author-about-text-wrapper">
		<p id="author-about-title">
			By Preserve Brands
		</p>

		<p id="author-about-content">
			Bespoke specialty handmade paper products for everyday and seasonal gift packaging, parties and weddings, workspace organization, home decor and more!
		</p>
	</div> <!-- #author-about-text-wrapper -->

</div> <!-- author-about -->

<?php include('components/blog-grid.php'); ?>

<?php get_footer(); ?>
