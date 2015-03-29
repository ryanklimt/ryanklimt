<?php
	session_start();

	foreach(glob('../includes/*.php') as $filepath) {
		include($filepath);
	}

	if(LogOut()) {
		echo '<h2 class="message">Successfully logged out!</h2>';
	}
?>