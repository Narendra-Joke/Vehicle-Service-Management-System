<?php
if (isset($_GET['delete_registered_user'])) {
    $username = substr(base64_decode($_GET['delete_registered_user']),0,-5);
    $delete_query = "delete from `users` where username='$username'";
    $result_query = mysqli_query($con, $delete_query);
    if ($result_query) {
        echo "<script>alert('User deleted Successfully');</script>";
        echo "<script>window.open('./dashboard.php?registered_users','_self');</script>";
    } else {
        echo "<script>alert('Something went wront,Please try again');</script>";
        echo "<script>window.open('./dashboard.php?registered_users','_self');</script>";
    }
}
?>