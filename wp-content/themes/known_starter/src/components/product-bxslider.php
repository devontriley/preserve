<?php

// $query_images_args = array(
//     'post_type'      => 'attachment',
//     'page'           => '',
//     'post_mime_type' => 'image',
//     'post_status'    => 'inherit',
//     'posts_per_page' => - 1,
// );
//
// $query_images = new WP_Query( $query_images_args );
//
// //print_r($query_images);
//
// if( $query_images->have_posts() ){
//     echo '<ul class="gallery-bxslider">';
//     while( $query_images->have_posts() ) {
//         $query_images->the_post();
//
//         foreach( $query_images->posts as $image){
//             echo '<li>'. wp_get_attachment_url($image->ID) .'</li>';
//         }
//     }
// }
// echo '</ul><!-- .gallery-bxslider-->';
// wp_reset_postdata();

global $post, $product;
$galleryIds = get_gallery_image_ids($product);
$mainImage = get_image_id($product);

//print_r($product);
// echo $mainImage;
//print_r($post);

?>
