<?php
include("../config.php");  

if (isset($_REQUEST['submit'])){
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  
  $sql = " SELECT * FROM `customer` WHERE Username = '$username' AND Password = '$password' ";
  $result = mysqli_query($con, $sql);
  
  if(mysqli_num_rows($result) > 0) 
  {
    // Successful login
    header("Location: login.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Customer Signup</title>
</head>
<style>
  html, body {
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
  
  #survey-form {
    width: 88%;
    margin: 0 auto;
    border-radius: 10px;
    padding: 30px;
    max-height: 70vh; /* Set a maximum height for scrolling */
    overflow-y: auto; /* Enable vertical scrolling if content exceeds max-height */
  }
  
  label {
    width: 100%;
    margin-bottom: 10px;
    font-size: 20px;
  }
  
  input, select {
    width: 100%;
    height: 40px;
    border-radius: 5px;
    font-size: 16px;
    padding: 5px;
  }
  
  section{
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
    width: 55vw;
    margin: 100px auto;
    padding-bottom:1%;
    height: 78%;
  }
  
  .form-div {
    margin-bottom: 15px;
  }
  
  .form-div-btn {
    margin-top: 30px;
    text-align: center;
  }
  
  input[type="submit"] {
    width: 100%;
    height: 8%;
    color: white;
    background-color: green;
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
    border-radius: 5px;
    border: 0;
    cursor: pointer;
    transition: all 0.4s linear;
  }

input[type="submit"]:hover{
        background: #68496b;
    }

  .login_link{
    margin: 15px 0;
    text-align: center;
    font-size: 16px;
    color:#666666;
  }
  .login_link a{
    color: #2691d9;
    text-decoration: underline;
  }
  
  
  /* Media query for responsiveness */
  @media screen and (max-width: 768px) {
    #survey-form {
      width: 90%; /* Adjust width for smaller screens */
    }
  }


</style>
<body>
<section>
<form id="survey-form" method="post">

    <div class="form-div">
      <h1 id="title">Customer Signup</h1>
    </div>

    <div class="form-div">
      <label>First Name:</label>
      <input type="text" id="fname" name="firstname" placeholder="First Name" required>
    </div>

    <div class="form-div">
      <label>Last Name:</label>
      <input type="text" id="lname" name="lastname" placeholder="Last Name" required>
    </div>

    <div class="form-div">
      <label>E-mail:</label>
      <input type="email" id="email" name="email" placeholder="Enter Your E-mail" required>
    </div>

    <div class="form-div">
      <label>Username :</label>
      <input type="text" id="username" name="username" placeholder="Username" required>
    </div>

    <div class="form-div">
      <label>Password :</label>
      <input type="password" id="password" name="password" placeholder="Password" required>
    </div>


    <div class="form-div">
      <label>Contact:</label>
      <input type="text" id="contact" name="contact" placeholder="Enter Your Contact" required>
    </div>

    <div class="form-div">
      <label>Address Line 1:</label>
      <input type="text" id="address1" name="address1" placeholder="Address Line 1" required>
    </div>

    <div class="form-div">
      <label>Address Line 2:</label>
      <input type="text" id="address2" name="address2" placeholder="Address Line 2">
    </div>

    <div class="form-div">
      <label>Bank Name:</label>
      <input type="text" id="bankname" name="bankname" placeholder="Bank Name">
    </div>

    <div class="form-div">
      <label>Account No:</label>
      <input type="text" id="Accountno" name="Account-no" placeholder="Account No">
    </div>

    <div class="form-div">
      <label>Branch:</label>
      <input type="text" id="branch" name="branch" placeholder="Branch">
    </div>

    <div class="form-div">
      <label>Ifsc Code:</label>
      <input type="text" id="ifsc-code" name="ifsc-code" placeholder="IFSC Code">
    </div>

    <div class="form-div">
      <label>PanCard:</label>
      <input type="text" id="pancard" name="Pancard" placeholder="Pancard">
    </div>

    <div class="form-div">
      <label>City:</label>
      <input type="text" id="city" name="city" placeholder="City" required>
    </div>

    <div class="form-div">
      <label>State</label>
      <input type="text" id="state" name="state" placeholder="State" required>
    </div>

    <div class="form-div">
      <label>Country</label>
      <input type="text" id="country" name="country" placeholder="Country" required>
    </div>

    <div class="form-div">
      <label>Pincode</label>
      <input type="text" id="pincode" name="pincode" placeholder="Pincode" required>
    </div>

    <div class="form-div-btn">
      <input type="submit" value="Submit" name="submit">
    </div>
    
    <div class="login_link">
        Already an member?<a href="login.php" name="login">Login</a>
      </div>
  </form>
  </section>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $uname = $_POST['username'];
    $passwd = $_POST['password'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $bankname = $_POST['bankname'];
    $accno = $_POST['Account-no'];
    $branch = $_POST['branch'];
    $ifscode = $_POST['ifsc-code'];
    $pancard = $_POST['Pancard'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];

    $sql = "INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `Email`, `Username`, `Password`, `Phone_number`, `address_line1`, `address_line2`, `Acc_no`, `Bank_Name`, `Branch`, `Ifsc_Code`, `country`, `city`, `state`, `pincode`, `Registration_date`) 
    VALUES 
    ('', '$fname', '$lname', '$email', '$uname', '$passwd', '$contact', '$address1', '$address2', '$accno', '$bankname', '$branch', '$ifscode', '$country', '$city', '$state', '$pincode0', '');";


    $result = mysqli_query($con, $sql);

    if ($result) {
        // Successful signup
        header("Location: login.php");
    } else {
        // Error in signup
        $error_message = "Error in signup: " . mysqli_error($con);
    }
}
?>  