<?php
	session_start();

	foreach(glob('../includes/*.php') as $filepath) {
		include($filepath);
	}

	if(LogOut()) {
		echo '<h2>Successfully logged out!</h2>';
	}
?>