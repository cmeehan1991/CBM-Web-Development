<?php

add_action('wp_enqueue_scripts','cbm_jquery');
function cbm_jquery(){
	wp_dequeue_script('jquery');
	wp_deregister_script( 'jquery' );
	
	wp_register_script('jquery', BLOG_URI . '/assets/node_modules/jquery/dist/jquery.min.js');
	wp_enqueue_script('jquery');
	
}

function cbm_styles(){   
	/* Bootstrap 4.0.0 BETA CDN*/
	wp_enqueue_style('Bootstrap CSS', BLOG_URI . '/assets/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '4.3.x', 'all');
    wp_enqueue_script('Bootstrap JS', BLOG_URI . '/assets/node_modules/bootstrap/dist/js/bootstrap.min.js', array( 'jquery', 'Popper'), '4.3.x', false);
    wp_enqueue_script('bootstrap_popper', BLOG_URI . '/assets/node_modules/popper.js/dist/popper.min.js', array('jquery'), '1.x', false);
    
    /* Custom Styles */
    wp_enqueue_style('Navigation Style',BLOG_URI . '/assets/styles/css/style-navigation.css');
    wp_enqueue_style('Home Style',BLOG_URI . '/assets/styles/css/style-home.css');
    wp_enqueue_style('Global Style', BLOG_URI . '/assets/styles/css/style-global.css');
    wp_enqueue_style('Contact Style', BLOG_URI . '/assets/styles/css/style-contact.css');
    wp_enqueue_style('Landing Page Style', BLOG_URI . '/assets/styles/css/style-landing-page.css');
    wp_enqueue_style('Theme Style', BLOG_URI . '/style.css');
}
add_action('wp_enqueue_scripts','cbm_styles');

function cbm_scripts(){
    wp_enqueue_script('scrolling', BLOG_URI . '/assets/js/scrolling.js', array('jquery'));
    wp_enqueue_script('email',BLOG_URI . '/assets/js/email.js', array('jquery'));
	wp_enqueue_script('header', BLOG_URI . '/assets/js/header.js', array('jquery', 'jquery-ui'));
	wp_enqueue_script('select 2', BLOG_URI . '/assets/js/select2.min.js', array('jquery'));
}
add_action('wp_enqueue_scripts','cbm_scripts');