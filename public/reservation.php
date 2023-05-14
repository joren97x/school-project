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
    <title>Dashboard</title>
    <style>

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
        padding: 2px
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

    </style>

</head>

<body class="bg-light">

        <?php require_once "navbar.php"; ?>

        <input type="hidden" value="<?php echo $_SESSION['userType'] ?>" id="userType">
        <input type="hidden" value="<?php echo $_SESSION['userId'] ?>" id="user_id">
        
        <div class="container " style="margin-top: 100px">

            <header class="fs-1 text-center">ALL RESERVATIONS</header>
                
            
            <!-- <div class="row" id="roomDiv" name="roomDiv">

            </div> -->
                <table class="table text-center">
                    <thead class="table-primary">
                        <tr >
                            <th scope="col" >#</th>
                            <th scope="col">Guest House</th>
                            <th scope="col">Guest Name</th>
                            <th scope="col">Guest Address</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Payment Process</th>
                            <th scope="col">Guest House Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl">
                        
                    </tbody>
                    
                </table>

        </div>

   <?php require "footer.html"; ?>


</body>
<script src="jquery.js"></script>
<script src="reservation.js"></script>

</html>