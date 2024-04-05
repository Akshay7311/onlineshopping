<?php
    include("../config.php");

    if(isset($_POST["insertProduct"])) {
        $productName = mysqli_real_escape_string($con, $_REQUEST["productName"]);
        $productDescription = mysqli_real_escape_string($con, $_REQUEST["productDescription"]);
        $productPrice = mysqli_real_escape_string($con, $_REQUEST["productPrice"]);
        $quantityAvailable = mysqli_real_escape_string($con, $_REQUEST["quantityAvailable"]);
        $sellerId = mysqli_real_escape_string($con, $_REQUEST["sellerId"]);
        $categoryId = mysqli_real_escape_string($con, $_REQUEST["categoryId"]);
        $brandName = mysqli_real_escape_string($con, $_REQUEST["brandName"]);
        $color = mysqli_real_escape_string($con, $_REQUEST["color"]);
        $size = mysqli_real_escape_string($con, $_REQUEST["size"]);
        $imagePath = mysqli_real_escape_string($con,$_REQUEST['imagePath']);

        // Insert into the database
        $insertProductQuery = "INSERT INTO Product (Name, Description, Price, Quantity_available, seller_id, category_id, image_Images, Brand_name, Color, Size)
                               VALUES ('$productName', '$productDescription', '$productPrice', '$quantityAvailable', '$sellerId', '$categoryId', '$imagePath', '$brandName', '$color', '$size')";

        $result = mysqli_query($con, $insertProductQuery);

        if($result) { 
            header("Location: Products.php");
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f4;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin-top: -20px;
        background-image: url('../images/great-online-shopping-sites.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    section {
        display: flex;
        flex-direction: column;
        /* Adjusted for better alignment of form elements */
        justify-content: center;
        align-items: center;
        background: rgba(200, 200, 224, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 10px;
        overflow-x: hidden;
        width: 50vw;
        height: 80vh;
        margin: 100px auto;
        margin-top: 100px;
        padding-bottom:4%;
        /* Added margin for better spacing and centered the form */
    }

    .header {
        height: 6vh;
        color: black;
        padding: 10px;
        text-align: center;
        box-sizing: border-box;
        font-size: 27px;
        font-weight: bold;
    }

    form {
        margin-top:350px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        height: 120vh;
        width: 40vw;
    }

    form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    form input,
    form select {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    form button {
        height: 120%;
        width: 100%;
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<body>
    <Section>
    
    <form method="post" enctype="multipart/form-data"x  >
    <nav class="header">Products</nav>
    <label for="imagePath">Image Path:</label>
    <input type="File" id="imagePath" name="imagePath" accept="image/*" required>

    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" required>

    <label for="productDescription">Product Description:</label>
    <textarea id="productDescription" name="productDescription" rows="3" required></textarea>

    <label for="productPrice">Product Price:</label>
    <input type="number" id="productPrice" name="productPrice" step="0.01" required>

    <label for="quantityAvailable">Quantity Available:</label>
    <input type="number" id="quantityAvailable" name="quantityAvailable" required>

    <label for="sellerId">Seller ID:</label>
    <input type="number" id="sellerId" name="sellerId" required>

    <label for="categoryId">Category ID:</label>
    <input type="number" id="categoryId" name="categoryId" required>

    <label for="brandName">Brand Name:</label>
    <input type="text" id="brandName" name="brandName" required>

    <label for="color">Color:</label>
    <input type="text" id="color" name="color">

    <label for="size">Size:</label>
    <input type="text" id="size" name="size">

  <center><button type="submit" name="insertProduct">Insert Product</button></center>
</form>
    </form>
    </Section>
</body>
</html>
