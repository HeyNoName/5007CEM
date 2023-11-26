<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PastryDB";

// Using procedural style
$dbc = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve order ID and total price from URL parameters
$orderID = isset($_GET['id']) ? $_GET['id'] : '';
$totalPrice = isset($_GET['total']) ? $_GET['total'] : 0;  // Set a default value of 0 if total price is not available
// Retrieve order details from the database
$sql = "SELECT * FROM custom WHERE id = '$orderID'";
$result = mysqli_query($dbc, $sql);

if ($result) {
    $orderDetails = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($dbc);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    // Handle the error, exit, or redirect as needed
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>La Vie en Rose Pâtisserie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/payment.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/nav.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBv">
        </script>
    </head>

    <body>
        <div class="overflow-hidden">
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-8">
                        <a href="index.html">
                            <img src="/5007CEM/public_html/image/logo-1.png" height="100" width="100" />
                        </a>
                        <h3 class="title px-3">La Vie en Rose Pâtisserie</h3>
                    </div>
                    <div class="col-md-4 pl-5">
                        <a href="index.php">
                            <h2><button class="btn btn-primary">Go To Store</button></h2>
                        </a>
                    </div>
                </div>
                <h1 class="title pb-4">Payment</h1>
                <div class="container-md border py-4">
                    <h2>Order Details</h2>
                    <p>Order ID: <?php echo $orderID; ?></p>
                    <p>Flavor: <?php echo isset($orderDetails['flavour']) ? $orderDetails['flavour'] : 'N/A'; ?></p>
                    <p>Filling: <?php echo isset($orderDetails['filling']) ? $orderDetails['filling'] : 'N/A'; ?></p>
                    <p>Frosting: <?php echo isset($orderDetails['frosting']) ? $orderDetails['frosting'] : 'N/A'; ?></p>
                    <p>Shape: <?php echo isset($orderDetails['shape']) ? $orderDetails['shape'] : 'N/A'; ?></p>
                    <!-- Add more details based on your database structure -->

                    <h2>Total Price</h2>
                    <p>RM <?php echo number_format(floatval($totalPrice), 2); ?></p>
                </div>

                <div>
                    <form>
                        <h2 class="title pt-5 pb-4">Payment Option</h2>
                        <input type="radio" id="card" name="card" value="debit">
                        <label for="card">Credit/Debit Card</label><br>

                        <div class="debit card select">
                            <label for="name">CardHolder Name</label>
                            <input type="text" id="name" name="name"><br>

                            <label for="cardno">Card No</label>
                            <input type="text" id="cardno" name="cardno"><br>

                            <label for="expiry">Expiry Date</label>
                            <input type="text" id="expiry" name="expiry"><br>

                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv"><br>

                            <button class="btn btn-primary"><a href="successful.html">Pay</a></button>
                        </div>

                        <div class="py-3">
                            <input type="radio" id="tng" name="tng" value="tng">
                            <label for="tng">TnG E-Wallet</label><br>
                            <div class="tng card border-0 select text-center">
                                <h3>Scan QR to Pay</h3>
                                <img src="/5007CEM/public_html/image/tng-1.jpg" /><br>
                                <a href="successful.html"><button class="btn btn-primary">Pay</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/5007CEM/public_html/js/payment.js" type="text/javascript"></script>
    <script>
                    $(document).ready(function () {
                        // Hide all content boxes except the first one
                        $(".select").not(":first").hide();

                        // Check the first radio button
                        $('input[type="radio"]').click(function () { });

                        $('input[type="radio"]').click(function () {
                            var inputValue = $(this).attr("value");
                            var targetBox = $("." + inputValue);

                            // Check if the targetBox is currently visible
                            var isVisible = $(targetBox).is(":visible");

                            // Hide all content boxes
                            $(".select").hide();

                            // Uncheck all radio buttons
                            $('input[type="radio"]').prop('checked', false);

                            // If the targetBox was not visible before, show it and check the corresponding radio button
                            if (!isVisible) {
                                $(targetBox).show();
                                $(this).prop('checked', true);
                            }
                        });

                    });
    </script>
</body>

</html>
