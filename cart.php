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
        Shopping Cart
    </title>
    <link rel="stylesheet" href="standardStyle.css" />
</head>
<body>
    <?php
    include_once('Templates/header.php');
    ?>
    <table style="margin-top: 255px">
        <?php
        foreach($_SESSION['cart'] as $cart)
        {
            foreach($db->selectProduct($cart) as $product)
            {?>
                <tr class="product-container">
                    <td>
                        <img src="<?php echo $product['product_image']?>" />
                    </td>
                    <td>
                        <?php echo $product['product_name']?>
                    </td>
                    <td>
                        <?php echo $product['price']?>
                    </td>
                    <td>
                        <?php echo $product['product_type']?>
                    </td>
                </tr>
                <?php $totalPrice += $product['price']?>
        <?php }}?>
        <tr><td><h3><?php echo $totalPrice ?></h3></td></tr>
    </table>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(!empty($_POST['id']))
        {
            $_SESSION['cart'] = [$_POST['id']];
        }
    }
    ?>
</body>
</html>