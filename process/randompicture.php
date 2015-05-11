<?php
	date_default_timezone_set('America/Indianapolis');
	$response = json_decode(file_get_contents('https://api.flickr.com/services/rest/?method=flickr.interestingness.getList&api_key=4d564a554e2a415340c51e631150df8a&per_page=35&extras=url_o&format=json&nojsoncallback=1'));
	$photos_array = $response->photos->photo;
	$single_photo = $photos_array[date('d')];
	$photo_url = 'https://farm'.$single_photo->farm.'.staticflickr.com/'.$single_photo->server.'/'.$single_photo->id.'_'.$single_photo->secret.'_b.jpg';
	header('Content-type: image/jpeg');
	readfile($photo_url);
?>