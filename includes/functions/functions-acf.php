<?php 

if(function_exists('acf_add_options_page')){
	acf_add_options_page(array(
		'page_title'	=> "General Theme Settings",
		'menu_title'	=> 'Theme Settings', 
		'menu_slug'		=> 'general-theme-settings', 
		'capability'	=> 'edit_posts', 
		'redirect'		=> false
	));
}

/**
 * Hero block
 */
add_action('acf/init', 'cbm_acf_hero_block_init');
function cbm_acf_hero_block_init(){
	if(function_exists('acf_register_block')){
		acf_register_block(array(
			'name'					=> 'hero',
			'title'					=> __('Hero Block'),
			'description'			=> __('A custom hero block.'),
			'render_callback'		=> 'cbm_acf_hero_block_render_callback', 
			'category'				=> 'formatting',
			'icon'					=> 'format-image',
			'keywords'				=> array('hero', 'header')
		));
	}
}

function cbm_acf_hero_block_render_callback($block){
	$slug = str_replace('acf/', '', $block['name']);
	
	if(file_exists(get_theme_file_path("/template-parts/blocks/content-{$slug}.php"))){
		include(get_theme_file_path("/template-parts/blocks/content-{$slug}.php"));
	}
}

/**
 * Instagram Feed Block
 */ 
add_action('acf/init', 'cbm_acf_featured_posts_block_init');
function cbm_acf_featured_posts_block_init(){
	if(function_exists('acf_register_block')){
		acf_register_block(array(
			'name'					=> 'featured-posts-block',
			'title'					=> __('Featured Posts Block'),
			'description'			=> __(''),
			'render_callback'		=> 'cbm_acf_featured_posts_block_render_callback', 
			'category'				=> 'formatting',
			'icon'					=> 'screenoptions',
			'keywords'				=> array('featured', 'posts')
		));
	}
}

function cbm_acf_featured_posts_block_render_callback($block){
	$slug = str_replace('acf/', '', $block['name']);
	
	if(file_exists(get_theme_file_path("/template-parts/blocks/content-{$slug}.php"))){
		include(get_theme_file_path("/template-parts/blocks/content-{$slug}.php"));
	}
}