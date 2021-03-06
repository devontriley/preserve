
<div id="blog-grid">
    <?php

    $excludePages = null;

     if(is_page('Inspiration')){
      echo '<div id="featured-posts">';

      $featuredPosts = get_field('featured_posts');
      $featuredPostIds = [];

      if($featuredPosts){
        echo '<ul>';
        $i = 0;
        foreach ($featuredPosts as $p):
          $featuredPostIds[] = $p->ID;
          $image = get_field('cover_photo', $p->ID);
          $srcset = wp_get_attachment_image_srcset(get_field('cover_photo', $p->ID));
          $author = get_field('post_author', $p->ID);
          $category = get_the_category($p->ID);


          if($i===0){
            echo '<div id="main-feat-wrapper">';
          };
          if($i===1) {
           echo '<div id="addit-feat-wrapper">';
          };
          echo '<li>';
          echo '<a href="'. get_permalink($p->ID) .'"></a>';
          echo '<div class="image-wrapper">';
          if($image){
            echo '<img alt="blog post cover photo" srcset="'. $srcset .'"/>';
          };
          echo '<div class="text-wrapper">';
          echo '<h2>'. get_the_title($p->ID) .'</h2>';
          if($author){
            echo '<p class="subtitle">By '. get_field('post_author', $p->ID) .'  | </p>';
          };
          echo '<p class="subtitle">  '
            . get_the_date("m/d/y", $p->ID).
            ' | '. $category[0]->cat_name .'
          </p>';
          echo '</div> <!-- .text-wrapper -->';
          echo '</div> <!-- .image-wrapper -->';
          echo '</li>';
          $i++;

           if($i===1){
            echo '</div> <!-- #main-feat-wrapper -->';
           };
           if($i===3){
            echo '</div> <!-- addit-feat-wrapper -->';
          };
        endforeach;
        $excludePages = $featuredPostIds;
        echo '</ul>';
      };

      echo '</div> <!-- #featured-posts -->';
    }

    //query for chronological posts that aren't featured OR related by category (single)

    $currentPostCats = wp_get_post_categories($post->ID);

     $args = array(
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'post__not_in' => $featuredPostIds,
        'post_status' => 'publish'
     );

     if(is_single()){
          $args['category__in'] = $currentPostCats;
          $args['post__not_in'] = array($post->ID);
      }

      if(is_category()){
          $args['posts_per_page'] = 9;
          $args['category__in'] = $currentPostCats;
      }

      $foundPosts;

      $query = new WP_Query( $args );

      if ( $query->have_posts() ) {
          $initialPosts = ($query->found_posts);


          if($initialPosts){
              $foundPosts = $initialPosts;
              if(is_category()){
                  $pageOffset = 9;
                  if($initialPosts < 9) {
                      $pageOffset = $initialPosts;
                  }
              }

              if(is_page('Inspiration')){
                  $pageOffset = 3;
                  if($initialPosts < 3){
                      $pageOffset = $initialPosts;
                  }
              }
          }

          echo '<div id="chron-grid" data-page="1" data-exclude="'. json_encode($excludePages) .'" data-offset="'. $pageOffset .'" data-category="'. $currentPostCats[0] .'" data-total="'. $query->found_posts .'">'; // data attribute

         if(is_single()){
            echo '<h2 class="related-header">Related Articles</h2>';
         }

        echo '<div id="grid-wrapper">';

          while ( $query->have_posts() ) {
              $query->the_post();
              $image = get_field('cover_photo');
              $srcset = wp_get_attachment_image_srcset(get_field('cover_photo'));
              $author = get_field('post_author');
              $category = get_the_category();

              echo '<div class="article-wrapper">';
              echo '<a href="'. get_permalink() .'"></a>';
              echo '<div class="article-inner">';
              if($image){
                echo '<img alt="blog post cover photo" srcset="'. $srcset .'" />';
              };
              echo '<div class="text-wrapper">';
              echo '<h2>'. get_the_title() .'</h2>';
              if($author){
                echo '<p class="subtitle">By '. get_field('post_author') .' | </p>';
              };
              echo '<p class="subtitle"> '
                . get_the_date("m/d/y").
                ' | '. $category[0]->cat_name .'</p>';
              echo '</div> <!-- .text-wrapper -->';
              echo '</div><!-- .article-inner -->';
              echo '</div> <!-- .article-wrapper -->';

          }; //end while
          echo '</div> <!-- #grid-wrapper -->';
      }; //end if
    ?>



    <?php

    if(is_page('Inspiration') && $foundPosts > 3) {
        echo '<div id="load-btn">';
        echo '<p id="load-text">Load More</p>'; ?>
        <img id="loader-gif" alt="loading" src="<?php bloginfo('template_directory');?>/img/blog/loading_spinner.gif"/>
        <?php echo '</div>';
    }

    if(is_category() && $foundPosts > 9) {
        echo '<div id="load-btn">';
        echo '<p id="load-text">Load More</p>'; ?>
        <img id="loader-gif" alt="loading" src="<?php bloginfo('template_directory');?>/img/blog/loading_spinner.gif"/>
        <?php echo '</div>';
    }
 ?>

</div> <!-- #blog-grid -->
