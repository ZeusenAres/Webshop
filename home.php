<?php
require_once('Classes/UserController.php');
$db = new UserController();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        platformer hub
    </title>
    <link rel="stylesheet" href="standardStyle.css"/>
</head>
<body>
    <nav class="header">
        <a class="header-content" href="login.php">login</a>
        <a class="header-content" href="register.php">register</a>
    </nav>
    <div class="content">
        <?php
        for($i = 1; $i <= 20; $i++)
        {
            echo '<form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="password" placeholder="Password">
                <input type="email" name="email" placeholder="Email">
                <input type="submit" name="submit" value="Log in">
            </form>';
        }
        ?>
    </div>
</body>
</html>