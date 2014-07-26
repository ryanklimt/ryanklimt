<div id="archive">
	<h1><a href='blog/'>Blog</a></h1>
	<?php foreach($posts as $post) { ?>
		<article class="post">
			<header>
				<h2><?php echo $post['title']; ?></h2>
				<p class="post-meta"><span>Posted on</span> <?php echo format_date($post['date']); ?> by Ryan Klimt</p>
			</header>
			<?php echo $post['content']; ?>
		</article>
	<?php } ?>
</div>