<?php
	$recipients = 'sqsinger1123@gmail.com, yang.xiaojing2014@gmail.com, justswim@gmail.com';
	
    $email = "parky@parky.co.nf";
	$text = "New user has registered with this email: ";
	$subject = "Hooray subject!";

    // Grab fields from post, if there.
    if($_POST != NULL) {
		$email = ($_POST["email"]);
		$text .= $email;
	}
    
    
    //Mail the request to the site webmasters.
    //First prepare the message.
    $message = "Hi Parky,<br/><br/>A new user ($email) has signed up via the Parky launch page! ";
    
    $message .= "You should be able to contact <b>$name</b> simply by responding to this email.<br/><br/><br/>----------------";
    $message .= "<br/><br/>$text<br/><br/>";
    
    $headers = 'From: webmaster@sqsinger.com\r\n ';
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\n";
    $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n" . 
        "Content-Type: text/html; charset=utf-8\r\n" . 
        "Content-Transfer-Encoding: 8bit\r\n\r\n";;
    
    if($text == NULL) { $text = "This is the text."; }
    if ($text != NULL) {
    	mail($recipients, $subject, $message, $headers);
	}
	
?>

success