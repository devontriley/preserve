
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

<div>
	<!-- put in preserve seal here, decide whether pic or css --> 
</div>

<?php include('components/blog-grid.php'); ?>

<?php get_footer(); ?>
