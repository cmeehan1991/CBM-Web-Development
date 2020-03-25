<div class="row">
	<div class="col-md-12">
		<ul class="featured-posts">
			<?php if(get_field('featured_posts')){
				foreach(get_field('featured_posts') as $post){
					?>
					<li class="featured-posts--post">
					<h3><?php echo get_the_title($post); ?></h3>
					<?php if(has_post_thumbnail($post)){?>
					<img src="<?php echo get_the_post_thumbnail_url($post, 'medium'); ?>" alt="<?php echo get_the_title($post); ?>">
					<?php } // Close check for featured image?>
					<p><?php echo get_the_excerpt($post); ?></p>
					</li>
					<?php		
				}
			}
			?>
		</ul>
	</div>
</div>

<?php
	
