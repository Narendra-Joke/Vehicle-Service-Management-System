<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">ADD VSMS CATEGORY</h4>
    <form method="post">
        <div class="mb-3 row">
            <label for="category_name" class="col-md-2 col-form-label">Category Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="category_name" autocomplete="off" required="required"
                    name="category_name" placeholder="Vehicle Category">
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Add" class="btn btn-info border-0 py-2 px-3" name="add_vehicle_category">
        </div>
    </form>
</div>

<?php
if (isset($_POST['add_vehicle_category'])) {
    $category_name = $_POST['category_name'];
    $query = mysqli_query($con, "insert into tblcategory (categoryname) values('$category_name')");
    if ($query) {
        echo "<script>alert('Category has been added successfully.');</script>";
        echo "<script>window.open('./dashboard.php?manage_category','_self');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        echo "<script>window.open('./dashboard.php?manage_category','_self');</script>";
    }
}
?>