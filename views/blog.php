<?php
	$perPage = 3;
	$numPages = ceil(sizeof($posts) / $perPage);
	$page = isset($_params[0]) && is_numeric($_params[0]) ? $_params[0] : 1;
	if(isset($_params[0]) && $_params[0] > $numPages) $page = $numPages;
	$start = ($page * $perPage) - $perPage;
	$previousPage = $page >= 1 ? $page-=1 : false;
	$nextPage = $page + 1 < $numPages ? $page+=2 : false;
	if($previousPage && $previousPage > $numPages) $previousPage = $numPages - 1;
	if($nextPage && $nextPage < 1) $nextPage = 1;
	$posts = array_slice($posts, $start, $perPage);
?>

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
	<?php if($nextPage) { ?>
		<div class="older_posts"><a href="blog/<?php echo $nextPage;?>">&#8592; Older posts</a></div>
	<?php } ?>
	<?php if($previousPage) { ?>
		<div class="newer_posts"><a href="blog/<?php echo $previousPage;?>">Newer posts &#8594;</a></div>
	<?php } ?>
</div>