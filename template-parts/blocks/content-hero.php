<div class="jumbotron hero no-gutters <?php if(get_field('content_alignment')): echo 'hero-content-alignment--' . get_field('content_alignment'); endif;?>" style="background-image:url(<?php the_field('image');?>)" >

	<?php if(get_field('enable_hero_text')){ ?>

		<?php if(get_field('hero_primary_text')){ ?>

			<h2 class="hero-primary-text" style="color:<?php the_field('primary_text_color'); ?>"><?php the_field('hero_primary_text'); ?></h2>

		<?php } ?>

		<?php if(get_field('hero_secondary_text')){ ?>

			<h3 class="hero-secondary-text" style="color:<?php the_field('secondary_text_color'); ?>"><?php the_field('hero_secondary_text'); ?></h3>

		<?php } ?>
		
		<?php if(get_field('enable_cta')){ ?>
			<a class="btn btn-outline-secondary" style="color:<?php the_field('cta_text_color');?>" href="<?php the_field('cta'); ?>"><?php the_field('cta_icon'); ?> <?php the_field('cta_text');?></a>
		<?php } ?>

	<?php } ?>

</div>