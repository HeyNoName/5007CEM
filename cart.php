<?php
session_start();
$totalPrice = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        // Add the product to the cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]++;
        } else {
            $_SESSION['cart'][$productId] = 1;
        }

        $successMessage = "Product added to the cart successfully!";
    } elseif (isset($_POST['seasonal_id'])) {
        $seasonalId = $_POST['seasonal_id'];

        if (!isset($_SESSION['seasonal_cart'])) {
            $_SESSION['seasonal_cart'] = array();
        }

        if (isset($_SESSION['seasonal_cart'][$seasonalId])) {
            $_SESSION['seasonal_cart'][$seasonalId]++;
        } else {
            $_SESSION['seasonal_cart'][$seasonalId] = 1;
        }

        $successMessage = "Seasonal product added to the cart successfully!";
    }

    if (isset($_POST['delete_item_id'])) {
        $deleteItemId = $_POST['delete_item_id'];

        if (isset($_SESSION['cart'][$deleteItemId])) {
            unset($_SESSION['cart'][$deleteItemId]);
        } elseif (isset($_SESSION['seasonal_cart'][$deleteItemId])) {
            unset($_SESSION['seasonal_cart'][$deleteItemId]);
        }

        $successMessage = "Item removed from the cart successfully!";
    }
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$seasonalCart = isset($_SESSION['seasonal_cart']) ? $_SESSION['seasonal_cart'] : array();

$allProducts = array();

if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
    $validProductIds = array_filter(array_keys($cart), 'is_numeric');
    $validSeasonalIds = array_filter(array_keys($seasonalCart), 'is_numeric');

    if (!empty($validProductIds) || !empty($validSeasonalIds)) {
        $productIds = implode(',', $validProductIds);
        $seasonalIds = implode(',', $validSeasonalIds);

        $sqlProducts = "SELECT id, name, price FROM products WHERE id IN ($productIds)";
        $resultProducts = mysqli_query($dbc, $sqlProducts);

        if ($resultProducts) {
            while ($row = mysqli_fetch_assoc($resultProducts)) {
                $allProducts[$row['id']] = $row;
                $allProducts[$row['id']]['type'] = 'regular';
            }
        } else {
            echo 'Database Error: ' . mysqli_error($dbc);
        }

        if (!empty($seasonalIds)) {
            $sqlSeasonal = "SELECT seasonal_id, seasonal_name, seasonal_price FROM seasonal WHERE seasonal_id IN ($seasonalIds)";
            $resultSeasonal = mysqli_query($dbc, $sqlSeasonal);

            if ($resultSeasonal) {
                while ($row = mysqli_fetch_assoc($resultSeasonal)) {
                    $allProducts[$row['seasonal_id']] = $row;
                    $allProducts[$row['seasonal_id']]['type'] = 'seasonal';
                }
            } else {
                echo 'Database Error: ' . mysqli_error($dbc);
            }
        }

        mysqli_close($dbc);
    } else {
        echo 'Invalid product IDs and seasonal product IDs in the cart.';
    }
} else {
    die('Database connection error: ' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/payment.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/nav.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <style>
            .searchBox{
                display: flex;
                justify-content: center;
                padding-top: 20px;

            }
            .size{
                width: 305px;
            }
            .button input[type = "button"]{
                background-color: #88694e ;
                border: none;
                color: white;
                padding: 5px 15px;
                text - decoration: none;
                display: inline-block;
                font - size: 16px;
                margin: auto;
                cursor: pointer;
            }

            .button input[type = "button"]:hover{
                background-color: white;
                color: #88694e ;
            }

            input[type = "submit"]#remove{
                background-color: #88694e ;
                border: none;
                color: white;
                padding: 5px 15px;
                text-decoration: none;
                display: inline-block;
                font - size: 16px;
                margin: auto;
                cursor: pointer;
            }

            input[type = "submit"]#remove:hover{
                background-color: #88694e ;
                color: #C70039;
            }

        </style>
    </head>

    <body>

        <div class="overflow-hidden">
           <!-- header -->
            <div class="header">
                <div class="container" id="myHeader">
                    <!--mobile-menu-->
                    <div class="d-flex d-lg-none justify-content-between menu-btn">
                        <span id="mobile-menu-button" class="open-button" onclick="openNav()">
                            <i class="fa fa-bars"></i>
                        </span>

                        <div class="pl-5">
                            <a href="index.php">
                                <img src="/5007CEM/public_html/image/logo-1.png" height="70" width="70"/>
                            </a>
                        </div>


                        <div class="menu-icon">
                            <div class="search">
                                <span style="cursor:pointer"><a href="cart.php"><i class="fa fa-shopping-bag"></i></a></span>
                                <?php
                                // Check if the user is logged in
                                if (isset($_SESSION['user'])) {
                                    echo '<a href="user.php"><i class="fa fa-user" aria-hidden="true"></i></a>';
                                    echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>';
                                } else {
                                    echo '<a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <form action="searchResult.php" method="GET" id="mobile-menu-button">
                        <div class="searchBox">
                            <input type="text" id="search" name="search" class="size">
                            <button type="submit" style="border: none; background: transparent;">
                                <i class="fa fa-search" Onclick="myFunction()"></i>
                            </button>
                        </div>
                    </form>

                    <div class="row head pt-4" id="menu">

                        <div class="col-lg-8">
                            <a href="index.html">
                                <img src="/5007CEM/public_html/image/logo-1.png" height="100" width="100"/>
                            </a>
                            <h3 class="title px-2 pt-2">La Vie en Rose Pâtisserie</h3>
                        </div>

                        <div class="col-lg-4 pl-5">
                            <div class="search">
                                <form action="searchResult.php" method="GET">
                                    <div class="search">
                                        <input type="text" id="search" name="search">
                                        <button type="submit" style="border: none; background: transparent;">
                                            <i class="fa fa-search" onclick="myFunction()"></i>
                                        </button>
                                    </div>
                                </form>
                                <a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                <span style="cursor:pointer"><a href="cart.php"><i class="fa fa-shopping-bag"></i></a></span>
                                <?php
                                // Check if the user is logged in
                                if (isset($_SESSION['user'])) {
                                    echo '<a href="user.php"><i class="fa fa-user" aria-hidden="true"></i></a>';
                                    echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>';
                                } else {
                                    echo '<a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                </div>

                <div class="menu" id="mySidenav">
                    <a href="javascript:void(0)" id="mobile-menu-button" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="index.php">Home</a>
                    <div class="dropdown">
                        <a href="product.php">All Product</a>
                        <div class="dropdown-content" id="menu">
                            <a href="product.php#cakes">Cakes</a>
                            <a href="product.php#cookies">Cookies & Macaroons</a>
                            <a href="product.php#tarts">Tarts</a>
                            <a href="product.php#pastry">Pastry</a>
                            <a href="product.php#savouries">Savouries</a>
                            <a href="product.php#gift">GiftBox</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="seasonal.php">Seasonal Product</a>
                        <div class="dropdown-content" id="menu">
                            <a href="seasonal.php#mooncake">Mooncake Set</a>
                            <a href="seasonal.php#father">Father's Day Special</a>
                            <a href="seasonal.php#mother">Mother's Day Special</a>
                            <a href="seasonal.php#christmas">Christmas</a>
                            <a href="seasonal.php#chinese">Chinese New Year</a>
                            <a href="seasonal.php#raya">Hari Raya</a>
                        </div>
                    </div>
                    <a href="customize.php">Customize</a>
                    <div class="dropdown">
                        <a href="faq.php">FAQs</a>
                        <a href="allergen.php" id="mobile-menu-button">Allergen and Diet Information</a>
                        <a href="terms.php" id="mobile-menu-button">Terms of Service</a>
                        <a href="privacy.php" id="mobile-menu-button">Privacy Policy</a>
                        <a href="pick.php" id="mobile-menu-button">Pickup Information</a>
                        <div class="dropdown-content" id="menu">
                            <a href="allergen.html">Allergen and Diet Information</a>
                            <a href="terms.php">Terms of Service</a>
                            <a href="privacy.php">Privacy Policy</a>
                            <a href="pick.html">Pickup Information</a>
                        </div>
                    </div>
                    <a href="contact.php">Contact Us</a>
                </div>
            </div>

            <div class="container hr-line">
                <hr/>
            </div>


            <div class="container">
                <h1 class="title">Shopping Cart</h1>
                <?php
                // Display success message if applicable
                if (isset($successMessage)) {
                    echo '<p>' . $successMessage . '</p>';
                }
                ?>

                <div class="content" id="mobile-menu-button">
                    <?php
                    // Display the combined cart contents
                    if (!empty($allProducts)) {
                        $totalPrice = 0;

                        foreach ($allProducts as $itemId => $item) {
                            echo '<div class="card mb-3">';
                            echo '<div class="row no-gutters">';

                            echo '<div class="col-md-8">';

                            // Check if "name" and "price" keys are set
                            $itemName = isset($item['name']) ? $item['name'] : (isset($item['seasonal_name']) ? $item['seasonal_name'] : 'N/A');
                            $itemPrice = isset($item['price']) ? $item['price'] : (isset($item['seasonal_price']) ? $item['seasonal_price'] : 'N/A');

                            // Increment total price
                            $totalPrice += $itemPrice * ($item['type'] === 'regular' ? $cart[$itemId] : $seasonalCart[$itemId]);

                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $itemName . '</h5>';
                            echo '<p class="card-text">Price: ' . $itemPrice . ' RM</p>';
                            echo '<p class="card-text">Type: ' . ucfirst($item['type']) . '</p>';
                            echo '<p class="card-text">Quantity: ' . ($item['type'] === 'regular' ? $cart[$itemId] : $seasonalCart[$itemId]) . '</p>';

                            // Display delete button
                            echo '<form method="post" action="" class="float-right">
                    <input type="hidden" name="delete_item_id" value="' . $itemId . '">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>';

                            echo '</div></div></div></div>';
                        }

                        // Display total price
                        echo '<div class="text-right mt-3"><strong>Total Price: RM ' . $totalPrice . '</strong></div>';
                    } else {
                        echo '<p>Your combined cart is empty.</p>';
                    }
                    ?>
                    <div style="padding-left:3.9em;" class="button pt-3"><input type="button" value="Continuous Shopping"onclick="location.href = 'product.php'" >&nbsp;&nbsp;&nbsp;<input type="button" value="CheckOut" onclick="location.href = 'payment.html'"> </div>
                </div>

                <div class="content" id="menu">
                    <?php
                    // Display the combined cart contents
                    if (!empty($allProducts)) {
                        echo '<table class="table">';
                        echo '<tr><th>Product</th><th>Price (RM)</th><th>Type</th><th>Quantity</th><th>Action</th></tr>';

                        foreach ($allProducts as $itemId => $item) {
                            echo '<tr>';

                            $itemName = isset($item['name']) ? $item['name'] : (isset($item['seasonal_name']) ? $item['seasonal_name'] : 'N/A');
                            $itemPrice = isset($item['price']) ? $item['price'] : (isset($item['seasonal_price']) ? $item['seasonal_price'] : 'N/A');

                            echo '<td>' . $itemName . '</td>';
                            echo '<td>' . $itemPrice . '</td>';
                            echo '<td>' . ucfirst($item['type']) . '</td>';
                            echo '<td>' . ($item['type'] === 'regular' ? $cart[$itemId] : $seasonalCart[$itemId]) . '</td>';

                            // Display delete button
                            echo '<td>
                        <form method="post" action="">
                            <input type="hidden" name="delete_item_id" value="' . $itemId . '">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>';

                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo '<p>Your cart is empty.</p>';
                    }
                    echo '<div class="text-right mt-3"><h4>Total Price: RM ' . $totalPrice . '</h4></div>';
                    ?>
                    <div style="padding-left:66.9em;" class="button pt-3"><input type="button" value="Continuous Shopping"onclick="location.href = 'product.php'" >&nbsp;&nbsp;&nbsp;<input type="button" value="CheckOut" onclick="location.href = 'payment.html'"> </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</html>

