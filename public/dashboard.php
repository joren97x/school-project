<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-light p-4">
            <h5 class="text-dark h4">Guest House Reservation System</h5>
            <span class="text-muted">
                <a role="button" class="text-decoration-none me-3 text-dark" id="logout">Logout</a>
                <a role="button" class="text-decoration-none text-dark" id="changepass">Change Password</a>
            </span>
            <div id="inputpass">
                <div class="input-group pt-3">
                    <input type="password" class="form-control-sm" id="newpass" placeholder="New Password" aria-label="New Password" aria-describedby="addon-wrapping">
                    <button class="rounded-end" id="btn-changepass"><abbr title="Submit"><i class="fa-solid fa-share-from-square"></i></abbr></button>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                </div>
            </div>
        </div>
      </div>
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" id="navburger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="roomSelection.php">Guest Rooms</a>
          <a href="roomCreation.php">Create Rooms</a>
        </div>
    </nav>

    <div class="container">
        <div class="row" id="profilecard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center pt-2 mb-0">
                        <h3>GUEST HOUSE REGISTRATION SYSTEM</h3>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
<script src="jquery.js"></script>
<script src="dashboard.js"></script>
</html>