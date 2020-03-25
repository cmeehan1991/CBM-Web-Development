<?php 
/** 
* Template Name: Homepage Template
*/

get_header(); ?>

<?php if(have_posts()): while(have_posts()):the_post();?>

<?php the_content(); ?>

<?php endwhile; else:?>

<h1>Oops! It looks like you found a blank page!</h1>

<?php endif; ?>

<?php get_footer();