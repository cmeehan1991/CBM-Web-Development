<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<?php if(have_posts()){

			while(have_posts()){ the_post();

				the_content();
				
			}
		}else{
			echo '<h2 class="no-content-error-message">Oops...It looks like you found an empty page.</h2>';
		} ?>
	</div>
</div>

<?php get_footer();