
<style>

#featured-posts {
  width: 100%;
  max-width: 1300px;
  margin: 0 auto;
}

#featured-posts ul{
  display: flex;
  align-items: stretch;
  list-style: none;
  -webkit-padding-start: 0 !important;
  margin-right: -10px;
}

#main-feat-wrapper {
  width: 50%;
  height: 770px;
  padding: 10px;
}

#main-feat-wrapper li {
  position: relative;
  height: 100%;
}

#main-feat-wrapper li:before {
  content: "";
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 50%;
  background-color: rgba(0,0,0,.5);
  z-index: 5;
  background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%);
  background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
  background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
}


#main-feat-wrapper li a {
  display: inline-block;
  width: 100%;
  height: 100%;
  position: relative;
}

#main-feat-wrapper li a img {
  object-fit: cover;
  object-position: 50% 50%;
  height: 100%;
}

.text-wrapper {
  padding: 20px;
  position: absolute;
  width: 100%;
  bottom: 0;
  z-index: 77;
}

.text-wrapper h2 {
  color: #fff;
  z-index: 77;
  margin-bottom: 30px;
  font-weight: lighter;
  letter-spacing: 0;
  text-transform: none;
}

.text-wrapper h2:after {
  content: "";
  display: block;
  margin: 2rem 0 0 0;
  width: 50%;
  border-top: 1px solid #b99656;
}

.subtitle {
  font-size: 14px;
  color: #fff;
  line-height: .5rem;
  font-family: "MillerText-Roman", "Times New Roman";
}

#addit-feat-wrapper {
  width: 50%;
  height: 770px;
  padding: 0 10px;
}

#addit-feat-wrapper li {
  height: 50%;
  position: relative;
  padding: 10px;
}

#addit-feat-wrapper li:before {
  content: "";
  position: absolute;
  left: 10px;
  bottom: 10px;
  width: calc(100% - 20px);
  height: 50%;
  background-color: rgba(0,0,0,.5);
  z-index: 5;
  background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%);
  background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
  background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
}

  #addit-feat-wrapper li a {
    display: inline-block;
    width: 100%;
    height: 100%;
    position: relative;
  }

  #addit-feat-wrapper li a img {
    object-fit: cover;
    object-position: 50% 50%;
    height: 100%;
    width: 100%;
  }

  #chron-grid {
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
  }

  #chron-grid .row {
    width: 100%;
    max-width: 1300px;
    display: flex;
    align-items: stretch;
    margin-top: -10px;
  }

  #chron-grid .row .article-wrapper {
    height: 500px;
    width: 33.3%;
    position: relative;
    padding: 0 10px;
  }


  #chron-grid .article-wrapper:before {
    content: "";
    position: absolute;
    left: 10px;
    bottom: 0;
    width: calc(100% - 20px);
    height: calc(50% - 20px);
    background-color: rgba(0,0,0,.5);
    z-index: 5;
    background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%);
    background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
    background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
  }

  #chron-grid .article-wrapper img  {
    object-fit: cover;
    object-position: 50% 50%;
    height: 100%;
    width: 100%;
    position: relative;
  }

  #chron-grid .text-wrapper {
    position: absolute;
    bottom: 0;
    z-index: 77;
  }

  #load-btn {
    width: 200px;
    line-height: 40px;
    margin: 70px auto;
    text-align: center;
    text-transform: uppercase;
    border: 2px solid #6d5e67;

  }
}


</style>

<div id="blog-grid">
  <div class="inner">

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

          while ( $query->have_posts() ) {
              $query->the_post();
              $i = 0;
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
      }; //end if
    ?>

    <div id="load-btn">
      Load More
    </div> <!-- #load-btn -->

  </div> <!-- .inner -->

</div> <!-- #blog-grid -->
