<?php
function default_service()
{
    global $con;
    $query1 = "select * from tblservicelist where servicetype='Periodic Service'";
    $result1 = mysqli_query($con, $query1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
    ?>
        <div class="row my-3" style="border : 1px solid black">
            <div class="col-2"></div>
            <div class="col-8">
                <h3>
                    <?php echo $row1['servicename']; ?>
                </h3>
                <p class="lead">
                    <?php echo $row1['description']; ?>
                </p>
            </div>
            <div class="col-2">
                <h4 class="pt-3">
                    <?php echo $row1['timetaken']; ?>
                </h4>
                <h4 class="pt-3">Cost :
                    <?php echo $row1['cost']; ?>
                </h4>
            </div>
        </div>
        <?php
    }
}

default_service();
?>

<!-- <div class="row my-3" style="border : 1px solid black">
    <div class="col-2"></div>
    <div class="col-8">
        <h3>Basic Service</h3>
        <p class="lead">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit id, hic unde expedita neque
            necessitatibus tenetur. Cumque, adipisci dicta facere porro nemo earum! Quia similique expedita
            cupiditate ea corporis natus!
        </p>
    </div>
    <div class="col-2">
        <h4 class="pt-3">4 hrs taken</h4>
        <h4 class="pt-3">Cost : 2500/-</h4>
    </div>
</div> -->