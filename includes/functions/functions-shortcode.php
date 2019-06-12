<?php 	
	/**
	* Section background shortcode
	*/
	add_shortcode('section', 'cbm_section_shortcode');
	function cbm_section_shortcode($atts, $content){
		$color = $atts['background_color'] != null ? $atts['background_color'] : 'none';
		$diagonal_style = '';
		if(isset($atts['diagonal_section'])){
			switch($atts['diagonal_section']){
				case "top":
				$diagonal_style = "diagonal-top";
				break;
				case "bottom":
				$diagonal_style = "diagonal-bottom"; 
				break;
				case "both":
				$diagonal_style = "diagonal-both";
				break;
				default: break;
			}
		}
		$section = null;
		if($diagonal_style == "diagonal-top" || $diagonal_style == 'diagonal-both'){
			$section .= "<div class='diagonal-top__top-section' style='border-color: transparent " . $color . " " . $color . " transparent'></div>";
		}
		$section .= "<div class='row colored-row " . $diagonal_style . "' style='padding-top:15px; padding-bottom:15px; background-color:".$color."'>";
		$section .= do_shortcode($content);
		$section .= "</div>";
		if($diagonal_style == "diagonal-bottom" || $diagonal_style == 'diagonal-both'){
			$section .= "<div class='diagonal-bottom__bottom-section' style='border-color:" . $color . " " . $color . " transparent'></div>";
		}
		
		return $section;
	}