<?php
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;

if($published_posts >= 10){
  ?>
  <div id="blog-nav">
    <div class="inner">

      <div class="bar-inner">
        <button class="cat-btn">
          <li>Categories</li>
          <svg class="down-arrow" width="18px" height="9px" viewBox="0 0 9 4">
              <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                  <g id="Homepage" transform="translate(-778.000000, -2174.000000)" stroke="#B99656">
                      <g id="Group-9" transform="translate(395.000000, 1901.000000)">
                          <g id="Group-8-Copy" transform="translate(261.000000, 267.000000)">
                              <polyline id="Path-4-Copy" points="123 6 126.444444 10 130 6"></polyline>
                          </g>
                      </g>
                  </g>
              </g>
          </svg>
        </button> <!-- cat-btn -->

        <form role="search" method="get" id="search-form" class="search-form" action="<?php echo get_bloginfo('home'); ?>">

          <button type="submit" class="submit-button">
            <svg id="search-icon" width="30" height="30" viewBox="0 0 30 25">
              <path d="M8.80400658,15.6490028 C6.96178423,15.6490028 5.22968049,14.9334949 3.927087,13.6350334 C2.6240168,12.3368095 1.90657738,10.6107536 1.90657738,8.77447348 C1.90657738,6.93819333 2.6240168,5.2121375 3.927087,3.91367601 C5.22968049,2.61521452 6.96178423,1.90018175 8.80400658,1.90018175 C10.6464673,1.90018175 12.3788094,2.61521452 13.6818796,3.91367601 C16.3707281,6.59397988 16.3707281,10.9552046 13.6818796,13.6350334 C12.3788094,14.93397 10.6464673,15.6490028 8.80400658,15.6490028 L8.80400658,15.6490028 Z M21,19.5859589 L15.6668748,14.2707237 C18.4460587,10.8283516 18.2346405,5.76444686 15.0299983,2.57007956 C13.3667783,0.912676371 11.1558254,0 8.80400658,0 C6.45266443,0 4.24171159,0.912676371 2.57896828,2.56984201 C0.915509903,4.22748274 0,6.43078138 0,8.77447348 C0,11.1181656 0.915748255,13.3219393 2.57896828,14.979105 C4.24194995,16.6365081 6.45266443,17.5491845 8.80400658,17.5491845 C10.8350037,17.5491845 12.7599342,16.8671715 14.3189944,15.6140826 L19.6521196,20.9293178 L21,19.5859589 Z" id="Fill-1"></path>
            </svg>
        </button> <!-- .submit-button -->

        <label>
          <span class="screen-reader-text">Search for:</span>
          <input type="search" class="search-field" placeholder="search" value="" name="s" autocomplete="off"/>
        </label>
        </form> <!-- search-form -->
      </div> <!-- bar-inner -->

      <ul id="category-list">
        <?php if(is_page('Inspiration')){ ?>
          <li id="home-button" class="active">
            <a href="<?php echo get_permalink('82'); ?>">
              <svg width="19px" height="17px" viewBox="0 0 19 17" version="1.1">
                <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <path d="M16.5321325,9.9228358 L16.5321325,16.0985589 C16.5321325,16.3214386 16.5089261,16.4022601 16.4653494,16.4837416 C16.4217726,16.5652231 16.3578255,16.6291702 16.276344,16.672747 C16.1948625,16.7163238 16.1140409,16.7395302 15.8911612,16.7395302 L2.90377482,16.7395302 C2.68089513,16.7395302 2.60007357,16.7163238 2.51859209,16.672747 C2.43711061,16.6291702 2.37316347,16.5652231 2.32958669,16.4837416 C2.28600992,16.4022601 2.26280352,16.3214386 2.26280352,16.0985589 L2.26280352,10.0333668 L0.882903816,10.0440556 C0.606769725,10.0461945 0.381184854,9.82407757 0.379045904,9.54794348 C0.378008345,9.41399667 0.430759977,9.28523471 0.525477514,9.19051718 L9.01964058,0.696354113 C9.17724032,0.538754376 9.25079919,0.498014308 9.33922873,0.471211632 C9.42765827,0.444408955 9.51809319,0.444408955 9.60652273,0.471211632 C9.69495227,0.498014308 9.76851115,0.538754376 9.92611088,0.696354113 L18.2881605,9.05840376 C18.4834227,9.25366591 18.4834227,9.5702484 18.2881605,9.76551054 C18.195341,9.85833012 18.0697428,9.91092539 17.9384801,9.91194215 L16.5321325,9.9228358 Z M8.05766697,10.3576182 C7.83478728,10.3576182 7.75396572,10.3808246 7.67248424,10.4244014 C7.59100276,10.4679781 7.52705562,10.5319253 7.48347884,10.6134068 C7.43990207,10.6948882 7.41669567,10.7757098 7.41669567,10.9985895 L7.41669567,14.3679428 C7.41669567,14.5908225 7.43990207,14.671644 7.48347884,14.7531255 C7.52705562,14.834607 7.59100276,14.8985541 7.67248424,14.9421309 C7.75396572,14.9857077 7.83478728,15.0089141 8.05766697,15.0089141 L10.7678339,15.0089141 C10.9907135,15.0089141 11.0715351,14.9857077 11.1530166,14.9421309 C11.2344981,14.8985541 11.2984452,14.834607 11.342022,14.7531255 C11.3855987,14.671644 11.4088052,14.5908225 11.4088052,14.3679428 L11.4088052,10.9985895 C11.4088052,10.7757098 11.3855987,10.6948882 11.342022,10.6134068 C11.2984452,10.5319253 11.2344981,10.4679781 11.1530166,10.4244014 C11.0715351,10.3808246 10.9907135,10.3576182 10.7678339,10.3576182 L8.05766697,10.3576182 Z" id="Combined-Shape" fill="#6D5E67"></path>
                </g>
              </svg>
            </a>
          </li>
        <?php } else { ?>
          <li id="home-button">
            <a href="<?php echo get_permalink('82'); ?>">
              <svg width="19px" height="17px" viewBox="0 0 19 17" version="1.1">
                <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <path d="M16.5321325,9.9228358 L16.5321325,16.0985589 C16.5321325,16.3214386 16.5089261,16.4022601 16.4653494,16.4837416 C16.4217726,16.5652231 16.3578255,16.6291702 16.276344,16.672747 C16.1948625,16.7163238 16.1140409,16.7395302 15.8911612,16.7395302 L2.90377482,16.7395302 C2.68089513,16.7395302 2.60007357,16.7163238 2.51859209,16.672747 C2.43711061,16.6291702 2.37316347,16.5652231 2.32958669,16.4837416 C2.28600992,16.4022601 2.26280352,16.3214386 2.26280352,16.0985589 L2.26280352,10.0333668 L0.882903816,10.0440556 C0.606769725,10.0461945 0.381184854,9.82407757 0.379045904,9.54794348 C0.378008345,9.41399667 0.430759977,9.28523471 0.525477514,9.19051718 L9.01964058,0.696354113 C9.17724032,0.538754376 9.25079919,0.498014308 9.33922873,0.471211632 C9.42765827,0.444408955 9.51809319,0.444408955 9.60652273,0.471211632 C9.69495227,0.498014308 9.76851115,0.538754376 9.92611088,0.696354113 L18.2881605,9.05840376 C18.4834227,9.25366591 18.4834227,9.5702484 18.2881605,9.76551054 C18.195341,9.85833012 18.0697428,9.91092539 17.9384801,9.91194215 L16.5321325,9.9228358 Z M8.05766697,10.3576182 C7.83478728,10.3576182 7.75396572,10.3808246 7.67248424,10.4244014 C7.59100276,10.4679781 7.52705562,10.5319253 7.48347884,10.6134068 C7.43990207,10.6948882 7.41669567,10.7757098 7.41669567,10.9985895 L7.41669567,14.3679428 C7.41669567,14.5908225 7.43990207,14.671644 7.48347884,14.7531255 C7.52705562,14.834607 7.59100276,14.8985541 7.67248424,14.9421309 C7.75396572,14.9857077 7.83478728,15.0089141 8.05766697,15.0089141 L10.7678339,15.0089141 C10.9907135,15.0089141 11.0715351,14.9857077 11.1530166,14.9421309 C11.2344981,14.8985541 11.2984452,14.834607 11.342022,14.7531255 C11.3855987,14.671644 11.4088052,14.5908225 11.4088052,14.3679428 L11.4088052,10.9985895 C11.4088052,10.7757098 11.3855987,10.6948882 11.342022,10.6134068 C11.2984452,10.5319253 11.2344981,10.4679781 11.1530166,10.4244014 C11.0715351,10.3808246 10.9907135,10.3576182 10.7678339,10.3576182 L8.05766697,10.3576182 Z" id="Combined-Shape" fill="#6D5E67"></path>
                </g>
              </svg>
            </a>
          </li>
        <?php }

            $args = array(
            'exclude' => array(1),
            'title_li' => ''
          );
          $cats = get_categories($args);
          $pageCat = get_the_category();
          $currentCat = $pageCat[0]->cat_ID;

          //print_r($cats);

          foreach ($cats as $category){
            if ($category->cat_ID == $currentCat){
              echo '<li class="active"><a href="'. get_category_link($category->cat_ID) .'">'. $category->cat_name .'</a></li>';
            } else
              echo '<li><a href="'. get_category_link($category->cat_ID) .'">'. $category->cat_name .'</a></li>';
            }?>
      </ul> <!-- #category-list -->

    </div> <!-- inner -->
  </div> <!-- #blog-nav -->

<?php } else {

}
?>
