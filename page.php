<?php

get_header();
?>
<header class="page-header">
	<?php if(has_post_thumbnail()): ?>
	<img class="hero_image" src="<?php the_post_thumbnail_url('large');?>" style="width:100%" alt="<?php the_title(); ?>" />
	<?php  endif;?>
	<?php the_title('<h1 class="page-header__text">', '</h1>'); ?>
	<h4 class="page-header__subtext"><?php the_excerpt(); ?></h4>
</header>
<div class="container-fluid">
	<div class="row">
		<?php if (have_posts()): while (have_posts()):the_post();?>
		<div class="col-md-8 ml-auto mr-auto">
		    <?php the_content(); ?>
		</div>
		<?php endwhile; else: ?>
		    <p>Uh oh! It looks like there is nothing here. </p>
		<?php endif; ?>
	</div>
</div>


<?php

get_footer();
