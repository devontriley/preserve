
<?php get_header();

$srcset = wp_get_attachment_image_srcset(get_field('cover_photo'));

 ?>

<img class="blog-hero" srcset="<?php echo esc_attr($srcset); ?>" src="<?php the_field('cover_photo'); ?>" />

<?php include('components/blav.php'); ?>

<div class="wysiwyg-content">

<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post();
				$category = get_the_category();
	?>

		<h2 class="post-title">
				<?php the_title(); ?>
		</h2> <!-- .post-title -->
		<p class="byline">
			By <?php the_field('post_author');?> | <?php the_date('m/d/Y'); ?> | <?php echo $category[0]->cat_name ?>
		</p>

		<div class="content-wrapper">
			<?php the_content(); ?>
		</div> <!-- .content-wrapper -->

	<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>

</div> <!-- .wysiwyg-content -->

<div id="author-about">
	<img id="about-logo" alt="preserve seal" src="<?bloginfo('template_directory');?>/img/blog/about-logo.jpg" />


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
