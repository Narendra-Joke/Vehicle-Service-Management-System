<div class="container-fluid p-5 bg-white rounded-2 mt-4">
    <h4 class="text-center">VIEW NOT RESPOND ENQUIRY</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">

            <?php
            $cid = $_GET['view_not_respond_enquiry'];
            $ret = mysqli_query($con, "select * from tblenquiry join users on users.username=tblenquiry.username where tblenquiry.id='$cid'");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <tr>
                    <th>Enquiry Number</th>
                    <td>
                        <?php echo $row['enquirynumber']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <?php echo $row['fullname']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Enquiry Type</th>
                    <td>
                        <?php echo $row['enquirytype']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Enquiry Date</th>
                    <td>
                        <?php echo $row['enquirydate']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Admin Status</th>
                    <td>
                        <?php
                        if ($row['adminstatus'] == "1") {
                            echo "Responded";
                        } else {
                            echo "Not Responded";
                        }
                        ?>
                    </td>
                </tr>

            </table>
        </div>

        <div class="row">
            <hr>
        </div>


        <!-- <div class="container-fluid p-2 bg-white rounded-2 mt-4">
        <div class="mb-3 row">
            <label for="vehicle_name" class="col-md-2 col-form-label">Admin Response</label>
            <div class="col-md-8">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
        </div>

        <div class="row">
            <hr>
        </div>

        <div class="mb-3 row">
            <label for="staticEmail" class="col-md-2 col-form-label">Admin Status</label>
            <div class="col-md-8">
                <select class="form-select" aria-label="Default select example">
                    <option value="Responded">Responded</option>
                    <option value="2">Two Wheeler Without Gear</option>
                </select>
            </div>
        </div>

        <div class="row">
            <hr>
        </div>

        <div class="text-center">
            <a href="dashboard.php?not_respond_enquiry" class="btn btn-info border-0 py-2 px-3">Back</a>
            <input type="submit" name="submit" name="respond_enquiry" class="btn btn-info border-0 py-2 px-3" />
        </div>

    </div> -->


        <table class="table mb-0">
            <?php
            if ($row['adminresponse'] == "") {
                ?>

                <form method="post" enctype="multipart/form-data">

                    <tr>
                        <th>Admin Response :</th>
                        <td>
                            <textarea name="adminresponse" placeholder="" rows="12" cols="14" class="form-control wd-450"
                                required="true"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>Admin Status :</th>
                        <td>
                            <select name="status" class="form-control wd-450" required="true">
                                <option value="1" selected="true">Responded</option>
                            </select>
                        </td>
                    </tr>

                    <tr align="center">
                        <td colspan="2">
                            <div class="text-center">
                                <a href="dashboard.php?not_respond_enquiry" class="btn btn-info border-0 py-2 px-3">Back</a>
                                <input type="submit" name="respond_enquiry" class="btn btn-info border-0 py-2 px-3" />
                            </div>
                        </td>
                    </tr>
                </form>

                <?php
            } else {
                ?>
                <table border="1" class="table table-bordered mg-b-0">
                    <tr>
                        <th>Admin Response</th>
                        <td>
                            <?php echo $row['adminresponse']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Admin Remark date</th>
                        <td>
                            <?php echo $row['adminremarkdate']; ?>
                        </td>
                    </tr>
                </table>
                <?php
            }
            ?>
        </table>

        <?php
            }
            ?>
</div>

<?php
if (isset($_POST['respond_enquiry'])) {
    // $cid = $_GET['view_not_respond_enquiry'];
    $adresp = $_POST['adminresponse'];
    $admsta = $_POST['status'];
    $query = mysqli_query($con, "update tblenquiry set adminresponse='$adresp',adminstatus='$admsta' where id='$cid'");
    if ($query) {
        echo "<script>alert('Enquiry has been responded successfully.');</script>";
        echo "<script>window.open('./dashboard.php?respond_enquiry','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>