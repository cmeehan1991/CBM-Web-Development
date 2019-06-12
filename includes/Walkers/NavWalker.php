<?php 
	
class CustomNavMenuWalker extends Walker_Nav_Menu{
	function start_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
}