<style>
    .badge{
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
</style>
<div class="row d-flex justify-content-around ">
<nav class="navbar bg-white shadow fixed-top " data-bs-theme="light">
            <div class="col-8 ms-4">
                <button class="btn btn-white" href="#offcanvasExample" aria-controls="offcanvasExample" data-bs-toggle="offcanvas"><i class="bi bi-list h1 text-dark"></i></button>
                
            </div>
            <?php
                if(isset($_SESSION['userType'])){
                    ?>
                        <div class="col-2 justify-content-around  d-flex">
                            <div class="dropstart">

                            <a href="#" role="button " data-bs-toggle="dropdown" aria-expanded="false" id="btn-bell" style="float: left" >
                                <i class="bi bi-bell h3" style=" float: left; color: black" ></i>
                                <input type="hidden" id="user_type" value="<?php echo $_SESSION['userType']; ?>">
                                <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" id="user_id">
                                <span class="badge bg-danger" id="num_reservation"></span>
                            </a>
                                <ul class="dropdown-menu shadow" id="notification-dropdown" style="max-height: 600px; ">
                                    <li class="h3 w-100" style="padding-right: 280px; margin-left: 20px">Notifications</li>
                                    <hr>
                                </ul>
                            </div>
                        </div>

                    <?php
                }
                else {
                    ?>

                        <div class="col-3" >
                            <a href="index.php" class="mx-2 text-dark" style="text-decoration: none">Home</a>
                            <a href="about.php" class="mx-2 text-dark" style="text-decoration: none">About</a>
                            <a href="login.php" class="mx-2 text-dark" style="text-decoration: none">Login</a>
                            <a href="login.php" class="mx-2 text-dark" style="text-decoration: none">Signup</a>
                        </div>

                    <?php
                }
            ?>
              </nav>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel" style="width: 280px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title h2" id="offcanvasExampleLabel">Menu <?php 
                    if(isset($_SESSION['userType'])) { 
                        echo "<label class='text-danger'>".$_SESSION['userType']."</label> ";
                     } 
                     ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body h6" >
            <i class="bi bi-house h3 mx-2"></i><a href="index.php" style="text-decoration: none;color: black;">Home</a><br>
            <?php if(isset($_SESSION['userType'])) {if($_SESSION['userType'] == "admin") {?><i class="bi bi-speedometer2 h3 mx-2"></i><a href="dashboard.php" style="text-decoration: none;color: black;">Dashboard</a><br> 
            <i class="bi bi-house-gear h3 mx-2"></i><a href="houseManagement.php" style="text-decoration: none;color: black;">Manage Guest House</a><br>
                <i class="bi bi-house-add h3 mx-2"></i><a href="roomCreation.php" style="text-decoration: none;color: black;">Create Guest House</a><br><?php }} ?>
                <a href="reservation.php" style="text-decoration: none; color: black;"><?php if(isset($_SESSION['userType'])) {if ($_SESSION['userType'] == 'admin') {echo "<i class='bi bi-book h3 mx-2'></i>View All Reservations";} else {echo "<i class='bi bi-book h3 mx-2'></i>My Reservations";}} ?></a><br>
                <!-- BOTTOM DIV -->
                <?php if(isset($_SESSION['userType'])) {
                    ?>
                    <div class="profile-div" style="position: absolute; margin-left: 10px; margin-bottom: 20px; bottom: 0px;">
                    <hr style="padding-left: 230px">
                        <div class="col-2 text-center"> 
                            <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle h4"> </i><?php echo $_SESSION['firstname']; ?></button>
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
                    }?>
            </div>
        </div>
        <script src="jquery.js"></script>
        <script src="navbar.js"></script>