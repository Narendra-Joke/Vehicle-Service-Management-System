<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">NOT RESPONDED ENQUIRY</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>S.NO</th>
                <th>Enquiry Type</th>
                <th>Enquiry Number</th>
                <th>Full Name</th>
                <th>Mobile Number</th>
                <th>Enquiry Date</th>
                <th>Action</th>
            </tr>
            <?php
            $enqnumber = mt_rand(100000000, 999999999);
            $ret = mysqli_query($con, "select tblenquiry.enquirynumber,tblenquiry.enquirytype,tblenquiry.id as etid, users.fullname,users.contact,users.email,users.date_added from  tblenquiry inner join users on users.username=tblenquiry.username where tblenquiry.adminstatus ='' || tblenquiry.adminstatus is null");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <tr>
                    <td>
                        <?php echo $cnt; ?>
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
                        <?php echo $row['date_added']; ?>
                    </td>
                    <td><a href="dashboard.php?view_not_respond_enquiry=<?php echo $row['etid']; ?>"
                            class="text-info text-decoration-none">View</a>
                </tr>
                <?php
                $cnt++;
            }
            ?>
        </table>
    </div>
</div>