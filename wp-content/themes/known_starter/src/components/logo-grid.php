<?php
$header = get_sub_field('header');
$logo = get_sub_field('logos');
$buttonText = get_sub_field('text');
$buttonURL = get_sub_field('url');
?>

<div class="logo-grid">
  <div class="content">
    <h2>HEADER HERE</h2>
    <div class="logos">
      <div class="logo">
        Logo here
      </div>
      <div class="logo">
        Logo here
      </div>
      <div class="logo">
        Logo here
      </div>
      <div class="logo">
        Logo here
      </div>
      <div class="logo">
        Logo here
      </div>
    </div>
    <?php button($buttonText, $buttonURL); ?>
  </div>
</div>
