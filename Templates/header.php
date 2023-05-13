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
    <a class="header-content" href="products.php">Shop</a>
    <a class="header-content" href="registerProduct.php">Add a product</a>
    <a class="header-content" href="editUser.php">Edit User</a>
    <form class="logout-form" action="#" method="post">
        <a href="editUser.php" class="user-profile">
            <img style="max-width: 50px; max-height: 50px; width: auto; height: auto; margin-right: 10px; margin-left: 10px" src="<?php echo !empty($_SESSION['profile_image']) ? $_SESSION['profile_image'] : ''?>" />
            <div class="user-menu">
                <p class="user-menu-content"><?php $_SESSION['username']?></p>
            </div>
        </a>
        <input class="logout-btn" type="submit" name="logout" value="Logout"/>
    </form>
    <a href="cart.php">Cart</a>
</nav>
<?php }?>

<?php
if(empty($_SESSION['auth']))
{
?>
<nav class="header">
    <a class="header-content" href="home.php">Home</a>
    <a class="header-content" href="products.php">Shop</a>
    <a class="header-content" href="registerProduct.php">Add a product</a>
    <a class="header-content" href="login.php">Login</a>
    <a class="header-content" href="register.php">Register</a>
    <a href="cart.php">Cart</a>
</nav>
<?php }?>