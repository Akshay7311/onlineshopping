<?php
    include("../config.php");

    // Check if product ID is provided
    if(isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Fetch product details from the database based on the provided product ID
        $getProductQuery = "SELECT * FROM Product WHERE product_id = $productId";
        $result = mysqli_query($con, $getProductQuery);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $productName = $row['Name'];
            $productDescription = $row['Description'];
            $productPrice = $row['Price'];
            $quantityAvailable = $row['Quantity_available'];
            // Add more product details if needed
        } else {
            // Product not found
            echo "Product not found.";
            exit();
        }
    } else {
        // Product ID not provided
        echo "Product ID not provided.";
        exit();
    }

    // Check if the form is submitted for updating the product
    if(isset($_POST['updateProduct'])) {
        // Retrieve form data and escape special characters
        $productName = mysqli_real_escape_string($con, $_POST['productName']);
        $productDescription = mysqli_real_escape_string($con, $_POST['productDescription']);
        $productPrice = mysqli_real_escape_string($con, $_POST['productPrice']);
        $quantityAvailable = mysqli_real_escape_string($con, $_POST['quantityAvailable']);
        $imageName = mysqli_real_escape_string($con, $_POST['imageName']);

        // Update the product details in the database
        $updateProductQuery = "UPDATE Product SET 
                                Name = '$productName',
                                Description = '$productDescription',
                                Price = '$productPrice',
                                Quantity_available = '$quantityAvailable',
                                image_Images = '$imageName'
                                WHERE product_id = $productId";
        $updateResult = mysqli_query($con, $updateProductQuery);

        if($updateResult) {
            // Product updated successfully
            echo "Product updated successfully.";
        } else {
            // Error updating product
            echo "Error updating product: " . mysqli_error($con);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    input[type="file"] {
        margin-top: 10px;
    }
</style>
<body>
    <h2>Edit Product</h2>
    <form method="post" enctype="multipart/form-data">
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" value="<?php echo $productName; ?>" required><br><br>

    <label for="productImage">Product Image:</label>
    <input type="file" id="productImage" name="productImage"><br><br>

    <label for="productDescription">Product Description:</label>
    <textarea id="productDescription" name="productDescription" rows="3" required><?php echo $productDescription; ?></textarea><br><br>

    <label for="productPrice">Product Price:</label>
    <input type="number" id="productPrice" name="productPrice" step="0.01" value="<?php echo $productPrice; ?>" required><br><br>

    <label for="quantityAvailable">Quantity Available:</label>
    <input type="number" id="quantityAvailable" name="quantityAvailable" value="<?php echo $quantityAvailable; ?>" required><br><br>

    <!-- Add a hidden input field for the existing image name -->
    <input type="hidden" name="imageName" value="<?php echo $imageName; ?>">

    <input type="submit" name="updateProduct" value="Update Product">
</form>

</body>
</html>
