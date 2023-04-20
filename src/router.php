<?php 
    session_start();
    require './backend.php';

    if (isset($_POST["choice"])) {
        switch ($_POST["choice"]) {
            case 'register':
                $back = new backend();
                echo $back->register($_POST["lastname"], $_POST["firstname"], $_POST["midname"], $_POST["birthdate"], $_POST["mailadd"], $_POST["region"], $_POST["city"], $_POST["municipality"], $_POST["zipcode"], $_POST["streetname"], $_POST["contact"], $_POST["fathername"], $_POST["mothername"], $_POST["gender"], $_POST["age"]);
                break;
            case 'registeradmin':
                $back = new backend();
                echo $back->registeradmin($_POST["username"], $_POST["password"], $_POST["email"]);
                break;
            case 'login':
                $back = new backend();
                echo $back->login($_POST["username"], $_POST["password"]);
                break;
            case 'login-user':
                $back = new backend();
                echo $back->loginUser($_POST["firstName"], $_POST["lastName"]);
                break;
            case 'view':
                $back = new backend();
                echo $back->viewApplicants();
                break;
            case 'changepassword':
                $back = new backend();
                echo $back->changepassword($_POST["newpassword"]);
                break;
            case 'removeapplicant':
                $back = new backend();
                echo $back->deleteApplicant($_POST["id"]);
                break;
            case 'displayCard':
                $back = new backend();
                echo $back->displayCard($_POST["contact"], $_POST["email"]);
                break;
            default:
                # code...
                break;
        }
    }


?>