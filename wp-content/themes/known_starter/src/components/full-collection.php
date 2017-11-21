<?php
$content = get_sub_field('content');
$image = get_sub_field('image');
?>

<div class="full-collection">
  <div class="image">
    <img src="<?php echo $image; ?>" />
  </div>
  <div class="content">
    <?php echo $content; ?>
  </div>
</div>
