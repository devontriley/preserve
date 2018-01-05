<?php // Template Name: Blog ?>

<?php get_header(); ?>

<?php
$featured = get_field('featured_post');
if($featured) {
  include('components/hero.php');
}

$args = array(
  'post_type' => 'post',
  'posts_per_page' => -1
);
$query = new WP_Query($args);

if($query->have_posts()) : ?>

  <div class="article-grid">
    <?php
    $counter = 1;
    $group_counter = 1;
    $reverse = false;
    $total = $query->found_posts;
    while($query->have_posts()) : $query->the_post();

    if($group_counter === 1)
    {
      echo '<div class="article-group">';
    }

      if(($reverse === false && ($group_counter === 1 || $group_counter === 2)) || ($reverse === true && ($group_counter === 1 || $group_counter === 5)))
      {
        echo '<div class="half">';
      }

        include('components/article-thumbnail.php');

      if(($reverse === false && ($group_counter === 1 || $group_counter === 5)) || ($reverse === true && ($group_counter === 4 || $group_counter === 5)))
      {
        echo '</div><!-- .half -->';
      }

    if($group_counter === 5 || $counter == $total)
    {
      echo '</div><!-- .article-group -->';
    }

    $counter++;
    $group_counter++;
    if($group_counter === 6){
      $reverse = !$reverse;
      $group_counter = 1;
    }
    endwhile;
    ?>
  </div>

<?php else : ?>

  <div class="simple-content">
    <div class="content">
      There are no posts to display
    </div>
  </div>

<?php endif; ?>

<?php get_footer(); ?>
