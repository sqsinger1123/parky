
function customsort(sorttype){
	$('div#parkieslist>div>div>div').tsort({attr: sorttype });
}

function filter(size){
	$("[id=listing]").each(function(){
		console.log($(this).attr("data-size"));
		if($(this).attr("data-size")<size){
			$(this).hide();
		}else{
			$(this).show();
		}
	});
	

}

$(document).ready(function(){
  $('#sortby button').click(function(){
    customsort($(this).children('input[name="sort"]').val());
   });   
   $("#carsize button").click(function(){
   		filter($(this).children('input[name="size"]').val());
   });  

});


