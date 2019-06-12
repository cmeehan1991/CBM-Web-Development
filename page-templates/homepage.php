<?php 
/** 
* Template Name: Homepage Template
*/

get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<header class="hero">
    <img class="hero_image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php _e(get_bloginfo('title'), BLOG_TEXTDOMAIN);?>"/>

    <?php $tagline = get_post_meta( get_the_id(), '_cbm_tagline' , true ); ?>
    
    <?php if($tagline): ?>
    
    <h1 class="<?php echo get_post_meta( get_the_id(), '_cbm_tagline_style_class', true); ?>"><?php echo $tagline; ?></h1>
    
    <?php endif; ?>
</header>

<?php endwhile; endif; ?>


<?php if(have_posts()): while(have_posts()):the_post();?>
<?php the_content(); ?>
<?php endwhile; else:?>
<h1>Oops! It looks like you found a blank page!</h1>
<?php endif; ?>
<?php get_footer();