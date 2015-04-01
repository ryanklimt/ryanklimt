<?php
	session_start();
	foreach(glob('../includes/*.php') as $filepath) include($filepath);
	if(LogOut()) { ?>
		<div class="flash-message">
			<h2>You have been successfully logged out!</h2>
		</div>
	<?php }
?>