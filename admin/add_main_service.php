<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">Add Main Services</h4>
    <form method="post">
        <div class="mb-3 row">
            <label for="service_name" class="col-md-2 col-form-label">Main Service Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="service_name" autocomplete="off" required="required"
                    name="service_name">
            </div>
        </div>

        

        <div class="text-center">
            <input type="submit" value="Add" class="btn btn-info border-0 py-2 px-3" name="add_main_service">
        </div>
    </form>

</div>

<?php
if (isset($_POST['add_main_service'])) {
    $service_name = $_POST['service_name'];
    
    $query = "insert into tblmainservicelist(servicename) values('$service_name')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Main Service added successfully');</script>";
        echo "<script>window.open('./dashboard.php?manage_main_services','_self');</script>";
    } else {
        echo "<script>alert('Something went wrong,Please try again');</script>";
        echo "<script>window.open('./dashboard.php?add_main_service','_self');</script>";
    }
}
?>