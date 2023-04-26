<?php
session_start();
// echo $_SESSION['password'];
// echo $_SESSION['username'];
// echo $_SESSION['userType'];
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Room Selection</title>
    <style>
        /* container styles */

        /* room styles */
        .room {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* room card styles */
        .room-card {
            background-color: white;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            flex-basis: calc(33.33% - 20px);
            margin-bottom: 20px;
            padding: 20px;
        }

        .room-card:hover {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* room image styles */
        .room-img {
            height: 200px;
            margin-bottom: 10px;
            object-fit: cover;
            width: 100%;
        }

        /* room name styles */
        .room-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* room description styles */
        .room-desc {
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* room price styles */
        .room-price {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* room book button styles */
        .room-book {
            background-color: #0077b6;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .room-book:hover {
            background-color: #005f8b;
        }
    </style>
</head>

<body>

        <div class="row d-flex justify-content-around">
            <div class="col-10">
                <button class="btn btn-white" href="#offcanvasExample" aria-controls="offcanvasExample" data-bs-toggle="offcanvas"><i class="bi bi-list h1 text-dark"></i></button>
                
            </div>
            <?php
                if(isset($_SESSION['username'])){
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

        <div class="roomDiv" id="roomDiv" name="roomDiv">

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
                <i class="bi bi-house-gear h3 mx-3"></i><a href="roomReserve.php" style="text-decoration: none;color: black;">Room Reserve</a><br>
                
            </div>
        </div>


</body>
<script src="jquery.js"></script>
<script src="roomSelection.js"></script>

</html>