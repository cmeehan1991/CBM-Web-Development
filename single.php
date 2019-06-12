<?php get_header();?>

<div class="container-fluid" id="post-body">
	<?php if(have_posts()): while(have_posts()): the_post();?>
	<div class="row">
		<div class="col-md-8 ml-auto mr-auto">
			<h1><?php _e(get_the_title(), BLOG_TEXTDOMAIN); ?></h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 ml-auto mr-auto">
			<?php if(has_post_thumbnail()):?> <div class="blog-image"> <?php the_post_thumbnail('medium_large'); _e('<br/>', BLOG_TEXTDOMAIN); ?> </div> <?php endif;?>
			<?php the_content();?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 ml-auto mr-auto">
			<?php comments_template(); ?>
		</div>
	</div>
	<?php endwhile; else: ?>
	Oops! It looks like there is nothing here!
	<?php endif;?>
</div>
<?php get_footer();?>