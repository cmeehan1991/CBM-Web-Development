<div class="row">
	<div class="col-md-12">
		<h2 class="comments-title">Comments</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<ol class="comment-list">
			<?php 
				wp_list_comments( array(
				'style'	=> 'ol', 
				'short_ping'	=> true, 
				'avatar_size'	=> 74, 
				) );
			?>
		</ol>
		
		<?php 
			if(get_comment_pages_count() > 1 && get_option( 'page_comments')):
		?>
		<nav class="navigation comment-navigation" role="navigation">
		    <h3 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h3>
		    <div class="nav-previous"><?php previous_comments_link( __( '&amp;larr; Older Comments', 'twentythirteen' ) ); ?></div>
		    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &amp;rarr;', 'twentythirteen' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; ?>
		
		<?php if(!comments_open() && get_comments_number()): ?>
		<p class="no-comments"><?php _e('Comments are closed.', CBM_TEXTDOMAIN); ?>
		<?php endif; ?>
		
		<?php comment_form() ;?>
	</div>
</div>