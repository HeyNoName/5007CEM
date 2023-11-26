<?php
session_start();

// database connection
$dsn = 'mysql:host=localhost;dbname=PastryDB;';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    //authentication logic using a database query
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user'] = $user;

        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html lang="en">

    <head>
        <title>La Vie en Rose Pâtisserie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/5007CEM/public_html/css/login.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            @media screen and (max-width: 768px) {
                .wrapper {
                    position: relative;
                    width: 390px;
                    background: transparent;
                    border: 2px solid rgba(255, 255, 255, .5);
                    border-radius: 20px;
                    backdrop-filter: blur(20px);
                    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    overflow: hidden;
                    transition: height .2s ease;
                    color: white;
                    left: 0%;
                }
            }
        </style>
    </head>

    <body>
        <div class="overflow-hidden">
            <video autoplay="autoplay" muted="muted" loop="loop" id="bg-video">
                <source src="/5007CEM/public_html/image/login.mp4" type="video/mp4" />
            </video>

            <form class="py-5" method="POST" action="login.php">
                <div class="wrapper">
                    <div class="form-box login">
                        <div class="text-center py-4">
                            <h1 class="pb-3">La Vie en Rose Pâtisserie</h1>
                            <i class="fa fa-user pb-3" aria-hidden="true"></i>
                            <h3>Login</h3>
                        </div>
                        <div class="input-box">
                            <label for="uname" class="pt-4">E-mail Address </label><br><br>
                            <input type="text" id="email" name="email"><br><br>
                        </div>
                        <div class="input-box pb-5">
                            <label for="pass" class="pt-4">Password</label><br><br>
                            <input type="password" id="password" name="password"><br><br>
                        </div>
                        <button type="submit" class="btn-1" name="login">Login</button><br><br>
                        <div class="login-register">
                            <p>Need Account? <a href="register.php" class="register-link">Register</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>

