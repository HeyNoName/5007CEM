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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form data to variables
    $flavour = isset($_POST["flavour"]) ? $_POST["flavour"] : '';
    $filling = isset($_POST["filling"]) ? $_POST["filling"] : '';
    $frosting = isset($_POST["frosting"]) ? $_POST["frosting"] : '';
    $color = isset($_POST["color"]) ? $_POST["color"] : '';
    $style = isset($_POST["style"]) ? $_POST["style"] : '';
    $stylec = isset($_POST["stylec"]) ? $_POST["stylec"] : '';
    $shape = isset($_POST["shape"]) ? $_POST["shape"] : '';
    $category = isset($_POST["category"]) ? $_POST["category"] : '';
    $filename = isset($_POST["filename"]) ? $_POST["filename"] : '';
    $message = isset($_POST["message"]) ? $_POST["message"] : '';
    $remark = isset($_POST["remark"]) ? $_POST["remark"] : '';

    // Additional fields
    $tiers = isset($_POST["tiers"]) ? $_POST["tiers"] : 0;

    // Insert data into the unified orders table (without type or file upload check)
    $sql = "INSERT INTO custom (flavour, filling, frosting, color, style, stylec, shape, category, image, box, tier, remark, message) 
            VALUES ('$flavour', '$filling', '$frosting', '$color', '$style', '$stylec', '$shape', '$category', '$filename', '', '$tiers', '$remark', '$message')";

    // Execute the SQL query
    if (mysqli_query($dbc, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    }
}

// Close the database connection
mysqli_close($dbc);
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
        <link rel="stylesheet" href="/5007CEM/public_html/css/customize.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/nav.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>

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
                        <a href="index.php">
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
                            <a href="about.html"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
                    <a href="faq.html">FAQs</a>
                    <div class="dropdown-content">
                        <a href="allergen.html">Allergen and Diet Information</a>
                        <a href="terms.html">Terms of Service</a>
                        <a href="privacy.html">Privacy Policy</a>
                        <a href="delivery.html">Delivery Policy</a>
                        <a href="pick.html">Pickup Information</a>
                    </div>
                </div>
                <a href="contact.php">Contact Us</a>
            </div>
        </div>

        <div class="container hr-line">
            <hr/>
        </div>

        <div class="container py-5 px-4">
            <h1 class="title pb-5">Customize Your Own Pastry!</h1>
            <button class="accordion" data-toggle="collapse" name="accordion_type" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="border-radius: 10px 10px 0px 0px;">Cake</button>
            <div class="panel py-4">
                <form method="post" action="customize.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="flavour">Flavour:</label>
                                <select class="selection" name="flavour">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="10.00">Vanilla</option>
                                    <option value="2" data-price="12.00">Chocolate</option>
                                    <option value="3" data-price="15.00">Strawberry</option>
                                    <option value="4" data-price="18.00">Chiffon</option>
                                    <option value="5" data-price="20.00">Cheese</option>
                                    <option value="6" data-price="22.00">Black Forest</option>
                                    <option value="7" data-price="24.00">Red Velvet</option>
                                    <option value="8" data-price="26.00">Carrot</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="filling">Filling: </label>
                                <select class="selection" name="filling">
                                    <option value="select" data-price="0.00">Select One</option>
                                    <option value="caremel" data-price="10.00">Caramel</option>
                                    <option value="strawberry" data-price="12.00">Strawberry and Raspberry</option>
                                    <option value="pine" data-price="14.00"> Pineapple apricot</option>
                                    <option value="lemon" data-price="20.00">Lemon Curd</option>
                                    <option value="choco" data-price="26.00">Chocolate Ganache</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="frosting">Frosting:</label>
                                <select class="selection" name="frosting">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="choco" data-price="10.00">Chocolate</option>
                                    <option value="lemon" data-price="12.00">Lemon and Orange</option>
                                    <option value="esspresso" data-price="15.00">Espresso</option>
                                    <option value="cheese" data-price="18.00">Cream Cheese</option>
                                    <option value="peanut" data-price="12.00">Peanut Butter</option>
                                    <option value="straw" data-price="15.00">Strawberry and Raspberry</option>
                                    <option value="vanilla" data-price="10.00">Vanilla</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="color">Color:</label>
                                <select class="selection" name="color">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="none" data-price="0.00">None</option>
                                    <option value="pastel" data-price="15.00">Pastel</option>
                                    <option value="primary" data-price="12.00">Primary</option>
                                    <option value="neon" data-price="18.00">Neon</option>
                                    <option value="class" data-price="10.00">Classic / No Preference</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="accordion-header">
                                    <label for="tier">Total Tier:</label>
                                    <select class="tier-select" id="tierSelect" name="tiers">
                                        <option value="0" data-price="0.00">Select One</option>
                                        <option value="1" data-price="20.00">1 Tier</option>
                                        <option value="2" data-price="30.00">2 Tier</option>
                                        <option value="3" data-price="40.00">3 Tier</option>
                                        <option value="4" data-price="50.00">4 Tier</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tier-container" data-tier="1">
                                <label for="firstT">Cake Size for First Tier:</label>
                                <select class="tier-size">
                                    <optgroup label="Cirlce">
                                        <option value="0">Select One</option>
                                        <option value="C5 inch" data-price="20.00">5 inch (300g)</option>
                                        <option value="C7 inch" data-price="30.00">7 inch (500g)</option>
                                        <option value="C9 inch" data-price="50.00">9 inch (1 kg)</option>
                                        <option value="C10 inch" data-price="70.00">10inch (1.7kg)</option>
                                        <option value="C13.5 inch" data-price="80.00">13.5 inch (2kg)</option>
                                        <option value="C16 inch" data-price="90.00">16 inch (3kg)</option>
                                        <option value="C18 inch" data-price="100.00">18 inch (4kg)</option>
                                    </optgroup>
                                    <optgroup label="Square">
                                        <option value="S7" data-price="20.00">7 x 7 inch</option>
                                        <option value="S9" data-price="30.00">9 x 9 inch</option>
                                        <option value="S10" data-price="40.00">10 x 10 inch</option>
                                        <option value="S13.5" data-price="50.00">13.5 x 13.5 inch</option>
                                        <option value="S16" data-price="60.00">16 x 16 inch</option>
                                    </optgroup>
                                    <optgroup label="Rectangle">
                                        <option value="R12" data-price="30.00">12 x 16 inch</option>
                                        <option value="R14" data-price="40.00">14 x 20 inch</option>
                                    </optgroup>
                                    <optgroup label="Heart">
                                        <option value="H6" data-price="30.00">6 inch</option>
                                        <option value="H8" data-price="40.00">8 inch</option>
                                        <option value="H10" data-price="50.00">10 inch</option>
                                        <option value="H12" data-price="60.00">12 inch</option>
                                    </optgroup>
                                    <optgroup label="Hexagon">
                                        <option value="HX6" data-price="30.00">6 inch</option>
                                        <option value="HX8" data-price="40.00">8 inch</option>
                                        <option value="HX10" data-price="50.00">10 inch</option>
                                        <option value="HX12" data-price="60.00">12 inch</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="tier-container" data-tier="2">
                                <label for="secondT">Cake Size for Second Tier:</label>
                                <select class="tier-size">
                                    <optgroup label="Cirlce">
                                        <option value="0">Select One</option>
                                        <option value="1" data-price="20.00">5 inch (300g)</option>
                                        <option value="2" data-price="30.00">7 inch (500g)</option>
                                        <option value="3" data-price="50.00">9 inch (1 kg)</option>
                                        <option value="4" data-price="70.00">10inch (1.7kg)</option>
                                        <option value="5" data-price="80.00">13.5 inch (2kg)</option>
                                        <option value="6" data-price="90.00">16 inch (3kg)</option>
                                        <option value="7" data-price="100.00">18 inch (4kg)</option>
                                    </optgroup>
                                    <optgroup label="Square">
                                        <option value="9" data-price="20.00">7 x 7 inch</option>
                                        <option value="10" data-price="30.00">9 x 9 inch</option>
                                        <option value="11" data-price="40.00">10 x 10 inch</option>
                                        <option value="12" data-price="50.00">13.5 x 13.5 inch</option>
                                        <option value="13" data-price="60.00">16 x 16 inch</option>
                                    </optgroup>
                                    <optgroup label="Rectangle">
                                        <option value="14" data-price="30.00">12 x 16 inch</option>
                                        <option value="15" data-price="40.00">14 x 20 inch</option>
                                    </optgroup>
                                    <optgroup label="Heart">
                                        <option value="16" data-price="30.00">6 inch</option>
                                        <option value="17" data-price="40.00">8 inch</option>
                                        <option value="18" data-price="50.00">10 inch</option>
                                        <option value="19" data-price="60.00">12 inch</option>
                                    </optgroup>
                                    <optgroup label="Hexagon">
                                        <option value="20" data-price="30.00">6 inch</option>
                                        <option value="21" data-price="40.00">8 inch</option>
                                        <option value="22" data-price="50.00">10 inch</option>
                                        <option value="23" data-price="60.00">12 inch</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="tier-container" data-tier="3">
                                <label for="thirdT">Cake Size for Third Tier:</label>
                                <select class="tier-size">
                                    <optgroup label="Cirlce">
                                        <option value="0">Select One</option>
                                        <option value="1" data-price="20.00">5 inch (300g)</option>
                                        <option value="2" data-price="30.00">7 inch (500g)</option>
                                        <option value="3" data-price="50.00">9 inch (1 kg)</option>
                                        <option value="4" data-price="70.00">10inch (1.7kg)</option>
                                        <option value="5" data-price="80.00">13.5 inch (2kg)</option>
                                        <option value="6" data-price="90.00">16 inch (3kg)</option>
                                        <option value="7" data-price="100.00">18 inch (4kg)</option>
                                    </optgroup>
                                    <optgroup label="Square">
                                        <option value="9" data-price="20.00">7 x 7 inch</option>
                                        <option value="10" data-price="30.00">9 x 9 inch</option>
                                        <option value="11" data-price="40.00">10 x 10 inch</option>
                                        <option value="12" data-price="50.00">13.5 x 13.5 inch</option>
                                        <option value="13" data-price="60.00">16 x 16 inch</option>
                                    </optgroup>
                                    <optgroup label="Rectangle">
                                        <option value="14" data-price="30.00">12 x 16 inch</option>
                                        <option value="15" data-price="40.00">14 x 20 inch</option>
                                    </optgroup>
                                    <optgroup label="Heart">
                                        <option value="16" data-price="30.00">6 inch</option>
                                        <option value="17" data-price="40.00">8 inch</option>
                                        <option value="18" data-price="50.00">10 inch</option>
                                        <option value="19" data-price="60.00">12 inch</option>
                                    </optgroup>
                                    <optgroup label="Hexagon">
                                        <option value="20" data-price="30.00">6 inch</option>
                                        <option value="21" data-price="40.00">8 inch</option>
                                        <option value="22" data-price="50.00">10 inch</option>
                                        <option value="23" data-price="60.00">12 inch</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="tier-container" data-tier="4">
                                <label for="fourthT">Cake Size for Forth Tier:</label>
                                <select class="tier-size">
                                    <optgroup label="Cirlce">
                                        <option value="0">Select One</option>
                                        <option value="1" data-price="20.00">5 inch (300g)</option>
                                        <option value="2" data-price="30.00">7 inch (500g)</option>
                                        <option value="3" data-price="50.00">9 inch (1 kg)</option>
                                        <option value="4" data-price="70.00">10inch (1.7kg)</option>
                                        <option value="5" data-price="80.00">13.5 inch (2kg)</option>
                                        <option value="6" data-price="90.00">16 inch (3kg)</option>
                                        <option value="7" data-price="100.00">18 inch (4kg)</option>
                                    </optgroup>
                                    <optgroup label="Square">
                                        <option value="9" data-price="20.00">7 x 7 inch</option>
                                        <option value="10" data-price="30.00">9 x 9 inch</option>
                                        <option value="11" data-price="40.00">10 x 10 inch</option>
                                        <option value="12" data-price="50.00">13.5 x 13.5 inch</option>
                                        <option value="13" data-price="60.00">16 x 16 inch</option>
                                    </optgroup>
                                    <optgroup label="Rectangle">
                                        <option value="14" data-price="30.00">12 x 16 inch</option>
                                        <option value="15" data-price="40.00">14 x 20 inch</option>
                                    </optgroup>
                                    <optgroup label="Heart">
                                        <option value="16" data-price="30.00">6 inch</option>
                                        <option value="17" data-price="40.00">8 inch</option>
                                        <option value="18" data-price="50.00">10 inch</option>
                                        <option value="19" data-price="60.00">12 inch</option>
                                    </optgroup>
                                    <optgroup label="Hexagon">
                                        <option value="20" data-price="30.00">6 inch</option>
                                        <option value="21" data-price="40.00">8 inch</option>
                                        <option value="22" data-price="50.00">10 inch</option>
                                        <option value="23" data-price="60.00">12 inch</option>
                                    </optgroup>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select id="style" name="style">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="10.00">Wedding</option>
                                    <option value="2" data-price="10.00">Birthday</option>
                                    <option value="3" data-price="10.00">Anniversary</option>
                                    <option value="4" data-price="10.00">Baby Full Moon</option>
                                    <option value="5" data-price="10.00">Others</option>
                                </select>
                                <div id="stylec" style="display: none;" class="pb-3">
                                    <p for="stylec">Please Specify:</p>
                                    <textarea name="stylec" placeholder="Write something.." style="height:100px; width: 300px;"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="shape">Shape:</label>
                                <select class="selection" name="shape">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="10.00">Round</option>
                                    <option value="2" data-price="20.00">Square</option>
                                    <option value="3" data-price="30.00">Rectangle</option>
                                    <option value="4" data-price="40.00">Heart</option>
                                    <option value="4" data-price="50.00">Hexagon</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="category">
                                    <option value="0">Select One</option>
                                    <option value="1" data-price="0.00">Vegetarian & Gluten free</option>
                                    <option value="2" data-price="0.00">Sugar Free & Nuts Free</option>
                                    <option value="3" data-price="0.00">Low Fat & Low Sodium</option>
                                </select>
                            </div>

                            <div class="upload pt-4">
                                <p>Upload the image to be placed on the pastry (if any):</p>
                                <input type="file" id="cake1" name="filename" class="pb-3">
                            </div>

                            <div class="py-2">
                                <label for="Messcake" style="width: auto;">A message written on a pastry:</label><br>
                                <textarea id="message" name="message" placeholder="Write something.." class="messText"></textarea>
                            </div>

                            <div class="py-2">
                                <label for="Recake">Remarks:</label><br>
                                <textarea id="remarks" name="remark" placeholder="Write something.." class="messText"></textarea>
                            </div>

                        </div>


                        <div class="price pt-3">
                            <button type="submit" class="btn btn-primary"><a href="payment.php">Submit Order</a></button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="size">
                    <h2 class="title pt-4">Cake Size Guide</h2>
                    <div class="size-1">
                        <img src="/5007CEM/public_html/image/cake size.png"/>
                        <img src="/5007CEM/public_html/image/cakesize1.png"/>
                        <img src="/5007CEM/public_html/image/cakesize2.png"/>
                        <img src="/5007CEM/public_html/image/cakesize3.jpg"/>
                        <img src="/5007CEM/public_html/image/cakesize4.png"/>
                        <img src="/5007CEM/public_html/image/cakesize5.jpg" style="height:auto;"/>
                        <img src="/5007CEM/public_html/image/cakesize6.png"/>
                    </div>
                </div>
            </div>



            <button class="accordion">Cookies & Macaroons</button>
            <div class="panel py-4">
                <form method="post" action="customize.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="flavour">Flavour:</label>
                                <select class="selection" name="flavour">
                                    <option value="0">Select One</option>
                                    <option value="1">Pistachio</option>
                                    <option value="2">Nutella</option>
                                    <option value="3">Strawberry</option>
                                    <option value="4">Salted Caramel</option>
                                    <option value="5">Cheese</option>
                                    <option value="6">Snickerdoodle</option>
                                    <option value="7">White Alomond</option>
                                    <option value="8">Cotton Candy</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="filling">Filling:</label>
                                <select class="selection" name="filling">
                                    <option value="0">Select One</option>
                                    <option value="1">Caramel</option>
                                    <option value="2">Strawberry and Raspberry</option>
                                    <option value="3">Pineapple apricot</option>
                                    <option value="4">Lemon Curd</option>
                                    <option value="5">Chocolate Ganache</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="size">Size:</label>
                                <select class="selection" name="size">
                                    <option value="0">Select One</option>
                                    <option value="1">Mini 1 inches (2.5cm)</option>
                                    <option value="2">Standard 1.5 to 2 inches (3.8 x 5 cm)</option>
                                    <option value="3">Large 3 inches (7.5 cm)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="color">Color:</label>
                                <select class="selection" name="color">
                                    <option value="0">Select One</option>
                                    <option value="1">None</option>
                                    <option value="2">Pastel</option>
                                    <option value="3">Primary</option>
                                    <option value="4">Neon</option>
                                    <option value="5">Classic / No Preference</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select class="selection" name="type">
                                    <option value="0">Select One</option>
                                    <option value="1">French Macaron Stuffed Brownies</option>
                                    <option value="2">French Macaron Cakes</option>
                                    <option value="3">French Macaron Tower</option>
                                    <option value="4">French Macaron Party Flavour</option>
                                    <option value="5">French Macaron Push Pop</option>
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="selection" name="category">
                                    <option value="0">Select One</option>
                                    <option value="1">Vegetarian & Gluten free</option>
                                    <option value="2">Sugar Free & Nuts Free</option>
                                    <option value="3">Low Fat & Low Sodium</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="box">Box:</label>
                                <select class="selection" name="box">
                                    <option value="0">Select One</option>
                                    <option value="1">4 pcs</option>
                                    <option value="2">6 pcs</option>
                                    <option value="3">12 pcs</option>
                                    <option value="4">24 pcs</option>
                                </select>
                                </p>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="upload pt-4">
                                <p>Upload the image to be placed on the pastry (if any):</p>
                                <input type="file" id="cake1" name="filename" class="pb-3">
                            </div>

                            <div class="py-2">
                                <label for="Messcake" style="width: auto;">A message written on a pastry:</label><br>
                                <textarea id="cake" name="cake" placeholder="Write something.." class="messText"></textarea>
                            </div>

                            <div class="py-2">
                                <label for="Recake">Remarks:</label><br>
                                <textarea id="cake2" name="cake2" placeholder="Write something.." class="messText"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="price pt-3">
                        <button type="submit" class="btn btn-primary"><a href="payment.php">Submit Order</a></button>
                    </div>
                </form>
            </div>

            <button class="accordion">Tarts</button>
            <div class="panel py-4">
                <form method="post" action="customize.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="crust">Crust:</label>
                                <select class="selection" name="crust">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="10.00">Thicker</option>
                                    <option value="2" data-price="15.00">Flakier</option>
                                    <option value="3" data-price="20.00">Firmer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="size">Size:</label>
                                <select class="selection" name="size">
                                    <optgroup label="Round">
                                        <option value="0" data-price="0.00">Select One</option>
                                        <option value="1" data-price="10.00">[Mini] 2 - 3 inches (5 - 7.5 cm) </option>
                                        <option value="2" data-price="20.00">[Small] 4 - 5 inches (10 - 12.5 cm)</option>
                                        <option value="3" data-price="30.00">[Standard] 8 - 9 inches (20 - 23cm)</option>
                                        <option value="4" data-price="40.00">[Large] 10 - 12 inches (25 - 30 cm)</option>
                                    </optgroup>
                                    <optgroup label="Square">
                                        <option value="0" data-price="0.00">Select One</option>
                                        <option value="1" data-price="10.00">[Mini] 2 x 2 inches (5 x 5 cm) </option>
                                        <option value="2" data-price="20.00">[Small] 4 x 4 inches (10 x 10 cm)</option>
                                        <option value="3" data-price="30.00">[Standard] 8 x 8 inches (20 x 20 cm) </option>
                                        <option value="4" data-price="40.00">[Large] 10 x 10 inches (25 x 25 cm)</option>
                                    </optgroup>
                                    <optgroup label="Rectangle">
                                        <option value="0" data-price="0.00">Select One</option>
                                        <option value="1" data-price="20.00">[Mini] 2 x 4 inches (5 x 10 cm) </option>
                                        <option value="2" data-price="30.00">[Small] 4 x 6 inches (10  x 15 cm)</option>
                                        <option value="3" data-price="40.00">[Standard] 8 x 12 inches (20 x 30 cm)</option>
                                        <option value="4" data-price="50.00">[Large] 10 x 14 inches (25 x 35 cm)</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="filling">Filling:</label>
                                <select class="selection" name="filling">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="15.00">Chocolate Coffee</option>
                                    <option value="2" data-price="15.00">Mini Fruits</option>
                                    <option value="3" data-price="12.00">French Lemon Cream</option>
                                    <option value="4" data-price="15.00">Pistachio</option>
                                    <option value="5" data-price="12.00">Portuguese Custard</option>
                                    <option value="6" data-price="20.00">White Bean & Ground Almond</option>
                                    <option value="7" data-price="20.00">Quince Cheese</option>
                                    <option value="8" data-price="12.00">Fruit Jam</option>
                                    <option value="9" data-price="12.00">Traditional</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select class="selection" name="type">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="20.00">French Macaron Stuffed Brownies</option>
                                    <option value="2" data-price="30.00">French Macaron Cakes</option>
                                    <option value="3" data-price="40.00">French Macaron Tower</option>
                                    <option value="4" data-price="50.00">French Macaron Party Flavour</option>
                                    <option value="5" data-price="60.00">French Macaron Push Pop</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="selection" name="category">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="0.00">Vegetarian & Gluten free</option>
                                    <option value="2" data-price="0.00">Sugar Free & Nuts Free</option>
                                    <option value="3" data-price="0.00">Low Fat & Low Sodium</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="box">Box:</label>
                                <select class="selection" name="box">
                                    <option value="0" data-price="0.00">Select One</option>
                                    <option value="1" data-price="0.00">No Box</option>
                                    <option value="2" data-price="10.00">2 pcs</option>
                                    <option value="3" data-price="20.00">4 pcs</option>
                                    <option value="4" data-price="30.00">6 pcs</option>
                                    <option value="5" data-price="40.00">12 pcs</option>
                                    <option value="6" data-price="50.00">24 pcs</option>
                                    <option value="7" data-price="60.00">48 pcs</option>
                                </select>
                            </div>
                            <p>Note: </p>
                            <ol type="1">
                                <li>
                                    2 pcs , 4 pcs , 6pcs are only for small and standard tarts only.
                                </li>
                                <li>
                                    12 pcs , 24 pcs  are only for small and mini tarts only.
                                </li>
                                <li>
                                    12 pcs , 24 pcs , 48pcs are only for mini tarts only.
                                </li>

                            </ol>

                        </div>
                        <div class="col-md-6">
                            <div class="upload pt-4">
                                <p>Upload the image to be placed on the pastry (if any):</p>
                                <input type="file" id="cake1" name="filename" class="pb-3">
                            </div>

                            <div class="py-2">
                                <label for="Messcake" style="width: auto;">A message written on a pastry:</label><br>
                                <textarea id="cake" name="cake" placeholder="Write something.." class="messText"></textarea>
                            </div>

                            <div class="py-2">
                                <label for="Recake">Remarks:</label><br>
                                <textarea id="cake2" name="cake2" placeholder="Write something.." class="messText"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="price pt-3">
                        <button type="submit" class="btn btn-primary"><a href="payment.php">Submit Order</a></button>
                    </div>
                </form>
            </div>

            <div class="price pt-3">
                <p>Note:</p>
                <ol type="1">
                    <li>
                        All pastry sizes are given in diameter.
                    </li>
                    <li>
                        All customized pastries are halal.
                    </li>
                    <li>
                        Prices for all customized pastries are not fixed.
                    </li>
                    <li>
                        If there are any allergens, please fill out the Remarks section and read our
                        "Allergen and Diet Information" page.
                    </li>
                    <li>
                        No mixing of cake shapes for the tiers
                    </li>
                    <li>
                        We recommend you order at least 5 days in advance for customized cakes. Orders made less than
                        5 days in advance may be subjected to cancel if we are absolutely full!
                    </li>
                </ol>


                <h3><span id="total-price">RM 0.00</span></h3><br>
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

        <script src="/5007CEM/public_html/js/mobile-menu.js" type="text/javascript"></script>
        <script src="/5007CEM/public_html/js/customize.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
                        $(document).ready(function () {
                            // Function to calculate the total price
                            function calculateTotalPrice() {
                                var totalPrice = 0;
                                // Tart related selections
                                totalPrice += parseFloat($('select[name="crust"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="size"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="type"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="box"]').find('option:selected').data('price')) || 0;

                                // Cake related selections
                                totalPrice += parseFloat($('select[name="flavour"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="filling"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="frosting"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="color"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="style"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="shape"]').find('option:selected').data('price')) || 0;
                                totalPrice += parseFloat($('select[name="category"]').find('option:selected').data('price')) || 0;

                                // Tier Sizes
                                $('.tier-size').each(function () {
                                    totalPrice += parseFloat($(this).find('option:selected').data('price')) || 0;
                                });

                                // Display the total price
                                $('#total-price').text('Total Price: RM' + totalPrice.toFixed(2));
                            }

                            // Bind the function to changes in the dropdowns
                            $('select').change(calculateTotalPrice);

                            // Initially calculate and display the total price
                            calculateTotalPrice();
                        });

        </script>
    </body>
</html>
