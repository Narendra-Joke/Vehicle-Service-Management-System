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

    <link rel="stylesheet" href="./css/dashboard.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <title>VSMS</title>
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>VSMS | ADMIN</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php?dashboard"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>


                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fas fa-chart-line me-2"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Mechanics</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="./dashboard.php?addmechanic">Add Mechanic</a></li>
                            <li><a class="dropdown-item" href="./dashboard.php?manage_mechanic">Manage Mechanic</a></li>
                        </ul>
                    </div>
                </div>

                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fa-solid fa-code-pull-request"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="m-3">Vehicle Category</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="./dashboard.php?add_category">Add Category</a></li>
                            <li><a class="dropdown-item" href="./dashboard.php?manage_category">Manage Category</a></li>
                        </ul>
                    </div>
                </div>

                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fa-solid fa-code-pull-request"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="m-3">Services</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="./dashboard.php?add_main_service">Add Main Services</a>
                            </li>
                            <li><a class="dropdown-item" href="./dashboard.php?manage_main_services">Manage Main
                                    Services</a>
                            </li>
                            <li><a class="dropdown-item" href="./dashboard.php?add_services">Add Services</a></li>
                            <li><a class="dropdown-item" href="./dashboard.php?manage_services">Manage Services</a></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <a href="./dashboard.php?registered_users"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-comment "></i><span class="m-3">Registered Users</span>
                        <!-- <i class="icon-people"></i> <span class="m-3"> Register Users </span> -->
                    </a>
                </div>

                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fa-solid fa-code-pull-request"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="m-3">Service Request</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="./dashboard.php?new_service_request">New</a></li>
                            <li><a class="dropdown-item" href="./dashboard.php?rejected_service_request">Rejected</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fa-solid fa-code-pull-request"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="m-3">Servicing</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="dashboard.php?pending_service_request">Pending</a></li>
                            <li><a class="dropdown-item" href="dashboard.php?completed_service_request">Completed</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold d-flex inline-block">
                    <i class="fa-solid fa-code-pull-request"></i>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="m-3">Customer Enquiry</span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="dashboard.php?not_respond_enquiry">Not Respond
                                    Enquiry</a></li>
                            <li><a class="dropdown-item" href="dashboard.php?respond_enquiry">Respond Enquiry</a></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <a href="dashboard.php?enquiry_search"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-comment "></i><span class="m-3">Enquiry Search</span></a>
                </div>

                <div>
                    <a href="dashboard.php?service_search"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-comment "></i><span class="m-3">Service Search</span></a>
                </div>

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

                        <div class="m-2">
                            <a class="nav-link" href="./dashboard.php?new_service_requests">
                                <i class="fa-regular fa-bell" style="font-size : 25px"></i>
                                <?php
                                    $query = "select * from tblservicerequest where status = 0";
                                    $result = mysqli_query($con,$query);
                                    $rows = mysqli_num_rows($result);
                                ?>
                                <sup class="fw-bold text-danger" style="font-size : 30px"><?php echo $rows ?></sup>
                            </a>
                            <!-- <i class="fa-regular fa-bell" style="font-size : 25px"><span>0</span></i> -->
                        </div>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- <i class="fas fa-user me-2"></i> -->
                                <img src="../images/user.png" alt="user" class="rounded-circle" width="40px"
                                    height="40px"> <span class="ml-1">
                                </span>
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="">My Profile</a></li>
                                <li><a class="dropdown-item" href="">Change Password</a></li>
                                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                            </ul> -->
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="admin-profile.php" class="dropdown-item notify-item">
                                    <i class="fa-solid fa-user"></i><span class="mx-2">My Profile</span>
                                </a>

                                <!-- item-->
                                <a href="./dashboard.php?edit_password" class="dropdown-item notify-item">
                                    <i class="fa-solid fa-lock"></i><span class="mx-2">Change Password</span>
                                </a>

                                <a href="logout.php" class="dropdown-item notify-item">
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
                if (isset($_GET['dashboard'])) {
                    include('sub_dashboard.php');
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
                if (isset($_GET['addmechanic'])) {
                    include('addmechanic.php');
                }
                if (isset($_GET['manage_mechanic'])) {
                    include('manage_mechanic.php');
                }
                if (isset($_GET['edit_mechanic'])) {
                    include('edit_mechanic.php');
                }
                if (isset($_GET['add_category'])) {
                    include('add_category.php');
                }
                if (isset($_GET['manage_category'])) {
                    include('manage_category.php');
                }
                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }
                if (isset($_GET['add_services'])) {
                    include('add_services.php');
                }
                if (isset($_GET['manage_services'])) {
                    include('manage_services.php');
                }
                if (isset($_GET['delete_service'])) {
                    include('delete_service.php');
                }
                if (isset($_GET['edit_service'])) {
                    include('edit_service.php');
                }
                if (isset($_GET['add_main_service'])) {
                    include('add_main_service.php');
                }
                if (isset($_GET['manage_main_services'])) {
                    include('manage_main_services.php');
                }
                if(isset($_GET['delete_main_service'])){
                    include('delete_main_service.php');
                }
                if(isset($_GET['edit_main_service'])){
                    include('edit_main_service.php');
                }
                if (isset($_GET['registered_users'])) {
                    include('registered_users.php');
                }
                if (isset($_GET['edit_registered_user'])) {
                    include('edit_registered_user.php');
                }
                if (isset($_GET['delete_registered_user'])) {
                    include('delete_registered_user.php');
                }
                if (isset($_GET['new_service_request'])) {
                    include('new_service_request.php');
                }
                if (isset($_GET['rejected_service_request'])) {
                    include('rejected_service_request.php');
                }
                if (isset($_GET['view_rejected_service'])) {
                    include('view_rejected_service.php');
                }
                if (isset($_GET['pending_service_request'])) {
                    include('pending_service_request.php');
                }
                if (isset($_GET['completed_service_request'])) {
                    include('completed_service_request.php');
                }
                if (isset($_GET['view_pending_service'])) {
                    include('view_pending_service.php');
                }
                if (isset($_GET['view_completed_service'])) {
                    include('view_completed_service.php');
                }
                if (isset($_GET['not_respond_enquiry'])) {
                    include('not_respond_enquiry.php');
                }
                if (isset($_GET['respond_enquiry'])) {
                    include('respond_enquiry.php');
                }
                if (isset($_GET['view_not_respond_enquiry'])) {
                    include('view_not_respond_enquiry.php');
                }
                if (isset($_GET['view_respond_enquiry'])) {
                    include('view_respond_enquiry.php');
                }
                if (isset($_GET['enquiry_search'])) {
                    include('enquiry_search.php');
                }
                if (isset($_GET['service_search'])) {
                    include('service_search.php');
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