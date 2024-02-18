<?php
include('./includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        body {
            overflow-x: hidden;
        }

        .fa-motorcycle {
            font-size: 120px;
        }

        .fa-car {
            font-size: 120px;
        }

        .fa-truck {
            font-size: 120px;
        }

        .category div {
            text-align: center;
        }

        .carousel-item {
            text-align: center;
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
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

        <div class="container-fluid p-0">
            <img src="./images/home.jpg" alt="" width="100%" height="560px" />

            <div class="offset-3 text-center text-white w-100 centered trial my-auto">
                <h1 class="display-6 fw-bolder">
                    Vehicle Service Management System
                </h1>
                <p class="lead fw-normal text-white mb-0">We will take care of your vehicle</p>
                <div class="col-auto mt-2">
                    <a href="./user/profile.php?service_request" class="btn btn-info btn-lg rounded-2">
                        Service Request
                    </a>
                </div>
            </div>
        </div>

        <section class="py-5 bg-light container mt-3">
            <div class="container px-4 px-lg-5 mt-1">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center text-info">We Do Service For:</h3>
                        <hr class="bg-primary opacity-100">
                        <div class="row category">
                            <div class="col-md-4">
                                <i class="fa-solid fa-motorcycle"></i>
                                <h6>Motorcycle Service</h6>
                            </div>
                            <div class="col-md-4">
                                <i class="fa-solid fa-car"></i>
                                <h6>Car Service</h6>
                            </div>
                            <div class="col-md-4">
                                <i class="fa-solid fa-truck"></i>
                                <h6>Heavy-Vehicle Service</h6>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <div class="container bg-light">
            <h3 class="text-center text-info m-5 pt-3">Testimonial</h3>
            <hr class="bg-primary opacity-100">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $query = "select username,description,dateadded from tblfeedback order by rand()";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $testimonials[] = $row;
                    }

                    foreach ($testimonials as $key => $testimonial) {
                        $activeClass = $key == 0 ? 'active' : '';
                        echo '<div class="carousel-item ' . $activeClass . '">';
                        echo '<h3>' . $testimonial['username'] . '</h3>';
                        echo '<p>' . $testimonial['description'] . '</p>';
                        echo '<p class="font-italic">' . date('F j, Y', strtotime($testimonial['dateadded'])) . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-info" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-info" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!-- Bootstrap JS and jQuery -->


        <!-- Start footer  -->
        <?php
        include('./includes/footer.php')
            ?>
        <!-- End footer  -->

    </div>

    <!-- Boostrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>