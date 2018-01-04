<?php
global $wp_query;

$termCat = $wp_query->get_queried_object()->term_id;

$args = array(
  'taxonomy' => 'product_cat',
  'title_li' => ''
);

$shopCategories = get_categories($args);
$active = is_shop() ? 'active' : '';

if($shopCategories){

  echo '<div class="page-nav-bar"><div class="inner">';

  echo '<div><a href="'. get_bloginfo('url') .'/shop" class="'. $active .'" data-cat="0">All</a></div>';

  foreach($shopCategories as $c){

    $catLink = get_term_link( $c->term_id );
    $active = ($termCat === $c->term_id) ? 'active' : '';

    echo '<div><a href="'. $catLink .'" class="'. $active .'" data-cat="'. $c->term_id .'">'. $c->name .'</a></div>';

  }

  echo '</div></div><!-- .page-nav-bar -->';

}

?>
