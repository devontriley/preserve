<div id="blog-nav">
  <div class="inner">

    <div class="bar-inner">
      <button class="cat-btn">
        <li>Categories</li>
        <svg class="down-arrow" height="10" width="25" viewBox="0 0 5 5">
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
        <input type="search" class="search-field" placeholder="search" value="" name="s" autocomplete="off" autofocus/>
      </label>
      </form> <!-- search-form -->
    </div> <!-- bar-inner -->

    <ul id="category-list">
        <?php
          $args = array(
          'exclude' => array(1),
          'title_li' => ''
        );
        echo wp_list_categories($args);
        ?>
    </ul> <!-- #category-list -->

  </div> <!-- inner -->
</div> <!-- #blog-nav -->