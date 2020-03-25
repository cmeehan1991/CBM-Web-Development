<?php 

add_action('widgets_init', 'cbm_sidebars_init');
function cbm_sidebars_init(){
	register_sidebar( array(
		'name'			=> __('Left Footer Sidebar', CBM_TEXTDOMAIN),
		'id'			=> 'left-footer-sidebar', 
		'description'	=> __('', CBM_TEXTDOMAIN),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
		'before_title'	=> '<h2 class="widgettitle">',
		'after_title'	=> '</h2>',
	) );
	
	register_sidebar( array(
		'name'			=> __('Middle Footer Sidebar', CBM_TEXTDOMAIN),
		'id'			=> 'middle-footer-sidebar', 
		'description'	=> __('', CBM_TEXTDOMAIN),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
		'before_title'	=> '<h2 class="widgettitle">',
		'after_title'	=> '</h2>',
	) );
	
	register_sidebar( array(
		'name'			=> __('Right Footer Sidebar', CBM_TEXTDOMAIN),
		'id'			=> 'right-footer-sidebar', 
		'description'	=> __('', CBM_TEXTDOMAIN),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
		'before_title'	=> '<h2 class="widgettitle">',
		'after_title'	=> '</h2>',
	) );
}