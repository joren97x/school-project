<style>
     body {
            font-family: 'Questrial', sans-serif;
        }
    .badge {
        padding: 3px 5px 2px;
        position: absolute;
        top: 0px;
        left: 15px;
        display: inline-block;
        min-width: 10px;
        font-size: 12px;
        font-weight: bold;
        color: #ffffff;
        line-height: 1;
        vertical-align: baseline;
        white-space: nowrap;
        text-align: center;
        border-radius: 10px;
    }

    .offcanvas .offcanvas-body a {
        color: black;
    }

    .dropdown-menu a {
        color: black;
    }

    .offcanvas .offcanvas-body .rounded:hover {
        background-color: whitesmoke;
        color: blue;
    }
    .dropdown-menu a:hover {
        color: blue;
        background-color: whitesmoke;
    }
    .stuff .col-2:hover{
        background-color: whitesmoke;
        border: 1px solid black
    }
</style>
<div class="container">
    <div class="row d-flex justify-content-between align-items-center header">
        <nav class="navbar bg-white shadow fixed-top" data-bs-theme="light">
            <div class="col-lg-7 col-md-6 col-4">
                <button class="btn btn-white" href="#offcanvasExample" aria-controls="offcanvasExample"
                    data-bs-toggle="offcanvas">
                    <i class="bi bi-list h1 text-dark"></i>
                </button>
            </div>
            <?php
            if (isset($_SESSION['userType'])) {
                ?>
                <div class="col-lg-2 col-md-3 d-flex justify-content-end" style="margin-right: 40px">
                    <div class="dropstart">
                        <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="btn-bell"
                            style="float: left">
                            <i class="bi bi-bell h3" style="float: left; color: black"></i>
                            <input type="hidden" id="user_type" value="<?php echo $_SESSION['userType']; ?>">
                            <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" id="user_id">
                            <span class="badge bg-danger" id="num_reservation"></span>
                        </a>
                        <ul class="dropdown-menu shadow" id="notification-dropdown"
                            style="max-height: 600px;">
                            <li class="h3 w-100" style="padding-right: 280px; margin-left: 20px">Notifications</li>
                            <hr>
                        </ul>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="col-lg-4 col-md-3 text-start stuff">
                    <div class="row">
                    <div class="col-2 "><a href="index.php" class="mx-2 text-dark " style="text-decoration: none">Home</a></div>
                    <div class="col-2"><a href="about.php" class="mx-2 text-dark" style="text-decoration: none">About</a></div>
                    <div class="col-2 "><a href="login.php" class="mx-2 text-dark" style="text-decoration: none">Login</a></div>
                    <div class="col-2"><a href="login.php" class="mx-2 text-dark" style="text-decoration: none">Signup</a></div>
                    </div>
                </div>
                <?php
            }
            ?>
        </nav>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel" style="width: 280px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title h2" id="offcanvasExampleLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h6">
            <a href="index.php" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                    <div class="col-1 mb-1 h4"><i class="bi bi-house"></i></div>
                    <div class="col-10 ms-2 h6 mt-1">Home</div>
                </div>
            </a>

            <?php if (isset($_SESSION['userType'])) {
            if ($_SESSION['userType'] == "admin") { ?>
                <a href="dashboard.php" style="text-decoration: none;">
                    <div class="row mx-1 rounded">
                        <div class="col-1 mb-1 h4"><i class="bi bi-speedometer2"></i></div>
                        <div class="col-10 ms-2 h6 mt-1">Dashboard</div>
                    </div>
                </a>
                <a href="houseManagement.php" style="text-decoration: none;">
                    <div class="row mx-1 rounded">
                        <div class="col-1 mb-1 h4"><i class="bi bi-house-gear"></i></div>
                        <div class="col-10 ms-2 h6 mt-1">Manage Houses</div>
                    </div>
                </a>
                <a href="roomCreation.php" style="text-decoration: none;">
                    <div class="row mx-1 rounded">
                        <div class="col-1 mb-1 h4"><i class="bi bi-house-add"></i></div>
                        <div class="col-10 ms-2 h6 mt-1">Create House</div>
                    </div>
                </a>
                
            <?php } ?>
            <a href="reservation.php" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                        <div class="col-1 h4 mb-1"><i class='bi bi-book'></i></div>
                        <div class="col-10 ms-2 h6 mt-1">View Reservations</div>
                </div>
            </a>
            <?php
        } ?>
            
            <a href="about.php" style="text-decoration: none;">
                <div class="row mx-1 rounded">
                        <div class="col-1 h4 mb-1"><i class="bi bi-info-circle"></i></div>
                        <div class="col-10 ms-2 h6 mt-1">About Us</div>
                </div>
            </a>
            <!-- BOTTOM DIV -->
            <?php if (isset($_SESSION['userType'])) {
            ?>
                <div class="profile-div"
                    style="position: absolute; margin-left: 20px; margin-bottom: 20px; bottom: 0px;">
                    <hr style="padding-left: 230px">
                    <div class="col-2 text-center">
                        <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle h4"></i><label class="ms-2"><?php echo $_SESSION['firstname']; ?></label>
                        </button>
                        <div class="dropdown">
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Edit Account</a></li>
                                <li><a class="dropdown-item" href="#">Delete Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>

<script src="jquery.js"></script>
<script src="navbar.js"></script>