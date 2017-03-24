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

$(window).scroll(function () {
	if ($(this).scrollTop() >150) {
		$('.menu').addClass('fixed_menu');
		$('.menu ul li').addClass('hover');
	}
	else{
		$('.menu').removeClass('fixed_menu');
		$('.menu ul li').removeClass('hover');
	}
});


$('.mobile_menu').click(function(){
		$('.topnav').slideToggle();
});

//oznamy
if ($(".oznamy").html()) {
     $('.oznamy_bg').show();
   }  

   $(".close").click(function(){
	   $('.oznamy_bg').hide();
   });

var validate = false;
$('.udaj').children('input').focusout(function(){
  if($(this).val()== ''){
    $(this).css("border", "solid #DA251D 0.1vw");
    validate = false;
    $(this).siblings('.warning').text('Pole musí byť vyplnené');
  }
  else{
    $(this).css("border", "solid #29166F 0.1vw");
    $(this).siblings().empty('.warning');
    validate = true;
  }
});

$('select').focusout(function(){
  if($(this).val()== null){
    $(this).css("border", "solid #DA251D 0.1vw");
    validate = false;
    $(this).siblings('.warning').text('Pole musí byť vyplnené');
  }
  else{
    $(this).css("border", "solid #29166F 0.1vw");
    $(this).siblings().empty('.warning');
    validate = true;
  }
});

$('.text_textarea').focusout(function(){
  if($(this).val()== ''){
    $(this).css("border", "solid #DA251D 0.14vw");
    validate = false;
    $(this).siblings('.warning').text('Pole musí byť vyplnené');
  }
  else{
    $(this).css("border", "solid #29166F 0.14vw");
    validate = true;
    $(this).siblings().empty('.warning');
  }
});
$('#mail_form').submit(function (e) {
  e.preventDefault();
  alert(validate);
  if(validate === false){
    $('.notification_mail').text('Všetky polia musia byť vyplnené!');
  }
  else{
  $.ajax({
            type: 'get',
            url: 'email.php',
            data: $('form').serialize(),
            success: function () {
              $('.notification_mail').fadeIn('slow', function(){
                $(this).delay(5000).fadeOut('slow');
              }).text('Úspešne odoslané');
            }
          });
  }
});