<div class="container-fluid p-5 bg-white rounded-2 mt-4">
    <h4 class="text-center">VIEW RESPOND ENQUIRY</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <?php
            $cid = substr(base64_decode($_GET['view_respond_enquiry']), 0, -5);
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
                        if ($row['adminstatus'] == 1) {
                            echo "Responded";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>Admin Response</th>
                    <td>
                        <?php echo $row['adminresponse']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Admin Remark Date</th>
                    <td>
                        <?php echo $row['adminremarkdate']; ?>
                    </td>
                </tr>
            </table>

            <!-- <table class="table table-bordered my-3">
            <tr>
                <th>Admin Response</th>
                <td></td>
            </tr>

            <tr>
                <th>Admin Remark Date</th>
                <td></td>
            </tr>
        </table> -->
        </div>

        <div class="text-center">
            <?php
            if (isset($_GET['view_respond_enquiry']) & isset($_GET['original'])) {
                echo "<a href='dashboard.php?respond_enquiry' class='btn btn-info border-0 py-2 px-3'>Back</a>";
            } else {
                echo "<a href='./dashboard.php?enquiry_search' class='btn btn-info border-0 py-2 px-3'>Back</a>";
            }
            ?>
        </div>

        <?php
            }
            ?>
</div>