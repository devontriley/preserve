<?php

//SEARCH QUERY

 add_action( 'pre_get_posts', 'searchPosts' );

 function searchPosts($query){
	 if($query->is_search()){
		 $query->set('post_type', 'post');
	 }
 }


//// WOOCOMMERCE

// woocommerce theme support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Unhook Woocommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// shop hero
add_action( 'woocommerce_before_main_content', 'shop_hero');
function shop_hero() {
  if( is_shop() || is_product_category() ) {
    include('components/flexible-content.php');
  }
}

// remove shop results count
if( !is_product() ) {
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
}

// remove sale tag
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

//add on sale text to product grid
add_action('woocommerce_before_shop_loop_item', 'test', 10);
function test() {
  global $product;
  if( $product->is_on_sale() ){
    echo '<p class="on-sale">On Sale!</p>';
  }
}


// remove sorting dropdown
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// remove add to cart from grid
add_action( 'woocommerce_after_shop_loop_item_title', 'remove_add_to_cart' );
function remove_add_to_cart() {
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}

// remove sidebar for woocommerce pages
add_action( 'woocommerce_before_main_content', 'remove_sidebar' );
function remove_sidebar() {
  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}

// remove details tabs
add_action( 'woocommerce_single_product_summary', 'remove_details_tab' );
function remove_details_tab() {
  if( is_product() ) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
  }
}

// add breadcrumbs wrapper
add_action( 'woocommerce_before_cart', 'woocommerce_breadcrumb', 10 );
add_action( 'woocommerce_before_checkout_form', 'woocommerce_breadcrumb', 10 );
add_filter( 'woocommerce_breadcrumb_defaults', 'custom_breadcrumbs');
function custom_breadcrumbs($args) {
  $args['wrap_before'] = '<div class="woocommerce-breadcrumb"><div class="inner">';
  $args['wrap_after'] = '</div></div>';
  $args['delimiter'] = ' <span>></span> ';

  return $args;
}

// cart open div
add_action( 'woocommerce_before_cart', 'cart_open_container', 20 );
function cart_open_container() {
  echo '<div id="cart-wrapper">';
}

// cart close div
add_action( 'woocommerce_after_cart', 'cart_close_container', 20 );
function cart_close_container() {
  echo '</div>';
}

// Add title to checkout page
add_action( 'woocommerce_checkout_before_customer_details', 'checkout_page_title' );
function checkout_page_title() {
  echo '<h1>Checkout</h1>';
}

// remove breadbrumbs
add_action( 'woocommerce_before_main_content', 'remove_breadcrumbs');
function remove_breadcrumbs() {
  if( is_shop() || is_product_category() || is_product() ) {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
  }
}


//FONTAWESOME X HAPPENS HERE
add_filter( 'woocommerce_cart_item_remove_link', 'edit_remove_link', 10, 2 );
function edit_remove_link( $sprintf, $cart_item_key ) {
  $sprintf = str_replace('&times;', 'X', $sprintf);

  return $sprintf;
}

// woocommerce open wrapper
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
function my_theme_wrapper_start() {
  echo '<section id="woocommerce-main">';
}

// woocommerce close wrapper
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
function my_theme_wrapper_end() {
  echo '</section>';
}

// add shop category nav
add_action('woocommerce_before_main_content', 'shop_categories');
function shop_categories() {
  if(is_shop() || is_product_category()){
    include('components/shop-categories.php');
  }
}

// add back to shop on product single
add_action( 'woocommerce_before_main_content', 'back_to_shop' );
function back_to_shop() {
  if( is_product() ){
    include('components/back-to-shop.php');
  }
}

//add project dimensions to product single page
add_action( 'woocommerce_single_product_summary', 'show_dimensions', 9 );

function show_dimensions() {
global $product;
$dimensions = $product->get_dimensions();

if ( ! empty($dimensions) ) {
  echo '<div class="product-dimensions">' . $product->get_width() . '&quot; x '. $product->get_height() . '&quot;</div>';
  }
}

// Single product custom icon details
add_action( 'woocommerce_after_main_content', 'custom_detail_icons', 10 );
function custom_detail_icons() {
  if( is_product() ) {
    include('components/custom-detail-icons.php');
  }
}

// move related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_main_content', 'woocommerce_upsell_display', 15 );
add_filter( 'woocommerce_upsell_display_args', 'edit_upsells' );
function edit_upsells($args) {
    $args['posts_per_page'] = 3;
    return $args;
}

// Single product tees not trees
add_action( 'woocommerce_after_main_content', 'tees_not_trees' );
function tees_not_trees() {
  if( is_product() ) {
    $teesNotTrees = true;
    include('components/flexible-content.php');
  }
}

// add product loader gif
add_action( 'woocommerce_after_shop_loop', 'products_loader' );
function products_loader() {
  echo '<img id="loader-gif" alt="loading" src="'. get_bloginfo('template_directory') .'/img/blog/loading_spinner.gif"/>';
}

// include woocommerce ajax function
function load_more_products() {
  $catID = $_POST['catID'];

  $args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
  );

  if($catID > 0) {

    $args['tax_query'] = array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'id',
        'terms' => $catID
      )
    );

  }

  $productsQuery = new WP_Query( $args );

  if($productsQuery->have_posts()) :
    while($productsQuery->have_posts()) : $productsQuery->the_post();

      wc_get_template_part( 'content', 'product' );

    endwhile;
  endif;

  exit();
}
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');
add_action('wp_ajax_load_more_products', 'load_more_products');

// Single Product sale text
add_action( 'woocommerce_single_product_summary', 'check_product_on_sale', 1 );
function check_product_on_sale() {
  if( is_product() ) {
    $product = wc_get_product();
    $sale = $product->is_on_sale();

    if($sale) {
      echo '<p class="on-sale">On Sale!</p>';
    }
  }
}


// add + and - quantity increment buttons to inputs
add_action( 'wp_enqueue_scripts', 'wcqi_enqueue_polyfill' );
function wcqi_enqueue_polyfill() {
    wp_enqueue_script( 'wcqi-number-polyfill' );
}


//// ACF

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

if (function_exists('add_theme_support'))
{
    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
    // Enable HTML5 support
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

function button($text, $url, $border = null, $echo = true) {
  if($text && $url) {
		if($echo) {
			echo '<a href="'. $url .'" class="btn '. ($border === 'none' ? 'no-border' : null) .'">
						<span>'. $text .'</span>
						<svg class="right-arrow" height="10" viewbox="0 0 5.41 10">
							<use xlink:href="#right-arrow"></use>
						</svg>
						</a>';
		} else {
			return '<a href="'. $url .'" class="btn '. ($border === 'none' ? 'no-border' : null) .'">
			<span>'. $text .'</span>
			<svg class="right-arrow" height="10" viewbox="0 0 5.41 10">
				<use xlink:href="#right-arrow"></use>
			</svg>
			</a>';
		}
  }
}

function button_shortcode($atts) {
  $a = shortcode_atts(array(
    'text' => '',
    'url' => '',
    'target' => ''
  ), $atts);
  return '<a href="'. $a['url'] .'" class="btn" target="'. $a['target'] .'">
					<span>'. $a['text'] .'</span>
					<svg class="right-arrow" height="10" viewbox="0 0 5.41 10">
						<use xlink:href="#right-arrow"></use>
					</svg>
					</a>';
}
add_shortcode('button', 'button_shortcode');

register_nav_menus(array(
  'primary-nav' => 'Primary Nav',
	'mobile-nav' => 'Mobile Nav',
  'footer' => 'Footer'
));

/**
 * Deregister jQuery in <head>, so it can be loaded in the footer or before the
 * first Gravity Form on the page.
 */

function gc_deregister_default_jquery()
{
	wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'gc_deregister_default_jquery' );

/**
 * Inject synchronous jQuery dependency before the Gravity Form inline scripts
 */
function inject_jquery_above_gravity_form( $content = '' )
{
	// keep track of jquery so it's not loaded twice!
	global $jquery_already_injected;

	if ( !isset($jquery_already_injected) ) {

		$jquery_already_injected = true;

		// End inline script
		$content .= "</script>\n";

		// Inject jQuery
		$content .= "<script src='".get_bloginfo('template_directory')."/bower_components/jquery/dist/jquery.min.js'></script>\n";

		// Start inline script again
		$content .= "<script>";

	}

	return $content;
}
add_filter( 'gform_cdata_open', 'inject_jquery_above_gravity_form' );

/**
 * Enqueue jQuery in footer unless it's already been injected above Gravity Form.
 * In this case, enqueue a fake version to trigger dependent scripts, and then remove this fake version.
 */

function enqueue_jquery()
{
	global $jquery_already_injected;

	// jQuery has not been loaded
	if ( !isset($jquery_already_injected) ) {
		wp_register_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '1.11.1');
		wp_enqueue_script('jquery');
	}
	// jQuery has already been loaded above a Gravity Form
	else {

		// Enqueue fake script to trigger dependencies
		wp_enqueue_script( 'jquery', '//fake-jquery-script.js', [], null );

		// Remove this fake script's HTML before it's actually injected into the DOM
		function gc_remove_fake_jquery_script( $tag ) {
			$tag = ( strpos($tag, 'fake-jquery-script') !== false ) ? '' : $tag;
			return $tag;
		}
		add_filter( 'script_loader_tag', 'gc_remove_fake_jquery_script' );
	}

  wp_register_script('bxslider', get_template_directory_uri().'/bower_components/bxslider-4/dist/jquery.bxslider.min.js', null, 4.0);
	wp_enqueue_script('bxslider');
	wp_register_script('html5blankscripts', get_template_directory_uri() . '/javascripts/dist/all.js', null, '1.0.0');
	wp_enqueue_script('html5blankscripts');

}
add_action('wp_footer', 'enqueue_jquery', 9);

function html5blank_styles()
{
    if (HTML5_DEBUG) {
        // normalize-css
        wp_register_style('normalize', get_template_directory_uri() . '/bower_components/normalize.css/normalize.css', array(), '3.0.1');
        // Custom CSS
        wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');
        // Register CSS
        wp_enqueue_style('html5blank');
    } else {
        // Custom CSS
        wp_register_style('html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0');
        // Register CSS
        wp_enqueue_style('html5blankcssmin');
    }
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme


function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

function remove_admin_bar()
{
    return false;
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// KILL THE COMMENTS!!!

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');
// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');
// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Wordpress Ajax
function wordpress_ajaxurl() { ?>

    <script type="text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>

<?php } //asign ajax wp file so that the function is pointing the right way

add_action('wp_head','wordpress_ajaxurl'); //run this first rather than in the footer

// Load More Posts Ajax

function load_more_posts(){

	$currentPage = $_POST['wrapper'];
	$currentCategory = $_POST['category'];
	$currentOffset = $_POST['offset'];
	$excludePages = $_POST['exclude'];

	$args = array(
		'posts_per_page' => 3,
		'offset' => $currentOffset,
		'post_status' => 'publish'
	);

	if($excludePages){
		$args['post__not_in'] = json_decode($excludePages);
	}

	if($currentCategory){
		$args['category__in'] = $currentCategory;
	}

    $ajax_query = new WP_Query( $args );

    if( $ajax_query->have_posts() ):
			$output;
        while( $ajax_query->have_posts() ): $ajax_query->the_post();

				$image = get_field('cover_photo');
				$srcset = wp_get_attachment_image_srcset(get_field('cover_photo', $p->ID));
				$author = get_field('post_author');
        $category = get_the_category($p->ID);

        $output .= '<div class="article-wrapper">';
        $output .= '<a href="'. get_permalink() .'"></a>';
        $output .= '<div class="article-inner">';
          if($image){
            $output .= '<img alt="blog post cover photo" srcset="'. $srcset .'" />';
          };
          $output .= '<div class="text-wrapper">';
          $output .= '<h2>'. get_the_title() .'</h2>';
          if($author){
            $output .= '<p class="subtitle">By '. get_field('post_author') .' | </p>';
          };
          $output .= '<p class="subtitle"> '
            . get_the_date("m/d/y").
            ' | '. $category[0]->cat_name .'</p>';
          $output .= '</div> <!-- .text-wrapper -->';
          $output .= '</div><!-- .article-inner -->';
          $output .= '</div> <!-- .article-wrapper -->';

        endwhile;
    endif;

		echo json_encode(array('offset' => $ajax_query->post_count, 'html' => $output));

    exit;
}

add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
add_action('wp_ajax_load_more_posts', 'load_more_posts');

?>
