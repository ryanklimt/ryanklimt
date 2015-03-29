<?php
	session_start();

	foreach(glob('../includes/*.php') as $filepath) {
		include($filepath);
	}

	if($_POST && Login($_POST['login_email'],$_POST['login_password'])) {
		echo '<h2 class="message">Welcome '.$_SESSION['user']['username'].'!</h2>';
	}
?>