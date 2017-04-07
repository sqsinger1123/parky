
// new method from http://stackoverflow.com/questions/5004233/jquery-ajax-post-example

var ajaxurl_defined = "http://www.sqsinger.com/parky/send_email2.php"; // "/send_email.php";
var request;

$(document).ready(function(){
	// bind to the submit event of our form
	$("#emailform").submit(function(event){
	
		// prevent default posting of form, if you want to
		// event.preventDefault();
	
		// abort any pending request
		if (request) {
			request.abort();
		}
		// setup some local variables
		var $form = $(this);
		// let's select and cache all the fields
		var $inputs = $form.find("input, select, button, textarea");
		// serialize the data in the form
		var serializedData = $form.serialize();

		// let's disable the inputs for the duration of the ajax request
		$inputs.prop("disabled", true);
	
		var valid = '';
			var isr = ' is required. ';
			var mail = $("#email").val();
			if (!mail.match(/^([a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$)/i)) {
				valid += '<br />A valid Email'+isr;
			}
			if (valid!='') {
				// event.preventDefault();
				$("#response").html("Error:"+valid);
				$("#response").css("background-color","#F88")
				$("#response").slideDown("slow");
				$inputs.prop("disabled", false);
				setTimeout('$("#response").slideUp("slow")',4000);
				$("#email").focus();
			}
			else {
				// fire off the request to /form.php
				var request = $.ajax({
					url: ajaxurl_defined,
					type: "post",
					data: serializedData,
					success: function(html_src){
						$("#response").css("background-color","#AFA")
						$("#response").slideDown("slow")
						$("#response").html(html_src);
						setTimeout('$("#response").slideUp("slow")',2000);
						
						// re-enable inputs after submit :)
						$inputs.prop("disabled", false);
						var emailval = $("#email").val();
						$("#email").val("");
						$("#email").attr('placeholder',emailval).focus();
					}
				});

				// callback handler that will be called on success
				request.done(function (response, textStatus, jqXHR){
					// log a message to the console and user feedback.
					console.log("Email successfully sent");
					$("#response").html("Email successfully sent! Text as follows:<br/><br/>" + text);
					setTimeout('$("#response").fadeOut("slow")',2000);
					$inputs.reset();
				});

				// callback handler that will be called on failure
				request.fail(function (jqXHR, textStatus, errorThrown){
					// log the error to the console
					console.error(
						"The following error occured: "+
						textStatus, errorThrown
					);
					$("#response").html("An error occurred. Sorry! Please try again.");
				});

				// callback handler that will be called regardless
				// if the request failed or succeeded
				request.always(function () {
					// reenable the inputs
					$inputs.prop("disabled", false);
				});
			}
	});
});