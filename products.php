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
        platformer hub
    </title>
    <link rel="stylesheet" href="standardStyle.css" />
</head>
<body>
    <?php
    include_once('Templates/header.php');
    ?>
    <table style="margin-top: 255px">
        <?php foreach($db->selectAllProducts() as $product)
              {?>
        <tr>
            <td>
                <img src="<?php echo $product['product_image']?>" />
            </td>
            <td>
                Name: <?php echo $product['product_name']?><br />
                Price: <?php echo $product['price']?><br />
                Description: <?php echo $product['product_description']?><br />
                <form class="add-to-cart-form" action="#" method="post">
                    <input type="number" name="id" value="<?php echo $product['product_id']?>" hidden />
                    <input type="submit" value="+" />
                </form>
            </td>
        </tr>
        <?php }?>
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