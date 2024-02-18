<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">MANAGE VSMS MAIN SERVICES</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>S.NO</th>
                <th>Service Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            $rno = mt_rand(10000, 99999);
            $ret = mysqli_query($con, "select * from  tblmainservicelist");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>

                <tr>
                    <td>
                        <?php echo $cnt++; ?>
                    </td>
                    <td>
                        <?php echo $row['servicename']; ?>
                    </td>
                    <td>
                        <?php echo $row['datecreated']; ?>
                    </td>
                    <td>
                        <a href="./dashboard.php?edit_main_service=<?php echo base64_encode($row['id'] . $rno); ?>"
                            class="text-info">Edit</a>|
                        |
                        <a href="./dashboard.php?delete_main_service=<?php echo base64_encode($row['id'] . $rno); ?>"
                            class="text-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>