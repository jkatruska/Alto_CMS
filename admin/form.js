var bold_status = 0;
var italic_status = 0;
$(".button").click(function() {
  $(this).toggleClass( "active_button" );
});

$('#bold').click(function(){
  if(bold_status == 0){
    $('#textDiv').text($('#textDiv').html() + '<b>');
    $('#textDiv').focus();
    bold_status = 1;

  }
  else{
    $('#textDiv').text($('#textDiv').text() + '</b>');
    bold_status = 0;
  }
});
$('#italic').click(function(){
  if(bold_status == 0){
    $('#textDiv').text($('#textDiv').text() + '<i>');
    $('#textDiv').focus();
    bold_status = 1;

  }
  else{
    $('#textDiv').text($('#textDiv').text() + '</i>');
    bold_status = 0;
  }
});
$('#textDiv').keyup(function(){
  var value = $('#text').html($('#textDiv').text());
  $('#textDiv').html(value);
});
/*
$('#textDiv').keypress(function(e){
  if(e.keyCode === 13 ){
    document.execCommand('insertHTML', false, '<br><br>');
    //$('#textDiv').text($('#textDiv').text() + '<br>');
    return false;
  }
});
*/
