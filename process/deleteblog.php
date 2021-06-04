<?php
	if($_POST) {
		session_start();
		foreach(glob('../includes/*.php') as $filepath) include($filepath);
		if(IsLoggedIn() && DeleteBlogPost($_POST['id'])) { ?>
			<div class="flash-message">
				<h2>Post has been deleted!</h2>
			</div>
		<?php }
	}
?>