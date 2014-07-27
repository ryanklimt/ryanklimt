<?php
	$page = isset($_params[0]) && is_numeric($_params[0]) ? $_params[0] : 1;
	$perPage = 3;
	$numPages = numBlogPosts() / $perPage;
	if(strpos($numPages,".")) $numPages = floor($numPages) + 1;

	if($page < 1) $page = 1;
	if($page > $numPages) $page = $numPages;

	$tmpValue = $page;

	if($page > 0) $previousPage = $tmpValue-=1;
	if($page < $numPages) $nextPage = $tmpValue+=2;

	$posts = getBlogPosts($page, $perPage);
?>