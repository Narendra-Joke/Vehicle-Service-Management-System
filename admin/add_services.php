<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">Add Services</h4>
    <form method="post">
        <div class="mb-3 row">
            <label for="service_name" class="col-md-2 col-form-label">Service Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="service_name" autocomplete="off" required="required"
                    name="service_name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-8">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="description"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="time_taken" class="col-md-2 col-form-label">Time taken</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="time_taken" autocomplete="off" required="required"
                    name="time_taken">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-md-2 col-form-label">Service Type</label>
            <div class="col-md-8">
                <select class="form-select" aria-label="Default select example" name="service_type" required>
                    <?php
                    $query = "select * from tblmainservicelist";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['servicename']; ?>">
                            <?php echo $row['servicename']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="cost" class="col-md-2 col-form-label">Cost</label>
            <div class="col-md-8">
                <input type="number" class="form-control" id="cost" autocomplete="off" required="required" name="cost">
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Add" class="btn btn-info border-0 py-2 px-3" name="add_services">
        </div>
    </form>

</div>

<?php
if (isset($_POST['add_services'])) {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $time_taken = $_POST['time_taken'];
    $service_type = $_POST['service_type'];
    $cost = $_POST['cost'];
    $query = "insert into tblservicelist(servicename,description,timetaken,servicetype,cost) values('$service_name','$description','$time_taken','$service_type',$cost)";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Service added successfully');</script>";
        echo "<script>window.open('./dashboard.php?manage_services','_self');</script>";
    } else {
        echo "<script>alert('Something went wrong,Please try again');</script>";
        echo "<script>window.open('./dashboard.php?add_services','_self');</script>";
    }
}
?>