<?php
$slides = get_sub_field('slides');
$total = count($slides);
if($slides)
{ ?>
  <div class="fullscreen-slider">
  <div class="slides">
  <?php for($i = 0; $i < $total; $i++) { ?>
    <div class="slide <?php if($i === 0){ echo 'active'; } ?>" style="background-image: url(<?php echo $slides[$i]['image']; ?>);">
      <div class="content">
        <h2><?php echo $slides[$i]['header']; ?></h2>
        <?php button($slides[$i]['text'], $slides[$i]['url']); ?>
      </div>
    </div>
  <?php } ?>
  </div>
  </div>
<?php } ?>
