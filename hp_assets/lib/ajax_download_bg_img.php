<?php
	
	// AJAX call to download a background picture to a specific directory on the server.

	$download_dir = realpath("/Users/Tomer/Dropbox/cool_stuff/bg_imgs");

	if (isset($_GET['bg_url'])) {
		if (is_dir($download_dir)) {
			$img_name = "hp_bg_" . time();
			$ch = curl_init(urldecode($_GET['bg_url']));
			$fp = fopen($download_dir . "/" . $img_name . ".jpg", 'wb');
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			$status = curl_exec($ch);
			curl_close($ch);
			fclose($fp);
		}
	}
?>
