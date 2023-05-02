<?php
session_start();

if(isset($_SESSION['username'])){
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
    <title>Document</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <p class="h4 pt-3 pe-xxl-5" id="icon"><i class="fa fa-address-card-o" aria-hidden="true"></i> Login</p>
            </div>

            <!-- Login Form -->
            <div>
                <input type="text" id="email-login" class="fadeIn second" name="email-login" placeholder="Email">
                <input type="password" id="password-login" class="fadeIn third" name="password-login"
                    placeholder="Password">
                <input type="button" class="fadeIn mb-2 fourth" id="btn-login" value="Log In">
                <input type="button" class="fadeIn mb-2 fourth" style="" id="btn-create" data-bs-toggle="modal"
                    data-bs-target="#register-User-Modal" value="Create User">
                <input type="button" class="fadeIn fourth" id="btn-create-admin" data-bs-toggle="modal"
                    data-bs-target="#register-Admin-Modal" value="Create Admin">
            </div>

        </div>
    </div>

    <!-- ADMIN Modal -->
    <div class="modal fade" id="register-Admin-Modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="text" placeholder="First Name" name="firstname_admin" id="firstname_admin">
                    <input type="text" placeholder="Last Name" name="lastname_admin" id="lastname_admin">
                    <input type="text" placeholder="Email" name="email_admin" id="email_admin">
                    <input type="password" placeholder="Password" name="password_admin" id="password_admin">
                    <input type="hidden" id="userType_admin" name="userType_admin" value="admin">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-registerAdmin" name="btn-registerAdmin">Save
                        changes</button>
                </div>
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
                    <input type="text" placeholder="Email" name="email_user" id="email_user">
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