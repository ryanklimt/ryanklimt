<?php
	date_default_timezone_set('America/Indianapolis');
	$response = json_decode(file_get_contents('https://api.flickr.com/services/rest/?method=flickr.interestingness.getList&api_key=4d564a554e2a415340c51e631150df8a&per_page=100&extras=url_l&format=json&nojsoncallback=1'));
	$all_photos = $response->photos->photo;
	$photos_array = array();
	foreach($all_photos as $photo) {
		if($photo->url_l) array_push($photos_array, $photo->url_l);
	}
	$single_photo = $photos_array[date('d')%sizeof($photos_array)];
	header('Content-type: image/jpeg');
	readfile($single_photo);
?>