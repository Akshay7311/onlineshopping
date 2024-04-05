<?php
    include("../config.php");

    // Fetch all products from the database
    $getProductsQuery = "SELECT * FROM Product";
    $result = mysqli_query($con, $getProductsQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        display: flex;
        flex-direction: column; /* Change to column to stack items vertically */
        background-image: url('../images/great-online-shopping-sites.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .header {
        height: 8vh;
        width: 100vw;
        background-color: #000;
        color: #fff;
        padding: 10px;
        text-align: center;
        box-sizing: border-box;
        font-size: 27px;
        font-weight: bold;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: rgba(200, 200, 224, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 10px;
        overflow: hidden;
        width: 80vw;
        margin: 100px auto;
        padding:0 3% 3% 3%;
    }

    .insert-product {
        padding: 7px;
        height: 100%;
        width: 100%;
        text-decoration: none;
        color: #fff;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        text-decoration-line: none;
    }

    .Product-list {
        color: white;
    }

    th {
        background-color: black;
        color: white;
    }

    td {
        color: black;
    }

    .action-buttons {
        display: flex;
        justify-content: space-around;
    }

    .product-image {
        max-width: 100px; /* Adjust the width as needed */
        max-height: 100px; /* Adjust the height as needed */
    }
</style>
<body>
<section>
    <nav class="header">Products</nav>
    <form method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="insert-product">
                <button> <a href="Insert-Product.php">Add New Products</a></button>
            </div>
            <div class="Product-list">
                <?php   
                    if(mysqli_num_rows($result) > 0) {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>Image</th>"; // Added image column
                        echo "<th>Name</th>";
                        echo "<th>Description</th>";
                        echo "<th>Price</th>";
                        echo "<th>Quantity Available</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                    
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><img src='../images/" . $row['image_Images'] . "' alt='Product Image' class='product-image'></td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Description'] . "</td>";
                            echo "<td>$" . $row['Price'] . "</td>";
                            echo "<td>" . $row['Quantity_available'] . "</td>";
                            echo "<td class='action-buttons'>";
                            echo "<a href='edit-product.php?id=" . $row['product_id'] . "'><i class='fas fa-edit'> </i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    
                        echo "</table>";
                    } else {
                        echo "<p>No products available.</p>";
                    }
                ?>
            </div>
        </div>
    </form>
</section>  
</body>
</html>
