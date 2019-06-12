var height = 0;
var width = 0;
$(document).ready(function(){
	setHeroImage();
	
	$('img.section__image').width(width);
	
	$('.home-navbar').css("background", "transparent");	
	$('.home-navbar, .navbar-brand, .navbar-nav li a').css('color','white');
	
	var div = document.getElementsByClassName('hero-link');
	
	$('.hero-link').on('click', function(){
		clearInterval(heroLink);
		count = 10;
		$('html, body').animate({
			scrollTop: height + 2
		}, 2000);
		
	});
	
	// here we are going to set an interval to make the hero link slide down and bounce
	// This is so that any users who may be confused on how to proceed will have their attention
	// caught by the bouncing chevron.
	var heroLink = setInterval(function(){
			//$('.hero-link').effect("bounce", "slow");
			$('.hero-link').hide();
			$('.hero-link').slideDown("slow");
			$('.hero-link').effect('bounce', 'slow');
			count += 1;
		}, 10000);	
	var click = false;	
	
		
	var count = 0; 
	if(count < 10){
		heroLink;
	}else if(count == 10){
		clearInterval(heroLink);
	}
	
	
	// Set the background for the navbar on scroll
	$(window).on('scroll', function(){
		if($(window).scrollTop() >= height){	
			$('.home-navbar').css('background-color','rgba(0,0,0,0.5)');
			$('.home-navbar, .navbar-brand, .navbar-nav li a').css('color','white');
			$('.navbar-nav li a').css('color', 'white');
		}
		if($(window).scrollTop() < height){
			$('.home-navbar').css("background", "transparent");	
			$('.home-navbar, .navbar-brand, .navbar-nav li a').css('color','white');
		}
	});
	
	
	window.onresize = function(event){
		setHeroImage();
	}

});


function setHeroImage(){	
	height = $(window).height();
	width = $(window).width();
	if(width > 768){
		$('.hero_image').height(height);
		$('.hero_image').width(width);
	}else{
		$('.hero_image').css('width', '100%');
		$('.hero-link').hide();
	}
	
}