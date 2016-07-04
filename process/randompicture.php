<?php
	$allLinks = array();
	foreach(simplexml_load_string(file_get_contents('https://www.reddit.com/r/EarthPorn/top/.xml')) as $k) {
		if(preg_match_all('/<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>/siU', $k->content, $matches) && (strpos($matches[2][2], '.jpg') || strpos($matches[2][2], '.jpeg') || strpos($matches[2][2], '.png'))) {
			array_push($allLinks, $matches[2][2]);
		}
	}
	header('Cache-Control: max-age=1800');
	if(isset($_GET['rss'])) {
	    header('Content-Type: application/xml');
        $rssfeed = '<?xml version="1.0" encoding="UTF-8" ?>';
        $rssfeed .= '<rss version="2.0">';
        $rssfeed .= '<channel>';
        $rssfeed .= '<title>Ryan Klimt Random Picture RSS Feed</title>';
        $rssfeed .= '<link>https://theklimts.com</link>';
        $rssfeed .= '<description>RSS feed generated from Reddit EarthPorn top wallpapers.</description>';
        $rssfeed .= '<language>en-us</language>';
        $rssfeed .= '<copyright>Copyright (C) '.date('Y').' Ryan Klimt</copyright>';
        foreach($allLinks as $link) {
            $rssfeed .= '<item>';
            $rssfeed .= '<title>' . $link . '</title>';
            $rssfeed .= '<link>' . $link . '</link>';
            $rssfeed .= '<description><img src="' . $link . '" /></description>';
            $rssfeed .= '</item>';
        }
        $rssfeed .= '</channel>';
        $rssfeed .= '</rss>';
        echo $rssfeed;
	} else {
		header('Content-type: image/jpeg');
		readfile($allLinks[date('d')%sizeof($allLinks)]);
	}
?>
