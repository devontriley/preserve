<?php get_header(); ?>

<?php
if(class_exists('woocommerce')){
  if( is_cart() || is_checkout() ) {
    if(have_posts()) : while(have_posts()) : the_post();

      echo '<div class="default-wysiwyg">';
      the_content();
      echo '</div><!-- .default-wysiwyg -->';

    endwhile; endif;
  }
}
?>

<?php include('components.php'); ?>

<?php get_footer(); ?>
