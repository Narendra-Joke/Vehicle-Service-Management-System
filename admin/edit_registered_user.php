<?php
include("../includes/connect.php");

if (isset($_GET['edit_registered_user'])) {
    $username = substr(base64_decode($_GET['edit_registered_user']), 0, -5);
    $get_data = "select * from `users` where username='$username'";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $fullname = $row['fullname'];
    $email = $row['email'];
    $contact = $row['contact'];
    $address = $row['address'];
    $image = $row['image'];
}
?>

<div class="container-fluid my-3 bg-white rounded">
    <h2 class="text-center">Update profile</h2>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Fullname field  -->
                <div class="form-outline mb-4">
                    <label for="user_fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="user_username" placeholder="Enter your fullname"
                        autocomplete="off" required="required" name="user_fullname" value="<?php echo $fullname; ?>" />
                </div>

                <!-- Email field  -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="user_email" placeholder="Enter your email"
                        autocomplete="off" required="required" name="user_email" value="<?php echo $email; ?>" />
                </div>

                <!-- Contact field  -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="user_contact" placeholder="Enter your mobile number"
                        autocomplete="off" required="required" name="user_contact" value="<?php echo $contact; ?>" />
                </div>

                <!-- Address field  -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="user_address" placeholder="Enter your address"
                        autocomplete="off" required="required" name="user_address" value="<?php echo $address; ?>" />
                </div>

                <!-- Image field  -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>

                    <input type="file" class="form-control" id="user_image" required="required" name="user_image" />
                    <script>
                        // Get a reference to our file input
                        const fileInput = document.querySelector('input[type="file"]');

                        // Create a new File object
                        const myFile = new File(['Hello World!'], '<?php echo $image ?>', {
                            type: 'text/plain',
                            lastModified: new Date(),
                        });

                        // Now let's create a FileList
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(myFile);
                        fileInput.files = dataTransfer.files;

                        // Help Safari out
                        if (fileInput.webkitEntries.length) {
                            fileInput.dataset.file = `${dataTransfer.files[0].name}`;
                        }
                    </script>
                </div>

                <div class="text-center">
                    <a href="./dashboard.php?registered_users" class="btn btn-info border-0 m-2">Back<a>
                            <input type="submit" value="Update" class="btn btn-info border-0 m-2" name="user_update" />
                </div>
        </div>
    </div>

    <?php
    if (isset($_POST['user_update'])) {
        $fullname = $_POST['user_fullname'];
        $email = $_POST['user_email'];
        $contact = $_POST['user_contact'];
        $address = $_POST['user_address'];
        $image = $_FILES['user_image']['name'];
        $image_tmp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($image_tmp, "./user_images/$image");
        $update_query = "update `users` set fullname='$fullname',email='$email',contact='$contact',address='$address',image='$image',date_updated=NOW() where username='$username'";
        $sql_execute = mysqli_query($con, $update_query);
        if ($sql_execute) {
            echo "<script>alert('user profile has been updated successfully');</script>";
            echo "<script>window.open('./dashboard.php?registered_users','_self');</script>";
        } else {
            // die(mysqli_error($con));
            echo "<script>alert('Something went wrong,Please try again');</script>";
            echo "<script>window.open('./dashboard.php?registered_users','_self');</script>";
        }
    }
    ?>