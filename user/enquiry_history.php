<?php
error_reporting(0);
?>
<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">Enquiry History</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>S.NO</th>
                <th>Enquiry Number</th>
                <th>Enquiry Date</th>
                <th>Action</th>
            </tr>
            <?php
            error_reporting(0);
            $username = $_SESSION['username'];
            $query = mysqli_query($con, "select * from tblenquiry where username='$username'");
            $counter = 1;
            $rno = mt_rand(10000, 99999);
            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>

                    <td>
                        <?php echo $counter++; ?>
                    </td>
                    <td>
                        <?php echo $row['enquirynumber']; ?>
                    </td>
                    <td>
                        <?php echo $row['enquirydate']; ?>
                    </td>
                    <td><a href="profile.php?enquiry_history_view=<?php echo base64_encode($row['id'] . $rno); ?>"
                            class="text-info text-decoration-none">View Detail</a>
                    </td>
            <?php
                }
            ?>
            </tr>
        </table>
    </div>
</div>