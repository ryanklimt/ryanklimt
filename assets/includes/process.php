<?php	

	//---------------------------------
	// Submit Button has been Pressed
	//---------------------------------
	if (isset($_POST)) {

		// Trim Whitespace, Validate
		foreach ($_POST as $key => $value) {
			$_POST[$key] = trim($value);
		}

		// Verify Fields
		$to = 'ryanklimt@gmail.com';

		$headers =  'From: '. htmlspecialchars($_POST['contact_name']) . ' <' . $_POST['contact_email'] . ">\r\n" .
					'Reply-To: '. htmlspecialchars($_POST['contact_name']) . ' <' . $_POST['contact_email'] . ">\r\n" .
					'X-Mailer: PHP/' . phpversion();

		$message  = '';
		$message .= $_POST['contact_name']." says:\n\n";
		//$message .= 'Email: '.$_POST['contact_email']."\n";
		//$message .= ''."\n";
		$message .= $_POST['contact_message']."\n";

	    mail($to, "Ryan Klimt [Contact Form] from " . strip_tags(stripslashes($_POST['contact_name'])), strip_tags(stripslashes($message)), $headers);

		unset($_POST);
	}
?>

<div id="contact-success">
	<h2>Thank you!</h2>
	<p>We have received your message and will get back to you shortly.</p>
</div>