<?php 
add_action('widgets_init', 'swaney_register_social_media_widget');
function swaney_register_social_media_widget(){
	register_widget( 'Swaney_Social_Media_Widget' );
}


class Swaney_Social_Media_Widget extends WP_Widget{
	
	function __construct(){
		parent::__construct('swaney_social_accounts_widget', __('Social Media Accounts', CBM_TEXTDOMAIN), array(
			'description'	=> __('Widget to display social media accounts'), 
			'classname'		=> 'social-media-widget',
		));
	}
	
	public function widget($args, $instance){
		
		extract($args);
		
		$widget_id = 'widget_' . $args['widget_id'];
		
		$accounts = get_field('accounts', $widget_id);
		
		$title = get_field('title', $widget_id);
		
		if($title){
			echo '<h2 class="widgettitle">' . $title . '</h2>';
		}
		
		if($accounts){
			
			
			
			echo '<ul class="social-media-widget">';
			
			foreach($accounts as $account){
				$target = $account['open_in_new_window'] == true ? '_blank' : '_self';
				
				echo '<li>';
				
				echo '<a href="' . $account['url'] . '" target="' . $target . '">';
				
				echo $account['icon'];
				
				echo '<span class="sr-only">' . $account['account_name'] . '</span>';
				
				
				echo '</a>';
				
				echo '</li>';
			}
			
			echo '</ul>';
		}
		
	}
	
	public function form($instance){
		return ($instance);
	}
	
	public function update($new_instance, $old_instance){
		return $instance;
	}
}