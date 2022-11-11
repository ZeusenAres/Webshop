<!DOCTYPE html>
<html>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" name="submit" value="Log in">
    </form>
</html>

<?php
session_start();

if (isset($_POST['submit'])) {

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {

        foreach ($_POST as $key => $value) {

            if ($key != 'submit') {

                echo "$key: $value </br>";
            }
        }
    }
}
?>