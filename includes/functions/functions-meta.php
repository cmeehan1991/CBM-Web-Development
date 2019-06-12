<?php

add_action('add_meta_boxes', 'cbm_register_meta_boxes');
function cbm_register_meta_boxes(){
	add_meta_box('cbm_tagline', 
	'Hero Tagline', 
	'cbm_tagline_display_callback', 
	null, 
	'side', 
	'high',
	array(		
		'__block_editor_compatible_meta_box'	=> true,
	) );
}

function cbm_tagline_display_callback($post){
	// Add a nonce field
	wp_nonce_field( 'cbm_tagline_inner_custom_box', 'cbm_tagline_inner_custom_box_nonce' );
	
	$tagline = get_post_meta($post->ID, '_cbm_hero_tagline', true);
	$style = get_post_meta($post->ID, '_cbm_hero_tagline_style_class', true);
	
	?>
	<label for="tagline"><strong>Tagline</strong></label>
	<input name="tagline" class="widefat" value="<?php echo esc_attr($tagline); ?>">
	<label for="tagline-color"><strong>Tagline Color</strong></label>
	<select class="widefat" name="tagline-color">
		<option value="tagline--primary" <?php selected( $style, 'tagline--primary' ); ?>>Primary</option>
		<option value="tagline--secondary" <?php selected( $style, 'tagline--secondary' ); ?>>Secondary</option>
		<option value="tagline--tertiary" <?php selected( $style, 'tagline--tertiary' ); ?>>Tertiary</option>
		<option value="tagline--light" <?php selected( $style, 'tagline--light' ); ?>>Light</option>
		<option value="tagline--dark" <?php selected( $style, 'tagline--dark' ); ?>>Dark</option>
	</select>
	<?php 
}


function cbm_tagline_save_meta_box($post_id){
	if(!isset($_POST['cbm_tagline_inner_custom_box_nonce'])){
		return $post_id;
	}
	
	$nonce = $_POST['cbm_tagline_inner_custom_box_nonce'];
	
	if(!wp_verify_nonce( $nonce, 'cbm_tagline_inner_custom_box' )){
		return $post_id;
	}
	
	$tagline = sanitize_text_field( $_POST['tagline'] );
	
	$tagline_style = $_POST['tagline-color'];
	
	update_post_meta($post_id, '_cbm_hero_tagline', $tagline);
	update_post_meta($post_id, '_cbm_hero_tagline_style_class', $tagline_style);
}

add_action('save_post', 'cbm_tagline_save_meta_box');
