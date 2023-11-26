<?php
session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>La Vie en Rose Pâtisserie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/home.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/nav.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/product.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/aos.css">
        <style>
            .searchBox{
                display: flex;
                justify-content: center;
                padding-top: 20px;

            }
            .size{
                width: 305px;
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
                                <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                                <span style="cursor:pointer"><a href="cart.php"><i class="fa fa-shopping-bag"></i></a></span>
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
                        <div class="dropdown-content">
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
                        <div class="dropdown-content">
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
                        <div class="dropdown-content">
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

            <!--slider-->
            <div class="slideshow-container" id="demo" >

                <div class="mySlides fade">
                    <div class="numbertext">1 / 2</div>
                    <div class="banner">
                        <img src="/5007CEM/public_html/image/banner.jpg"/>
                        <div class="banner-content px-5">
                            <h4 class="banner-head">Limited Time Only</h4>
                            <h1 class="pb-3 text-capitalize text-center">
                                This autumn's gourmet treat!
                            </h1>
                            <a href="seasonal.php" class="btn btn-lg">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 2</div>
                    <div class="banner">
                        <img src="/5007CEM/public_html/image/custom.png"/>
                        <div class="banner-content px-5">
                            <h4 class="banner-head">Customize</h4>
                            <h1 class="pb-3 text-capitalize text-center">
                                Customize Your Own Pastry
                            </h1>
                            <a href="customize.php" class="btn btn-lg">Customize</a>
                        </div>
                    </div>
                </div>

                <a class="prev" href="#demo" onclick="plusSlides(-1)">❮</a>
                <a class="next" href="#demo" onclick="plusSlides(1)">❯</a>

                <br>

                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                </ul>
            </div>

            <div class="container pt-5">
                <hr/>
            </div>

            <!--About us-->
            <div class="about-us pt-3">
                <div class="container py-5" style="display: flex; flex-direction: row-reverse;">
                    <img src="/5007CEM/public_html/image/about.jpg" style="width: 50%; border-radius: 20px;">
                    <div class="about-content text-justify px-5">
                        <h1 class="about-title pb-4">About Us</h1>
                        <p>
                            Welcome to La Vie en Rose Pâtisserie, where we bake one happiness at a time. Our journey begins with a 
                            passion for making delicious baked goods that bring people together with smiles on their faces.
                        </p>

                        <a href="about.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <!--Best Seller-->
            <div class="container pb-5"> 
                <hr/>
                <div class="arrow">
                    <h1 class="title pt-5">Best Seller Product</h1>
                    <a href="product.php#best">
                        <i class="fa fa-arrow-right"  data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"></i>
                    </a>
                </div>
                <div class="row justify-content-center pb-4">
                    <div class=".col-6 col-md-4 px-4 py-4">
                        <div class="card" data-aos="fade-up">
                            <?php
                            if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                $sql = "SELECT image FROM products WHERE id=1";
                                $result = mysqli_query($dbc, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                                }
                            }
                            ?>
                            <div class="card-body">

                                <?php
                                if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                    $sql = "SELECT name, description, price FROM products WHERE id=1";
                                    $result = mysqli_query($dbc, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<h3>{$row['name']}</h3>";
                                        echo '<p class="content-title">';
                                        echo "{$row['description']}</p>";
                                        echo '<h2 class="pt-3">';
                                        echo "RM{$row['price']}</h2>";
                                    }
                                }
                                ?>
                                <span class="btn btn-primary" style="cursor:pointer" onclick="addToCart('regular', 1)">Add To Cart</span>
                            </div>
                        </div>
                    </div>

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

                            // Add to Cart form
                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>


                    <div class=".col-6 col-md-4 px-4 py-4">
                        <div class="card" data-aos="fade-up">
                            <?php
                            if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                $sql = "SELECT image FROM products WHERE id=15";
                                $result = mysqli_query($dbc, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                                }
                            }
                            ?>
                            <div class="card-body">

                                <?php
                                if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                    $sql = "SELECT name, description, price FROM products WHERE id=15";
                                    $result = mysqli_query($dbc, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<h3>{$row['name']}</h3>";
                                        echo '<p class="content-title">';
                                        echo "{$row['description']}</p>";
                                        echo '<h2 class="pt-3">';
                                        echo "RM{$row['price']}</h2>";
                                    }
                                }
                                ?>
                                <span class="btn btn-primary" style="cursor:pointer" onclick="addToCart('regular', 15)">Add To Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div>

            <!--Contact Us-->
            <div class="contact py-5">
                <div class="container text-center">
                    <div class="contact-content pb-2">
                        <h1 class="contact-title pr-3">Contact Us</h1>
                        <img src="/5007CEM/public_html/image/newsletter.png" style="width: 50px; height: 50px;"/>
                    </div>
                    <p>For more information or if you have questions please feel free to contact us.</p>
                    <button class="btn btn-secondary-1"><a href="contact.php">Contact Us</a></button>
                </div>
            </div>

            <!--Seasonal Product-->

            <div class="container py-5"> 
                <hr/>
                <div class="arrow">
                    <h1 class="title pt-5">Seasonal Product</h1>
                    <a href="seasonal.php">
                        <i class="fa fa-arrow-right"  data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"></i>
                    </a>
                </div>

                <div class="row justify-content-center pb-4">
                    <div class=".col-6 col-md-4 px-4 py-4">
                        <div class="card" data-aos="fade-up">
                            <?php
                            if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                $sql = "SELECT image FROM seasonal WHERE seasonal_id=2";
                                $result = mysqli_query($dbc, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                                }
                            }
                            ?>
                            <div class="card-body">

                                <?php
                                if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                    $sql = "SELECT seasonal_name, seasonal_desc, seasonal_price FROM seasonal WHERE seasonal_id=2";
                                    $result = mysqli_query($dbc, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<h3>{$row['seasonal_name']}</h3>";
                                        echo '<p class="content-title">';
                                        echo "{$row['seasonal_desc']}</p>";
//                                        echo "<span class='btn btn-primary' style='cursor:pointer' onclick='openNav3()'>Read More</span>";
                                        echo '<h2 class="pt-3">';
                                        echo "RM{$row['seasonal_price']}</h2>";
                                    }
                                }
                                ?>
                                <span class="btn btn-primary" style="cursor:pointer" onclick="addToCart('seasonal', 2)">Add To Cart</span>
                            </div>
                        </div>
                    </div>

                    <?php
                    if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                        $sql = "SELECT seasonal_id, seasonal_name, seasonal_desc, seasonal_price, image FROM seasonal WHERE category='moon'";
                        $result = mysqli_query($dbc, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-6 col-md-4 px-4 py-4">';
                            echo '<div class="card" data-aos="fade-up">';
                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                            echo '<div class="card-body">';
                            echo "<h4>{$row['seasonal_name']}</h4>";
                            echo '<p class="content-title">';
                            echo "{$row['seasonal_desc']}</p>";
                            echo '<h3 class="pt-5">';
                            echo "RM{$row['seasonal_price']}</h3>";

                            // Add to Cart form with check for 'seasonal_id'
                            echo '<form action="cart.php" method="post">';
                            echo '<input type="hidden" name="seasonal_id" value="' . (isset($row['seasonal_id']) ? $row['seasonal_id'] : '') . '">';
                            echo '<button type="submit" class="btn btn-primary" style="cursor:pointer">Add To Cart</button>';
                            echo '</form>';

                            echo '</div></div></div>';
                        }
                    }
                    ?>

                    <div class=".col-6 col-md-4 px-4 py-4">
                        <div class="card" data-aos="fade-up">
                            <?php
                            if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                $sql = "SELECT image FROM seasonal WHERE seasonal_id=3";
                                $result = mysqli_query($dbc, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" />';
                                }
                            }
                            ?>
                            <div class="card-body">

                                <?php
                                if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                    $sql = "SELECT seasonal_name, seasonal_desc, seasonal_price FROM seasonal WHERE seasonal_id=3";
                                    $result = mysqli_query($dbc, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<h3>{$row['seasonal_name']}</h3>";
                                        echo '<p class="content-title">';
                                        echo "{$row['seasonal_desc']}</p>";
//                                        echo "<span class='btn btn-primary' style='cursor:pointer' onclick='toggleDesc()'>Read More</span>";
                                        echo '<h2 class="pt-3">';
                                        echo "RM{$row['seasonal_price']}</h2>";
                                    }
                                }
                                ?>
                                <span class="btn btn-primary" style="cursor:pointer" onclick="addToCart('seasonal', 3)">Add To Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="sideNav" class="sidenav">
                <div class="content">
                    //<?php
//                    if (isset($_GET['product_id'])) {
//                    $productId = $_GET['product_id'];
//
//                    // Validate $productId to ensure it's a valid number or take appropriate measures to prevent SQL injection
//                    // Example validation: $productId = mysqli_real_escape_string($dbc, $productId);
//
//                   $sql = "SELECT seasonal_id, image, seasonal_name, seasonal_desc, seasonal_price FROM seasonal WHERE seasonal_id = $productId";
//                    $result = mysqli_query($dbc, $sql);
//
//                    echo '<div id="sideNav" class="sidenav">';
//                        echo '<div class="content">';
//
//                            while ($row = mysqli_fetch_assoc($result)) {
//                            echo '<img src="data:image/;base64,' . base64_encode($row['image']) . '" alt="Product Image" />';
//                            echo "<h1>{$row['seasonal_name']}</h1>";
//                            echo "<p>{$row['seasonal_desc']}</p>";
//                            echo "<a href='javascript:void(0)' class='closebtn' onclick='closeNav3()'>&times;</a>";
//                            echo "<button type='button' name='button' class='input text-center'><i class='fa fa-plus' aria-hidden='true'></i></button>";
//                            echo "<input type='text' name='name' value='1' size='10' class='input text-center'>";
//                            echo "<button type='button' name='button' class='input'><i class='fa fa-minus' aria-hidden='true'></i></button>";
//                            echo "<h3>RM{$row['seasonal_price']}</h3>";
//                            echo "<button class='btn-lg'>Add To Cart</button>";
//                            }
//
//                            echo '</div>'; // Close content
//                        echo '</div>'; // Close sideNav
//                    }
//                    
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
                            <p><a href="allergen.html">Allergen and Diet Information</a></p>
                            <p><a href="faq.html">FAQs</a></p>
                            <p><a href="terms.html">Terms of Service</a></p>
                            <p><a href="privacy.php">Privacy Policy</a></p>
<!--                            <p><a href="delivery.html">Delivery Policy</a></p>-->
                            <p><a href="pick.html">Pickup Information</a></p>
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
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="/5007CEM/public_html/js/aos.js" type="text/javascript" defer></script>
        <script src="/5007CEM/public_html/js/home.js" type="text/javascript"></script>
        <script src="/5007CEM/public_html/js/mobile-menu.js" type="text/javascript"></script>
        <script src="/5007CEM/public_html/js/cart.js" type="text/javascript"></script>
        <script src="/5007CEM/public_html/js/product.js" type="text/javascript"></script>
        <script>
                                    function openNav() {
                                        document.getElementById("mySidenav").style.width = "300px";
                                    }

                                    function closeNav() {
                                        document.getElementById("mySidenav").style.width = "0";
                                    }


                                    function openNav2() {
                                        document.getElementById("Cartnav").style.width = "400px";
                                    }

                                    function closeNav2() {
                                        document.getElementById("Cartnav").style.width = "0";
                                    }
                                    function addToCart(seasonalId) {
                                        if (confirm('Do you want to add this product to your cart?')) {
                                            window.location.href = 'cart.php?seasonal_id=' + seasonalId;
                                        }
                                    }
                                    function addToCart(productType, productId) {
                                        if (confirm('Do you want to add this product to your cart?')) {
                                            if (productType === 'regular') {
                                                window.location.href = 'cart.php?product_id=' + productId;
                                            } else if (productType === 'seasonal') {
                                                window.location.href = 'cart.php?seasonal_id=' + productId;
                                            }
                                        }
                                    }


        </script>

    </body>
</html>
