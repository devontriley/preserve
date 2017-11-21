<?php
$header = get_sub_field('header');
if(!$header){ $header = 'Join the Community'; }
?>
<div class="newsletter-signup">
  <div class="content">
    <h2><?php echo $header ?></h2>
    <form>
      <div>
        <label>EMAIL ADDRESS:</label>
        <input type="text" placeholder="example@email.com" />
      </div>
      <input type="submit" value="JOIN" />
    </form>
  </div>
</div>
