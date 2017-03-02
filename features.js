// JavaScript Document		
$(function() {
			//smooth scroll
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
	//display arrow
   $(window).scroll(function () {
       if ($(this).scrollTop() >150) {
           $('.link_arrow').fadeIn();
       } else {
           $('.link_arrow').fadeOut();
       }
   });
   /*
$(window).scroll(function () {
	if ($(this).scrollTop() >50) {
		$('#header').addClass('fixed_menu');
		$('.menu ul li').addClass('hover_none');
	}
	else{
		$('#header').removeClass('fixed_menu');
		$('.menu ul li').removeClass('hover_none');
	}
});
*/
$('.open_close_nav').click(function(){
		$('.topnav').slideToggle();
});

//oznamy

if ($(".oznamy").html().length > 0) {
     $('.oznamy_bg').show();
   }  
   $(".close").click(function(){
	   $('.oznamy_bg').hide();
   });