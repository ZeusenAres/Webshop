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
    for($i = 1; $i <= 20; $i++)
    {
        echo '<div class="content">
        <form method="POST" action="login.php">
            <h3>Register</h3>
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="password" placeholder="Password">
            <input type="email" name="email" placeholder="Email">
            <input type="submit" name="submit" value="Log in">
        </form>
        </div>';
    }
    ?>
</body>
</html>