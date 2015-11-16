<?php   
/*
Plugin Name: All Around Slider
Plugin URI: http://codecanyon.net/item/all-around-wordpress-content-slider-carousel/5266981
Description: All Around – jQuery Content Slider / Carousel
Author: br0
Version: 1.4.7
Author URI: http://codecanyon.net/item/all-around-wordpress-content-slider-carousel/5266981 */

$all_around_version='1.4.7';

if (isset($_GET['export'])) {
	require('../../../wp-blog-header.php');
	init_all_around();
	$all_around->main_object->download_export();
	exit;
}

if (isset($_GET['get_version'])) {echo $all_around_version; exit;}

function init_all_around() {
	global $all_around, $all_around_version;
	require_once dirname( __FILE__ ) . '/all_around_wp_class.php';	
	$all_around = new all_around_wrapper_admin (__FILE__, 'all_around', 'All Around Slider', $all_around_version);
}

if (!class_exists("all_around_admin") && !isset($_GET['all_around_demo'])) {
	init_all_around();
}


?>