<?php

// Remove native jQuery
add_action('wp_enqueue_scripts', 'cbm_jquery');
function cbm_jquery(){
	wp_deregister_script( 'jquery' );
	wp_dequeue_script( 'jquery' );
}


function cbm_styles(){   
	wp_enqueue_style('fontawesome-shim', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array('fontawesome'), '5.13.0');
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0');

	wp_enqueue_style( 'allstyles', CBM_URI . '/assets/styles/css/dist/app.css', array('fontawesome'), CBM_VERSION, null );
}
add_action('wp_enqueue_scripts','cbm_styles');

function cbm_scripts(){
	//wp_enqueue_script( 'fontawesome-free', 'https://kit.fontawesome.com/7077bd8414.js');
	wp_enqueue_script( 'allscripts', CBM_URI . '/assets/js/global/dist/app.js', array(), CBM_VERSION, false );
}
add_action('wp_enqueue_scripts','cbm_scripts');