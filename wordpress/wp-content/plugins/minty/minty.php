<?php
/*
Plugin Name: Minty
Plugin URI: https://github.com/devinreams/wp-minty
Description: Lightweight plugin to enqueue <a href="http://haveamint.com">Mint</a> analytics tracking into your site's header and add Bird Feeder tracking to your feeds.
Author: devinreams
Author URI: http://devin.reams.me/
Version: 1.0.1
License: MIT
*/

/**
 * Add the Bird Feeder type declaration to the head of each feed
 * I don't care enough to track each individually, they're all a "Posts" feed
 * Props nickforge
 */
function minty_birdfeeder_feed() {
	global $wpdb, $Mint;
	define('BIRDFEED', 'Posts');
	include($_SERVER['DOCUMENT_ROOT'] . '/feeder/index.php');
	$wpdb->select(DB_NAME);
	$GLOBALS['BirdFeeder'] = $BirdFeeder;
}
add_action('rss_head','minty_birdfeeder_feed');
add_action('rss2_head','minty_birdfeeder_feed');
add_action('atom_head','minty_birdfeeder_feed');


/**
 * Change the feed permalinks to the Bird Feeder tracking URL
 */
function minty_birdfeeder_seed($info) {
	global $BirdFeeder;
	return $BirdFeeder->seed(get_the_title_rss(), get_permalink(), true);
}
add_filter('the_permalink_rss', 'minty_birdfeeder_seed', 1000);

/**
 * Enqueue the Mint JavaScript into each page except admin pages
 */
function minty_javascript_enqueue() {
	if (!is_admin()) {
		$minty_js_path = get_bloginfo('home') . '/mint/?js';
		wp_enqueue_script('minty_js_include', $minty_js_path);
	}
}
add_action('init', 'minty_javascript_enqueue', 0);

?>
