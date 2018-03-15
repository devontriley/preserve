<?php
global $wp_query;

$termCat = $wp_query->get_queried_object()->term_id;

$args = array(
  'taxonomy' => 'product_cat',
  'title_li' => ''
);

$queryCat = get_query_var('prod_cat');
$shopCategories = get_categories($args);

if($shopCategories){

  echo '<div class="page-nav-bar"><div class="inner">';

  echo '<div><a href="'. get_bloginfo('url') .'/shop" class="'. (!$queryCat ? 'active' : '') .'" data-cat="0" data-slug="all">All</a></div>';

  foreach($shopCategories as $c){

    $active = false;
    $catLink = get_term_link( $c->term_id );
    if(($queryCat && $queryCat === $c->slug) || ($termCat === $c->term_id)) {
      $active = true;
    }

    echo '<div><a href="'. $catLink .'" class="'. ($active ? 'active' : '')  .'" data-cat="'. $c->term_id .'" data-slug="'. $c->slug .'">'. $c->name .'</a></div>';

  }

  echo '</div></div><!-- .page-nav-bar -->';

}

?>
