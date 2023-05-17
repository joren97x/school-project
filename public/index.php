<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
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
  <header style="margin-top: 100px"></header>
  <div class="container-fluid mt-5">
    <div class="row" id="roomDiv" name="roomDiv"></div>
  </div>

  <?php require_once "footer.html" ?>

  <script src="displayRoom.js"></script>
  <script src="jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

