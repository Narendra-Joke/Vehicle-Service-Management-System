<?php
error_reporting(0);
?>

<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h3 class="text-center">Enquiry Form</h3>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Enquiry field  -->
                <div class="form-outline mb-4">

                    <label for="user_fullname" class="form-label">Enquiry Type</label>
                    <select name='enquirytype' id="enquirytype" required="true" class="form-select"
                        aria-label="Default select example">
                        <?php
                        $select_query = "select * from tblenquirytype";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {

                            ?>
                            <option value="<?php echo $row['enquirytype']; ?>">
                                <?php echo $row['enquirytype']; ?>
                            </option>";
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <label for="user_fullname" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"
                        name="description"></textarea>
                </div>

                <div class="text-center">
                    <input type="submit" value="Submit" class="btn btn-info border-0 py-2 px-3" name="enquiry_form">
                </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['enquiry_form'])) {
    $username = $_SESSION['username'];
    $enquirytype = $_POST['enquirytype'];
    $description = $_POST['description'];
    $enquirynumber = mt_rand(100000000, 999999999);

    $query = mysqli_query($con, "insert into tblenquiry(username,enquirynumber,enquirytype,description) value('$username','$enquirynumber','$enquirytype','$description')");
    if ($query) {
        echo "<script>alert('Your enquiry has been sent successfully.');</script>";
        echo "<script>window.open('./profile.php?enquiry_history','_self');</script>";
    } else {
        echo "<script>alert('Sorry, Unable to sent enquiry successfully.');</script>";
        echo "<script>window.open('./profile.php?enquiry_form','_self');</script>";
    }
}
?>