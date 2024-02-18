<?php
include("../includes/connect.php");
?>

<div class="container-fluid my-3 bg-white rounded">
    <h2 class="text-center">Update password</h2>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form method="post" enctype="multipart/form-data">
                <!-- Old Password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Old password</label>
                    <input type="password" class="form-control" id="old_password" placeholder="Enter your old password"
                        autocomplete="off" required="required" name="old_password">
                </div>

                <!-- New Password field  -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">New password</label>
                    <input id="user_password" type="password" name="user_password" placeholder="Enter Password" required
                        class="form-control" />

                    <!-- <input type="password" class="form-control" id="user_password" placeholder="Enter your password"
                        autocomplete="off" required="required" name="user_password"> -->
                </div>

                <!-- New Confirm Password field  -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">New confirm Password</label>
                    <input id="conf_user_password" type="password" name="conf_user_password"
                        placeholder="Confirm Password" required onkeyup="validate_password()" class="form-control">

                    <!-- <input type="password" class="form-control" id="conf_user_password" placeholder="Confirm password"
                        autocomplete="off" required="required" name="conf_user_password"> -->
                </div>

                <div class="text-center">
                    <!-- <input type="submit" value="Update" class="btn btn-info border-0 m-2" name="update_password" /> -->

                    <span id="wrong_pass_alert"></span>

                    <button type="submit" id="update_password" class="submit_btn btn btn-info border-0 m-2"
                        onclick="wrong_pass_alert()" name="update_password">
                        Submit
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validate_password() {

        let pass = document.getElementById('user_password').value;
        let confirm_pass = document.getElementById('conf_user_password').value;
        if (pass != confirm_pass) {
            document.getElementById('wrong_pass_alert').style.color = 'red';
            document.getElementById('wrong_pass_alert').innerHTML
                = '☒ Use same password';
            document.getElementById('update_password').disabled = true;
            document.getElementById('update_password').style.opacity = (0.4);
        } else {
            document.getElementById('wrong_pass_alert').style.color = 'green';
            document.getElementById('wrong_pass_alert').innerHTML =
                '🗹 Password Matched';
            document.getElementById('update_password').disabled = false;
            document.getElementById('update_password').style.opacity = (1);
        }
    }

    function wrong_pass_alert() {
        if (document.getElementById('user_password').value == "" &&
            document.getElementById('conf_user_password').value == "") {
            alert("Please fill all the fields");
        }
    }
</script>

<?php
if (isset($_POST['update_password'])) {
    $old_password = $_POST['old_password'];
    $select_query = "select * from `users` where username='$_SESSION[username]'";
    $result = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($old_password, $row['password'])) {
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $conf_user_password = $_POST['conf_user_password'];

        if ($user_password != $conf_user_password) {
            echo "<script>alert('New and Confirm passwords are not match');</script>";
            echo "<script>window.open('./profile.php','_self');</script>";
        } else {
            $update_query = "update `users` set password='$hash_password' where username='$_SESSION[username]'";
            $result = mysqli_query($con, $update_query);
            if ($result) {
                echo "<script>alert('Password updated successfully');</script>";
                echo "<script>window.open('./profile.php','_self');</script>";
            } else {
                echo "<script>alert('Unable to update password');</script>";
                echo "<script>window.open('./profile.php','_self');</script>";
            }
        }
    } else {
        echo "<script>alert('Something went wrong,old password cannot match');</script>";
    }

    // type 2
    // $user_password = $_POST['user_password'];
    // $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    // $conf_user_password = $_POST['conf_user_password'];

    // if ($user_password != $conf_user_password) {
    //     echo "<script>alert('Passwords do not match');</script>";
    // } else {
    //     $update_query = "update `users` set password='$hash_password' where username='$_SESSION[username]'";
    //     $result = mysqli_query($con, $update_query);
    //     if ($result) {
    //         echo "<script>alert('Password updated successfully');</script>";
    //         echo "<script>window.open('./profile.php?edit_password','_self');</script>";
    //     } else {
    //         echo "<script>alert('Unable to update password');</script>";
    //         echo "<script>window.open('./profile.php?edit_password','_self');</script>";
    //     }
    // }

}
?>