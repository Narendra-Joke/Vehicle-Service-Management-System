<div class="container-fluid p-5 bg-white rounded-2 mt-4">
    <h4 class="text-center">VIEW PENDING SERVICE</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>Service Nuber</th>
                <td>2024-01-29 10:37:00</td>
                <th>Full Name</th>
                <td>976606276</td>
            </tr>
            <tr>
                <th>Vehicle Category</th>
                <td>322007242</td>
                <th>Vehicle Name</th>
                <td>322007242</td>
            </tr>
            <tr>
                <th>Vehicle Model</th>
                <td>Other Enquiry</td>
                <th>Vehicle Brand</th>
                <td>Other Enquiry</td>
            </tr>
            <tr>
                <th>Vehicle Registration Number</th>
                <td>This is for testing</td>
                <th>Service Request Date</th>
                <td>2024-01-29 10:37:00</td>
            </tr>
            <tr>
                <th>Service Time</th>
                <td>No action taken yet</td>
                <th>Delivery Type</th>
                <td>Pickupservice</td>
            </tr>
            <tr>
                <th>Pickup Address</th>
                <td></td>
                <th>Admin Status</th>
                <td>2024-01-29 10:37:00</td>
            </tr>
        </table>
    </div>

    <div class="container-fluid p-2 bg-white rounded-2 mt-4">
    
        <div class="mb-3 row">
            <label for="vehicle_name" class="col-md-2 col-form-label">Admin Remark</label>
            <div class="col-md-8">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-md-2 col-form-label">Service By</label>
            <div class="col-md-8">
                <select class="form-select" aria-label="Default select example">
                    <option value="">Service By</option>
                    <option value="2">Two Wheeler Without Gear</option>
                    <option value="3">Four Wheeler</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vehicle_name" class="col-md-2 col-form-label">Service Charge</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="vehicle_name" autocomplete="off" required="required"
                    name="vehicle_name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vehicle_name" class="col-md-2 col-form-label">Parts Charge</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="vehicle_name" autocomplete="off" required="required"
                    name="vehicle_name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vehicle_name" class="col-md-2 col-form-label">Additional Charge</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="vehicle_name" autocomplete="off" required="required"
                    name="vehicle_name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-md-2 col-form-label">Admin Status</label>
            <div class="col-md-8">
                <select class="form-select" aria-label="Default select example">
                    <option value="">Completed</option>
                    <option value="2">Two Wheeler Without Gear</option>
                    <option value="3">Four Wheeler</option>
                </select>
            </div>
        </div>

        <div class="text-center">
            <a href="dashboard.php?pending_service_request" class="btn btn-info border-0 py-2 px-3">Back</a>
        </div>

    </div>

</div>