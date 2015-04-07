<?php
	$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page']: 1;
	$perPage = 3;
	$numPages = ceil(NumBlogPosts() / $perPage);

	if($page < 1) $page = 1;
	if($page > $numPages) $page = $numPages;

	$tmpValue = $page;

	if($page > 0) $previousPage = $tmpValue-=1;
	if($page < $numPages) $nextPage = $tmpValue+=2;

	$posts = GetBlogPosts($page, $perPage);
?>