<?php get_header(); ?>

<?php
  if( is_cart() ) {
    if(have_posts()) : while(have_posts()) : the_post();

      the_content();

    endwhile; endif;
  }
?>

<?php include('components.php'); ?>

<?php get_footer(); ?>
