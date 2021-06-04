<div id="archive">
	<h1><a href='blog'>Blog</a></h1>
	<?php if(IsLoggedIn()) { ?>
		<div id="blog-form">
			<form action='blog' method="post">
				<h2>What's on your mind?</h2>
				<ul class="form-structure">
					<li class="label-placeholders">
						<label for="blog-title">Title</label>
						<input id="blog-title" class="required" type="text" name="blog_title" value="">
					</li>
					<li class="label-placeholders">
						<label for="blog-content">Content</label>
						<textarea id="blog-content" class="required" name="blog_content"></textarea>
					</li>
					<li>
						<input id="blog-submit" type="submit" name="new_post" value="Post">
					</li>
				</ul>
			</form>
		</div>
	<?php } ?>
	<?php foreach($posts as $post) { if(isset($post['content'])) { ?>
		<article class="post">
			<header>
				<?php if(IsLoggedIn()){ echo '<input type="submit" class="deleteBlog" id="'.$post['id'].'" value="Delete">'; } ?>
				<h2><?php echo $post['title']; ?></h2>
				<p class="post-meta"><span>Posted on</span> <?php echo format_date($post['date_posted']); ?> by Ryan Klimt</p>
			</header>
			<span><?php echo nl2br($post['content']); ?></span>
		</article>
	<?php }} ?>
	<?php if($nextPage) { ?>
		<div class="older_posts"><a href="blog?page=<?php echo $nextPage;?>">&#8592; Older posts</a></div>
	<?php } ?>
	<?php if($previousPage) { ?>
		<div class="newer_posts"><a href="blog?page=<?php echo $previousPage;?>">Newer posts &#8594;</a></div>
	<?php } ?>
</div>