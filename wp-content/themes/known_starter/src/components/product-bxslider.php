<?php

global $post, $product;
$mainImage = $product->get_image_id();
$galleryIds = $product->get_gallery_image_ids();
// $allImages = array_unshift($galleryIds, $mainImage);
//
// echo($allImages);  // i keep just getting the number 4 here


if($mainImage || $galleryIds){
  echo '<div id="gallery-bxslider">';

  if($mainImage){
    echo '<div>'. wp_get_attachment_image($mainImage) .'</div>';
  }

  foreach($galleryIds as $id){
    echo '<div>'. wp_get_attachment_image($id) .'</div>';
  }

  echo '</div><!-- #gallery-bxslider-->';

  echo '<ul id="bxslider-pager">';
  echo '<li><a href="">'. wp_get_attachment_image($mainImage) .'</a></li>';
  foreach($galleryIds as $id){
    echo '<li><a href="">'. wp_get_attachment_image($id) .'</a></li>';
  }
  echo '</ul><!- #bxslider-pager-->';
}

?>
