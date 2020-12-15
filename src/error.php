<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Error</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Error" />

    <link rel="stylesheet" type="text/css" href="hp_assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="hp_assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="hp_assets/css/main.css" />
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Preload our font file -->
    <link rel="preload" as="font" type="font/woff2" crossorigin href="hp_assets/fonts/fontawesome-webfont.woff2" />

</head>

<body id="homepage">
<div id="bg-overlay">&nbsp;</div>

<main id="links-wrap" class="bg">
    <?php print $_REQUEST['message'] ? $_REQUEST['message'] : "An error occured" ?>
</main>

</body>
</html>
