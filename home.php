<!DOCTYPE html>
<html>
<head>
    <?php
    ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 7);
    session_set_cookie_params(60 * 60 * 24 * 7);

    session_start();
    require_once('Classes/ProductController.php');
    $db = new ProductController();
    ?>
    <title>
        platformer hub
    </title>
    <link rel="stylesheet" href="standardStyle.css"/>
</head>
<body>
    <?php
    include_once('Templates/header.php');
    ?>
    <h1>Homepage</h1>
</body>
</html>