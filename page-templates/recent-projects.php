<?php 
	/* Template Name: Recent Projects */
	get_header(); 
?>
<div class="container-fluid"><div class="row">
	 <div class="col-xs-12 col-md-8 col-md-offset-2" align='center'>
		 <?php if(have_posts()): while(have_posts()): the_post(); ?>
		 <?php the_content(); ?>
		 <?php endwhile; ?>
		 <?php else: ?>
		 <h1>Opps! It looks like there is no content here!</h1>
		 <?php endif; ?>
	 </div>
</div>
<?php get_footer(); ?>