<?php
$prevComponent;

if(have_rows('components')) :
  while(have_rows('components')) : the_row();

    $rowLayout = get_row_layout();

    if($rowLayout === 'content_image_column' && $prevComponent !== 'content_image_column'){
      echo '<div class="content-image-group">';
    } elseif($rowLayout !== 'content_image_column' && $prevComponent === 'content_image_column') {
      echo '</div><!-- .group -->';
    }

    $prevComponent = $rowLayout;

    switch (get_row_layout()) {
      case 'hero':
        include('components/hero.php');
        break;
      case 'flexible_content':
        include('components/flexible-content.php');
        break;
      case 'logo_grid':
        include('components/logo-grid.php');
        break;
      case 'retail_partners':
        include('components/retail-partners.php');
        break;
      case 'newsletter_signup':
        include('components/newsletter-signup.php');
        break;
      case 'content_image_column':
        include('components/content-image-column.php');
        break;
      case 'registration_form':
        include('components/registration-form.php');
        break;
      case 'fullscreen_slider':
        include('components/fullscreen-slider.php');
        break;
      case 'wholesale_inquiries_form':
        include('components/wholesale-inquiries.php');
        break;
      case 'next_collection':
        include('components/next-collection.php');
        break;
      case 'full_collection':
        include('components/full-collection.php');
        break;
      case 'full_width_image':
        include('components/full-width-image.php');
        break;
      case 'recent_posts':
        include('components/recent-posts.php');
        break;
    }

  endwhile;
endif;
?>
