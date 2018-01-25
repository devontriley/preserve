<?php
$header = get_sub_field('header');
$graphic = get_sub_field('header_graphic');
$graphic = wp_get_attachment_image($graphic, 'full');
$showViewAll = get_sub_field('show_view_all_button');
$posts = get_sub_field('posts');

if($posts) : ?>

<div id="blog-grid">

  <div id="chron-grid">

    <?php
    if($header) {
      echo '<div class="related-header">';
      if($graphic) echo '<div class="image">'. $graphic .'</div>';
      echo '<h2>'. $header .'</h2>';
      echo '</div>';
    }
    ?>

    <div id="grid-wrapper">

      <?php
      foreach($posts as $p) :
        $image = get_field('cover_photo', $p->ID);
        $srcset = wp_get_attachment_image_srcset($image);
        $authorID = $p->post_author;
        $authorName = get_the_author_meta('nickname', $authorID);
        $category = get_the_category($p->ID);

        echo '<div class="article-wrapper">';
        echo '<a href="'. get_permalink($p->ID) .'"></a>';
        echo '<div class="article-inner">';
        if($image) echo '<img alt="blog post cover photo" srcset="'. $srcset .'" />';
        echo '<div class="text-wrapper">';
        echo '<h2>'. get_the_title($p->ID) .'</h2>';
        if($author) echo '<p class="subtitle">By '. $authorName .' | </p>';
        echo '<p class="subtitle">' . get_the_date("m/d/y", $p->ID) . ' | '. $category[0]->cat_name .'</p>';
        echo '</div> <!-- .text-wrapper -->';
        echo '</div><!-- .article-inner -->';
        echo '</div> <!-- .article-wrapper -->';
      endforeach;
      ?>

    </div><!-- #grid-wrapper -->

    <?php if($showViewAll) { ?>
    <div class="btn-center">
      <a href="<?php bloginfo('url'); ?>/inspiration" class="btn outline">
        <span>View All</span>
        <svg class="right-arrow" width="5.82" viewBox="0 0 5.82 10"><use xlink:href="#right-arrow"></use></svg>
      </a>
    </div>
    <?php } ?>

  </div><!-- #chron-grid -->
</div><!-- #blog-grid -->

<?php
endif;
?>
