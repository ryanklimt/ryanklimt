<?php
	if($_POST) {
		session_start();
		foreach(glob('../includes/*.php') as $filepath) include($filepath);
		if(Login($_POST['login_email'],$_POST['login_password'])) { ?>
			<div class="flash-message">
				<h2>Welcome <?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?>!</h2>
			</div>
		<?php }
	}
?>