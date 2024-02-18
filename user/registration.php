<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fontawesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS link  -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="col-6 m-auto shadow-lg p-5 my-3">
        <h2 class="text-center">New User Registration</h2>

        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Fullname field  -->
                    <div class="form-outline mb-4">
                        <label for="user_fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="user_username" placeholder="Enter your fullname"
                            autocomplete="off" required="required" name="user_fullname">
                    </div>

                    <!-- Email field  -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user_email" placeholder="Enter your email"
                            autocomplete="off" required="required" name="user_email">
                    </div>

                    <!-- Contact field  -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="user_contact" placeholder="Enter your mobile number"
                            autocomplete="off" required="required" name="user_contact">
                    </div>

                    <!-- Username Field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user_username" placeholder="Enter your username"
                            autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- Password field  -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password" placeholder="Enter your password"
                            autocomplete="off" required="required" name="user_password">
                    </div>

                    <!-- Confirm Password field  -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="conf_user_password"
                            placeholder="Confirm password" autocomplete="off" required="required"
                            name="conf_user_password">
                    </div>

                    <!-- Address field  -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="user_address" placeholder="Enter your address"
                            autocomplete="off" required="required" name="user_address">
                    </div>

                    <!-- Image field  -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" class="form-control" id="user_image" required="required" name="user_image">
                    </div>

                    <div class="mt-4 pt-2">
                        <a href="../index.php"><input type="button" class="btn btn-info border-0 py-2 px-3"
                                value="Back"></a>
                        <input type="reset" value="Reset" class="btn btn-info border-0 py-2 px-3" name="user_reset">
                        <input type="submit" value="Register" class="btn btn-info border-0 py-2 px-3"
                            name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="login.php"
                                class="text-danger"> Login </a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>

<!-- php code  -->
<?php
if (isset($_POST['user_register'])) {
    $user_fullname = $_POST['user_fullname'];
    $user_email = $_POST['user_email'];
    $user_contact = $_POST['user_contact'];
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

    // select data in the database 
    $select_query = "select * from `users` where username='$user_username' or email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Username and Email is already exist');</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Insert data in the database 
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into `users` (fullname,email,contact,username,password,address,image) 
            values ('$user_fullname','$user_email','$user_contact','$user_username','$hash_password','$user_address','$user_image')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script>window.open('./login.php','_self');</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>