<div class="container-fluid p-0">
    <!-- Start navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info fw-bold">
        <div class="container-fluid">
            <img src="./images/logo.jpg" alt="" class="logo">
            <!-- <h1 class="display-4 fw-bolder text-white">VSMS</h1> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="# ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contact</a>
                    </li>

                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                                </li>";
                    } else {
                        echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='./user/registration.php'>Register</a>
                                </li>";
                    }
                    ?>
                </ul>

            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "
                        <li class='nav-item'>
                            <a href='#' class='nav-link'>Welcome Guest</a>
                        </li>";
            } else {
                echo "
                        <li class='nav-item'>
                            <a href='#' class='nav-link'>Welcome " . $_SESSION['username'] . "</a>
                        </li>";
            }

            if (!isset($_SESSION['username'])) {
                echo "
                        <li class='nav-item'>
                            <a href='./user/login.php' class='nav-link'>Login</a>
                        </li>";
            } else {
                echo "
                        <li class='nav-item'>
                            <a href='./user/logout.php' class='nav-link'>Logout</a>
                        </li>";
            }
            ?>
        </ul>
    </nav>
</div>