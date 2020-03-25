<?php 

add_action('init', 'cbm_register_showcase_block');
function cbm_register_showcase_block(){
	$asset_file = include CBM_PATH . '/blocks/native/showcase/build/index.asset.php';
	
	wp_register_script( 'cbm-showcase-editor-script', CBM_URI . '/blocks/native/showcase/build/index.js', $asset_file['dependencies'], $asset_file['version'], false );
		
	wp_register_style('showcase-styles', CBM_URI . '/blocks/native/showcase/src/style.css', array(), CBM_VERSION);
	
	wp_register_style('showcase-editor-styles', CBM_URI . '/blocks/native/showcase/src/editor-styles.css', array(), CBM_VERSION);
	
	register_block_type('cbm-native-blocks/cbm-showcase-block', 
	array(
		'editor_script'		=> 'cbm-showcase-editor-script', 
		'style'				=> 'showcase-styles',
		'editor_style'		=> 'showcase-editor-styles',
		'attributes'		=> array(
			'layout'	=> 	array(
				'type'		=> 'string', 
				'default'	=> 'grid',
			),
			'category'	=> array(
				'type'		=> 'array', 
				'default'	=> array(),
				'items'		=> array(
					'type'		=> 'string', 
				)
			), 
			'itemsToShow'	=> array(
				'type'			=> 'integer', 
				'default'		=> 5
			),
			'sectionTitle'	=> array(
				'type'			=> 'string',
			),
		),
		'render_callback'	=> 'render_cbm_showcase_callback',
	) );
}

function render_cbm_showcase_callback($attributes){
	
	$classes = "showcase-section showcase-section--" . $attributes['layout'];
	
	$categories = implode(',', $attributes['category']);
	
	$query_args = array(
		'post_type'			=> 'showcase', 
		'post_status'		=> 'publish',
		'posts_per_page' 	=> $attributes['itemsToShow'], 	
		'tax_query'			=> array(
			array(
				'taxonomy'	=> 'showcase_category', 
				'field'		=> 'term_id',
				'terms'		=> $attributes['category'],
				'operator'	=> 'IN'
			),
		),
	);
	
	$loop = new WP_Query($query_args);
	
	ob_start();
	
	echo '<div class="showcase-block">';
	
	if($attributes['sectionTitle']){
	
		echo '<h2 class="showcase-title">' . $attributes['sectionTitle'] . '</h2>';
	
	}
	
	if($loop->have_posts()){
		echo '<ul class="' . $classes . '">';
		while($loop->have_posts()){			
			$loop->the_post();
			
			$link_to = get_field('link_to', get_the_id());
			
			if($link_to == 'external'){
				$target = '_blank';
				$url = get_field('external_url', get_the_id());
			}else{
				$target = '_self';
				$url = get_the_permalink();
			}
			
			echo '<li class="showcase-section--item">';
			echo '<a href="' . $url . '" target="' . $target . '">';
			echo '<img src="' . get_the_post_thumbnail_url( get_the_id(), 'medium' ) . '" alt="' . get_the_title() . '"/>';
			echo '<div class="showcase-section--item-mask"></div>';
			echo '<span class="showcase-section--item-title">';
			echo get_the_title();
			echo '</span>';
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';
		wp_reset_postdata();
	}
	echo '</div>';
	$result = ob_get_clean();
	return $result;	
}