<?php
/*
 * Template Name: Slider Template
 * description: >- 
  Page template for slider
 */
 if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
get_header(); 
$page_id = get_the_ID();
$slider_id = get_post_meta($page_id, 'slider_id', true);
if(!empty($slider_id)) {
    masterslider($slider_id); 
}

?>
  <style>
     #main {
         padding-top: 35px;
     }
 </style>
 <?php get_footer(); ?>
 
