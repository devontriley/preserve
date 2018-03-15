<?php

$currentPostCats = wp_get_post_categories($post->ID);

if($teesNotTrees) {
  $header = 'All Preserve Products Are Made With Tees Not Trees&trade;';
  $bodyCopy = '<p>Born out of a desire to celebrate planet earth, art, ideation, and creation, Preserve’s mission is to promote environmentally safe specialty paper products. We source 100% tee shirt remnants from the apparel industry that would otherwise end up in landfills, turning them into objects of inspiration and impact. Every product we create balances elegance and sustainability, place and purpose—helping provide a healthier, more beautiful world.</p>';
  $fixedImage = get_bloginfo('template_directory').'/img/home/tees_not_trees.jpg';
}

elseif(is_page('Inspiration')){
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

elseif(class_exists('woocommerce') && (is_shop() || is_product_category())){
  $shopID = intVal(get_option('woocommerce_shop_page_id'));
  
  $headerGraphic = get_field('header_graphic', $shopID);
  $header = get_field('header', $shopID);
  $bodyCopy = get_field('body_copy', $shopID);
  $greyBG = get_field('grey_background', $shopID);
}

elseif (is_category()) {
  $headerGraphic = get_field('header_graphic', 'category_' . $currentPostCats[0]);
  $header = get_field('header', 'category_' . $currentPostCats[0]);
  $bodyCopy = get_field('body_copy', 'category_' . $currentPostCats[0]);
  $fixedImage = get_field('fixed_background_image', 'category_' . $currentPostCats[0]);
  $Format5050 = get_field('5050_format', 'category_' . $currentPostCats[0]);
  $greyBG = get_field('grey_background', 'category_' . $currentPostCats[0]);
  $displayProcess = get_field('display_paper_process', 'category_' . $currentPostCats[0]);
  $imageSlider = get_field('auto_image_slider', 'category_' . $currentPostCats[0]);
  if($imageSlider){
  $images = get_field('images', 'category_' . $currentPostCats[0]);
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


        <?php if(is_page('shop-coming-soon')) : ?>
          <div id="notify-me">
            <div class="newsletter-signup">
              <p>Notify me when the shop goes live:</p>
            <div class="content">
            <div id="mc_embed_signup">
              <form action="//preservebrands.us16.list-manage.com/subscribe/post?u=7df2ba034c9d88245475dc567&amp;id=7795d35645" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div class="mc-field-group">
                    	<input type="email" value="" name="EMAIL" placeholder="Enter your email here" class="required email" id="mce-EMAIL">
                    </div>
                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7df2ba034c9d88245475dc567_7795d35645" tabindex="-1" value=""></div>
                  <input type="submit" value="Notify Me!" name="subscribe" id="mc-embedded-subscribe" class="button">
                  <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div>
              </form>
            </div>
            <!-- <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script> -->
            <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/mc-validate.js'></script>
            <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if(class_exists('woocommerce') && is_product() ) { button( 'Learn More', get_bloginfo('url').'/tees-not-trees' ); } ?>
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
