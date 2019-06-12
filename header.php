<!DOCTYPE html>
<html lang="en">
    <head>
	    <?php 
		get_page_template( 'partials/header', 'meta' );
		//get_page_template( 'partials/header', 'tags' ); 
		?>
        
        <title>CBM Web Development</title>
        
        <?php wp_head(); ?>
    </head>
    <body>

		<nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
			<div class="container-fluid" id="nav-container">
				<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
					<img src="<?php echo BLOG_URI; ?>/assets/img/web_icon.png" alt="CBM Web Development Logo" width="30" height="30" class="d-inline-block align-top"/>
					<?php bloginfo('title');?>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<?php
				
				$nav_menu = array(
				'menu' => 'primary_navigation', 
				'container' => 'div',
				'container_class' =>  'collapse navbar-collapse',
				'container_id' => 'navbarSupportedContent',
				'menu_class' => 'navbar-nav ml-auto',
				'walker' => new CustomNavMenuWalker());
				wp_nav_menu($nav_menu);
				?>
			</div>
		</nav>



