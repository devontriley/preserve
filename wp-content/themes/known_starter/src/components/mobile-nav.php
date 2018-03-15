<?php
$menu = wp_nav_menu(array(
  'menu' => 'mobile-nav',
  'container' => '',
  'echo' => false,
  'items_wrap' => '<ul>%3$s</ul>'
));
?>

<div id="mobile-nav">
  <nav>
    <?php echo $menu; ?>
  </nav>
</div>
