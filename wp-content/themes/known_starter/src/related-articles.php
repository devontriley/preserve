<div class="related-articles">
  <h2>You might also like</h2>
  <div class="article-grid">
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4
    );
    $related = new WP_Query($args);
    if($related->have_posts())
    {
      while($related->have_posts()) : $related->the_post();
        include('/article-thumbnail.php');
      endwhile;
    }
    ?>
  </div>
</div>
