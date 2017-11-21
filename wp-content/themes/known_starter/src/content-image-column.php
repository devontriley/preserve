<?php
$header = get_sub_field('header');
$paragraph = get_sub_field('paragraph');
$image = get_sub_field('image');
$image_src = wp_get_attachment_image_src($image, 'full');
$image_first = get_sub_field('image_first');
?>

<div class="content-image-column <?php if($image_first){ echo 'image-first'; } ?>">
  <div class="col">
    <div class="inner">
      <h2><?php echo $header ?></h2>
      <?php echo $paragraph ?>
    </div>
  </div>
  <div class="col">
    <div class="inner">
      <img src="<?php echo $image_src[0]; ?>" />
    </div>
  </div>
</div>
