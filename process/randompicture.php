<?php
	date_default_timezone_set('America/Indianapolis');
	$allLinks = array();
	$xml = simplexml_load_string(file_get_contents('http://www.reddit.com/r/wallpapers/top/.xml'));
	foreach($xml->channel->item as $images) {
		$DOM = new DOMDocument;
		$DOM->loadHTML($images->description);
		$link = $DOM->getElementsByTagName('a')->item(2)->getAttribute('href');
		if(substr($link, -3) == 'jpg') {
			array_push($allLinks, $link);
		}
	}
	$chosenPhoto = $allLinks[date('d')%sizeof($allLinks)];
	header('Content-type: image/jpeg');
	readfile($chosenPhoto);
?>