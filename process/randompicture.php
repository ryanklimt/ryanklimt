<?php
	$allLinks = array();
	foreach(simplexml_load_string(file_get_contents('https://www.reddit.com/r/EarthPorn/top/.xml')) as $k) {
		if(preg_match_all('/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU', $k->content, $matches) && (strpos($matches[2][2], '.jpg') || strpos($matches[2][2], '.jpeg') || strpos($matches[2][2], '.png'))) {
			array_push($allLinks, $matches[2][2]);
		}
	}
	foreach(glob('../includes/*.php') as $filepath) include($filepath);
	Insert('views', array('url' => $allLinks[date('d')%sizeof($allLinks)], 'ip' => $_SERVER['REMOTE_ADDR']));
	header('Content-type: image/jpeg');
	readfile($allLinks[date('d')%sizeof($allLinks)]);
?>