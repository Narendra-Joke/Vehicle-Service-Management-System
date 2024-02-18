<?php
include('../includes/connect.php');
// error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Fontawesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/profile.css" />
    <link rel="stylesheet" href="../css/style.css">
    <title>VSMS</title>
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info fw-bold">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact.php">Contact</a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='#'>My Account</a>
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
    </div>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>VSMS | USER</div>
            <div class="list-group list-group-flush my-3">
                <a href="profile.php?dashboard"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>


                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fas fa-chart-line me-2"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Enquiry</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="profile.php?enquiry_form">Enquiry Form</a></li>
                            <li><a class="dropdown-item" href="profile.php?enquiry_history">Enquiry History</a></li>
                        </ul>
                    </div>
                </div>

                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fa-solid fa-code-pull-request"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="m-3">Service Request</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="profile.php?service_request">Service Request Form</a>
                            </li>
                            <li><a class="dropdown-item" href="profile.php?service_history">Service History</a></li>
                        </ul>
                    </div>
                </div>

                <a href="profile.php?feedback"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-comment "></i><span class="m-3">Feedback</span></a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse px-5" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- <i class="fas fa-user me-2"></i> -->
                                <img src="../images/user.png" alt="user" class="rounded-circle" width="40px"
                                    height="40px"> <span class="ml-1">
                                    <i class="mdi mdi-chevron-down"></i>
                                </span>
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php?view_edit">My Profile</a></li>
                                <li><a class="dropdown-item" href="profile.php?edit_password">Change Password</a></li>
                                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                            </ul> -->

                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="profile.php?view_edit" class="dropdown-item notify-item">
                                    <i class="fa-solid fa-user"></i><span class="mx-2">My Profile</span>
                                </a>

                                <!-- item-->
                                <a href="profile.php?edit_password" class="dropdown-item notify-item">
                                    <i class="fa-solid fa-lock"></i><span class="mx-2">Change Password</span>
                                </a>

                                <a href="/logout.php" class="dropdown-item notify-item">
                                    <i class="fa-solid fa-right-from-bracket"></i><span class="mx-2">Logout</span>
                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <hr class="bg-primary opacity-100 m-1">

            <div class="container-fluid px-4">
                <?php
                if (isset($_GET["dashboard"])) {
                    include('dashboard.php');
                }
                if (isset($_GET['view_edit'])) {
                    include('view_edit_user.php');
                }
                if (isset($_GET['edit_password'])) {
                    include('edit_password.php');
                }
                if (isset($_GET['feedback'])) {
                    include('feedback.php');
                }
                if (isset($_GET['enquiry_form'])) {
                    include('enquiry_form.php');
                }
                if (isset($_GET['enquiry_history'])) {
                    include('enquiry_history.php');
                }
                if (isset($_GET['enquiry_history_view'])) {
                    include('enquiry_history_view.php');
                }
                if (isset($_GET['service_request'])) {
                    if (!isset($_SESSION['username'])) {
                        echo "<script>alert('Login please');</script>";
                        echo "<script>window.open('./login.php','_self');</script>";
                    } else {
                        include('service_request.php');
                    }
                }
                if (isset($_GET['service_history'])) {
                    include('service_history.php');
                }
                if (isset($_GET['service_history_view'])) {
                    include('service_history_view.php');
                }
                ?>


                <!-- <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Television</td>
                                    <td>Jonny</td>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Laptop</td>
                                    <td>Kenny</td>
                                    <td>$750</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell Phone</td>
                                    <td>Jenny</td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Fridge</td>
                                    <td>Killy</td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Books</td>
                                    <td>Filly</td>
                                    <td>$120</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Gold</td>
                                    <td>Bumbo</td>
                                    <td>$1800</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Pen</td>
                                    <td>Bilbo</td>
                                    <td>$75</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Notebook</td>
                                    <td>Frodo</td>
                                    <td>$36</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Dress</td>
                                    <td>Kimo</td>
                                    <td>$255</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Paint</td>
                                    <td>Zico</td>
                                    <td>$434</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Carpet</td>
                                    <td>Jeco</td>
                                    <td>$1236</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Food</td>
                                    <td>Haso</td>
                                    <td>$422</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>