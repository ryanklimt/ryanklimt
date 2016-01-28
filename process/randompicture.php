<?php
	date_default_timezone_set('America/Indianapolis');
	$allLinks = array();
	$file = file_get_contents('https://www.reddit.com/r/wallpapers/top/.xml');
	$arr = preg_split('/https?:\/\/imgur.com\//', htmlspecialchars($file));
	$count = 0;
	foreach($arr as $str) {
	    $link = substr($arr[$count], 0, 7);
	    if($count > 0 && !strpos($link, '/')) {
	        array_push($allLinks, "http://imgur.com/".$link.".jpg<br>");
	    }
	    $count++;
	}
	$chosenPhoto = $allLinks[date('d')%sizeof($allLinks)];
	header('Cache-Control: max-age=1800');
	header('Content-type: image/jpeg');
	readfile($chosenPhoto);
?>
