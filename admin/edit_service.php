<?php
if (isset($_GET['edit_service'])) {
    $sid = substr(base64_decode($_GET['edit_service']), 0, -5);
    $query = "select * from tblservicelist where id = '$sid'";
    $result = mysqli_query($con, $query);
    $row1 = mysqli_fetch_assoc($result);
}
?>
<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">Edit Services</h4>
    <form method="post">
        <div class="mb-3 row">
            <label for="service_name" class="col-md-2 col-form-label">Service Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="service_name" autocomplete="off" required="required"
                    name="service_name" value="<?php echo $row1['servicename']; ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-8">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"
                    name="description"><?php echo $row1['description']; ?></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="time_taken" class="col-md-2 col-form-label">Time taken</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="time_taken" autocomplete="off" required="required"
                    name="time_taken" value="<?php echo $row1['timetaken']; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-md-2 col-form-label">Service Type</label>
            <div class="col-md-8">
                <select class="form-select" aria-label="Default select example" name="service_type" required>
                    <option value="<?php echo $row1['servicetype']; ?>">
                        <?php echo $row1['servicetype']; ?>
                    </option>
                    <?php
                    $optionremove = $row1['servicetype'];
                    $query = "select * from tblmainservicelist where servicename != '$optionremove'";
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
                <input type="number" class="form-control" id="cost" autocomplete="off" required="required" name="cost"
                    value="<?php echo $row1['cost']; ?>" />
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Update" class="btn btn-info border-0 py-2 px-3" name="edit_service" />
        </div>
    </form>

</div>

<?php
if (isset($_POST['edit_service'])) {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $time_taken = $_POST['time_taken'];
    $service_type = $_POST['service_type'];
    $cost = $_POST['cost'];
    $query = "update tblservicelist set servicename = '$service_name',description = '$description',timetaken = '$time_taken',servicetype = '$service_type',cost = $cost where id = '$sid'";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Service updated successfully');</script>";
        echo "<script>window.open('./dashboard.php?manage_services','_self');</script>";
    } else {
        echo "<script>alert('Something went wrong,Please try again');</script>";
        echo "<script>window.open('./dashboard.php?manage_services','_self');</script>";
    }
}
?>