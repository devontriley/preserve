<?php
$header = is_page(14) ? 'Find Preserve At' : 'Our Retail Partners';
$logos = get_field('logos', 'options');
$buttonText = 'Where to Buy';
$buttonURL = get_the_permalink(80);
if($logos) {
?>

<div class="logo-grid">
  <div class="content">
    <h2><?php echo $header ?></h2>
    <div class="logos">
      <?php
      $counter = 1;
      foreach($logos as $logo) { ?>
        <div class="logo">
          <img src="<?php echo $logo['logo'] ?>" />
        </div>
      <?php
        $counter++;
        if(is_page(14) && $counter === 7) {
          break;
        }
      }
      ?>
    </div>
    <?php if(is_page(14)){ button($buttonText, $buttonURL); } ?>
  </div>
</div>

<?php } ?>
