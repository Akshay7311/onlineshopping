<?php
include("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
</head>

<style>
    body {
        padding: 0;
        margin: 0;
        background-image: url('../images/book-1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
        font-family: 'Arial', sans-serif;
        /* Add a font-family for better cross-browser compatibility */
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
        border-radius: 5px;
        overflow: hidden;
        width: min(500px, 80%);
        margin: 100px auto;
        /* Added margin for better spacing and centered the form */
    }

    .title {
        font-size: 1.6rem;
        color: white;
        /* Fix the variable to a specific color or use a CSS variable */
        text-align: center;
        padding: 20px 0;
        /* Adjusted padding */
    }

    form {
        width: 85%;
        /* Make the form width 100% */
        padding: 20px;
        /* Added padding for better spacing */
    }

    label {
        display: block;
        /* Changed to block for better spacing */
        font-size: 1rem;
        font-weight: 500;
        color: white;
        /* Fix the variable to a specific color or use a CSS variable */
        margin-bottom: 8px;
    }

    input,
    textarea {
        width: 100%;
        background: transparent;
        color: #e0e8efb8;
        font-size: 0.8rem;
        font-weight: 500;
        outline: 2px solid #a2b7d3;
        border-radius: 4px;
        border: 0;
        padding: 10px;
        margin-bottom: 10px;
        /* Adjusted margin for better spacing */
        transition: all 0.2s;
    }

    button {
        background: #b586b9;
        color: #fff;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-align: center;
        text-transform: uppercase;
        padding: 16px;
        margin-top: 10px;
        border-radius: 5px;
        border: 0;
        cursor: pointer;
        transition: all 0.4s linear;
        width: 106%;
        /* Make the button width 100% */
    }

    button:hover {
        background: #68496b;
    }
</style>

<body>
    <section>
        <h1 class="title">Contact</h1>
        <form action="" method="post">
            <div class="input-control">
                <label for="username">Your Name</label>
                <input type="text" placeholder="Your name" id="username" />
            </div>

            <div class="input-control">
                <label for="email">Email Address</label>
                <input type="email" placeholder="info@email.com" id="email" />
            </div>

            <div class="input-control">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="4" placeholder="Write your message here" required></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </section>
</body>

</html>
