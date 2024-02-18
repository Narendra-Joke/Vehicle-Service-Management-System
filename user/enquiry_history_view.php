<div class="container-fluid p-2 bg-white rounded-2 mt-4">
    <h4 class="text-center">Enquiry History View</h4>

    <div class="table-responsive-md">

        <?php
        $antcid = substr(base64_decode($_GET['enquiry_history_view']), 0, -5);
        $username = $_SESSION['username'];
        $ret = mysqli_query($con, "select * from  tblenquiry where id='$antcid' and username='$username'");
        $cnt = 1;
        $row_count = mysqli_num_rows($ret);
        if ($row_count > 0) {
            echo "<table class='table table-bordered'>";

            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <tr>
                    <th>Enquiry Date</th>
                    <td>
                        <?php echo $row['enquirydate']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Enquiry Number</th>
                    <td>
                        <?php echo $row['enquirynumber']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Enquiry Type</th>
                    <td>
                        <?php echo $row['enquirytype']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Admin Response</th>
                    <td>
                        <?php
                        if ($row['adminresponse'] == "") {
                            echo "No action taken yet";
                        } else {
                            echo $row['adminresponse'];
                        } ?>
                    </td>
                </tr>
                <?php
                $cnt++;
            }
        } else {

        }
        ?>
        </table>

        <div class="text-center">
            <a href="./profile.php?enquiry_history" class="btn btn-info border-0 py-2 px-3">Back</a>
        </div>
    </div>
</div>