<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">SEARCH ENQUIRY</h4>

    <form method="post">
        <div class="mb-3 row">
            <label for="searchdata" class="col-md-3 col-form-label">Search by Name / Email / Contact : </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="searchdata" autocomplete="off" required="required"
                    name="searchdata">
            </div>
        </div>

        <div class="text-center">
            <a href="./dashboard.php?enquiry_search" class="btn btn-info mx-3">Refresh</a>
            <input type="submit" class="btn btn-info" name="enquirysearch" />
        </div>
    </form>
</div>

<?php
if (isset($_POST['enquirysearch'])) {
    $sdata = $_POST['searchdata'];
    ?>
    <h4 align="center" style="color:black;" class="mt-3">Result against "
        <?php echo $sdata; ?>" keyword
    </h4>

    <div class="row">
        <div class="col-12">
            <div class="p-20">
                <table style="background-color:#fff;" class="table">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Enquiry Type</th>
                            <th>Enquiry Number</th>
                            <th>Full Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Enquiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $result = mysqli_query($con, "select tblenquiry.enquirynumber, tblenquiry.enquirytype,tblenquiry.id as etid, tblenquiry.enquirydate, users.fullname,users.contact,users.email,users.date_added from  tblenquiry inner join users on users.username=tblenquiry.username where users.fullname like '%$sdata%' || users.contact like '%$sdata%' || users.email like '%$sdata%'");
                    $num = mysqli_num_rows($result);
                    $rno = mt_rand(10000,99999);
                    if ($num > 0) {
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $cnt++; ?>
                                </td>
                                <td>
                                    <?php echo $row['enquirytype']; ?>
                                </td>
                                <td>
                                    <?php echo $row['enquirynumber']; ?>
                                </td>
                                <td>
                                    <?php echo $row['fullname']; ?>
                                </td>
                                <td>
                                    <?php echo $row['contact']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['enquirydate']; ?>
                                </td>
                                <td>
                                    <a href="./dashboard.php?view_respond_enquiry=<?php echo base64_encode($row['etid'] . $rno); ?>">View Details</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8"> No record found against this search</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php
}
?>