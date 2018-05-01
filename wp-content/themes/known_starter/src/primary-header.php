<?php
$loggedOutMenu = wp_nav_menu(array(
  'menu' => 'primary-logged-out',
  'container' => '',
  'echo' => false
));
$loggedInMenu = wp_nav_menu(array(
  'menu' => 'primary-logged-in',
  'container' => '',
  'echo' => false
));
?>

<div id="primary-header">
  <div id="primary-logo">
    <a href="<?php bloginfo('url'); ?>/">
      <svg width="101" viewBox="0 0 101 50">
  			<use xlink:href="#preserve-logo"></use>
  		</svg>
    </a>
  </div>
  <nav id="primary-nav">
    <?php if(is_user_logged_in()) { echo $loggedInMenu; } else { echo $loggedOutMenu; } ?>
    <?php if(!is_user_logged_in()) { ?>
      <?php button('Wholesale Access', get_bloginfo('url').'/?page_id=49'); ?>
    <?php } else { ?>
      <?php button('Log out', wp_logout_url(get_bloginfo('url').'/')); ?>
    <?php } ?>
    <div class="hamburger">
      <a href="#">
        <svg viewBox="0 0 20 12">
          <g id="close_paths">
            <rect x="9" y="-1.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.3137 8.8284)" width="2" height="14.9"/>
            <rect x="2.5" y="5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.3137 8.8284)" width="14.9" height="2"/>
          </g>
          <g id="hamburger_paths">
            <rect y="10" width="20" height="2"/>
            <rect y="5" width="20" height="2"/>
            <rect width="20" height="2"/>
          </g>
        </svg>
      </a>
    </div>
  </nav>
</div>

