<?php
  $header = get_sub_field('header');
  $paragraph = get_sub_field('paragraph');
  $image = get_sub_field('image');
  $image_src = wp_get_attachment_image_src($image, 'full');
  $image_first = get_sub_field('image_first');
  $image_cornered = get_sub_field('image_cornered_position');
  $is_icon = get_sub_field('is_icon');
?>

<div class="content-image-column <?php if($image_first){ echo 'image-first'; } ?> <?php if($image_cornered){ echo 'cornered'; } ?>">
  <div class="col content">
    <div class="inner">
      <h2><?php echo $header ?></h2>
      <?php echo $paragraph ?>
    </div>
  </div>
  <div class="col image <?php if($is_icon){ echo 'is-icon'; } ?>">
    <div class="inner">
      <img src="<?php echo $image_src[0]; ?>" />
    </div>
  </div>
</div>
