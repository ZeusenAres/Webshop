<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        require_once('Classes/UserController.php');
        $db = new UserController();
        $error = '';
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try
            {
                $user = $db->login($_POST['username'], $_POST['password']);
                $_SESSION['auth'] = 'user';
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['profile_image'] = $user['profile_image'];
                header('Location:home.php');
            }
            catch(Exception $e)
            {
                $error = $e->getMessage();
            }
        }
        ?>
        <link rel="stylesheet" href="standardStyle.css" />
    </head>
    <body>
        <?php
        include_once('Templates/header.php');
        ?>
        <div class="content">
            <p class="error-message"><?php echo !empty($error) ? $error : '' ?></p><br />
            <form method="POST" action="login.php">
                <h3>Log in</h3>
                <input type="text" name="username" placeholder="Username" />
                <input type="text" name="password" placeholder="Password" />
                <input type="submit" name="submit" value="Log in" />
            </form>
        </div>
    </body>
</html>