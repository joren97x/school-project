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

</head>

<body class="bg-light">

        <?php require_once "navbar.php"; ?>

        <div class="container " id="app" style="margin-top: 130px">
        <div class="row">
      <div class="col-lg-12 mx-auto ">
        <div class="text-white  shadow-sm rounded banner bg-info text-center">
          <h1 class="display-4">Guest House ReserASDASvation System</h1>
          <p class="lead"> e </p>
        </div>
      </div>
    </div>

            <div class="row" id="roomDiv" name="roomDiv">
                          
            </div>

        </div>

        <?php require_once "footer.html" ?>


</body>
<script src="displayRoom.js"></script>
<script src="jquery.js"></script>

</html>