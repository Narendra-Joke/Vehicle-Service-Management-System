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
    <title>User Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS link  -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="col-6 m-auto shadow-lg p-5 my-3 rounded-3">
        <h2 class="text-center">User Login</h2>

        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- Username field  -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control border-dark" id="user_username"
                            placeholder="Enter your username" autocomplete="off" required="required"
                            name="user_username">
                    </div>

                    <!-- Password field  -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control border-dark" id="user_password"
                            placeholder="Enter your password" autocomplete="off" required="required"
                            name="user_password">
                    </div>

                    <div class="mt-4 pt-2">
                        <a href="../index.php"><input type="button" value="Back"
                                class="btn btn-info border-0 py-2 px-3"></a>
                        <input type="submit" value="Login" class="btn btn-info border-0 py-2 px-3" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="./registration.php"
                                class="text-danger"> Register </a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "select * from `users` where username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0) {
        if (password_verify($user_password, $row_data['password'])) {
            $_SESSION['username'] = $user_username;
            echo "<script>alert('Login successfully');</script>";
            echo "<script>window.open('./profile.php','_self');</script>";
        } else {
            echo "<script>alert('Invalid credentials');</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>