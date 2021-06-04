<?php
	$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page']: 1;
	$perPage = 3;
	$numPages = ceil(NumBlogPosts() / $perPage);

	if($page < 1) $page = 1;
	if($page > $numPages) $page = $numPages;

	if($page > 0) $previousPage = $page-1;
	if($page < $numPages) $nextPage = $page+1;

	$posts = GetBlogPosts($page, $perPage);
?>