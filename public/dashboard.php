<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Questrial&display=swap" rel="stylesheet">
        <title>Dashboard</title>
    <style>
         body {
            font-family: 'Questrial', sans-serif;
        }
        .col-lg-3 {
            border-radius: 25px;
            width: 265px;
            transition: transform 0.5s ease;
        }

        .col-lg-3:hover {
            transform: translateY(-15px);
        }

        a {
            text-decoration: none;
            color: black;
        }

        .card-box {
            position: relative;
            color: #fff;
            padding: 20px 10px 40px;
            margin: 20px 0px;
            border-radius: 15px
        }

        .card-box:hover {
            text-decoration: none;
            color: #f1f1f1;
        }

        .card-box:hover .icon i {
            font-size: 100px;
            transition: 1s;
            -webkit-transition: 1s;
        }

        .card-box .inner {
            padding: 5px 10px 0 10px;
        }

        .card-box h3 {
            font-size: 27px;
            font-weight: bold;
            margin: 0 0 8px 0;
            white-space: nowrap;
            padding: 0;
            text-align: left;
        }

        .card-box p {
            font-size: 15px;
        }

        .card-box .icon {
            position: absolute;
            top: auto;
            bottom: 5px;
            right: 5px;
            z-index: 0;
            font-size: 72px;
            color: rgba(0, 0, 0, 0.15);
        }

        .card-box .card-box-footer {
            position: absolute;
            left: 0px;
            bottom: 0px;
            text-align: center;
            padding: 3px 0;
            color: rgba(255, 255, 255, 0.8);
            background: rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            width: 100%;
            text-decoration: none;
        }

        .card-box:hover .card-box-footer {
            background: rgba(0, 0, 0, 0.3);
        }

        .bg-blue {
            background-color: #00c0ef !important;
        }

        .bg-green {
            background-color: #00a65a !important;
        }

        .bg-orange {
            background-color: #f39c12 !important;
        }

        .bg-red {
            background-color: #d9534f !important;
        }
    </style>

</head>

<body class="bg-light">

    <?php require_once "navbar.php"; ?>

    <div class="container " style="margin-top: 120px">
        <h1>Dashboard</h1>

        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-sm-6">
                    <div class="card-box bg-blue">
                        <div class="inner">
                            <h3> 13436 </h3>
                            <p> Guest Houses </p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-houses-fill" aria-hidden="true"></i>
                        </div>
                        <a href="#" class="card-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card-box bg-green">
                        <div class="inner">
                            <h3> ₱185358 </h3>
                            <p> Earnings </p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-currency-dollar" aria-hidden="true"></i>
                        </div>
                        <a href="#" class="card-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-box bg-orange">
                        <div class="inner">
                            <h3> 5464 </h3>
                            <p> Users </p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <a href="#" class="card-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-box bg-red">
                        <div class="inner">
                            <h3> 723 </h3>
                            <p> Cancelled Reservations </p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bookmark-x-fill"></i>
                        </div>
                        <a href="#" class="card-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-primary" style="--bs-bg-opacity: .5;">
                    <div class="inner">
                        <h3> 5464 </h3>
                        <p> All Reservations </p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-bookmarks-fill"></i>
                    </div>
                    <a href="#" class="card-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-secondary">
                    <div class="inner">
                        <h3> 5464 </h3>
                        <p> Pending Reservations </p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-bookmark-star-fill"></i>
                    </div>
                    <a href="#" class="card-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php require_once "footer.html" ?>


</body>
<script src="jquery.js"></script>

</html>