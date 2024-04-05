<!DOCTYPE>
<!DOCTYPE html>
<html>

<head>
    <title>Seller Login</title>

    <link rel="stylesheet" type="text/css" href="styles/login_style.css" media="all">




</head>

<body>




    <div class="login">

        <h2 style="color: white; text-align: center; ">
            <?php echo @$_GET['logged_out']; ?>
        </h2>

        <h1>Seller Login</h1>
        <form method="post" action="login.php">
            <input type="text" name="email" placeholder="Enter Your Email" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login.</button>
        </form>
    </div>



</body>

</html>



<?php
session_start();

include ("includes/db.php");
global $con;

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);   //used for avoiding attacks

    $pass = mysqli_real_escape_string($con, $_POST['password']);

    $sel_user = "select * from sellers where email='$email' and password='$pass'";

    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);

    $user_data = mysqli_fetch_assoc($run_user);
    $seller_id = $user_data['seller_id'];



    if ($check_user == 0) {
        echo "<script> alert('Invalid Email or Password !') </script>";
    } else {
        $_SESSION['user_email'] = $email;
        $_SESSION['logged_in'] = true;
        $_SESSION['seller_id'] = $seller_id;

        echo "<script> window.open('index.php?logged_in=You Successfully logged in ..!','_self') </script>";
    }




}




?>