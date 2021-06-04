<?php
	if($_POST) {
		session_start();
		foreach(glob('../includes/*.php') as $filepath) include($filepath);
		if(IsLoggedIn() && CreateBlogPost($_POST['blog_title'], $_POST['blog_content'])) { ?>
			<article class="post">
				<header>
					<h2><?php echo $_POST['blog_title']; ?></h2>
					<p class="post-meta"><span>Posted on</span> <?php echo format_date(date('Y-m-d H:i:s')); ?> by Ryan Klimt</p>
				</header>
				<span><?php echo $_POST['blog_content']; ?></span>
			</article>
		<?php }
	}
?>