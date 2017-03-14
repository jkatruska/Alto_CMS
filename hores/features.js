$('.function_img').click(function(){
    $(this).siblings('.function_content').slideToggle();
});

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

$(window).scroll(function () {
	if ($(this).scrollTop() >150) {
        $('.menu').fadeIn().addClass('fixed_menu');
		$('.menu ul li').addClass('hover');
	}
	else{
		$('.menu').removeClass('fixed_menu');
		$('.menu ul li').removeClass('hover');
	}
});