<?php
	if($_POST) {
		$to = "ryanklimt@gmail.com";
		$headers =  "From: <me@ryanklimt.com>\r\n" .
					"Reply-To: <me@ryanklimt.com>\r\n" .
					"X-Mailer: PHP/" . phpversion();
		$message =  $_POST["contact_message"]."\n\n" .
					$_POST["contact_name"]."\n" .
					$_POST["contact_email"]."\n";
		mail($to, "Ryan Klimt [Contact Form] from " . strip_tags(stripslashes($_POST["contact_name"])), strip_tags(stripslashes($message)), $headers);
		unset($_POST); ?>
		<div class="flash-message">
			<h2>Thank you!</h2>
			<p>Your message has been sent and I will get back to you shortly.</p>
		</div>
	<?php }
?>