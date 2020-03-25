import $ from 'jquery';
import 'jquery-ui';

$(document).ready(function(){
	
	if($(window).scrollTop() > 5){
		//$('.fade-in-top.bg-light').removeClass('fade-in-top');
	}
	
	$(window).scroll(function(){
		var distance = $(this).scrollTop(); 
		var navbar = $('.navbar');
		
		if(distance > 15 && !navbar.hasClass('navbar-fill')){
			console.log(distance);
			navbar.addClass('navbar-fill');
			console.log('fade in');
		}
		
	});

});
