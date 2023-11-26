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
        <link rel="stylesheet" href="/5007CEM/public_html/css/default.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/nav.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
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
                    <a href="contact.php">Contact Us</a>
                </div>
            </div>

            <div class="container hr-line">
                <hr/>
            </div>
            
            <div class="container text-justify py-5 px-5">
                <h1 class="text-center pb-3 title">Delivery Policy</h1>

                <h4 class="pt-4">Information needed for delivery purposes</h4>
                <ol type="1">
                    <li>Recipient’s name.</li>
                    <li>Recipient’s full and correct address as found on Google Maps.</li>
                    <li>Recipient’s full and correct contact number.</li>
                    <li>
                        Alternative phone number (buyer, etc) - will only be contacted where the recipient is 
                        unreachable regardless of whether delivery is successful or not.
                    </li>
                </ol>

                <h4 class="pt-4">Delivery Address</h4>
                <p>The delivery address entered needs to be exactly as found on Google Maps. Please check that the address 
                    is correct before completing the order. Orders will be delivered to the exact address that was entered 
                    into the system when placing the order.
                </p>
                <p>
                    The ‘Address’ section is where the full address as found on Google Maps is entered.
                </p>
                <p>
                    The ‘Company/Apartment unit’ section is where the unit number and/or the name of the company/condo etc. is entered.
                </p>
                <p>
                    Note: Delivery will be arranged to the address entered into the ‘address’ section only. 
                    ‘Company/Apartment unit’ section is only for the driver’s reference for ease of finding the address, 
                    or if the security guard requires the unit number, etc. Delivering to the unit is not included for 
                    deliveries to high-rise or multi-storied buildings. Please read the full details for high-rise or
                    multi-storied buildings below.
                </p>
                <p>
                    Where the delivery location is too remote or unreachable by the drivers, the driver will only deliver 
                    to the nearest car-accessible area and you are required to collect the order from the driver at that 
                    location. The delivery fees will not be refunded.
                </p>
                <p>
                    The buyer is required to check that the full, complete address is correct before proceeding with the 
                    order. A change of address is not possible once the order has been placed.
                </p>

                <h4 class="pt-4">Delivery Methods</h4>
                <p>
                    Orders are delivered by on-demand 3rd party car drivers according to their terms. The drivers do not 
                    represent our brand, Lacher Patisserie.
                </p>
                <p>
                    Drivers deliver to a few places in one trip following routes that are carefully planned, arranged, 
                    and optimised in advance. Buyers will receive an email with the driver's details once we have assigned 
                    a driver to the order. We cannot assign a specific driver for your order as all drivers are assigned 
                    randomly.
                </p>
                <p>
                    Delivery is non-cancellable and the delivery fee is non-refundable once the driver’s route has been 
                    arranged by us.
                </p>

                <h4 class="pt-4">Delivery Time Slot</h4>
                <p>
                    All orders are arranged to arrive within the chosen time slot. We cannot arrange the delivery to 
                    arrive at, by, or after a specific time (eg. at 2pm). Drivers deliver to a few places in one trip 
                    following a route that is carefully planned, arranged, and optimised.
                </p>
                <p>
                    However, factors that affect or may cause early arrivals or delays in deliveries (non-exhaustive):
                </p>
                <ol type="1">
                    <li>The availability of drivers.</li>
                    <li>The ease of finding drivers/demand of drivers.</li>
                    <li>Traffic conditions.</li>
                    <li>Weather conditions.</li>
                    <li>Unforeseen circumstances.</li>
                    <li>Natural disasters.</li>
                </ol>
                <p>
                    Buyers are advised to select a time slot with these possibilities taken into account.
                </p>
                <p>
                    We do not help to ensure that recipients are home before delivering the order. Buyers need to ensure 
                    that the recipient will be home before selecting a date and time on our website and proceeding with 
                    the order.
                </p>
                <p>
                    While we try our best to arrange orders to arrive within the chosen time slot, La Vie en Rose Pâtisserie
                    will not be held responsible for any early arrivals or delays of delivery due to any of the reasons above 
                    or because of any circumstances impacting the availability of the 3rd party drivers we use and anything 
                    else outside of our control.
                </p>
                <p>
                    Please opt for self-pickup or select an available earlier/later time slot if you cannot risk the items 
                    arriving earlier or later than a chosen time frame.
                </p>

                <h4 class="pt-4">High-rise/Multi-storied buildings</h4>
                <p>
                    Delivering to the unit number of high-rise buildings and multi-storied buildings is not provided in 
                    our delivery partner's services. Drivers will only pass the cake to the recipient at the drop-off point/
                    lobby/ground floor of the building where the area is accessible by car with no parking required.
                </p>
                <p>
                    High-rise buildings and multi-storied buildings include, but are not limited to:
                </p>
                <ol type="1">
                    <li>Apartments</li>
                    <li>Condominiums</li>
                    <li>Hospitals</li>
                    <li>Restaurants</li>
                    <li>Hotels</li>
                </ol>
                <p>
                    If the recipient is unreachable or delivery is unsuccessful (see below for what counts as unsuccessful 
                    delivery), the driver will bring the items back to our store.
                </p>
                <p>
                    Drivers will only leave the items on the delivery drop-off table, at the guardhouse, at the 
                    receptionist etc. only with the consent of the recipient/someone on behalf of the recipient. 
                    Where items have been requested/consented to be left somewhere, it is understood and accepted
                    that the recipient/someone on their behalf is aware of the items' fragile condition.
                </p>
                <p>
                    We will not take any responsibility for the item's condition once the item is left at the 
                    consented/requested place.
                </p>

                <h4 class="pt-4">Damage/Defects</h4>
                <p>
                    All orders and items are carefully checked and sent out in good condition. In the unlikely event that 
                    the items arrive not in good condition, or have lost their original textures and/or appearance upon 
                    arrival, please report it to us immediately or within 3 hours of receipt with a clear picture of the 
                    damage/defect. All items must be unconsumed, in the state that such damage/defect was discovered, 
                    and/or in their original state.
                </p>
                <p>
                    Where it is concluded by La Vie en Rose Pâtisserie upon their investigation that the damage/defect 
                    occurred solely by fault of our team, the driver we used, or during the delivery, a full or partial 
                    refund or exchange of items will be given, whichever La Vie en Rose Pâtisserie, in their absolute 
                    discretion sees fit.
                </p>

                <p><i>La Vie en Rose Pâtisserie reserves the right to amend this policy from time to time without prior notice.</i></p>
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
                            <p><a href="about.html">About Us</a></p>
                            <p><a href="product.php">All Products</a></p>
                            <p><a href="seasonal.php">Seasonal Products</a></p>
                            <p><a href="customize.php">Customize</a></p>
                            <p><a href="contact.php">Contact Us</a></p>
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
    </body>
</html>
