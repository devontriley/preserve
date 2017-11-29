<style>

.post-title {
	text-transform: none;
	margin: 0px;
	letter-spacing: 0;
}

.byline:after {
	content: "";
  display: block;
  margin: 2rem 0 0 0;
  width: 15rem;
  border-top: 1px solid #b99656;
}

</style>

<?php get_header(); ?>

<?php include('components/hero.php'); ?>

<!-- add cover photo here -->

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

		<?php the_content(); ?>

		<?php include("components/share.php"); ?>

	<?php endwhile; ?>

	<?php else : ?>

	<p>
		There is nothing to display.
	</p>

<?php endif; ?>

</div> <!-- .wysiwyg-content -->

<?php include("components/blog-grid.php"); ?>

<?php get_footer(); ?>
