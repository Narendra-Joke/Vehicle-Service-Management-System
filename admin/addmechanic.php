<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <form method="post">
        <h4 class="text-center">ADD VSMS MECHANICS</h4>

        <div class="mb-3 row">
            <label for="mechanic_name" class="col-md-2 col-form-label">Mechanic Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="mechanic_name" autocomplete="off" required="required"
                    name="mechanic_name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mechanic_contact" class="col-md-2 col-form-label">Mechanic Contact Number</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="mechanic_contact" autocomplete="off" required="required"
                    name="mechanic_contact">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mechanic_email" class="col-md-2 col-form-label">Mechanic Email</label>
            <div class="col-md-8">
                <input type="email" class="form-control" id="mechanic_email" autocomplete="off" required="required"
                    name="mechanic_email">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mechanic_address" class="col-md-2 col-form-label">Mechanic Address</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="mechanic_address" autocomplete="off" required="required"
                    name="mechanic_address">
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Add" class="btn btn-info border-0 py-2 px-3" name="add_mechanic">
        </div>
    </form>

</div>

<?php
if (isset($_POST['add_mechanic'])) {
    $name = $_POST['mechanic_name'];
    $contact = $_POST['mechanic_contact'];
    $email = $_POST['mechanic_email'];
    $address = $_POST['mechanic_address'];

    $query = mysqli_query($con, "insert into tblmechanics(fullname,contact,email,address) value('$name','$contact','$email','$address')");
    if ($query) {
        echo "<script>alert('Mechanic Details has been added.');</script>";
        echo "<script>window.open('./dashboard.php?manage_mechanic','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script>window.open('./dashboard.php?add_mechanic','_self');</script>";
    }
}
?>