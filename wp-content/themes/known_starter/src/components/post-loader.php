<?php

$currentPage = $_GET['zarah'];

$args = array(
  'paged' => $currentPage + 1,
  'posts_per_page' => 1
);

$query = new WP_Query($args);

if($query->have_posts()){
  while($query->have_posts()){

    $query->the_post();
    echo get_the_title();
  }
}

?>
