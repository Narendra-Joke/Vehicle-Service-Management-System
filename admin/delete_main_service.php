<?php
if ($_GET['delete_main_service']) {
    $eid = substr(base64_decode($_GET['delete_main_service']), 0, -5);
    $query = mysqli_query($con, "delete from tblmainservicelist where id='$eid'");
    if ($query) {
        echo "<script>alert('Main Service deleted successfully.');</script>";
        echo "<script>window.open('./dashboard.php?manage_main_services','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        echo "<script>window.open('./dashboard.php?manage_main_services','_self');</script>";
    }
}
?>