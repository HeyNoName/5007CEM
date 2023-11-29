<?php 
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PastryDB";

$dbConnection = new mysqli($servername, $username, $password, $dbname);

if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

$totalPrice = isset($_POST['total_price']) ? $_POST['total_price'] : 0;
$productIds = isset($_POST['product_id']) ? $_POST['product_id'] : array();
$productNames = isset($_POST['product_name']) ? $_POST['product_name'] : array();
$productPrices = isset($_POST['product_price']) ? $_POST['product_price'] : array();
$productTypes = isset($_POST['product_type']) ? $_POST['product_type'] : array();
$productQuantities = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : array();

$payDate = date("Y-m-d");
$status = "pending";
$payOption = isset($_POST['pay_option']) ? $_POST['pay_option'] : '';
$amount = $totalPrice;
$discount = 0;
$quantity = count($productIds);
$custId = $_SESSION['user']['cus_id'];

$sqlPayment = "INSERT INTO payment (pay_date, status, pay_option, amount, discount, quantity, cust_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmtPayment = $dbConnection->prepare($sqlPayment);

$stmtPayment->bind_param("sssdidi", $payDate, $status, $payOption, $amount, $discount, $quantity, $custId);

if (!$stmtPayment->execute()) {
    die("Error inserting payment: " . $stmtPayment->error);
}

$payId = $stmtPayment->insert_id;

$stmtPayment->close();

$orderDate = date("Y-m-d");
$customId = '';

$stmtOrder = $dbConnection->prepare("INSERT INTO `order` (order_date, pay_id, custom_id, cust_id, total_price, product_id, product_name, product_price, product_type, product_quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$productId = $productName = $productPrice = $productType = $productQuantity = '';

$stmtOrder->bind_param("sddddissdi", $orderDate, $payId, $customId, $custId, $totalPrice, $productId, $productName, $productPrice, $productType, $productQuantity);

for ($i = 0; $i < count($productIds); $i++) {
    // Update the variable values inside the loop
    $productId = isset($productIds[$i]) ? $productIds[$i] : '';
    $productName = isset($productNames[$i]) ? $productNames[$i] : '';
    $productPrice = isset($productPrices[$i]) ? $productPrices[$i] : 0;
    $productType = isset($productTypes[$i]) ? $productTypes[$i] : '';
    $productQuantity = isset($productQuantities[$i]) ? $productQuantities[$i] : 0;

    if (!$stmtOrder->execute()) {
        die("Error inserting order: " . $stmtOrder->error);
    }
}

$stmtOrder->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay_option'])) {
    $status = "paid";
    $sqlUpdatePayment = "UPDATE payment SET status = ? WHERE cust_id = ? AND status = 'pending'";
    $stmtUpdatePayment = $dbConnection->prepare($sqlUpdatePayment);

    $stmtUpdatePayment->bind_param("si", $status, $custId);

    if ($stmtUpdatePayment->execute()) {
        $_SESSION['cart'] = array();
        $_SESSION['seasonal_cart'] = array();

        header("Location: successful.html");
    } else {
        die("Error updating payment status: " . $stmtUpdatePayment->error);
    }

    $stmtUpdatePayment->close();
} else {
    $_SESSION['cart'] = array();
    $_SESSION['seasonal_cart'] = array();

    $confirmationMessage = "Payment successful! Thank you for your order.";
}
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>La Vie en Rose Pâtisserie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/payment.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/nav.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="overflow-hidden">
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-8">
                        <a href="index.html">
                            <img src="/5007CEM/public_html/image/logo-1.png" height="100" width="100"/>
                        </a>
                        <h3 class="title px-3">La Vie en Rose Pâtisserie</h3>
                    </div>
                    <div class="col-md-4 pl-5">

                        <a href="index.php"><h2><button class="btn btn-primary">Go To Store</button></h2></a>
                    </div>
                </div>
                <h1 class="title pb-4">Payment</h1>
                <div class="container-md border py-4">
                    <?php
                    if (isset($confirmationMessage)) {
                        echo '<h3>Order Details:</h3>';
                        echo '<ul type="1">';
                        for ($i = 0; $i < count($productIds); $i++) {
                            echo '<li>';
                            echo 'Product: ' . $productNames[$i] . ' | ';
                            echo 'Price: RM ' . $productPrices[$i] . ' | ';
                            echo 'Type: ' . ucfirst($productTypes[$i]) . ' | ';
                            echo 'Quantity: ' . $productQuantities[$i];
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '<p>Total: RM ' . $totalPrice . '</p>';
                    } else {
                        echo '<p>Invalid access to this page.</p>';
                    }
                    ?>
                </div>


                <h2 class="title pt-5 pb-4">Payment Option</h2>

                <div>
                    <form action="payment.php" method="POST">
                        <input type="radio" id="card" name="pay_option" value="debit">
                        <label for="card">Credit/Debit Card</label><br>

                        <div class="debit card select">
                            <label for="name">CardHolder Name</label>
                            <input type="text" id="name" name="name" required><br>

                            <label for="cardno">Card No</label>
                            <input type="text" id="cardno" name="cardno" required><br>

                            <label for="expiry">Expiry Date</label>
                            <input type="text" id="expiry" name="expiry" required><br>

                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" required><br>

                            <input type="hidden" name="pay_option" value="debit">
                            <button type="submit" class="btn btn-primary">Pay</button>
                        </div>
                    </form>
                </div>

                <div class="py-3">
                    <form action="payment.php" method="POST">
                        <input type="radio" id="tng" name="pay_option" value="tng">
                        <label for="tng">TnG E-Wallet</label><br>

                        <div class="tng card border-0 select text-center">
                            <h3>Scan QR to Pay</h3>
                            <img src="/5007CEM/public_html/image/tng-1.jpg" alt="TnG QR Code"><br>
                            <input type="hidden" name="pay_option" value="debit">
                            <button type="submit" class="btn btn-primary">Pay</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <script src="/5007CEM/public_html/js/payment.js" type="text/javascript"></script>
    </body>
</html>

