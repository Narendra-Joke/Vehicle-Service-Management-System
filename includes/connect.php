<?php
$con = mysqli_connect("localhost", "root", "1008", "vehicle_service_db");
if (!$con) {
    die(mysqli_error($con));
}
?>