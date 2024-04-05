<?php
include ("../config.php");

// Check if book_id is set in the URL
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'], $_POST['product_price'])) {
    $productId = mysqli_real_escape_string($con, $_POST['product_id']);
    $price = mysqli_real_escape_string($con, $_POST['product_price']);
    // $selectBookQuery = "SELECT * FROM book WHERE BookID = $bookId";
    // $resultBook = mysqli_query($con, $selectBookQuery);

    // // Fetch book details
    // $bookDetails = mysqli_fetch_assoc($resultBook);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="Css/checkout.css"> <!-- Link to your CSS file -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    <div class="container">
        <h2>Checkout</h2>
        <form method="post" action="#">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
                <small>Total: RS.
                    <?php echo $price; ?>
                </small>
            </div>
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <button type="button" onclick="generateRazorpayPayment()" class="button" name="buy_now">BUY NOW</button>
        </form>
    </div>
    <script>
    function generateRazorpayPayment() {
        console.log("clicked")
        // Fetch total from the input field
        var total = '<?php echo $price; ?>';

        if (!total) {
            alert("Total amount not provided.");
            return;
        }

        // AJAX call to create Razorpay order 
        $.ajax({
            url: 'create_order.php', // PHP script to generate Razorpay order
            type: 'POST',
            dataType: 'json',
            data: {
                total: total
            },
            success: function(response) {
                // Initialize Razorpay with order details
                var options = {
                    "key": "rzp_test_i3yPLPe4CNXnU9",
                    "amount": response.amount,
                    "currency": response.currency,
                    "name": "Laptop Selling System",
                    "description": "Payment for Order",
                    "order_id": response.id,
                    "handler": function(response) {
                        // Redirect to success page or handle success event
                        window.location.href = 'home.php?order_id=' + response.razorpay_order_id;
                    },
                    "prefill": {
                        // Pre-fill customer details if available
                        "name": $('#name').val(),
                        "email": "customer@example.com",
                        "contact": $('#mobile').val()
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                var rzp = new Razorpay(options);
                rzp.open();
            }
        });
    }
    </script>
</body>

</html>