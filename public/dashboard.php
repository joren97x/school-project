<?php
session_start();
// echo $_SESSION['password'];
// echo $_SESSION['username'];
if(isset($_SESSION['userType'])) {
    echo $_SESSION["userType"];
}
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
    <title>Dashboard</title>

</head>

<body>

        <?php require_once "navbar.php"; ?>

        <div class="container mt-5">

            <div class="row">
            <div class="card" style="width: 18rem; box-shadow: none;">
            <img src="../images/someRoom.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title ">Room name 4x4 Room name</h5>
                    <p class="card-text">John Doe</p>
                    <p class="card-text">Buagsong, Cordova, Cebu</p>
                    <p class="card-text">09123456789</p>
                    <p class="card-text">Cordova, Cebu</p>
                    <a href="#" class="btn btn-success">Reserved</a>
                    <a href="#" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            </div>

                <div class="row" id="roomDiv" name="roomDiv">




                </div>

        </div>

   


</body>
<script src="jquery.js"></script>

</html>