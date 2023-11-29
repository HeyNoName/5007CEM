<?
session_start();
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
        <link rel="stylesheet" href="/5007CEM/public_html/css/user.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <style>
        .searchBox{
            display: flex;
            justify-content: center;
            padding-top: 20px;

        }
        .size{
            width: 305px;
        }

        .card-deck {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            margin-right: -15px;
            margin-left: -15px;
            flex-direction: column !important;
        }

        .custom-card {
            width: 800px;
            margin: 25px;
        }

        .custom-card .content-title {
            font-size: 18px;
        }
    </style>
    <body>

        <div class="overflow-hidden">
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-8">
                        <a href="index.php">
                            <img src="/5007CEM/public_html/image/logo-1.png" height="100" width="100"/>
                        </a>
                        <h3 class="title px-3">La Vie en Rose Pâtisserie</h3>
                    </div>
                    <div class="col-md-4 pl-5">
                        <a href="index.php"><h2><button class="btn btn-primary">Go To Store</button></h2></a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                        session_start();

                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user'];
                            echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 25px;"></i></a>';
                        } else {
                            echo '<a href="login.php"><i class="fa fa-user px-5" aria-hidden="true" style="font-size: 25px;"></i></a>';
                        }
                        ?>

                    </div>
                </div>

                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'Order')">Order History</button>
                    <button class="tablinks" onclick="openTab(event, 'User')">Account Information</button>
                </div>


                <div id="Order" class="tabcontent" style="display:block">

                    <h3 class="title">Order Details</h3>
                    <div class="card-deck">
                        <?php
                        $dbc = mysqli_connect('localhost', 'root', '', 'PastryDB');

                        if ($dbc) {
                            $sql = "SELECT order_id, order_date, pay_id, custom_id, cust_id, total_price, product_id, product_name, product_price, product_type, product_quantity FROM `order`";
                            $result = mysqli_query($dbc, $sql);
                            
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class='card custom-card'>";
                                    echo "<div class='card-body' style='height:150px'>";
                                    echo "<p class='content-title'>{$row['order_date']}</p>";
                                    echo "<h5 class='content-title'>{$row['product_name']}</h5>";
                                    echo "<p class='content-title'>Total: RM{$row['total_price']}</p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo " <h3>No orders yet</h3>";
                                echo " <p>Go to store to place an order.</p>";
                            }

                            mysqli_close($dbc);
                        } else {
                            echo "Failed to connect to the database.";
                        }
                        ?>
                    </div>
                </div>

                <div id="User" class="tabcontent">
                    <h2>Account Information</h2>
                    <div class="pt-4">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<p>Name: ' . $user['username'] . '</p>';
                            echo '<p>Email: ' . $user['email'] . '</p>';
                        }
                        ?>
                        
                    </div>
                </div>
            </div>

        </div>
        <script src="/5007CEM/public_html/js/user.js" type="text/javascript"></script>
    </body>
</html>
