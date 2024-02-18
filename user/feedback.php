<?php
error_reporting(0);
?>

<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h3 class="text-center">Feedback</h3>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form method="post" enctype="multipart/form-data">
                <!-- Feedback field  -->
                <div class="form-outline mb-4">
                    <label for="description" class="form-label">Feedback</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="description"></textarea>
                </div>

                <div class="text-center">
                    <input type="submit" value="Submit" class="btn btn-info border-0 py-2 px-3" name="feedback">
                </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['feedback'])) {
    $username = $_SESSION['username'];
    $description = $_POST['description'];
    $query = "insert into tblfeedback(username,description) values('$username','$description')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Feedback added successfully');</script>";
        echo "<script>window.open('./profile.php?feedback','_self');</script>";
    } else {
        echo "<script>alert('Something went wrong,please try again');</script>";
        echo "<script>window.open('./profile.php?feedback','_self');</script>";
    }
}
?>