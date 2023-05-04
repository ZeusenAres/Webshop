<!DOCTYPE html>
<html>
<head>
    <?php
    require_once('Classes/UserController.php');
    $db = new UserController();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $db->insertUser(0, $_POST['username'], $_POST['password'], $_POST['email']);
        $db->insertUserToAPI($_POST['username'], $_POST['password'], $_POST['email']);
        header('Location:home.php');
    }
    ?>
    <link rel="stylesheet" href="standardStyle.css" />
</head>
<body>
    <?php
    include_once('Templates/header.php');
    ?>
    <div class="content">
        <form method="POST" action="#">
            <h3>Register</h3>
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input type="email" name="email" placeholder="Email" />
            <input type="submit" name="submit" value="Register" />
        </form>
    </div>
</body>
</html>