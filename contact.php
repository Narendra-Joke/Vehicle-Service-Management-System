<?php
include('./includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fontawesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS link  -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/contact.css">

    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">

        <!-- Start navbar  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info fw-bold">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="" class="logo">
                <!-- <h1 class="display-4 fw-bolder text-white">VSMS</h1> -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='./user/profile.php'>My Account</a>
                                </li>";
                        } else {
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='./user/registration.php'>Register</a>
                                </li>";
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "
                        <li class='nav-item'>
                            <a href='#' class='nav-link'>Welcome Guest</a>
                        </li>";
                } else {
                    echo "
                        <li class='nav-item'>
                            <a href='#' class='nav-link'>Welcome " . $_SESSION['username'] . "</a>
                        </li>";
                }

                if (!isset($_SESSION['username'])) {
                    echo "
                        <li class='nav-item'>
                            <a href='./user/login.php' class='nav-link'>Login</a>
                        </li>";
                } else {
                    echo "
                        <li class='nav-item'>
                            <a href='./user/logout.php' class='nav-link'>Logout</a>
                        </li>";
                }
                ?>
            </ul>
        </nav>


        <div class="row">
            <div class="col-md-7">
                <div class="contact-card">
                    <p class="p-1">Helpline Numbers</p>
                    <div class="line-1"></div>
                    <p class="p-2">9999999999</p>
                    <img src="./images/contact1.svg" alt="vsms" class="contact-card-img">
                </div>
                <div class="contact-card">
                    <p class="p-1">Email</p>
                    <div class="line-1"></div>
                    <div>
                        <a href="mailto:info@vsms.in" style="text-decoration:none">
                            <p class="p-2" style="z-index: 9;">info@vsms.in</p>
                        </a>
                        <img src="./images/email.svg" class="email-img" alt="vsms">
                        <div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="contact-card1">
                    <p class="p-1">Corporate Office Address</p>
                    <div class="line-3"></div>
                    <div class="mob-off-wth">
                        <span class="p-3 p-2"><br>Solapur-413002</span>
                    </div>
                    <img src="./images/address.svg" class="office-img" alt="vsms">
                </div>

            </div>
        </div>

        <?php
        include("./includes/footer.php");
        ?>

    </div>

</body>

</html>