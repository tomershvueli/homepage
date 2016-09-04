<?php

	// AJAX call to fetch a new background image

	$config = json_decode(file_get_contents(dirname(__FILE__) . "/../../config.json"), true);

	$url             = "https://api.unsplash.com/photos/random?per_page=1&client_id=" . $config['unsplash_client_id'];
	$json            = json_decode(file_get_contents($url), true);
	$image_url       = $json['urls']['regular'];
	$image_user_name = $json['user']['name'];
	$image_user_url  = $json['user']['links']['html'];

	echo json_encode(array('success' => 1, 'url' => $image_url, 'image_user_name' => $image_user_name, 'image_user_url' => $image_user_url));

	die();

?>