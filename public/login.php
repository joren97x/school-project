<?php
session_start();

if(isset($_SESSION['userType'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Questrial&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
         body {
            font-family: 'Questrial', sans-serif;
        }
         a:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first ">
                <p class="h4 pt-3 " id="icon"><i class="fa fa-address-card-o" aria-hidden="true"></i> Login</p>
            </div>

            <!-- Login Form -->
            <div>
                <input type="text" id="email-login" class="fadeIn second" name="email-login" placeholder="Email">
                <input type="password" id="password-login" class="fadeIn third" name="password-login"
                    placeholder="Password">
                <input type="button" class="fadeIn mb-2 fourth" id="btn-login" value="Log In">
                <input type="button" class="fadeIn mb-4 fourth" style="" id="btn-create" data-bs-toggle="modal"
                    data-bs-target="#register-User-Modal" value="Create User">
            </div>

        </div>
    </div>


    <!-- USER MODAL -->
    <div class="modal fade" id="register-User-Modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="text" placeholder="First Name " name="firstname_user" id="firstname_user">
                    <input type="text" placeholder="Last Name" name="lastname_user" id="lastname_user">
                    <input type="email" placeholder="Email" name="email_user" id="email_user">
                    <input type="password" placeholder="Password" name="password_user" id="password_user">
                    <input type="hidden" id="userType_user" name="userType_user" value="user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-registerUser" name="btn-registerUser">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="jquery.js"></script>
<script src="login.js"></script>

</html>