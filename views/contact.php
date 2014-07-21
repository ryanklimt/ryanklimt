<?php 
	$head = "../_head.php";
	$foot = "../_foot.php";
	$page = "contact";
	$title = "Ryan Klimt | Contact Me";
	include($head);
?>

<section id="content">
	<div id="contact">
		<img src='assets/images/site/contact.png' alt="Envelopes">
		<div class="intro">
				<h2>Drop me a line!<br>
				I'd love to hear from you.</h2>
				<p>Whether you have an up coming project, a web site needed to be created, or if you just want to drop in for a cup of tea, I'd love to hear from you.&nbsp;Send me a message via the form below or you can email, call, or send a carrier pigeon.</p>
				<p>Email: <a href="mailto:ryanklimt@gmail.com">ryanklimt@gmail.com</a>
				<br>Tel: 847 912-2543</p>
		</div>
	</div>
	<div id="content-secondary">
		<div id="location">
			<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47166.64504644952!2d-87.943657!3d42.36564399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880f8e01b2b811ed%3A0xdd57cb6f9dd18676!2sGurnee%2C+IL!5e0!3m2!1sen!2sus!4v1390578399215"></iframe>
				<p><strong>Gurnee, Illinois</strong><br>United States</p>
		</div>
		<div id="contact-form">
			<form action='contact/' id="cForm" novalidate="novalidate">
				<h2>Send me a message</h2>
				<ul class="form-structure">
					<li class="label-placeholders">
						<label for="contact-name">Name</label>
						<input id="contact-name" class="required" type="text" name="contact_name" value="">
					</li>
					<li class="label-placeholders">
						<label for="contact-email">Email</label>
						<input id="contact-email" class="required email" type="text" name="contact_email" value="">
					</li>
					<li class="label-placeholders">
						<label for="contact-message">Your Message</label>
						<textarea id="contact-message" class="required" name="contact_message"></textarea>
					</li>
					<li>
						<input id="contact-submit" type="submit" name="send_message" value="Send Message">
					</li>
				</ul>
			</form>
		</div>
	</div>
	<div id="social">
		<div class"intro">
			<h3>Elsewhere online</h3>
			<p>You can find me in the usual places online. Feel free to check out my social networks. I'd love to keep in touch with you.</p>
		</div>
		<div class="networks">
			<ul>
				<li class="twitter">Follow my Twitter <a href="http://twitter.com/ryanklimt" target="_blank">@ryanklimt</a></li>
				<li class="facebook">Check out my <a href="http://facebook.com/ryanklimt" target="_blank">Facebook page</a></li>
			</ul>
		</div>
		<div class="networks">
			<ul>
				<li class="linkedin">Connect with me on <a href="http://linkedin.com/in/ryanklimt" target="_blank">LinkedIn</a></li>
				<li class="youtube">Watch me on <a href="http://youtube.com/mrgamingcollege" target="_blank">YouTube</a></li>
			</ul>
		</div>
	</div>	
</section>

<?php include($foot); ?>