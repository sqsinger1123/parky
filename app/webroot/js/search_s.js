/*************

Show list

****************/


$(document).ready(function(){
  
  $('#searchby').on('click', function(){
      $('.shownow').fadeOut(300).fadeIn(300);
      $('#nearby').attr("class", "btn");
  });

  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      $('.shownow').fadeOut(400).fadeIn(400);
      $('#nearby').attr("class", "btn");
      return false;
    }
  });

  $('#nearby').on('click', function(){
      $('.shownow').fadeOut(300).fadeIn(300);
      $('#nearby').attr("class", "btn active");
      $('#searchinput').val("");

  });

});