<?php
include('../includes/connect.php');
$mid = substr(base64_decode($_GET['edit_mechanic']), 0, -5);
$result = mysqli_query($con, "select * from tblmechanics where id='$mid'");
$row = mysqli_fetch_assoc($result);
if ($row['status'] == 1) {
    $is_available = "Yes";
} else {
    $is_available = "No";
}
?>

<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">UPDATE VSMS MECHANICS</h4>
    <form method="post">
        <div class="mb-3 row">
            <label for="mechanic_name" class="col-md-2 col-form-label">Mechanic Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="mechanic_name" autocomplete="off" required="required"
                    name="mechanic_name" value="<?php echo $row['fullname']; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mechanic_contact" class="col-md-2 col-form-label">Mechanic Contact Number</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="mechanic_contact" autocomplete="off" required="required"
                    name="mechanic_contact" value="<?php echo $row['contact']; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mechanic_email" class="col-md-2 col-form-label">Mechanic Email</label>
            <div class="col-md-8">
                <input type="email" class="form-control" id="mechanic_email" autocomplete="off" required="required"
                    name="mechanic_email" value="<?php echo $row['email']; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mechanic_address" class="col-md-2 col-form-label">Mechanic Address</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="mechanic_address" autocomplete="off" required="required"
                    name="mechanic_address" value="<?php echo $row['address']; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mechanic_address" class="col-md-2 col-form-label">Is Available</label>
            <div class="col-md-8">
                <select class="form-select" id="is_available" autocomplete="off" required="required"
                    name="is_available">
                    <?php
                    if ($is_available == "Yes") {
                        echo "<option value='$is_available'>$is_available</option>
                                  <option value='No'>No</option>";
                    } else {
                        echo "<option value='$is_available'>$is_available</option>
                                  <option value='Yes'>Yes</option>";
                    }
                    ?>

                </select>
            </div>
        </div>

        <div class="text-center">
            <a class="btn btn-info border-0 py-2 px-3" href="./dashboard?manage_mechanic">Back</a>
            <input type="submit" value="Update" class="btn btn-info border-0 py-2 px-3" name="edit_mechanic">
        </div>
    </form>
</div>

<?php
if (isset($_POST['edit_mechanic'])) {
    $fullname = $_POST['mechanic_name'];
    $contact = $_POST['mechanic_contact'];
    $email = $_POST['mechanic_email'];
    $address = $_POST['mechanic_address'];
    if ($_POST['is_available'] == "Yes") {
        $status = 1;
    } else {
        $status = 0;
    }
    $query = mysqli_query($con, "update  tblmechanics set fullname='$fullname', contact='$contact',email= '$email', address='$address', status=$status where id=$mid");
    if ($query) {
        echo "<script>alert('Mechanic Details has been update.');</script>";
        echo "<script>window.open('./dashboard.php?manage_mechanic','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        echo "<script>window.open('./dashboard.php?manage_mechanic','_self');</script>";
    }
}
?>