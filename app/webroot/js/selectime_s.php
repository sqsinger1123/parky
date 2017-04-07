<script type="text/javascript">
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
    $('#totalcostview').html("");
	}

}

function populate (){
  var value = parseInt($('#start').find('option:selected').val()); 
  if(value >= parseInt($('#end').find('option:selected').val())) {
    $("#end").prop('selectedIndex',0);
  }    
  $('#end > option').each(function(){
    if(parseInt($(this).val())<=value && parseInt($(this).val())!=""){
      $(this).attr('disabled', true);
     }else{
      $(this).attr('disabled', false);
     }
  });
}

$(document).ready(function(){
    populate();
  $('#start').on('change', function(){
    calculate();
    populate();
   });     
  $('#end').on('change', function(){
    calculate();
  });
});
</script>