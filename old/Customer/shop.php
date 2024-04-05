<?php
include("../config.php");

$SelectQuery = "SELECT * FROM Product";
$resultProducts = mysqli_query($con, $SelectQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        overflow-x: hidden;
        scroll-behavior:smooth;
    }

    header {
        top: 0;
        left: 0;
        right: 0;
        background-color: black;
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 1000; /* Ensure it stays on top of other elements */
    }

    header h1 {
        margin: 0;
        font-size: 24px;
    }

    .products {
        padding: 20px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        align-items: center;
        border: 1px lightslategrey;
    }

    .product:hover{
        transform: scale(1.1); /* Zoom in on hover */
    }

    .product {
        transition: transform 0.3s ease-in-out; /* Zoom animation */
        margin: 10px;
        height: 35vh;
        width: 12vw;
        background: rgba(200, 200, 224, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 35px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
        overflow: hidden;
    }

    a > img {
        width: 98%;
        height: 100%;
        object-fit: cover;
        border-bottom: 2px solid #fff;
    }

    
    nav {
        display: flex;
        gap: 25px;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        font-size: 20px;
    }

    a> img:hover{
        height: 66%;
    }

    .product:hover ,a{
        transform: scale(1.1);
    }


    footer {
        border-color: black;
        background-color: black;
        color: #fff;
        text-align: center;
        width: 100%;
        bottom: 0;
        position: fixed;
    }

    .container-1 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 85%;
        margin: auto;
    }

    .container-1 p {
        width: 100%;
    }

    h1 a {
        color: #fff !important;
        text-decoration: none;
    }

    .heading a {
        color: #fff !important;
        font-size: 2.2em;
        text-transform: capitalize;
        text-decoration: none;
    }
</style>
<body>
<header>
    <h1><a href="Dashboard.php">Online Shopping</a></h1>
    <nav>
        <a href="Contact.php">Contact</a>
        <!-- Add more navigation links as needed --> 
    </nav>
</header>
<form action="" method="get" enctype="multipart/form-data">
<main>
        <div class="products">
            <?php
                while ($row = mysqli_fetch_assoc($resultProducts)) {
                    echo '<div class="product">';
                    $image = isset($row['image_images']) ? $row['image_images'] : '';
                    $imagePath = '../images/' . $image; 
                    echo "<a href='Product-page.php?book_id={$row['product_id']}'>
                            <img src='../images/" . $row['image_Images'] . "' alt='Product Image'>
                         </a>";
                    echo '<h3>' . $row['Name'] . '</h3>';
                    echo '</div>';  
                }
            ?>
        </div>
</main>
</form>

<footer>
    <div class="container-1">
        <p class="heading"><a href="#top">Online Shopping</a></p>
        <p class="discription">Welcome to our Online Shoping,Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi error architecto tempore aliquid totam, exercitationem laborum dolorum voluptatibus, voluptatem, quas doloribus repellendus odio a magnam delectus voluptas nesciunt deserunt magni dignissimos? Corporis quo explicabo distinctio assumenda amet beatae non nulla!</p>
    </div>
</footer>
</body>
</html>