<?php
include('../includes/connect.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS link  -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container-fluid my-3">

        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-6 shadow-lg rounded-3">
                <h2 class="text-center m-2">Admin Login</h2>
                <form action="" method="post">
                    <!-- Username field  -->
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" class="form-control border-dark" id="admin_username"
                            placeholder="Enter your username" autocomplete="off" required="required"
                            name="admin_username">
                    </div>

                    <!-- Password field  -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" class="form-control border-dark" id="admin_password"
                            placeholder="Enter your password" autocomplete="off" required="required"
                            name="admin_password">
                    </div>

                    <div class="m-4 pt-2 text-center">
                        <!-- <a href="../index.php"><input type="button" value="Back"
                                class="btn btn-info border-0 py-2 px-3"></a> -->
                        <input type="submit" value="Login" class="btn btn-info border-0 py-2 px-3" name="admin_login">
                        <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="./registration.php"
                                class="text-danger"> Register </a></p> -->
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $select_query = "select * from `users` where username='$admin_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0) {
        if (password_verify($admin_password, $row_data['password'])) {
            $_SESSION['username'] = $admin_username;
            echo "<script>alert('Login successfully');</script>";
            echo "<script>window.open('./dashboard.php','_self');</script>";
        } else {
            echo "<script>alert('Invalid credentials');</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>