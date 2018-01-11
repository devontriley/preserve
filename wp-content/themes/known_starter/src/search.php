<?php get_header(); ?>
<?php include('components/blav.php'); ?>

	<div class="search-result-content">
			<?php
					//check for posts
					if(have_posts()){
						$foundPosts = $wp_query->found_posts;
						$plural = '';

						if($foundPosts !== '1'){
							$plural = 's';
						}

						echo '<h1>'. sprintf( __( '%s Result'. $plural .' for \'', 'html5blank' ), $wp_query->found_posts ); echo get_search_query() .'\'</h1>';

						echo '<div id="grid-wrapper">';

						//while loop
						 while ( have_posts() ) : the_post();
							 $image = get_field('cover_photo');
							 $srcset = wp_get_attachment_image_srcset(get_field('cover_photo', $p->ID));
				       $author = get_field('post_author');
							 $category = get_the_category($p->ID);

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
							 endwhile;
					echo '</div> <!-- .grid-wrapper -->';
					}
					else {
						echo '<h2>No results for \'<span class="query-term">'.get_search_query() .'</span>\'</h2>';
					}?>

					<a href="<?php echo get_permalink(82) ?>" class="btn" target>
						<svg class="left-arrow" height="10" viewBox="0 0 5.4 10">
							<g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
				        <g id="Homepage" transform="translate(-780.000000, -2172.000000)" stroke="#B99656">
				            <g id="Group-9" transform="translate(395.000000, 1901.000000)">
				                <g id="Group-8-Copy" transform="translate(261.000000, 267.000000)">
				                    <polyline id="Path-4-Copy" transform="translate(126.500000, 8.000000) rotate(90.000000) translate(-126.500000, -8.000000) " points="123 6 126.444444 10 130 6"></polyline>
				                </g>
				            </g>
				        </g>
				    </g>
						</svg>

						<span>Back to Inspiration</span>
					</a>

		</div><!-- .search-result-content -->

<?php get_footer(); ?>
