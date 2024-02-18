<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">SERVICE HISTORY</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>S.NO</th>
                <th>Category</th>
                <th>Vehicle Name</th>
                <th>Service Request Date</th>
                <th>Action</th>
            </tr>
            <?php
            $query = "select * from tblservicerequest";
            $result = mysqli_query($con, $query);
            $rno = mt_rand(1000, 9999);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                    <td>
                        <?php echo $count++; ?>
                    </td>
                    <td>
                        <?php echo $row['category']; ?>
                    </td>
                    <td>
                        <?php echo $row['vehiclename']; ?>
                    </td>
                    <td>
                        <?php echo $row['datecreated']; ?>
                    </td>
                    <td>
                        <a href="profile.php?service_history_view=<?php echo base64_encode($row['id'] . $rno); ?>"
                            class="text-info text-decoration-none">View Detail</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>