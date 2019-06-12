<?php 
	/*
	* Template Name: Landing Page
	*/
	get_header();
?>
<div class="landing-page-header">
	<?php the_post_thumbnail( 'full-size' );?>
	<h1 class="landing-page-header__title"><?php the_title(); ?></h1>
</div>
<div class="container-fluid">
	<?php if(have_posts()): while(have_posts(  )): the_post(); ?>
	<div class="row">
		<?php the_content(); ?>
	</div>
	<?php endwhile; endif;?>
</div>

<?php get_footer();?>
	