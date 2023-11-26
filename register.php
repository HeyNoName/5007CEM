<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>La Vie en Rose Pâtisserie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/login.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
    </head>

    <body>
        <div class="overflow-hidden">
            <video autoplay="autoplay" muted="muted" loop="loop" id="bg-video">
                <source src="/5007CEM/public_html/image/login.mp4" type="video/mp4" />
            </video>
            <form class="py-5" method="POST" action="register.php">
                <div class="wrapper">
                    <div class="form-box register">
                        <div class="text-center py-4">
                            <h1 class="pb-3">La Vie en Rose Pâtisserie</h1>
                            <i class="fa fa-user pb-3" aria-hidden="true"></i>
                            <h1>Register An Account</h1>
                        </div>
                        <div class="input-box">
                            <label for="uname">Username</label><br><br>
                            <input type="text" id="uname" name="username"><br><br>

                            <label for="email">E-mail</label><br><br>
                            <input type="text" id="email" name="email"><br><br>

                            <label for="pass">Password</label><br><br>
                            <input type="text" id="pass" name="password"><br><br>
                        </div>
                        <button type="submit" class="btn-1" name="register">Register</button><br><br>
                        <div class="login-register">
                            <p>Have An Account?<a href="login.php" class="login-link"> Login</a></p>
                        </div>
                        <?php
                        if (isset($_POST['register'])) {

                            $problem = FALSE;

                            if ( !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                                
                                if (!is_numeric($_POST['username'])) {

                                    if (isset($_POST['password'])) {

                                        $number = preg_match('@[0-9]@', $password);
                                        $uppercase = preg_match('@[A-Z]@', $password);
                                        $lowercase = preg_match('@[a-z]@', $password);
                                        $specialChars = preg_match('@[^\w]@', $password);

                                        if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                                            echo "<p style='color:red; font-size: 1.5rem;'><strong>Password must be at least 8 characters and contain at least 
                                        1 uppercase character, <br>1 lowercase character, 1 number and special character.</strong></p>";
                                            $problem = TRUE;
                                        } else {
                                            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                                $problem = FALSE;
                                            } else {
                                                echo "<p style='color:red; font-size: 1.5rem;'><strong>Invalid email address format.</strong></p>";
                                                $problem = TRUE;
                                            }
                                        }
                                    }
                                } else {
                                    echo "<p style='color:red; font-size: 1.5rem;'><strong>The username are NOT numeric. Please enter again.</strong></p>";
                                    $problem = TRUE;
                                }
                            } else {
                                echo "<p style='color:red; font-size: 1.5rem;'><strong>Please fill in the blank.</strong></p>";
                                $problem = TRUE;
                            }


                            if (!$problem) {
                                $postfields = array(
                                    "username" => $username,
                                    "email" => $email,
                                    "password" => $password,
                                );

                                // Debugging statement
                                echo "User Created! " ;

                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'http://localhost/api/user/create.php',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_POSTFIELDS => json_encode($postfields),
                                    CURLOPT_HTTPHEADER => array(
                                        'Content-Type: application/json',
                                    ),
                                ));

                                $response = curl_exec($curl);
//
//                                // Debugging statement
//                                echo "API Response: " . $response;

                                curl_close($curl);

                            }
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>

    </body>

</html>
