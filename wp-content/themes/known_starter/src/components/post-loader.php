<?php
/**
 * Plugin Name: AJAX Post Loader
 */

 function pbd_alp_init() {
 	global $wp_query;

 	// Add code to index pages.
 	if( is_singular() || is_page('Blog') ) {	
 		// Queue JS and CSS
 		wp_enqueue_script(
 			'pbd-alp-load-posts',
 			plugin_dir_url( __FILE__ ) . 'js/load-posts.js',
 			array('jquery'),
 			'1.0',
 			true
 		);

 		wp_enqueue_style(
 			'pbd-alp-style',
 			plugin_dir_url( __FILE__ ) . 'css/style.css',
 			false,
 			'1.0',
 			'all'
 		);
