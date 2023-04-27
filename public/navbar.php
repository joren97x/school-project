<div class="row d-flex justify-content-around">
            <div class="col-10">
                <button class="btn btn-white" href="#offcanvasExample" aria-controls="offcanvasExample" data-bs-toggle="offcanvas"><i class="bi bi-list h1 text-dark"></i></button>
                
            </div>
            <?php
                if(isset($_SESSION['userType'])){
                    ?>
                        <div class="col-2 text-center">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></button>
                            <div class="dropdown">
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Edit Account</a></li>
                                    <li><a class="dropdown-item" href="#">Delete Account</a></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    <?php
                }
                else {
                    ?>
                        <div class="col-2 text-center">
                            <a href="login.php"><button class="btn btn-success">Login</button></a>
                        </div>
                    <?php
                }
            ?>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel" style="width: 280px">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title h2" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>

            <div class="offcanvas-body h5 ">
                
                <i class="bi bi-houses h3 mx-3"></i><a href="roomSelection.php" style="text-decoration: none; color: black;">Guest Rooms</a><br>
                <i class="bi bi-house-add h3 mx-3"></i><a href="roomCreation.php" style="text-decoration: none;color: black;">Create Rooms</a><br>
                <i class="bi bi-house-gear h3 mx-3"></i><a href="bookings.php" style="text-decoration: none;color: black;">My bookings</a><br>
                
            </div>
        </div>