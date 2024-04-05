<?php
// Include the configuration file
include ("../config.php");

// Check if product_id is set in the URL
if (isset($_GET['product_id'])) {
    $productId = mysqli_real_escape_string($con, $_GET['product_id']);
    $selectQuery = "SELECT * FROM products WHERE product_id = '$productId'";
    $result = mysqli_query($con, $selectQuery);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        font-style: normal;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        overflow-x: hidden;
    }

    header {
        top: 0;
        left: 0;
        right: 0;
        background-color: black;
        color: white;
        padding: 19px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 1000;
    }

    header h1 {
        margin: 0;
        font-size: 24px;
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

    main {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-top: 50px;
    }

    .product-container {
        border: 2px solid;
        border-radius: 10px;
        box-sizing: border-box;
        width: 23vw;
        height: auto;
        font-family: Arial, sans-serif;
    }

    .product-details {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 25px 0 25px 0;
    }

    .product-image {
        width: 200px;
        height: 270px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #ddd;
        transition: 0.3s ease-in-out;
    }

    .product-image:hover {
        transform: scale(1.1);
    }

    .button-container {
        margin: 20px;
        display: flex;
        display: inline-flex;
        border-radius: 15px;
        justify-content: center;
    }

    .button {
        height: 6vh;
        background-color: black;
        font-weight: bold;
        color: white;
        border-radius: 10px;
        padding: 2px 20px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        /* Add a smooth transition effect */
    }

    .button:hover {
        background-color: black;
    }

    .product-desc {
        border: 1px solid black;
        border-radius: 10px;
        width: 40%;
        padding: 20px;
        box-sizing: border-box;
    }

    .product-desc h2,
    .product-desc h3 {
        margin: 0;
    }

    #description {
        line-height: 1.5;
    }

    footer {
        bottom: 0%;
        display: grid;
        place-items: bottom;
        border-color: black;
        background-color: black;
        color: #fff;
        text-align: center;
        width: 100%;
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

    h1 a,
    .heading a {
        color: #fff !important;
        font-size: 2.2em;
        text-transform: capitalize;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <section>
        <header>
            <h1>Online Shopping</h1>
            <nav>
                <a href="Dashboard.php">Home</a>
                <a href="Contact.php">Contact</a>
                <a href="cart.php">Cart</a>
                <!-- Add more navigation links as needed -->
            </nav>
        </header>
    </section>

    <!-- Product details form -->
    <div>
        <main>
            <div class="product-container">
                <?php
                // Check if there is a result and if there are rows in the result set
                if ($result && mysqli_num_rows($result) > 0) {
                    // Fetch product details from the result set
                    $productDetails = mysqli_fetch_assoc($result);
                    // Determine the image path for the product
                    $image = isset($productDetails['product_image']) ? $productDetails['product_image'] : '';
                    $imagePath = '../images/' . $image;
                    ?>
                <!-- Display product image -->
                <div class="product-details">
                    <img class="product-image" src='<?php echo $imagePath; ?>' alt="Product Image"
                        onerror="this.src='../404-error-page-header-transparent.webp'">
                </div>
                <!-- Add to cart and buy now buttons -->
                <div class="button-container">
                    <form method="post" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $productDetails['product_id']; ?>">
                        <input type="hidden" name="product_image"
                            value="<?php echo $productDetails['product_image']; ?>">
                        <input type="hidden" name="product_title"
                            value="<?php echo $productDetails['product_title']; ?>">
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                        <input type="hidden" name="product_price" id="product_price"
                            value='<?php echo $productDetails['product_price']; ?>'>
                        <button type="submit" class="button">ADD TO CART
                        </button>
                    </form>
                </div>
                <div class="button-container">
                    <form method="post" action="checkout.php">
                        <input type="hidden" name="product_id" value="<?php echo $productDetails['product_id']; ?>">
                        <input type="hidden" name="product_price"
                            value="<?php echo $productDetails['product_price']; ?>">
                        <button type="submit" class="button" name="buy_now">BUY NOW</button>
                    </form>
                </div>
                <?php
                }
                ?>
            </div>

            <!-- Display product details -->
            <div class="product-desc">
                <?php
                if (isset($productDetails)) {
                    ?>
                <h2>
                    <?php echo $productDetails['product_title']; ?>
                </h2>
                <h3><b>Price</b> : ₹
                    <?php echo $productDetails['product_price']; ?>
                </h3>
                <p><b>Description</b> :
                    <?php echo $productDetails['product_desc']; ?>
                </p>
                <!-- Add more product details here -->
                <?php
                }
                ?>
            </div>
        </main>
    </div>

    <footer>
        <div class="container-1">
            <p class="heading"><a href="#top">Online Shopping</a></p>
            <p class="description">Welcome to our Online Shopping,Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Nobis quam asperiores aliquam ad corporis labore eaque aperiam, distinctio, inventore odio facilis
                odit mollitia laboriosam. Dolore beatae aspernatur tempore illo laudantium ipsa commodi dicta laboriosam
                iure!</p>
        </div>
    </footer>
</body>

</html>