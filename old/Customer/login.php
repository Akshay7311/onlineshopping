<?php
include ("../config.php");

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = " SELECT * FROM `customers` WHERE customer_email = '$email' AND customer_pass = '$password' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Successful login
        header("Location: Dashboard.php");
    } else {
        // Invalid credentials, set error message
        $error_message = "Invalid username or password";
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Customer Login</title>
    <link href="Css/Login.css" rel="stylesheet" type="text/css" />
</head>
<style>
html,
body {
    padding: 0%;
    margin: 0%;
    height: 100%;
    width: 100%;
    overflow: hidden;
    position: relative;
    font-weight: bold;
    background-image: url("../great-online-shopping-sites.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}

#title {
    font-size: 34px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 0%;
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
    border-radius: 15px;
    overflow: hidden;
    width: 50vw;
    margin: 100px auto;
    height: 50%;
}

#survey-form {
    width: 100%;
    margin: 0 auto;
    border-radius: 10px;
    padding: 20px;
    max-height: 80vh;
    /* Set a maximum height for scrolling */
    overflow-y: auto;
    /* Enable vertical scrolling if content exceeds max-height */
}

label {
    width: 100%;
    margin-bottom: 10px;
}

input,
select {
    width: 80%;
    height: 30px;
    border-radius: 5px;
    font-size: 14px;
    padding: 5px;
}

.form-div {
    margin-bottom: 15px;
}

.form-div-btn {
    margin-top: 30px;
    text-align: center;
}

input[type="submit"] {
    width: 60%;
    height: 8%;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    background: #b586b9;
    color: #fff;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-align: center;
    text-transform: uppercase;
    padding: 16px;
    margin-top: 10px;
    border-radius: 10px;
    border: 0;
    cursor: pointer;
    transition: all 0.4s linear;
}

input[type="submit"]:hover {
    background: #68496b;
}

.login_link {
    margin: 15px 0;
    text-align: center;
    font-size: 16px;
    color: #666666;
}

.login_link a {
    color: #2691d9;
    text-decoration: underline;
}


/* Media query for responsiveness */
@media screen and (max-width: 768px) {
    #survey-form {
        width: 90%;
        /* Adjust width for smaller screens */
    }
}
</style>

<body>
    <section>
        <form id="survey-form" method="post">

            <div class="form-div">
                <h1 id="title">Customer Login</h1>
            </div>

            <div class="form-div">
                <label>Email :</label>
                <input type="email" id="email" name="email" placeholder="email" required>
            </div>

            <div class="form-div">
                <label>Password :</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-div-btn">
                <input type="submit" value="Submit" name="submit">
            </div>

            <div class="login_link">
                New member?<a href="Signup.php" name="Signup">Sign up</a>
            </div>
        </form>
    </section>
</body>

</html>