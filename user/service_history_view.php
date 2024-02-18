<div class="container-fluid p-5 bg-white rounded-2 mt-4">
    <h4 class="text-center">SERVICE HISTORY VIEW</h4>

    <div class="table-responsive-md">
        <?php
        $cid = substr(base64_decode($_GET['service_history_view']), 0, -4);
        $username = $_SESSION['username'];
        $result = mysqli_query($con, "select * from tblservicerequest where id='$cid' and username='$username'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <table class="table table-bordered my-3">
                <tr>
                    <th>Service Request Date</th>
                    <td>
                        <?php echo $row['datecreated']; ?>
                    </td>
                    <th>Service Number</th>
                    <td>
                        <?php echo $row['servicenumber']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                        <?php echo $row['category']; ?>
                    </td>
                    <th>Vehicle Name</th>
                    <td>
                        <?php echo $row['vehiclename']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Vehicle Model</th>
                    <td>
                        <?php echo $row['vehiclemodel']; ?>
                    </td>
                    <th>Vehicle Brand</th>
                    <td>
                        <?php echo $row['vehiclebrand']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Vehicle Number</th>
                    <td>
                        <?php echo $row['vehiclenumber']; ?>
                    </td>
                    <th>Service Date</th>
                    <td>
                        <?php echo $row['servicedate']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Service Time</th>
                    <td>
                        <?php echo $row['servicetime']; ?>
                    </td>
                    <th>Delivery Type</th>
                    <td>
                        <?php echo $row['deliverytype']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Pickup Address</th>
                    <td>
                        <?php echo $row['pickupaddress']; ?>
                    </td>
                    <th>Service Request Date</th>
                    <td>2024-01-29 10:37:00</td>
                </tr>
                <tr>
                    <th>Admin Remark</th>
                    <td>No action taken yet</td>
                    <th>Admin Remark Date</th>
                    <td>2024-01-29 10:37:00</td>
                </tr>
                <tr>
                    <th>Service Charge</th>
                    <td>0</td>
                    <th>Parts Charge</th>
                    <td>0</td>
                </tr>
                <tr>
                    <th>Other Charge(if any)</th>
                    <td>No action taken yet</td>
                    <th>Total Amount</th>
                    <td>0</td>
                </tr>
            </table>
            <?php
        }
        ?>
    </div>

    <div class="text-center">
        <input type="submit" value="Print" class="btn btn-info border-0 py-2 px-3" name="print_service_history">
    </div>
</div>