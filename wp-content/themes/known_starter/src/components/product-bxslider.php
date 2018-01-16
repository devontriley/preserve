<?php

global $post, $product;
$mainImage = $product->get_image_id();
$galleryIds = $product->get_gallery_image_ids();
array_unshift($galleryIds, $mainImage); //adds main image to gallery array

echo '<div id="product-bxslider" class="load-delay">';
if($mainImage || $galleryIds){
  echo '<ul id="gallery-bxslider">';

  foreach($galleryIds as $id){
    echo '<li>'. wp_get_attachment_image($id, $size='large') .'</li>';
  }
  echo '</ul><!-- #gallery-bxslider-->';


  echo '<ul id="bxslider-pager">';
  $indexCount = 0;

  foreach($galleryIds as $id){
    echo '<li data-slideIndex="'. $indexCount .'">'. wp_get_attachment_image($id) .'</li>';
    $indexCount++;
  }
  echo '</ul><!- #bxslider-pager-->';
}
echo '</div><!-- #product-bxslider -->';
?>
