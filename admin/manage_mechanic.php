<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">MANAGE VSMS MECHANIC</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>S.NO</th>
                <th>Full Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
            $rno = mt_rand(10000, 99999);
            $ret = mysqli_query($con, "select * from  tblmechanics");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>

                <tr>
                    <td>
                        <?php echo $cnt++; ?>
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
                        <?php echo $row['address']; ?>
                    </td>
                    
                    <td>
                        <a href="./dashboard.php?edit_mechanic=<?php echo base64_encode($row['id'] . $rno); ?>"
                            class="text-info">Edit</a>|
                        |
                        <a href="./dashboard.php?manage_mechanic=<?php echo base64_encode($row['id'] . $rno); ?>"
                            class="text-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

<?php
if ($_GET['manage_mechanic']) {
    $eid = substr(base64_decode($_GET['manage_mechanic']), 0, -5);
    $query = mysqli_query($con, "delete from tblmechanics where id='$eid'");
    if ($query) {
        echo "<script>alert('Mechanic Record deleted.');</script>";
        echo "<script>window.open('./dashboard.php?manage_mechanic','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        echo "<script>window.open('./dashboard.php?manage_mechanic','_self');</script>";
    }
}
?>