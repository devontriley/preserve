
<div id="blog-grid">
    <?php

     if(is_page('Blog')){
      echo '<div id="featured-posts">';

      $featuredPosts = get_field('featured_posts');
      $featuredPostIds = [];

      if($featuredPosts){
        echo '<ul>';
        $i = 0;
        foreach ($featuredPosts as $p):
          $featuredPostIds[] = $p->ID;
          $image = get_field('cover_photo', $p->ID);
          $author = get_field('post_author', $p->ID);

          if($i===0){
            echo '<div id="main-feat-wrapper">';
          };
          if($i===1) {
           echo '<div id="addit-feat-wrapper">';
          };
          echo '<li>';
          echo '<a href="'. get_permalink($p->ID) .'">';
          if($image){
            echo '<img src="'. get_field('cover_photo', $p->ID) .'" />';
          };
          echo '<div class="text-wrapper">';
          echo '<h2>'. get_the_title($p->ID) .'</h2>';
          if($author){
            echo '<p class="subtitle">By '. get_field('post_author', $p->ID) .'</p>';
          };
          echo '<p class="subtitle">'
            . get_the_date("m/d/y").
            ' | Category Here
          </p>';
          echo '</div> <!-- .text-wrapper -->';
          echo '</a>';
          echo '</li>';
          $i++;

           if($i===1){
            echo '</div> <!-- #main-feat-wrapper -->';
           };
           if($i===3){
            echo '</div> <!-- addit-feat-wrapper -->';
          };
        endforeach;
        echo '</ul>';
      };

      echo '</div> <!-- #featured-posts -->';
    }


    //query for chronological posts that aren't featured

      echo '<div id="chron-grid">';

      if(is_single()){
        echo '<h2>Related Articles</h2>';
      }

      $args = array(
        'orderby' => 'date',
        'order' => 'DESC',
        'post__not_in' => $featuredPostIds
      );

      $query = new WP_Query( $args );

      if ( $query->have_posts() ) {
        echo '<div class="row">';

        $i = 0;

          while ( $query->have_posts() ) {
              $query->the_post();
              $image = get_field('cover_photo');
              $author = get_field('post_author');

              echo '<div class="article-wrapper">';
              echo '<a href="'. get_permalink() .'">';
              if($image){
                echo '<img src="'. get_field('cover_photo') .'" />';
              };
              echo '<div class="text-wrapper">';
              echo '<h2>'. get_the_title() .'</h2>';
              if($author){
                echo '<p class="subtitle">By '. get_field('post_author') .'</p>';
              };
              echo '<p class="subtitle">'
                . get_the_date("m/d/y").
                ' | Category Here</p>';
              echo '</div> <!-- .text-wrapper -->';
              echo '</a>';
              echo '</div> <!-- .article-wrapper -->';
              $i++;

              if($i===3){
                echo '</div> <!-- .row -->';
                break;
              };
          }; //end while
        echo '</div> <!-- .row -->';
        include('components/post-loader.php');
      }; //end if
    ?>

</div> <!-- #blog-grid -->
