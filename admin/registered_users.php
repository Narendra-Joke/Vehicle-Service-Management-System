<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">REGISTERED USERS</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>S.NO</th>
                <th>Full Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Action</th>
            </tr>
            <?php
            $select_query = "select * from `users`";
            $result_query = mysqli_query($con, $select_query);
            $rno = mt_rand(10000,999999);
            $number = 1;
            while ($row = mysqli_fetch_array($result_query)) {
                ?>
                <tr>
                    <td>
                        <?php echo $number ?>
                    </td>
                    <td>
                        <?php echo $row['fullname'] ?>
                    </td>
                    <td>
                        <?php echo $row['contact'] ?>
                    </td>
                    <td>
                        <?php echo $row['email'] ?>
                    </td>
                    <td>
                        <?php echo $row['date_added'] ?>
                    </td>
                    <td><a href="dashboard.php?edit_registered_user=<?php echo base64_encode($row['username'] . $rno); ?>"
                            class="text-info text-decoration-none">Edit</a>
                        <span> | </span>
                        <a href="dashboard.php?delete_registered_user=<?php echo base64_encode($row['username'] . $rno); ?>"
                            class="text-info text-decoration-none text-danger">Delete</a>
                    </td>
                </tr>
                <?php
                $number++;
            }
            ?>
        </table>
    </div>
</div>