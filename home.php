<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    require_once('Classes/UserController.php');
    $db = new UserController();
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
</body>
</html>