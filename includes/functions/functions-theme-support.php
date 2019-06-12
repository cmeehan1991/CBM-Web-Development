<?php 
add_post_type_support('page', 'excerpt');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-header');
add_theme_support('custom-logo');

add_action('after_setup_theme', 'register_custom_nav_menus');
function register_custom_nav_menus(){
	register_nav_menu('primary_navigation', 'Primary Navigation');
}