<?php
include('./includes/connect.php');
session_start();
error_reporting(0);
?>

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


        <!-- <div class="container bg-light">
            <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="#"><i class="fa-solid fa-car" style="font-size:20px"></i>
                            <h4>Services</h4>
                        </a>
                    </div>
                    <?php
                    $query = "select * from tblmainservicelist";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="carousel-item ">
                            <a href="services.php?showservices=<?php echo $row['servicename']; ?>">
                                <h4>
                                    <?php echo $row['servicename']; ?>
                                </h4>
                            </a>
                        </div>
                        <?php
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
        </div> -->

        <div class="container p-0 bg-light">
            <div class="row m-3">
                <div class="col-12 text-center">
                    <h2>Services</h2>
                </div>

                <form method="post">
                    <div class="row p-3">
                        <div class="col-8">
                            <select class="form-select" aria-label="Default select example" id="services"
                                name="service_name">
                                <option selected>Search services</option>
                                <?php
                                $query = "select * from tblmainservicelist";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['servicename']; ?>">
                                        <?php echo $row['servicename']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="submit" value="Search" class="btn btn-info" name="search_services" />
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="container bg-light">
            <?php
            if (isset($_POST['search_services'])) {
                $service_name = $_POST['service_name'];
                $query1 = "select * from tblservicelist where servicetype='$service_name'";
                $result1 = mysqli_query($con, $query1);
                $row_count = mysqli_num_rows($result1);
                if ($row_count > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                        <div class="row my-3" style="border : 1px solid black">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <h3>
                                    <?php echo $row1['servicename']; ?>
                                </h3>
                                <p class="lead">
                                    <?php echo $row1['description']; ?>
                                </p>
                            </div>
                            <div class="col-2">
                                <h4 class="pt-3">
                                    <?php echo $row1['timetaken']; ?>
                                </h4>
                                <h4 class="pt-3">Cost :
                                    <?php echo $row1['cost']; ?>
                                </h4>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "
                        <div class='row'>
                            <h3 class='text-center text-danger'>No services found</h3>
                        </div>
                    ";
                }
            }
            ?>
        </div>


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