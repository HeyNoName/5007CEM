<?php
session_start();
$dbc = mysqli_connect('localhost', 'root', '', 'PastryDB');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        // Get product details
        $product_id = $_POST['product_id'];
        $product_type = $_POST['product_type'];
        $quantity = 1; // You can change this based on your requirements

        // Add the product to the cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }

        // Redirect to prevent form resubmission
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>
    <!-- Add your existing HTML content here -->

    <!-- Display products (seasonal or regular) from the database -->
    <?php
    // Display seasonal products
    $seasonal_products_query = "SELECT * FROM seasonal";
    $seasonal_products_result = mysqli_query($dbc, $seasonal_products_query);

    if ($seasonal_products_result && mysqli_num_rows($seasonal_products_result) > 0) {
        echo '<h2>Seasonal Products</h2>';
        echo '<form method="post">';
        while ($seasonal_product = mysqli_fetch_assoc($seasonal_products_result)) {
            echo '<div>';
            echo '<img src="' . $seasonal_product['image'] . '" alt="Product Image" class="img-fluid" />';
            echo '<h4>' . $seasonal_product['seasonal_name'] . '</h4>';
            echo '<p>Price: RM' . $seasonal_product['seasonal_price'] . '</p>';
            echo '<input type="hidden" name="product_id" value="' . $seasonal_product['seasonal_id'] . '">';
            echo '<input type="hidden" name="product_type" value="seasonal">';
            echo '<input type="submit" name="add_to_cart" value="Add to Cart">';
            echo '</div>';
        }
        echo '</form>';
    }

    // Display regular products
    $regular_products_query = "SELECT * FROM products";
    $regular_products_result = mysqli_query($dbc, $regular_products_query);

    if ($regular_products_result && mysqli_num_rows($regular_products_result) > 0) {
        echo '<h2>Regular Products</h2>';
        echo '<form method="post">';
        while ($regular_product = mysqli_fetch_assoc($regular_products_result)) {
            echo '<div>';
            echo '<img src="' . $regular_product['image'] . '" alt="Product Image" class="img-fluid" />';
            echo '<h4>' . $regular_product['name'] . '</h4>';
            echo '<p>Price: RM' . $regular_product['price'] . '</p>';
            echo '<input type="hidden" name="id" value="' . $regular_product['id'] . '">';
            echo '<input type="hidden" name="type" value="regular">';
            echo '<input type="submit" name="cart" value="Add to Cart">';
            echo '</div>';
        }
        echo '</form>';
    }
    ?>
</body>
</html>
