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

		<?php
		
		$nav_classes = 'navbar navbar-expand-lg fixed-top navbar-light bg-light ';
		
		if(is_home() || is_front_page()){
			$nav_classes .= ' fade-in-top';
		}else{
			$nav_classes .=' navbar-fill';
		}
			 
		?>

		<nav class="<?php echo $nav_classes; ?>">
			<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
				<img src="<?php echo CBM_URI; ?>/assets/img/web_icon.png" alt="CBM Web Development Logo" width="30" height="30" class="d-inline-block align-top"/>
				<?php bloginfo('title');?>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
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
		</nav>



