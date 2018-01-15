<?php get_header(); ?>

<?php
<<<<<<< HEAD
  if( is_cart() || is_checkout() ) {
=======
  if( is_cart() ) {
>>>>>>> cae388beb6c67a14a89aa935404a6e69baf8a313
    if(have_posts()) : while(have_posts()) : the_post();

      the_content();

    endwhile; endif;
  }
?>

<?php include('components.php'); ?>

<?php get_footer(); ?>
