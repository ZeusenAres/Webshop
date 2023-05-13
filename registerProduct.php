<!DOCTYPE html>
<html>
<head>
    <?php
    require_once('Classes/ProductController.php');
    $db = new ProductController();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //$db->insertProduct($_POST['username'], $_POST['password'], $_POST['email']);
        //$db->insertProductToAPI($_POST['username'], $_POST['password'], $_POST['email']);
        header('Location:home.php');
    }
    ?>
    <link rel="stylesheet" href="standardStyle.css" />
    <link rel="stylesheet" href="createProductStyle.css" />
</head>
<body>
    <?php
    include_once('Templates/header.php');
    ?>
    <div class="content">
        <form method="POST" action="#">
            <h3>Create Product</h3>
            <input type="text" name="name" placeholder="Product Name" />
            <input type="number" name="price" placeholder="Product Price" />
            <input type="text" name="type" placeholder="Product Type" />
            <input type="text" name="description" placeholder="Product Description" />
            <input type="text" name="`category" placeholder="Category" />
            <input type="url" name="image" placeholder="Product Image" />
            <input type="submit" name="submit" value="Add Product" />
        </form>
        <button id="show-properties" onclick="propertiesForm()">Properties</button>
        <p id="formHelperValue" hidden></p>
        <div id="properties-form" style="display: none">
            <form method="post" action="#">
                <h3>Product Properties</h3>
                <input type="submit" name="submit" value="Add Properties" />
            </form>
        </div>
        <p id="txt"></p>
        <script src="formMenuHandler.ts"></script>
    </div>
</body>
</html>