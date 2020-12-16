<?php
    require_once "enums/BaseEnum.php";
    require_once "enums/ErrorCode.php";
?>
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
<main class="bg" style="width: 50%; position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%); color: darkred; font-size: 20px;">
    <?php
        if ($_REQUEST['messages']) {
            $messages = explode(',', $_REQUEST['messages']);

            $translation = include('resources/lang/en.php');

            foreach ($messages as $message) {
                if (ErrorCode::isValidValue($message)) {
                    print ($translation[$message] ?? 'An Error occured') . '<br/>';
                }
            }

        } else {
            print "An error occured";
        }

    ?>

    <a href="index.php" style="color: white; font-size: 12px;">Back to Homepage</a>
</main>

</body>
</html>
