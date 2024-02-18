<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">MANAGE VSMS CATEGORY</h4>

    <div class="table-responsive-md">
        <table class="table table-bordered my-3">
            <tr>
                <th>S.NO</th>
                <th>Category Name</th>
                <th>Added Date</th>
                <th>Action</th>
            </tr>
            <?php
            $rno = mt_rand(10000, 99999);
            $result = mysqli_query($con, "select * from tblcategory");
            $cnt = 1;
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $cnt++; ?>
                    </td>
                    <td>
                        <?php echo $row['categoryname']; ?>
                    </td>
                    <td>
                        <?php echo $row['datecreated']; ?>
                    </td>
                    <td><a href="dashboard.php?edit_category=<?php echo base64_encode($row['id'] . $rno); ?>"
                            class="text-info">Edit</a>
                        <span> | </span>
                        <a href="dashboard.php?manage_category=<?php echo base64_encode($row['id'] . $rno); ?>"
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
if ($_GET['manage_category']) {
    $eid = substr(base64_decode($_GET['manage_category']), 0, -5);
    $query = mysqli_query($con, "delete from tblcategory where id='$eid'");
    if ($query) {
        echo "<script>alert('Category deleted.');</script>";
        echo "<script>window.open('./dashboard.php?manage_category','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        echo "<script>window.open('./dashboard.php?manage_category','_self');</script>";
    }
}
?>