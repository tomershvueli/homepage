<?php

  // AJAX call to fetch a new background image

  // http://stackoverflow.com/a/24707821 => use instead of file_get_contents for external URL's
  function curl_get_contents($url, $headers = null) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    // Include potential headers with request
    if (!empty($headers)) {
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
  }

  // Traverse a JSON object given a string selector
  function traverse_json($json, $selector) {
    $regex = "\[\'?([{}a-z0-9_]+)\'?\]";
    preg_match_all('/' . $regex . '/i', $selector, $matches);

    // Go through each regex match and traverse the JSON object given the keys
    $obj = $json;
    foreach ($matches[1] as $i => $match) {
      if ($match == '{random}' && is_array($obj)) {
        // Let's fetch a random index of the array
        $rand = rand(0, count($obj));
        $obj  = $obj[$rand];
      } else {
        // Keep traversing the object
        $obj = $obj[$match];
      }
    }

    return $obj;
  }

  $config = json_decode(file_get_contents(dirname(__FILE__) . "/../../config.json"), true);

  if (!empty($config['protected']['custom_url'])) {
    // We're fetching from a custom URL
    $json      = json_decode(curl_get_contents($config['protected']['custom_url'], $config['protected']['custom_url_headers']), true);
    $image_url = traverse_json($json, $config['protected']['custom_url_selector']);

    echo json_encode(array('success' => 1, 'url' => $image_url));
  } else if (!empty($config['protected']['unsplash_client_id'])) {
    // We're fetching from Unsplash's API
    $url             = "https://api.unsplash.com/photos/random?per_page=1&client_id=" . $config['protected']['unsplash_client_id'];
    $json            = json_decode(curl_get_contents($url), true);
    $image_url       = $json['urls']['regular'];
    $image_user_name = $json['user']['name'];
    $image_user_url  = $json['user']['links']['html'];

    echo json_encode(array('success' => 1, 'url' => $image_url, 'image_user_name' => $image_user_name, 'image_user_url' => $image_user_url));
  }

  die();

?>