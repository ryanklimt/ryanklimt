<?php
	if($_POST) {
		foreach ($_POST as $key => $value) {
			$_POST[$key] = trim($value);
		}
		$to = "ryanklimt@gmail.com";
		$headers =  "From: ". htmlspecialchars($_POST["contact_name"]) . " <" . $_POST["contact_email"] . ">\r\n" .
					"Reply-To: ". htmlspecialchars($_POST["contact_name"]) . " <" . $_POST["contact_email"] . ">\r\n" .
					"X-Mailer: PHP/" . phpversion();
		$message =  $_POST["contact_name"]." says:\n\n" .
					$_POST["contact_message"]."\n";
		mail($to, "Ryan Klimt [Contact Form] from " . strip_tags(stripslashes($_POST["contact_name"])), strip_tags(stripslashes($message)), $headers);
		unset($_POST);
?>
<div id="contact-success">
	<h2>Thank you!</h2>
	<p>Your message has been sent and I will get back to you shortly.</p>
</div>
<?php } ?>