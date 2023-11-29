<?php
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
        <link rel="stylesheet" href="/5007CEM/public_html/css/product.css">
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
            @media screen and (max-width: 767px){

                .card{
                    width: 20rem;
                }

                .row{
                    display:block;
                }

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
                            <a href="allergen.php">Allergen and Diet Information</a>
                            <a href="terms.php">Terms of Service</a>
                            <a href="privacy.php">Privacy Policy</a>
                            <a href="pick.php">Pickup Information</a>
                        </div>
                    </div>
                    <a href="contact.php">Contact Us</a>
                </div>
            </div>

            <div class="container hr-line">
                <hr/>
            </div>

            <!--Best Seller-->
            <div class="container pt-3 pb-5"> 
                <h1 id="best" class="title pt-3">Best Seller</h1>
                <div class="row justify-content-center pb-4">
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE id=1";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE id=5";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE id=8";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE id=12";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE id=15";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE id=18";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div> 
            <!--Cakes-->
            <div class="container pt-3 pb-5"> 
                <h1 id="cakes" class="title pt-3">Cakes</h1>
                <div class="row justify-content-center pb-4">
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE category='cakes'";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div>


            <!--cookies-->
            <div class="container pt-3 pb-5"> 
                <h1 id="cookies" class="title pt-3">Cookies and Macarons</h1>
                <div class="row justify-content-center pb-4">
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE category='macarons'";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div> 

            <!--Tarts-->
            <div class="container pt-3 pb-5"> 
                <h1 id="tarts" class="title pt-3">Tarts</h1>
                <div class="row justify-content-center pb-4">
                   <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE category='tarts'";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!--savouries-->
            <div class="container pt-3 pb-5"> 
                <h1 id="savouries" class="title pt-3">Savouries</h1>
                <div class="row justify-content-center pb-4">
                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE category='pastry'";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!--gifts-->
            <div class="container pt-3 pb-5"> 
                <h1 id="gift" class="title pt-3">GiftBox</h1>
                <div class="row justify-content-center pb-4">
                 <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT id, name, description, price, image FROM products WHERE category='gift'";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['description']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['price']}</h3>";

                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Footer -->
            <div class="row text-left px-5 pt-5 foot">
                <div class="col-md-4 col-sm-12 pb-3">
                    <h3 class="pb-3">La Vie en Rose Pâtisserie</h3>
                    <p>
                        Indulge in premium French desserts, including our exquisite birthday cakes, that are perfect for
                        gifting and accessible to everyone. Our cakes are crafted from scratch using only the finest halal
                        ingredients, ensuring quality and inclusivity for all.
                    </p>
                    <br>
                </div>

                <div class="col-md-4 col-sm-12 pb-5">
                    <h3 class="pb-3">Quick Links</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <p><a href="index.php">Home</a></p>
                            <p><a href="about.php">About Us</a></p>
                            <p><a href="product.php">All Products</a></p>
                            <p><a href="seasonal.php">Seasonal Products</a></p>
                            <p><a href="customize.php">Customize</a></p>
                            <p><a href="contact.php">Contact Us</a></p>
                        </div>
                        <div class="col-md-8">
                            <p><a href="allergen.php">Allergen and Diet Information</a></p>
                            <p><a href="faq.php">FAQs</a></p>
                            <p><a href="terms.php">Terms of Service</a></p>
                            <p><a href="privacy.php">Privacy Policy</a></p>
                            <p><a href="pick.php">Pickup Information</a></p>
                        </div>

                    </div>

                    <h3 class="py-3">Follow Us</h3>
                    <a href="https://www.facebook.com/lavieenrose.pastisserie/" target="blank"><i class="fa fa-facebook" aria-hidden="true" style="color:white !important"></i></a>
                    <a href="https://www.instagram.com/lavieenrose.patisserie/" target="blank"><i class="fa fa-instagram" aria-hidden="true" style="color:white !important"></i></a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h3 class="pb-3">Our Store</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7944.049474086806!2d100.335306!3d5.413203!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac35e17db31bb%3A0x1236041f2d3ec9e0!2sLa%20Vie%20en%20Rose%20P%C3%A2tisserie!5e0!3m2!1sen!2smy!4v1695548904517!5m2!1sen!2smy" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="map"></iframe>
                    <p>19, Lebuh Melayu, George Town, 10100 George Town, Pulau Pinang</p>
                    <p>Operating Hours: Wednesday - Sunday : 10AM - 6PM</p>
                    <p>Contact No: 0143336480</p>
                </div>
            </div>
        </div>
        <script src="/5007CEM/public_html/js/product.js" type="text/javascript"></script>
        <script>
                        function openNav() {
                            document.getElementById("mySidenav").style.width = "300px";
                        }

                        function closeNav() {
                            document.getElementById("mySidenav").style.width = "0";
                        }
        </script>
    </body>
</html>
