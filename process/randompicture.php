<?php
	date_default_timezone_set('America/Indianapolis');
	$api_key = '4d564a554e2a415340c51e631150df8a';
	$url = 'https://api.flickr.com/services/rest/?method=flickr.interestingness.getList';
	$url.= '&api_key='.$api_key;
	$url.='&content_type=1';
	$url.= '&per_page=1';
	$url.= '&format=json';
	$url.= '&nojsoncallback=1';
	$response = json_decode(file_get_contents($url));
	$single_photo = $response->photos->photo[0];
	$farm_id = $single_photo->farm;
	$server_id = $single_photo->server;
	$photo_id = $single_photo->id;
	$secret_id = $single_photo->secret;
	$photo_url = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_b.jpg';
	header('Content-type: image/jpeg');
	readfile($photo_url);
?>