<?php
	$allLinks = array();
	foreach(simplexml_load_string(file_get_contents('https://www.reddit.com/r/wallpapers/top/.xml')) as $k) {
		if(preg_match_all("/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU", $k->content, $matches) && (strpos($matches[2][2], '.jpg') || strpos($matches[2][2], '.jpeg') || strpos($matches[2][2], '.png'))) {
			array_push($allLinks, $matches[2][2]);
		}
	}
	header('Cache-Control: max-age=1800');
	header('Content-type: image/jpeg');
	readfile($allLinks[date('d')%sizeof($allLinks)]);
?>
