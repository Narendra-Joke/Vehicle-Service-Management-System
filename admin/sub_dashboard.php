<?php
    include("../includes/connect.php");
?>
<div class="d-flex align-items-center">
    <h2 class="fs-2 m-0">Dashboard</h2>
</div>

<div class="row g-3 my-2">
    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <?php
                $select_query = "select count(*) from `users`";
                $result = mysqli_query($con, $select_query);
                $rows = mysqli_num_rows($result);
                ?>
                <h3 class="fs-2">
                    <?php echo $rows; ?>
                </h3>
                <p class="fs-5">Total Registered User</p>
            </div>
            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <?php
                $enquiry_query = "select * from tblenquiry";
                $enquiry_result = mysqli_query($con, $enquiry_query);
                $enquiry_rows = mysqli_num_rows($enquiry_result);
                ?>
                <h3 class="fs-2">
                    <?php echo $enquiry_rows; ?>
                </h3>
                <p class="fs-5">Total Enquiry</p>
            </div>
            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
            <?php
                $mechanic_query = "select * from tblmechanics";
                $mechanic_result = mysqli_query($con, $mechanic_query);
                $mechanic_rows = mysqli_num_rows($mechanic_result);
                ?>
                <h3 class="fs-2">
                    <?php echo $mechanic_rows; ?>
                </h3>
                <p class="fs-5">Total Mechanics</p>
            </div>
            <i class="fa-solid fa-gear primary-text border rounded-full secondary-bg p-3"></i>
            <!-- <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">%25</h3>
                <p class="fs-5">Total Service Requests</p>
            </div>
            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">%25</h3>
                <p class="fs-5">New Service Requests</p>
            </div>
            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">%25</h3>
                <p class="fs-5">Rejected Service Requests</p>
            </div>
            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">%25</h3>
                <p class="fs-5">Completed Services</p>
            </div>
            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">%25</h3>
                <p class="fs-5">Total Service Requests</p>
            </div>
            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</div>