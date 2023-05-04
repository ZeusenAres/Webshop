<?php
if(!empty($_SESSION['auth']))
{
    if(isset($_POST['logout']))
    {
        unset($_SESSION['auth']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['id']);
        unset($_SESSION['profile_image']);
    }
?>
<nav class="header">
    <a class="header-content" href="home.php">Home</a>
    <a class="header-content" href="editUser.php">Edit User</a>
    <form class="logout-form" action="#" method="post">
        <img style="max-width: 50px; max-height: 50px; width: auto; height: auto; margin-right: 10px; margin-left: 10px" src="<?php echo !empty($_SESSION['profile_image']) ? $_SESSION['profile_image'] : ''?>" />
        <input class="logout-btn" type="submit" name="logout" value="Logout"/>
    </form>
</nav>
<?php }?>

<?php
if(empty($_SESSION['auth']))
{
?>
<nav class="header">
    <a class="header-content" href="home.php">Home</a>
    <a class="header-content" href="login.php">Login</a>
    <a class="header-content" href="register.php">Register</a>
</nav>
<?php }?>