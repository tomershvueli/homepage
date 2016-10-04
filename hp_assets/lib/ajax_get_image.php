<?php

	// AJAX call to fetch a new background image

  // http://stackoverflow.com/a/24707821 => use instead of file_get_contents for external URL's
  function curl_get_contents($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
  }

	$config = json_decode(file_get_contents(dirname(__FILE__) . "/../../config.json"), true);

	$url             = "https://api.unsplash.com/photos/random?per_page=1&client_id=" . $config['unsplash_client_id'];
	$json            = json_decode(curl_get_contents($url), true);
	$image_url       = $json['urls']['regular'];
	$image_user_name = $json['user']['name'];
	$image_user_url  = $json['user']['links']['html'];

	echo json_encode(array('success' => 1, 'url' => $image_url, 'image_user_name' => $image_user_name, 'image_user_url' => $image_user_url));

	die();

?>