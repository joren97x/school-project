<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Reservations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Questrial&display=swap" rel="stylesheet">
    <style>
         body {
            font-family: 'Questrial', sans-serif;
        }
    a {
        text-decoration: none;
        color: black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        margin-top: 20px;
    }

    th, td {
        padding: 15px;
    }

    tr:hover {
        background-color: #e2e2e2;
    }
    
    #status_span{
        background:red;
        border-radius: 12px;
        height: 26px;
        line-height: 26px;
        text-align: center;
        padding: 2px;
    }

    #btn-cancel{
        border-radius: 12px;
        margin-left: 8px;
    }

    #btn-approve{
        border-radius: 12px;
    }

    #btn-delete{
        margin-left: 8px;
        border-radius: 12px;
    }
    
    .container-fluid {
        padding-left: 40px;
        padding-right: 40px;
    }
    body {
            font-family: 'Questrial', sans-serif;
        }
    </style>
</head>

<body class="bg-light">
    <?php require_once "navbar.php"; ?>

    <input type="hidden" value="<?php echo $_SESSION['userType'] ?>" id="userType">
    <input type="hidden" value="<?php echo $_SESSION['userId'] ?>" id="user_id">

    <div class="container-fluid" style="margin-top: 100px">
        <header class="fs-1 text-center">ALL RESERVATIONS</header>

        <table class="table table-striped table-hover table-bordered mt-4">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Guest House</th>
                    <th scope="col">Guest Name</th>
                    <th scope="col">Guest Address</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Payment Process</th>
                    <th scope="col">Guest House Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tbl"></tbody>
        </table>
    </div>

    <?php require "footer.html"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <script src="reservation.js"></script>
</body>

</html>
