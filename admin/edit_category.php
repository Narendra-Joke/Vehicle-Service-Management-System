<?php
$cid = substr(base64_decode($_GET['edit_category']), 0, -5);
$result = mysqli_query($con, "select * from tblcategory where id='$cid'");
$row = mysqli_fetch_assoc($result);
if ($row['status'] == 1) {
    $is_available = "Yes";
} else {
    $is_available = "No";
}
?>
<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">UPDATE VSMS CATEGORY</h4>
    <form method="post">
        <div class="mb-3 row">
            <label for="category_name" class="col-md-2 col-form-label">Category Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="category_name" autocomplete="off" required="required"
                    name="category_name" value="<?php echo $row['categoryname']; ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="category_name" class="col-md-2 col-form-label">Is Available</label>
            <div class="col-md-8">
                <select class="form-select" id="is_available" autocomplete="off" required="required"
                    name="is_available">
                    <?php
                    if ($is_available == "Yes") {
                        echo "<option value='$is_available'>$is_available</option>
                                  <option value='No'>No</option>";
                    } else {
                        echo "<option value='$is_available'>$is_available</option>
                                  <option value='Yes'>Yes</option>";
                    }
                    ?>

                </select>
            </div>
        </div>

        <div class="text-center">
            <a href="./dashboard.php?manage_category" class="btn btn-info border-0 py-2 px-3">Back</a>
            <input type="submit" value="Update" class="btn btn-info border-0 py-2 px-3" name="edit_category">
        </div>
    </form>
</div>

<?php
if (isset($_POST['edit_category'])) {
    $categoryname = $_POST['category_name'];
    if ($_POST['is_available'] == "Yes") {
        $status = 1;
    } else {
        $status = 0;
    }
    $query = mysqli_query($con, "update tblcategory set categoryname = '$categoryname',status = $status where id=$cid");
    if ($query) {
        echo "<script>alert('Category has been update.');</script>";
        echo "<script>window.open('./dashboard.php?manage_category','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script>window.open('./dashboard.php?manage_category','_self');</script>";
    }
}
?>