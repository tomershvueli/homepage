<?php
	/**
	* homepage
	*/

	session_start();

	$default_config = array("time_to_refresh_bg" => 20000); // Make sure that we at least always have a value for this
	$config_file = json_decode(file_get_contents("config.json"), true);
	$config = array_merge($default_config, $config_file);

	function get_current_url() {
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['SERVER_NAME'];
    return $protocol . $domainName;
	}

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <title><?= $config['title']; ?></title>

	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link rel="stylesheet" type="text/css" href="hp_assets/css/font-awesome.min.css" />
	    <link rel="stylesheet" type="text/css" href="hp_assets/css/bootstrap.min.css" />
	    <link rel="stylesheet" type="text/css" href="hp_assets/css/main.css" />
      <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
	</head>

	<body id="homepage">
		<div id="bg-overlay">&nbsp;</div>
		<!-- Line below is to preload the font when the page loads -->
		<span class="fa fa-asterisk" style="opacity: 0;">&nbsp;</span>

		<div id="mobile-menu-wrap" class="hidden-lg">
			<a href="#" class="bg "><span class="fa fa-bars">&nbsp;</span></a>
		</div>

		<div id="clock-wrap" class="menu-item bg">
			<span id="clock"></span>
		</div>

		<div id="links-wrap" class="menu-item bg">
			<?php
				foreach ($config['items'] as $i => $item) {
					$icon = $item['icon'];
					$link = str_replace("{{cur}}", get_current_url(), $item['link']);

					echo '<div class="link col-md-4 col-xs-12"><a href="' . $link . '" title="' . $item['alt'] . '"><i class="fa fa-' . $icon . '"></i></a></div>';
				}
			?>
		</div>

		<div id="pic-info-wrap" class="menu-item hidden bg">
			<span id="pic-info">Picture by <a href="#" id="pic-info-url"></a> / <a href="https://unsplash.com/?utm_source=homepage&amp;utm_medium=referral">Unsplash</a></span>
		</div>

		<script type="text/javascript" src="hp_assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="hp_assets/js/mousetrap.min.js"></script>
    <script type="text/javascript">
    	$.config = <?= json_encode($config); ?>;
    </script>
    <script type="text/javascript" src="hp_assets/js/main.js"></script>
	</body>
</html>
