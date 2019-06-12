<?php 
	/*
		Template Name: About Us
	*/
	get_header();
?>
<div class="container-fluid">
	<div class="row">
		<header class="page-header">
			<?php the_title('<h1>','</h1>');?>
			<img src="<?php echo BLOG_URI;?>/includes/img/pexels-photo.jpg" class="jumbotron__about-us-img" width="100%"/>
		</header>
	</div>
	<?php if(have_posts()):while(have_posts()):the_post();?>
	<div class="row">
		<div class="col-md-8 ml-auto mr-auto">
			<?php the_content();?>
		</div>
	</div>
	<?php endwhile; else: ?>
		Oops! It looks like there is no content here! Lets go back <a href="<?php bloginfo('url');?>"?>home</a> and try again!.
	<?php endif; ?>
</div>
<?php get_footer();	