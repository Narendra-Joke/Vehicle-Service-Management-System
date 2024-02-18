<?php
include('./includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VSMS</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fontawesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS link  -->
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info fw-bold">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="" class="logo">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php">Contact</a>
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

        <div class="container">
            <h1 class="text-secondary mt-3">About Us</h1>
            <h6>VSMS aims to1 be the best of both worlds - Reliable and Cost-effective Services</h6>
            <p>Droom is a technology and data science company that facilitates automobile buying and selling online
                through a combination of our asset-light automobile e-commerce platform along with a technology-driven
                vertically integrated proprietary ecosystem of products and services for the automobile industry. We
                offer a 21st-century e-commerce experience for automobiles and is one of the leading e-commerce
                platforms for used cars sales in India. We are the only major Indian player with a completely online
                transactional model and offer one of the largest selection of automobiles amongst the major online
                players in India with over 1.15 million vehicles listed that includes both used and new cars and
                two-wheelers, and other vehicles, as of September 30, 2021. We have expanded our platform to include
                over 11 vehicle categories, sold by auto dealers and individual sellers in 1,151 cities in India. Our
                automobile e-commerce platform, which includes our website and mobile apps, offers users convenience and
                a curated experience to buy and sell new and used vehicles and encompasses every element of automobile
                buying from searching for a vehicle, creating buying requirements, price discovery, booking,
                certification to purchase and financing and doorstep delivery.
            </p>
            <p>As a pure-play automobile e-commerce company, we provide a platform for buyers and sellers to transact
                vehicles and related services. To address structural constraints of the automobile market and buyers’
                and sellers’ pain points, we have built a platform that aims to deliver wide selection, low prices,
                inspected and verified vehicles, loan and insurance, and seamless delivery for buyers as one unified
                Droom experience. For used vehicle dealers and individual sellers, besides being able to reach out to a
                potential buyer online, we offer an end-to-end e-commerce solution including technology platform,
                digital catalogue, online payment, vehicle inspection and certification service, and vehicle delivery
                service.
            </p>
        </div>

        <?php 
        include("./includes/footer.php");
        ?>
    </div>
</body>

</html>