$(window).scroll(function () {
	if ($(this).scrollTop() >100) {
		$('.menu').addClass('fixed_menu');
	}
	else{
		$('.menu').removeClass('fixed_menu');
	}
});