<?php get_header(); ?>

<div class="container-fluid" id="archive-body">
	<?php if(have_posts(  )): while(have_posts(  )): the_post(); ?>
	<div class="row">
		<div class="col-md-3 ml-auto"><?php the_post_thumbnail( 'medium'); ?></div>
		<div class="col-md-6 mr-auto">
			<h1><a href="<?php the_permalink(); ?>"><?php _e(get_the_title(), BLOG_TEXTDOMAIN);?></a></h1>
			<p><?php _e(get_the_excerpt(), BLOG_TEXTDOMAIN); ?></p>
		</div>
		<div class="row">
			<hr>
		</div>
	</div>
	<?php endwhile; else: ?>
	<h1>Oops...It looks like there is nothing here!</h1>
	<?php endif; ?>
</div>

<?php get_footer(); ?>