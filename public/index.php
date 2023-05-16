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
    a {
      text-decoration: none;
      color: black;
    }

    .container-fluid {
      padding-left: 50px;
      padding-right: 50px
    }

    .card:hover {
      cursor: pointer;
    }

    .card:hover {
      transform: scale(1.05);
      border-color: #ffc107;
    }
    
    .card-img-overlay {
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .card:hover .card-img-overlay {
      opacity: 1;
    }
  </style>
</head>

<body>
  <?php require_once "navbar.php"; ?>
  <div class="container-fluid " style="margin-top: 130px;">
    

    <div class="row" id="roomDiv" name="roomDiv">

    </div>

  </div>

  <?php require_once "footer.html" ?>


</body>
<script src="displayRoom.js"></script>
<script src="jquery.js"></script>

</html>