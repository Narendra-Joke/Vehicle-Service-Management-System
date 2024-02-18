<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">RESPONDED ENQUIRY</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
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
            <?php
            $enqnumber = mt_rand(100000000, 999999999);
            $ret = mysqli_query($con, "select tblenquiry.enquirynumber,tblenquiry.enquirytype,tblenquiry.enquirydate,tblenquiry.id as etid, users.fullname,users.contact,users.email,users.date_added from  tblenquiry inner join users on users.username=tblenquiry.username where tblenquiry.adminstatus ='1'");
            $cnt = 1;
            $rno = mt_rand(10000, 99999);
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
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['enquirydate']; ?>
                    </td>
                    <td><a href="./dashboard.php?view_respond_enquiry=<?php echo base64_encode($row['etid'] . $rno); ?>&original">View
                            Details</a></td>
                </tr>
                <?php
                $cnt = $cnt + 1;
            } ?>
        </table>
    </div>
</div>