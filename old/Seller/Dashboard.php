<?php
    include("../config.php");

    // Check if the seller is logged in
    if(isset($_REQUEST['Product'])) {
        // Redirect to login page if the seller is not logged in
        header("Location: login.php");
    }

    // Get the seller's ID from the session
    //$sellerId = $_SESSION['seller_id'];

    // Fetch products inserted by the logged-in seller
    $getProductsQuery = "SELECT * FROM Product";
    $result = mysqli_query($con, $getProductsQuery);

    // Handle form submission if needed
    if(isset($_POST["Product"])){
        header("Location: Product.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
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
        margin-top: 10vh;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .container > div {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        overflow: hidden;
        border-radius: 8px;
        height: 85px; /* Adjust the height of the boxes */
        width: 180px;  /* Adjust the width of the boxes */
        margin: 10px; /* Add margin for spacing */
        transition: transform 0.3s ease-in-out; /* Zoom animation */
        cursor: pointer;
    }

    .container > div:hover {
        transform: scale(1.1); /* Zoom in on hover */
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
        width: 60vw;
        margin: 100px auto;
        padding-bottom:4%;
        /* Added margin for better spacing and centered the form */
    }

    button{
        height: 100px;
        width: 200px;
        border-radius: 10px;
        background-color:#3498db;
        overflow: hidden;
        cursor: pointer;
        color: white;
        font-size: 19px;
        font-weight: bold;
    }
</style>
<body>
<section>
    <nav class="header">Seller Panel</nav>
    <form method="post">
        <div class="container">
            <div class="Product" name="Product">    
                <button type="submit" name="Product">Product</button>
            </div>
        </div>
    </form>
</section>  
</body>
</html>