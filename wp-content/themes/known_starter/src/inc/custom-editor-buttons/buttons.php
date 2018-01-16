<?php

add_shortcode( 'product-grid', 'customProductGrid' );

function customProductGrid( $atts ) {
  extract(shortcode_atts(array(
    'products' => ''
  ), $atts));

  if( !empty($atts['products'] )) {

    $productsArr = explode(', ', $atts['products']);
    $productsArr = array_slice($productsArr, 0, 4);

    $args = array(
      'post_type' => 'product',
      'post__in' => $productsArr
    );

    $products = new WP_Query( $args );

    if($products->have_posts()) :

      $html = '<ul class="products">';

      while($products->have_posts()) : $products->the_post();

        $wcProducts = wc_get_product($products->post->ID);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $products->post->ID ) );

        $html .= '<li class="product">';
        $html .= '<a href="'. get_the_permalink() .'">';
        $html .= '<img src="'. $image[0] .'" />';
        $html .= '<h2>'. get_the_title() .'</h2>';
        $html .= '<span class="price">';
        if($wcProducts->get_sale_price()) {
          $html .= '<del>'. $wcProducts->get_regular_price() .'</del>';
          $html .= '<ins>'. $wcProducts->get_sale_price() .'</ins>';
        } else {
          $html .= '<span>'. $wcProducts->get_regular_price() .'</span>';
        }
        $html .= '</span>';
        $html .= '</a>';
        $html .= '</li>';

      endwhile;

      $html .= '</div>';

    endif;

    wp_reset_query();

    return $html;

  }
}


add_action( 'init', 'customEditorButtons' );

function customEditorButtons() {
  add_filter( 'mce_external_plugins', 'customEditorAddButtons' );
  add_filter( 'mce_buttons', 'customEditorRegister' );
}

function customEditorAddButtons( $plugin_array ) {
  $plugin_array['custom-buttons'] = get_template_directory_uri() . '/inc/custom-editor-buttons/custom-buttons.js';
  return $plugin_array;
}

function customEditorRegister( $buttons ) {
  array_push( $buttons, 'products' );
  return $buttons;
}





















?>
