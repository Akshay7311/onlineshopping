<?php
include("config.php");
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
}

header {
    top: 0;
    left: 0;
    right: 0;
    background-color: black;
    color: white;
    padding: 18px;
    font-weight: bold !important;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    font-weight: bold;
    margin: 0;
    font-size: 30px;
    cursor: pointer;
}

nav {
    display: flex;
    gap: 25px;
}

nav a {
    color: white !important;
    font-weight: bold !important;
    text-decoration: none;
    font-size: 22px;
}

footer {
    border-color: black;
    background-color: white;
    color: black;
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


h1 a {
    color: #fff !important;
}

.heading a {
    font-weight:500;
    color: black !important;
    font-size: 2.2em;
    text-transform: capitalize;
    text-decoration: none;
    font-weight: bold;
}
section{
    background-color: red;
}
 .center{
    height:78vh;
    width: 100vw;
    background-image: url('images/banner.jpg');
    background-repeat: no-repeat;
    background-size: cover;
 }
</style>
<body>
<header>
    <h1>Online Shopping</h1>
    <nav>
        <a href="Admin/login.php">Admin</a>
        <a href="Seller/login.php">Seller</a>
        <a href="Customer/login.php">Customer</a>
        <!-- Add more navigation links as needed --> 
    </nav>
</header>
<section>
    <div class="center"></div>
</section>
<footer>
    <div class="container-1">
        <p class="heading"><a href="#top">Online Shopping</a></p>
        <p class="discription">Online shopping revolutionizes retail by allowing consumers to explore products, compare prices, and make secure transactions from home, simplifying the purchasing process and providing a personalized experience.</p>
    </div>
</footer>
</body>
</html>
