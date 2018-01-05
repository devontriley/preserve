<?php
if(is_page(82)) {
  $header = get_the_title($featured);
  $description = 'Excerpt from here somehow';
} elseif(is_singular('post')) {
  $header = get_the_title();
  $size = 'md';
} else {
  $header = get_sub_field('header');
  $description = get_sub_field('description');
  (is_page(array(49, 139))) ?  $size = 'sm' : $size = 'full';
}
$image = get_sub_field('background_image');
$darkText = get_sub_field('dark_text');
?>

<div class="hero <?php echo $size .' '. (get_sub_field('overlay_box') ? 'overlay_box' : null); if($darkText){ echo 'dark-text'; }?>" style="background-image: url(<?php echo $image ?>);">
  <div class="content">
    <?php if(is_front_page()) { ?>
    <p class="preheader">
      Preserve Brands
    </p>
    <?php } ?>
    <h1>
      <?php echo $header ?>
    </h1>
    <p>
      <?php echo $description ?>
    </p>
    <?php if($featured) {
      button('Read Article', get_the_permalink($featured));
    } ?>
  </div>
</div>

<?php if(is_single(array(73, 237))) { // Wedding ?>
<div class="page-nav-bar">
  <header>Gifts for:</header>
  <div><a href="<?php the_permalink(73); ?>" <?php if($post->ID === 73){echo 'class="active"'; } ?>>Attending a Wedding</a></div>
  <div><a href="<?php the_permalink(237); ?>" <?php if($post->ID === 237){echo 'class="active"'; } ?>>Hosting a Wedding</a></div>
</div>
<?php } ?>
