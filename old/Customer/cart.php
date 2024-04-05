<?php



session_start();



// Add item to cart
if (isset($_POST['product_id'], $_POST['quantity'], $_POST['product_price'], $_POST['product_image'], $_POST['product_title'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['product_title'];
    $quantity = $_POST['quantity'];
    $price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Update cart with new item or modify existing quantity
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = array(
            "product_id" => $product_id,
            "product_title" => $name,
            "quantity" => $quantity,
            "product_price" => $price,
            "product_image" => $product_image
        );
    }
}

if (isset($_SESSION['cart']) && isset($_POST['delete_ID'])) {

    if (isset($_POST['delete_ID'])) {
        $product_id = $_POST['delete_ID'];
        // echo $_POST['delete_ID'];

        $itemIndex = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));


        if ($itemIndex !== false) {
            unset($_SESSION['cart'][$itemIndex]);
            if (count($_SESSION['cart']) > 1) {
                array_splice($_SESSION['cart'], $itemIndex, 1, array());
            }
        }
    } else {
        echo "alert('Id Not Exists')";
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="Css/cart.css">
</head>

<body>
    <?php
    // Display cart contents
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        ?>
    <h2>Your Cart</h2>
    <table>
        <thead>
            <tr style="">
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $products) {
                $product_id = $products['product_id'];
                $name = $products['product_title'];
                $quantity = $products['quantity'];
                $price = $products['product_price']; // Assuming product data is accessible
                $product_image = $products['product_image'];
                $imagePath = '../images/' . $product_image;// Assuming product data is accessible
                ?>
        <tr>
            <td>
                <?php echo $product_id; ?>
            </td>
            <td>
                <?php echo $name; ?>
            </td>
            <td>
                <?php
                        ?>

                <img draggable="false" width="100" height="100" src="<?php echo $imagePath; ?>" alt="">
            </td>
            <td>
                <?php echo $quantity; ?>
            </td>
            <td>
                ₹
                <?php echo $price * $quantity; ?>
            </td>
            <td style="text-align: center;">
                <form action="" method="POST">
                    <input type="hidden" name="delete_ID" value="<?php echo $product_id ?>">
                    <input type="submit" value="❌">
                </form>
            </td>
        </tr>
        <?php
                $total += $price * $quantity;
            }
            ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="padding:10px; font-weight: 600;">Total:₹
                <?php echo $total ?>
            </td>
        </tr>
    </table>
    <br>
    <div id="navigation" style='display:inline-flex; gap:1rem;'>
        <a href='Dashboard.php'>Go Back</a>
        <a href='checkout.php'>Checkout </a>
    </div>
    <?php
    } else {
        echo "<p>Your cart is empty. <a href='Dashboard.php'>Go Back</a></p>";
    }
    ?>
</body>

</html>