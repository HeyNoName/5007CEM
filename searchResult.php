<?php
session_start()
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/5007CEM/public_html/css/product.css">
    <link rel="stylesheet" href="/5007CEM/public_html/css/nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <title>Search Results</title>
    <style>
        .searchBox{
            display: flex;
            justify-content: center;
            padding-top: 20px;

        }
        .size{
            width: 305px;
        }

        #nfMsg{
            font-family: "Futura PT", sans-serif;
            font-size: 24px;
            line-height: 1.5;
            padding-left: 1%;
        }

        .content h1{
            line-height: 1.5;
            padding-left: 1%;
        }

        #nft{
            float: right;
            width: 35%;
            margin-top: -21%;
        }
        @media screen and (max-width: 767px){
            .row{
                flex-direction: column;
            }
            .card-body {
                height: 300px;
            }

            #nft{
                display:none;
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

        <div class="container pt-3 pb-5"> 
            <h1 class="title">Search Results</h1>

            <?php
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $searchTerm = $_GET['search'];

                $dsn = 'mysql:host=localhost;dbname=PastryDB';
                $username = 'root';
                $password = '';
                try {
                    $pdo = new PDO($dsn, $username, $password);
                } catch (PDOException $e) {
                    die('Database connection failed: ' . $e->getMessage());
                }

                $sql = "SELECT * FROM products WHERE name LIKE :searchTerm
                            UNION
                            SELECT * FROM seasonal WHERE seasonal_name LIKE :searchTerm
                            UNION
                            SELECT * FROM products WHERE category LIKE :searchTerm
                            UNION
                            SELECT * FROM seasonal WHERE category LIKE :searchTerm";

                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($results) {
                    echo '<div class="row justify-content-center pb-4">';
                    foreach ($results as $result) {
                        echo '<div class="col-6 col-md-4 px-4 py-4">';
                        echo '<div class="card" data-aos="fade-up">';
                        echo '<img src="data:image/;base64,' . base64_encode($result['image']) . '" />';
                        echo '<div class="card-body">';
                        echo "<h4>{$result['name']}</h4>";
                        echo '<p class="content-title">';
                        echo "{$result['description']}</p>";
                        echo '<h3 class="pt-5">';
                        echo "RM{$result['price']}</h3>";

                        echo '</div></div></div>';
                    }

                    echo '</div>';
                } else {
                    echo '<div class="content">';
                    echo '<h1>Oops!</h1>';
                    echo '<p id="nfMsg"> We couldn\'t find a match for "' . $searchTerm . '".
                            The thing you are looking for was not found.<br/>
                            Sorry for the inconvenience.<br/>
                            Please search again with other keywords.
                            <img src="/5007CEM/public_html/image/nft.gif" alt="Not Found" id="nft" /></p>';
                    echo '</div>';
                }
            } else {
                echo "<p>Please enter a search term.</p>";
            }
            ?>

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

