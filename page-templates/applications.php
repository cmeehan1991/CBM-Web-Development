<?php 
/*
	Template Name: Software Applications
*/
get_header(); 
?>
<div class="container-fluid">
	<div class="row">
		<div class="jumbotron header">
			<?php if(has_post_thumbnail( )): ?>
				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="header-image"/>
			<?php endif;?> 
		</div>
	</div>
	<div class="row">
		<div class='col-md-12'>
			<?php if(have_posts()): while(have_posts()):the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>