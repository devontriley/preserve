<?php get_header(); ?>

<?php
if(class_exists('woocommerce')){
  if( is_cart() ) {
    if(have_posts()) : while(have_posts()) : the_post();

      the_content();

    endwhile; endif;
  }
}
?>

<?php include('components.php'); ?>

<?php get_footer(); ?>
