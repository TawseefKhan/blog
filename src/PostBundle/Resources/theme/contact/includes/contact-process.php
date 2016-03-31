<?php
/**
  * Credits: Bit Repository
  * URL: http://www.bitrepository.com/
*/

include dirname(dirname(__FILE__)).'/config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = ( !empty($_POST) ) ? true : false;

if ( $post ) {
	include 'functions.php';

	$name = stripslashes($_POST['name']);
	$secondname = stripslashes($_POST['secondname']);
	$email = trim($_POST['email']);
	$website = stripslashes($_POST['website']);
	$message = stripslashes($_POST['message']);

	$error = '';

	// Check name
	if ( !$name ) {
		$error .= 'Error! Please enter your name.<br />';
	}

	// Check email
	if ( !$email ) {
		$error .= 'Error! Please enter an e-mail address.<br />';
	}

	if ( $email && !ValidateEmail($email) ) {
		$error .= 'Error! Please enter a valid e-mail address.<br />';
	}

	// Check message (length)
	if ( !$message || strlen($message ) < 15 ) {
		$error .= "Error! Please enter your message. It should have at least 15 characters.<br />";
	}

	if ( !$error ) {
		$mail = @mail(WEBMASTER_EMAIL, "You have a new message.", $message,
			 "From: ".$name." <".$email.">\r\n"
			."Reply-To: ".$email."\r\n"
			."X-Mailer: PHP/" . phpversion());

		if ( $mail ) {
			echo 'OK';
		}
		
	} else {
		echo '<div class="alert alert-error">'.$error.'</div>';
	}

}
?>