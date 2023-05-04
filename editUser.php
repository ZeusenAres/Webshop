<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    require_once('Classes/UserController.php');
    $db = new UserController();
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        unset($_POST);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty($_POST['logout']))
        {
            unset($_POST['submit']);
            $user = $db->request('POST', '/editUser', '{}', $_POST);
            $db->updateUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['originalEmail'], $_POST['id'], $_POST['profileImage']);
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
        <img style="max-width: 250px; max-height: 250px; width: auto; height: auto;" src="<?php echo $_SESSION['profile_image']?>"/>
        <form method="POST" action="#">
            <h3>Edit User</h3>
            <input type="text" name="username" placeholder="New username" required="required" value="<?php echo $_SESSION['username']?>" />
            <input type="password" name="password" placeholder="New password" required="required" />
            <input type="email" name="email" placeholder="New email" required="required" value="<?php echo $_SESSION['email']?>" />
            <input type="text" name="profileImage" placeholder="New profile image" required="required" value="<?php echo $_SESSION['profile_image']?>" />
            <input type="email" name="originalEmail" value="<?php echo $_SESSION['email']?>" hidden />
            <input type="text" name="id" value="<?php echo $_SESSION['id']?>" hidden />
            <input type="submit" name="submit" value="Edit" />
        </form>
    </div>
</body>
<?php
if(empty($_SESSION['auth']))
{
    header('Location:login.php');
}
?>
</html>