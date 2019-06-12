<?php
/*
* Template Name: Testimonials Page
*/
get_header();
?>
<div class="container-fluid">
	<div class="row">
		<?php if (have_posts()): while (have_posts()):the_post();?>
		<div class="col-md-8 col-md-offset-3">
		    <?php the_content(); ?>
		</div>
		<?php endwhile; else: ?>
		    <p>Uh oh! It looks like there is nothing here. </p>
		<?php endif; ?>
	</div>
</div>


<?php

get_footer();