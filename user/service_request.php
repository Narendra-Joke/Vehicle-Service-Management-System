<style>
    .hidden {
        display: none;
    }
</style>

<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">SERVICE REQUEST FORM</h4>
    <form method="post">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-md-2 col-form-label">Category</label>
            <div class="col-md-8">
                <select class="form-select" aria-label="Default select example" name="category">
                    <?php
                    $result = mysqli_query($con, "select * from tblcategory");
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['categoryname']; ?>">
                            <?php echo $row['categoryname']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vehicle_name" class="col-md-2 col-form-label">Vehicle Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="vehicle_name" autocomplete="off" required="required"
                    name="vehicle_name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vehicle_model" class="col-md-2 col-form-label">Vehicle Model</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="vehicle_model" autocomplete="off" required="required"
                    name="vehicle_model">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vehicle_brand" class="col-md-2 col-form-label">Vehicle Brand</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="vehicle_brand" autocomplete="off" required="required"
                    name="vehicle_brand">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vehicle_number" class="col-md-2 col-form-label">Vehicle Number</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="vehicle_number" autocomplete="off" required="required"
                    name="vehicle_number">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="service_date" class="col-md-2 col-form-label">Service Date</label>
            <div class="col-md-8">
                <input type="date" class="form-control" id="service_date" autocomplete="off" required="required"
                    name="service_date" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="service_time" class="col-md-2 col-form-label">Service Time</label>
            <div class="col-md-8">
                <input type="time" class="form-control" id="service_time" autocomplete="off" requireT="required"
                    name="service_time">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-md-2 col-form-label">Delivery Type</label>
            <div class="col-md-8">
                <select class="form-select" aria-label="Default select example" id="selectOption" name="delivery_type">
                    <option value="Drop Service">Drop Service</option>
                    <option value="Pickup Service">Pickup Service</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row hidden" id="formControlContainer">
            <label for="pickup_address" class="col-md-2 col-form-label">Pickup Address</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="pickup_address" autocomplete="off" requireT="required"
                    name="pickup_address">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="problem_description" class="col-md-2 col-form-label">Problem Description</label>
            <div class="col-md-8">
                <textarea class="form-control" id="problem_description" rows="6" name="problem_description"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <input type="checkbox" required checked>
                <label for=""> I accept <span class="text-info">Terms and Conditions</span></label>
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Submit" class="btn btn-info border-0 py-2 px-3" name="service_request">
        </div>
    </form>
</div>


<script>
    var selectOption = document.getElementById('selectOption');
    var formControlContainer = document.getElementById('formControlContainer');

    selectOption.addEventListener('change', function () {
        var selectOption = this.value;
        if (selectOption == 'Pickup Service') {
            formControlContainer.classList.remove('hidden');
        } else {
            formControlContainer.classList.add('hidden');
        }
    });
</script>

<?php
if (isset($_POST['service_request'])) {
    $username = $_SESSION['username'];
    $service_number = mt_rand(100000000, 999999999);
    $category = $_POST['category'];
    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_model = $_POST['vehicle_model'];
    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_brand = $_POST['vehicle_brand'];
    $service_date = $_POST['service_date'];
    $service_time = $_POST['service_time'];
    $delivery_type = $_POST['delivery_type'];
    $pickup_address = $_POST['pickup_address'];
    $problem_description = $_POST['problem_description'];

    $query = mysqli_query($con, "insert into tblservicerequest(username,servicenumber,category,vehiclename,vehiclemodel,vehiclenumber,vehiclebrand,servicedate,servicetime,deliverytype,pickupaddress) values('$username','$service_number','$category','$vehicle_name','$vehicle_model','$vehicle_number','$vehicle_brand','$service_date','$service_time','$delivery_type','$pickup_address')");
    if ($query) {
        echo "<script>alert('Service request has been sent successfully.');</script>";
        echo "<script>window.open('./profile.php?service_history');</script>";
    } else {
        echo "<script>alert('Something went wrong.Please try again.');</script>";
        echo "<script>window.open('./profile.php?service_request');</script>";
    }
}
?>