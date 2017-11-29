<?php

if(is_page('blog')){
  $headerGraphic = get_field('blog_hero_header_graphic');
  $header = get_field('blog_hero_header');
  $bodyCopy = get_field('blog_hero_body_copy');
  $fixedImage = get_field('blog_hero_fixed_background_image');
  $Format5050 = get_field('blog_hero_5050_format');
  $greyBG = get_field('blog_hero_grey_background');
  $displayProcess = get_field('blog_hero_display_paper_process');
  $imageSlider = get_field('blog_hero_auto_image_slider');
  if($imageSlider){
  $images = get_field('blog_hero_images');
  }
}

else {
  $headerGraphic = get_sub_field('header_graphic');
  $header = get_sub_field('header');
  $bodyCopy = get_sub_field('body_copy');
  $fixedImage = get_sub_field('fixed_background_image');
  $Format5050 = get_sub_field('5050_format');
  $greyBG = get_sub_field('grey_background');
  $displayProcess = get_sub_field('display_paper_process');
  $imageSlider = get_sub_field('auto_image_slider');
  if($imageSlider){
  $images = get_sub_field('images');
  }
}
?>


<div class="flexible-content <?php if($imageSlider){ echo 'has-image-slider'; } if($fixedImage){ echo ' has-fixed-image'; } if($Format5050){ echo ' format-5050'; } if($greyBG){ echo ' grey-bg'; } ?>" <?php if($fixedImage){ echo 'style="background-image: url('.$fixedImage.');"'; } ?>>
  <div class="content">
    <div class="inner">
      <?php if($headerGraphic){ ?>
        <div class="image">
          <img src="<?php echo $headerGraphic; ?>" />
        </div>
      <?php } ?>
      <div class="inner-content">
        <?php if($header){ ?>
            <h2 class="module-header"><?php echo $header; ?></h2>
        <?php }?>
        <?php if($bodyCopy) { ?>
          <?php echo $bodyCopy; ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php if($images) { ?>
    <div class="auto-image-slider">
      <ul>
        <?php foreach($images as $image) {
          echo '<li><img src="'.$image['image'].'" /></li>';
        } ?>
      </ul>
    </div>
  <?php } ?>
  <?php if($displayProcess){ ?>
    <div class="paper-process">
      <div>
        <p class="num">{1}</p>
        <p class="name">From tee shirts...</p>
        <img src="<?php bloginfo('template_directory'); ?>/img/tees-not-trees/1-From_Tee_Shirts.jpg" />
      </div>
      <div>
        <p class="num">{2}</p>
        <p class="name">To pulp...</p>
        <img src="<?php bloginfo('template_directory'); ?>/img/tees-not-trees/2-To_Pulp.jpg" />
      </div>
      <div>
        <p class="num">{3}</p>
        <p class="name">To paper...</p>
        <img src="<?php bloginfo('template_directory'); ?>/img/tees-not-trees/3-To_Paper.jpg" />
      </div>
      <div class="full">
        <p class="num">{4}</p>
        <p class="name">To product</p>
        <img src="<?php bloginfo('template_directory'); ?>/img/tees-not-trees/4-To_Product.jpg" />
      </div>
    </div>
  <?php } ?>
</div>

<?php $headerGraphic = $header = $bodyCopy = $fixedImage = $Format5050 = $imageSlider = $images = null; ?>
