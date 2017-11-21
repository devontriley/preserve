<?php get_header(); ?>

<?php include('components/hero.php'); ?>

<div class="wysiwyg-content">

<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post(); ?>

		<p class="intro">
				This is where the large blog article intro goes
		</p>

		<?php the_content(); ?>

		<?php include("components/share.php"); ?>

	<?php endwhile; ?>

	<?php else : ?>

	<p>
		There is nothing to display.
	</p>

<?php endif; ?>

</div>

<?php include("components/related-articles.php"); ?>

<?php get_footer(); ?>
