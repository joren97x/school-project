<?php
session_start();
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
    <title>Home</title>
    <style>
        .col-2{
            border-radius: 25px;
            margin: 10px;
            width: 265px;
        }
    </style>

</head>

<body class="bg-light">

        <?php require_once "navbar.php"; ?>

        <div class="container mt-5 ">
            <h1>Dashboard</h1>

            <div class="row ">
                <div class="col-2  border shadow">
                    <div class="row">
                        <div class="col m-3">
                            0
                            <br>
                            Guest Houses
                        </div>
                        <div class="col my-4 ">
                            <i class="bi bi-house fs-1" style="mix-blend-mode: darken"></i>
                        </div>
                    </div>
                </div>
                <div class="col-2 border shadow">
                    Reservations
                </div>
                <div class="col-2 border shadow">
                    Users
                </div>
                <div class="col-2 border shadow">
                    Guest Houses
                </div>
            </div>

            <div class="row ">
                <div class="col-2  border shadow">
                    <div class="row">
                        <div class="col m-3">
                            0
                            <br>
                            Guest Houses
                        </div>
                        <div class="col my-4 ">
                            <i class="bi bi-house fs-1" style="mix-blend-mode: darken"></i>
                        </div>
                    </div>
                </div>
                <div class="col-2 border shadow">
                    Guest Houses
                </div>
                
            </div>

        </div>

        <?php require_once "footer.html" ?>


</body>
<script src="jquery.js"></script>

</html>