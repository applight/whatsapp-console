/** *************Init JS*********************
	
    TABLE OF CONTENTS
	---------------------------
	1.Ready function
	2.Load function
	3.Subscribe JS
	4.Full height function
	5.Resize function
	6.Beavis function
	7.click function
	8.Placehoder ie9
	9.Photoswipe init
 ** ***************************************/
 
 "use strict"; 

/*****Ready function start*****/
$(document).ready(function(){
  beavis();
  $('.la-anim-1').addClass('la-animate');
  $('body').niceScroll({cursorcolor:"#fff"});
	
});
/*****Ready function end*****/

/*****Load function start*****/
$(window).load(function(){
	$(".preloader-it").delay(500).fadeOut("slow");
	setTimeout(function(){
		$(".ani-wrap .animated").addClass("slideInUp");
		$(".social-icons.animated").addClass("fadeInRight");
	},300);
});
/*****Load function* end*****/

/***** Subscribe JS start *****/
$("#notifyMe").notifyMe(); 
/***** Subscribe JS end*****/

/***** Full height function start *****/
var setHeight = function () {
	var height = $(window).height();
	$('.full-height').css('min-height', (height));
};
/***** Full height function end *****/

/***** Resize function start *****/
$(window).on("resize", function () {
	setHeight();
}).resize();
/***** Resize function end *****/

/***** Beavis function start *****/
function beavis(){
	
	var target = $('#splitlayout');
	$(".about div").on('click', function(){
		if ( target.hasClass('reset-layout') ) {
			target.removeClass('close-right');
			target.addClass('open-left');
			target.removeClass('close-left');
			$('.page-left .animated').addClass('fadeInLeft');
			target.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', 
			function() {
				target.removeClass('reset-layout')
			}); 
		 }
		else if ( target.hasClass('open-left') ) {
			target.removeClass('reset-layout');
			target.removeClass('open-left');
			target.addClass('close-left');
			$('.page-left .animated').removeClass('fadeInLeft');
			target.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', 
			function() {
				target.addClass('reset-layout')
			});
		}
		$('.side-left .call-to-action.about .goto-close').toggleClass('opacity-hide');
		$('.call-to-action .goto-next').toggleClass('opacity-hide');
	});
	
	$(".contact div").on('click', function(){
		
		if ( target.hasClass('reset-layout') ) {
			target.addClass('open-right');
			target.removeClass('close-right');
			target.removeClass('close-left');
			$('.page-right .animated').addClass('fadeInRight');
			target.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', 
			function() {
				target.removeClass('reset-layout')
			}); 
		 }
		else if ( target.hasClass('open-right') ) {
			target.removeClass('reset-layout');
			target.removeClass('open-right');
			target.addClass('close-right');
			$('.page-right .animated').removeClass('fadeInRight');
			target.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', 
			function() {
				target.addClass('reset-layout')
			});
		}
		$('.call-to-action .goto-next').toggleClass('opacity-hide');
		$('.side-right .call-to-action .goto-close').toggleClass('opacity-hide');
	});
	$(".select-con").on('click', function(e){
		e.preventDefault();
		$("html, body").animate({ scrollTop: $('#link_proj').offset().top }, 1000);
	});
}
/***** Beavis function end *****/

/***** Placehoder ie9 start*****/
$('input[type=text], textarea').placeholder();
/***** Placehoder ie9 end*****/	
