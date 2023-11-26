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

                        // Check if the user is logged in
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

                    <div>
                        <h3>No orders yet</h3>
                        <p>Go to store to place an order.</p>
                    </div>
                </div>

                <div id="User" class="tabcontent">
                    <h2>Account Information</h2>
                    <div class="pt-4">
                        <?php
                        // Display user details if logged in
                        if (isset($_SESSION['user'])) {
                            echo '<p>Name: ' . $user['username'] . '</p>';
                            echo '<p>Email: ' . $user['email'] . '</p>';
                            // Add other user details as needed
//                            echo '<hr/>';
                        }
                        ?>
<!--                        <div class="add">
                            <p>Address</p><span id="myButton"><i class="fa fa-plus px-3"> Add</i></span>
                        </div>
                        <div class="box">
                            <p><i class="fa fa-info-circle px-3 pt-3"> No Address Added</i></p>
                        </div>-->
                    </div>

                    <div id="myPopup" class="popup">

                        <form>
                            <div class="popup-content">
                                <br>
                                <label for="name" class="pt-3">Name</label>
                                <input type="text" id="name" name="name"><br><br>

                                <label for="company">Company/Building</label>
                                <input type="text" id="company" name="company"><br><br>

                                <label for="add">Address</label>
                                <input type="text" id="add" name="add"><br><br>

                                <label for="contact">Contact No</label>
                                <input type="text" id="contact" name="contact"><br><br>

                                <div class="position">
                                    <span id="closePopup" style="cursor: pointer">Cancel</span>
                                    <button class="btn btn-primary">Save</button><br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!--             Footer 
                        <div class="row text-left px-5 pt-5 foot">
                            <div class="col-6 col-md-4">
                                <h3 class="pb-3">La Vie en Rose Pâtisserie</h3>
                                <p>
                                    Indulge in premium French desserts, including our exquisite birthday cakes, that are perfect for
                                    gifting and accessible to everyone. Our cakes are crafted from scratch using only the finest halal
                                    ingredients, ensuring quality and inclusivity for all.
                                </p>
                                <br>
                                <h3 class="pb-3">Certification</h3>
                                <img src="/5007CEM/public_html/image/halal.png" width="100" height="100">
                                <img src="/5007CEM/public_html/image/gluten.png" width="150" height="100">
                                <img src="/5007CEM/public_html/image/vegan.png" width="100" height="100">
                            </div>
                            <div class="col-6 col-md-4">
                                <h3 class="pb-3">Quick Links</h3>
                                <p><a href="index.html">Home</a></p>
                                <p><a href="about.html">About Us</a></p>
                                <p><a href="product.html">All Products</a></p>
                                <p><a href="seasonal.html">Seasonal Products</a></p>
                                <p><a href="customize.html">Customize</a></p>
                                <p><a href="contact.html">Contact Us</a></p>
                                <p><a href="allergen.html">Allergen and Diet Information</a></p>
                                <p><a href="faq.html">FAQs</a></p>
                                <p><a href="terms.html">Terms of Service</a></p>
                                <p><a href="privacy.html">Privacy Policy</a></p>
                                <p><a href="delivery.html">Delivery Policy</a></p>
                                <p><a href="pick.html">Pickup Information</a></p>
            
                                <h3 class="pb-3">Follow Us</h3>
                                <a href="https://www.facebook.com/lavieenrose.pastisserie/" target="blank"><i class="fa fa-facebook" aria-hidden="true" style="color:white !important"></i></a>
                                <a href="https://www.instagram.com/lavieenrose.patisserie/" target="blank"><i class="fa fa-instagram" aria-hidden="true" style="color:white !important"></i></a>
                            </div>
                            <div class="col-6 col-md-4">
                                <h3 class="pb-3">Our Store</h3>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.0247000251957!2d100.33273147478046!3d5.413208635069488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac35e17db31bb%3A0x1236041f2d3ec9e0!2sLa%20Vie%20en%20Rose%20P%C3%A2tisserie!5e0!3m2!1sen!2smy!4v1693982880895!5m2!1sen!2smy" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="pr-3"></iframe>
                                <p>19, Lebuh Melayu, George Town, 10100 George Town, Pulau Pinang</p>
                                <p>Operating Hours: Wednesday - Sunday : 10AM - 6PM</p>
                                <p>Contact No: 0143336480</p>
                            </div>
                        </div>-->
        </div>
        <script src="/5007CEM/public_html/js/user.js" type="text/javascript"></script>

    </body>
</html>
