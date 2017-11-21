<?php
$collection = get_sub_field('collection');
$image = get_sub_field('image');
$image_src = wp_get_attachment_image_src($image, 'full');
if($collection && $image_src) {
?>

<div class="next-collection">
  <div class="col cta">
    <div>
      <h3><?php echo get_the_title($collection); ?></h3>
      <?php button('View Collection >', get_the_permalink($collection), 'none'); ?>
    </div>
  </div>
  <div class="col">
    <div class="image">
      <img src="<?php echo $image_src[0]; ?>" />
    </div>
  </div>
</div>

<?php } ?>
