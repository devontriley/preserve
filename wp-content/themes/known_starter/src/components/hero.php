<?php
/*
$registerURL = add_query_arg(array('login' => false, 'result' => false));
$registerURL = esc_url($registerURL);
$loginURL = add_query_arg('login', 'true');
$loginURL = esc_url($loginURL);
*/
?>

<?php
$image = get_sub_field('background_image');
$mobileImage = get_sub_field('mobile_image');
$fullViewport = get_sub_field('full_viewport');

if(is_404()) {
  $header = '404';
  $description = 'It seems that link doesn\'t exist';
  $image = get_bloginfo('template_directory').'/img/tees-not-trees/tees_not_trees_hero.jpg';
} elseif(is_singular('post')) {
  $image = get_field('cover_photo');
} else {
  $header = get_sub_field('header');
  $description = get_sub_field('description');
  $ctaText = get_sub_field('cta_text');
  $ctaDestination = get_sub_field('cta_page');
}


if(!$header){ $header = get_field('header'); }
if(!$description){ $description = get_field('description'); }
if(!$image){ $image = get_field('background_image'); }
if(!$mobileImage){ $mobileImage = get_field('mobile_image'); }
?>

<div class="hero <?php if($fullViewport){ echo 'fullViewport'; } ?>" <?php if($mobileImage === null){ echo 'style="background-image: url('.$image.');"'; }?>>
  <div class="content">
    <div class="inner">
      <h1><?php echo $header ?></h1>
      <img src="<?php bloginfo('template_directory'); ?>/img/hero_divider.png" width="265px" class="hero-divider" />
      <?php if($fullViewport) { ?>
        <img src="<?php bloginfo('template_directory');?>/img/plant_hero.png" class="plant-divider" />
      <?php } ?>
      <?php echo $description ?>
      <?php if(is_front_page()){ ?>
        <a class="hero-cta" href="<?php echo get_bloginfo('url'); ?>/shop-coming-soon">
            Shop exclusive products
            <svg class="right-arrow" height="10" viewBox="0 0 5.41 10">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use>
            </svg>
        </a><!-- .hero-cta -->
      <?php } ?>
      <?php if($ctaText && $ctaDestination){
        foreach($ctaDestination as $p):
          echo '<a class="hero-cta" href="'. get_permalink($p->ID) .'">';
          echo $ctaText; ?>
          <svg class="right-arrow" height="10" viewBox="0 0 5.41 10">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right-arrow"></use>
          </svg> <?php
          echo '</a><!-- .hero-cta -->';
        endforeach;
      }?>
    </div>
    <?php if($featured) { button('Read Article', get_the_permalink($featured)); } ?>
  </div>
  <?php if($mobileImage) { ?>
    <picture>
      <source srcset="<?php echo $image; ?>" media="(min-width: 768px)" />
        <img src="<?php echo $mobileImage; ?>" />
    </picture>
  <?php } ?>
  <?php if($fullViewport){ ?>
    <!-- <div class="learn-more">
      LEARN MORE
      <svg width="31px" height="11px" viewBox="0 0 31 11">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g transform="translate(-705.000000, -778.000000)" stroke="#B99656 ">
                  <polyline points="705 779 720.253968 788 736 779"></polyline>
              </g>
          </g>
      </svg>
    </div> -->
  <?php } ?>
</div>

<?php if(is_page(array(139))) { // Wholesale Inquiries ?>
<div class="page-nav-bar">
  <div><a href="<?php echo the_permalink(); ?>" <?php if(!isset($_GET['tab']) || $_GET['tab'] !== 'custom-products'){ echo 'class="active"'; } ?>>Product Categories</a></div>
  <div><a href="<?php echo the_permalink(); ?>?tab=custom-products" <?php if($_GET['tab'] === 'custom-products'){ echo 'class="active"'; } ?>>Custom Products</a></div>
</div>
<?php } ?>
