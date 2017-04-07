/*************

Calculate total cost

****************/


function calculate ()
{
	var starttime = parseInt($('#start option:selected').val());
	var endtime = parseInt($('#end option:selected').val());
  var cost = $(".row").attr('data-price');
  var totaltime = cost*(endtime-starttime);
  console.log(totaltime);

	if(totaltime>0)
	{
    $('#totalcostview').html("$"+totaltime);  
    $('#totalcost').attr("value", totaltime);
	}else{
    $('#totalcostview').html("--");
	}

}

function populate (endList){
  var value = parseInt($('#start').find('option:selected').val()); 
  var select_end = $('#end').find('option:selected').val();
      var $el = $("#end");
    $el.empty(); // remove old options
    $.each(endList, function(key, value) {
      $el.append($("<option></option>")
         .attr("value", key).text(value));
    });
    console.log(endList);
  if(value >= parseInt($('#end').find('option:selected').val())) {
    $("#end").prop('selectedIndex',0);
  }    
  $('#end > option').each(function(){
    if(parseInt($(this).val())<=value && parseInt($(this).val())!=""){
      $(this).detach();
    }
    $("#end").val(select_end);
  });
}

$(document).ready(function(){
  var endList = {};

$('#end option').each(function(){
    endList[$(this).val()] = $(this).text();
});
console.log(endList);
    populate(endList);
  $('#start').on('change', function(){
    calculate();
    populate(endList);
   });     
  $('#end').on('change', function(){
    calculate(endList);
  });
});