<?php
$content = get_sub_field('content');
$fixed_image = get_sub_field('fixed_background_image');
?>

<div class="simple-content" <?php if($fixed_image){ echo 'style="background-image: url('.$fixed_image.');"'; } ?>>
  <div class="content">
    <?php echo $content; ?>
  </div>
</div>
