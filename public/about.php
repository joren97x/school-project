<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <style>
        .badge{
        padding: 3px 5px 2px;
        position: absolute;
        top: 0px;
        left: 15px;
        display: inline-block;
        min-width: 10px;
        font-size: 12px;
        font-weight: bold;
        color: #ffffff;
        line-height: 1;
        vertical-align: baseline;
        white-space: nowrap;
        text-align: center;
        border-radius: 10px;
    }
    /* .container{
        width: 90%;
        padding:20px;
        margin: 100px auto;
        display: flex;
        flex-direction: row;
        justify-content: center;
    } */
    .box {
        box-shadow: 0 0 20px rgb(0,0,0, .1);
        transition: 1s;
    }

    .box img{
        display: block;
        border-radius: 5px;

    }

    .box:hover{
        transform:scale(1.1);
        z-index: 2;
    }

    </style>
    <div class="row d-flex justify-content-around">
    <nav class="navbar bg-white shadow fixed-top" data-bs-theme="light">
                    <button class="btn btn-white" href="#offcanvasExample" aria-controls="offcanvasExample" data-bs-toggle="offcanvas"><i class="bi bi-list h1 text-dark " ></i></button>
   
                            <div class="col-3" >
                                <a href="index.php" class="mx-2 text-dark" style="text-decoration: none">Home</a>
                                <a href="about.php" class="mx-2 text-dark" style="text-decoration: none">About</a>
                                <a href="login.php" class="mx-2 text-dark" style="text-decoration: none">Login</a>
                                <a href="login.php" class="mx-2 text-dark" style="text-decoration: none">Signup</a>
                            </div>
                  </nav>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel" style="width: 280px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title h2" id="offcanvasExampleLabel">Menu <?php 
                        if(isset($_SESSION['userType'])) { 
                            echo "<label class='text-danger'>".$_SESSION['userType']."</label> ";
                         } 
                         ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body h6" >
                <i class="bi bi-house h3 mx-2"></i><a href="index.php" style="text-decoration: none;color: black;">Home</a><br>
                
                </div>
                                
            </div >

            <div >
                    <div class="col-lg-11 mx-auto " style="margin-top:100px;">
                        <div class="text-white  shadow-sm rounded banner bg-info text-center p-4">
                            <h1 class="display-4">GR System</h1>
                            <p class="lead"> </p>
                        </div>

                        <div class="box" class=" p-3" style="margin-left:5%;">
                            <img src="../images/owners.png" alt="img" style="height: 350px; width:350px; float: left; margin:10px;">

                        </div>

                        <div>
                        <img src="../images/room.png" alt="img" style=" float:right; height:150px; width:55%; margin-top:10px;">
                            <p class="text-left" style=" float:right; width: 55%; font-family: Arial, Helvetica, sans-serif; margin-top:5%;">
                            Hello! We're Guesthouse Reservation System (GRS). 

                            We are a distinct kind of platform for managing small accommodation businesses created specifically for those kinds of establishments. Our system allows for affordable home reservation that provide customers with a quick and efficient way to reserve Guesthouse. Clients have access to the most recent information regarding rooms that are open, a secure payment processing and an intuitive user experience.

                            We've been created this platform to help small businesses, motivated by the notion that technologies created just for small providers of accommodation should be used. With the help of our platform, you can spend more time taking care of your customers and other important business matters.
                            </p>
                        </div>
                    </div>
            </div>

            <div class="p-3" style="position:absolute; margin-top:35%; margin-left:6%;">
                <img src="../images/img.jpg" alt="img" style="height: 380px; width:380px; ">
                <img src="../images/per.jpg" alt="img" style="height: 380px; width:380px; ">
                <img src="../images/pers.jpg" alt="img" style="height: 380px; width:380px; ">
            </div>

            <script src="jquery.js"></script>
            <script src="navbar.js"></script>

</body>
</html>