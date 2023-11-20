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
                            <a href="index.html">
                                <img src="/5007CEM/public_html/image/logo-1.png" height="70" width="70"/>
                            </a>
                        </div>

                        <div class="menu-icon">
                            <div class="search">
                                <input type="text" id="search" name="search">

                                <i class="fa fa-search" Onclick="myFunction()"></i>
                                <a href="login.html"><i class="fa fa-user" aria-hidden="true"></i></a>
                                <span style="cursor:pointer" onclick="openNav2()"><i class="fa fa-shopping-bag"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="row head pt-4" id="menu">

                        <div class="col-lg-8">
                            <a href="index.html">
                                <img src="/5007CEM/public_html/image/logo-1.png" height="100" width="100"/>
                            </a>
                            <h3 class="title px-2 pt-2">La Vie en Rose Pâtisserie</h3>
                        </div>

                        <div class="col-lg-4 pl-5">
                            <div class="search">
                                <input type="text" id="search" name="search">

                                <i class="fa fa-search" Onclick="myFunction()"></i>
                                <a href="login.html"><i class="fa fa-user" aria-hidden="true"></i></a>
                                <a href="about.html"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                <span style="cursor:pointer" onclick="openNav2()"><i class="fa fa-shopping-bag"></i></span>
                            </div>
                        </div>
                    </div>
                    <hr/>
                </div>

                <div class="menu" id="mySidenav">
                    <a href="javascript:void(0)" id="mobile-menu-button" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="index.html">Home</a>
                    <div class="dropdown">
                        <a href="product.html">All Product</a>
                        <div class="dropdown-content">
                            <a href="product.php#cakes">Cakes</a>
                            <a href="product.html#cookies">Cookies & Macaroons</a>
                            <a href="product.html#tarts">Tarts</a>
                            <a href="product.html#pastry">Pastry</a>
                            <a href="product.html#savouries">Savouries</a>
                            <a href="product.html#gift">GiftBox</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="seasonal.html">Seasonal Product</a>
                        <div class="dropdown-content">
                            <a href="seasonal.html#mooncake">Mooncake Set</a>
                            <a href="seasonal.html#father">Father's Day Special</a>
                            <a href="seasonal.html#mother">Mother's Day Special</a>
                            <a href="seasonal.html#christmas">Christmas</a>
                            <a href="seasonal.html#chinese">Chinese New Year</a>
                            <a href="seasonal.html#raya">Hari Raya</a>
                        </div>
                    </div>
                    <a href="customize.html">Customize</a>
                    <div class="dropdown">
                        <a href="faq.html">FAQs</a>
                        <div class="dropdown-content">
                            <a href="allergen.html">Allergen and Diet Information</a>
                            <a href="terms.html">Terms of Service</a>
                            <a href="privacy.html">Privacy Policy</a>
                            <a href="delivery.html">Delivery Policy</a>
                            <a href="pick.html">Pickup Information</a>
                        </div>
                    </div>
                    <a href="contact.html">Contact Us</a>
                </div>
            </div>

            <div class="container hr-line">
                <hr/>
            </div>

            <!--slider-->
            <div class="slideshow-container" id="demo" >

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <div class="banner">
                        <img src="/5007CEM/public_html/image/banner.jpg"/>
                        <div class="banner-content px-5">
                            <h4 class="banner-head">Limited Time Only</h4>
                            <h1 class="pb-3 text-capitalize text-center">
                                This autumn's gourmet treat!
                            </h1>
                            <a href="seasonal.html" class="btn btn-lg">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <div class="banner">
                        <img src="/5007CEM/public_html/image/custom.png"/>
                        <div class="banner-content px-5">
                            <h4 class="banner-head">Customize</h4>
                            <h1 class="pb-3 text-capitalize text-center">
                                Customize Your Own Pastry
                            </h1>
                            <a href="customize.html" class="btn btn-lg">Customize</a>
                        </div>
                    </div>
                </div>

                <!--                <div class="mySlides fade">
                                    <div class="numbertext">3 / 3</div>
                           
                                </div>-->

                <a class="prev" href="#demo" onclick="plusSlides(-1)">❮</a>
                <a class="next" href="#demo" onclick="plusSlides(1)">❯</a>

                <br>

                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <!--                    <li data-target="#demo" data-slide-to="2"></li>-->
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

                        <a href="about.html" class="btn btn-primary">Read More</a>
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
                                    echo "<img src=\"{$row['image']} \" alt='' />";
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
                                        echo '<h2 class="pt-5">';
                                        echo "RM{$row['price']}</h2>";
                                    }
                                }
                                ?>
                                <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                            </div>
                        </div>
                    </div>

                    <div class=".col-6 col-md-4 px-4 py-4">
                        <div class="card" data-aos="fade-up">
                            <?php
                            if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                $sql = "SELECT image FROM products WHERE id=2";
                                $result = mysqli_query($dbc, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                                }
                            }
                            ?>
                            <div class="card-body">

                                <?php
                                if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                    $sql = "SELECT name, description, price FROM products WHERE id=2";
                                    $result = mysqli_query($dbc, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<h3>{$row['name']}</h3>";
                                        echo '<p class="content-title">';
                                        echo "{$row['description']}</p>";
                                        echo '<h2 class="pt-5">';
                                        echo "RM{$row['price']}</h2>";
                                    }
                                }
                                ?>
                                <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                            </div>
                        </div>
                    </div>

                    <div class=".col-6 col-md-4 px-4 py-4">
                        <div class="card" data-aos="fade-up">
                            <?php
                            if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                $sql = "SELECT image FROM products WHERE id=3";
                                $result = mysqli_query($dbc, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                                }
                            }
                            ?>
                            <div class="card-body">

                                <?php
                                if ($dbc = mysqli_connect('localhost', 'root', '', 'PastryDB')) {
                                    $sql = "SELECT name, description, price FROM products WHERE id=3";
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
                                <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                            </div>
                        </div>
                </div>

                <!--                    <div class=".col-6 col-md-4 px-4 py-4" data-aos="fade-up">
                                        <div class="card">
                                            <img class="card-img-top" src="..." alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Best Seller</h3>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class=".col-6 col-md-4 px-4 py-4" data-aos="fade-up">
                                        <div class="card">
                                            <img class="card-img-top" src="..." alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">Best Seller</h3>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                                            </div>
                                        </div>
                                    </div>-->
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
                <button class="btn btn-secondary-1"><a href="contact.html">Contact Us</a></button>
            </div>
        </div>

        <!--Seasonal Product-->

        <div class="container py-5"> 
            <hr/>
            <div class="arrow">
                <h1 class="title pt-5">Seasonal Product</h1>
                <a href="seasonal.html">
                    <i class="fa fa-arrow-right"  data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-out-right"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class=".col-6 col-md-4 px-4 py-4">
                    <div class="card" data-aos="fade-up">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">Product Name</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                        </div>
                    </div>
                </div>

                <div class=".col-6 col-md-4 px-4 py-4">
                    <div class="card" data-aos="fade-up">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">Best Seller</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                        </div>
                    </div>
                </div>

                <div class=".col-6 .col-md-4 px-4 py-4">
                    <div class="card" data-aos="fade-up">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">Best Seller</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <span class="btn btn-primary " style="cursor:pointer" onclick="openNav3()">Add To Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="sideNav" class="sidenav">
            <div class="content">
                <img src="..."/>
                <h1>Product Name</h1>
                <p>Description</p>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
                <button type="button" name="button" class="input text-center">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
                <input type="text" name="name" value="1" size="10" class="input text-center">
                <button type="button" name="button" class="input">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </button>

                <h3>RM</h3>

                <button class="btn-lg">Add To Cart</button>
            </div>
        </div>

        <!--Add To Cart-->
        <div id="Cartnav" class="cart">
            <div class="px-3">
                <h2>My Cart</h2>
                <hr>
                <div>
                    <div>
                        <div>
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
                        </div>

                        <div>
                            <img src="" alt="" />
                        </div>

                        <div>
                            <span>Product</span>
                        </div>

                        <div>
                            <button type="button" name="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <input type="text" name="name" value="1">
                            <button type="button" name="button">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div>RM</div>
                    </div>

                    <hr>

                    <div>
                        <div>
                            <a href="payment.html">
                                <button class="btn btn-secondary">
                                    Go To Checkout
                                </button>
                            </a>
                        </div>

                        <div>
                            <button class="btn btn-secondary"><a href="login.html" style="color:#88694e"> Please log in to proceed</a></button>
                        </div>        
                    </div>


                </div>              

                <div class="pt-5">
                    <h2>Choose An Option</h2>
                    <form>
                        <input type="checkbox" id="pick" name="pick" value="pick">
                        <label for="pick">Pick Up</label><br>
                        <div>
                            <div>
                                <div>
                                    <label for="name2">Name</label><br>
                                    <input type="text" id="name2" name="name">
                                </div>

                                <div>
                                    <label for="contact1">Contact No</label><br>
                                    <input type="text" id="contact1" name="contact">
                                </div>
                                <br>
                                <div>
                                    <label for="pick">Pick Up Time</label>
                                    <select>
                                        <option value="0">2 PM</option>
                                        <option value="1">3 PM</option>
                                        <option value="2">6 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>

                        <input type="checkbox" id="deli" name="deli" value="delivery">
                        <label for="deli">Delivery</label>
                        <div>
                            <div>
                                <label for="name1">Name</label><br>
                                <input type="text" id="name1" name="name">
                            </div>

                            <div>
                                <label for="contact2">Contact No</label><br>
                                <input type="text" id="contact2" name="contact">
                            </div>

                            <div>
                                <label for="add">Address</label><br>
                                <textarea id="add" name="address" placeholder="Address" style="height:100px"></textarea>
                            </div>

                            <label for="deli">Delivery Time</label>
                            <select>
                                <option value="0">2 PM</option>
                                <option value="1">3 PM</option>
                                <option value="2">6 PM</option>
                            </select>   
                        </div>
                    </form>
                </div>
                <br>
                <div class="container">
                    <div class="center">
                        <h4>Your Cart Is Empty </h4>
                        <br>
                        <button class="btn btn-secondary">Shop Now</button>
                    </div>
                </div>


                <div>
                    <p><strong>We accept</strong></p>
                    <img src="/5007CEM/public_html/image/visa.jpg" width="45" alt="Visa"/>
                    <img src="/5007CEM/public_html/image/master.png" width="45" alt="Mastercard"/>
                    <img src="/5007CEM/public_html/image/tng.png" width="45" alt="Tng"/> &nbsp;
                </div>
                <div>
                    <p><strong>Estimated Process Period</strong></p>
                    <p><strong>3 - 5 Days &nbsp; (Start from order day)</strong></p>
                </div>
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
                        <p><a href="index.html">Home</a></p>
                        <p><a href="about.html">About Us</a></p>
                        <p><a href="product.html">All Products</a></p>
                        <p><a href="seasonal.html">Seasonal Products</a></p>
                        <p><a href="customize.html">Customize</a></p>
                        <p><a href="contact.html">Contact Us</a></p>
                    </div>
                    <div class="col-md-8">
                        <p><a href="allergen.html">Allergen and Diet Information</a></p>
                        <p><a href="faq.html">FAQs</a></p>
                        <p><a href="terms.html">Terms of Service</a></p>
                        <p><a href="privacy.html">Privacy Policy</a></p>
                        <p><a href="delivery.html">Delivery Policy</a></p>
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
    </script>

</body>
</html>
