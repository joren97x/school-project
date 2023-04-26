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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
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
            <input type="text" id="usernameLogin" class="fadeIn second" name="usernameLogin" placeholder="Username">
            <input type="password" id="passwordLogin" class="fadeIn third" name="passwordLogin" placeholder="Password">
            <input type="button" class="fadeIn fourth" id="btn-login" value="Log In">
            <input type="button" class="fadeIn fourth" id="btn-create" data-bs-toggle="modal" data-bs-target="#registerModal" value="Create User">
            <input type="button" class="fadeIn fourth" id="btn-create-admin" data-bs-toggle="modal" data-bs-target="#registerAdminModal" value="Create Admin">
          </div>
      
          <!-- Remind Passowrd -->
      
        </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="registerAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Register Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" placeholder="username" name="username_admin" id="username_admin">
        <input type="password" placeholder="password" name="password_admin" id="password_admin">
        <input type="text" placeholder="Email" name="email_admin" id="email_admin">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-registerAdmin" name="btn-registerAdmin">Save changes</button>
      </div>
    </div>
  </div>
</div>

      <!-- USER MODAL -->
      <div class="modal modal-xl  fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-body">

                    <!-- copy paste gikan sa original -->
                    <div class="container">
                        <div id="accordion">
                          <div class="row">
                                  <div class="col-lg-12">
                                      <div class="text-center pt-5">
                                      </div>
                                  </div>
                            </div>
                      
                            <div class="card card-default shadow-lg mb-5 bg-body rounded">
                              <div class="card-header">
                                  <h4 class="card-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                          <i class="glyphicon glyphicon-search text-gold"></i>
                                         
                                      </a>
                                      <b class="text-light">CUSTOMER REGISTRATION</b>
                                  </h4>
                              </div>
                              <div id="collapse1" class="collapse show pb-4">
                                  <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-3 col-lg-4">
                                              <div class="form-group">
                                                  <label class="control-label">Username</label>
                                                  <input type="text" id="username" class="form-control" />
                                              </div>
                                          </div>
                                          <div class="col-md-1 col-lg-4">
                                              <div class="form-group">
                                                  <label class="control-label">Password</label>
                                                  <input type="password" id="password" class="form-control" />
                                              </div>
                                          </div>
                                    </div>
                                      <div class="row">
                                          <div class="col-md-3 col-lg-4">
                                              <div class="form-group">
                                                  <label class="control-label">Last Name</label>
                                                  <input type="text" id="lastname" class="form-control" />
                                              </div>
                                          </div>
                                          <div class="col-md-1 col-lg-4">
                                              <div class="form-group">
                                                  <label class="control-label">First Name</label>
                                                  <input type="text" id="firstname" class="form-control" />
                                              </div>
                                          </div>
                                          <div class="col-md-1 col-lg-2">
                                              <div class="form-group">
                                                  <label class="control-label">Middle Name</label>
                                                  <input class="form-control" id="midname" type="text" />
                                              </div>
                                          </div>
                      
                                          <div class="col-md-2 col-lg-2">
                                              <div class="form-group">
                                                  <label class="control-label">Date Of Birth</label>
                                                  <div class="input-group date">
                                                    <input class="form-control" id="birthdate" type="date"/>
                                                    </span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                      
                                      <div class="row">
                                          <div class="col-md-4 col-lg-4">
                                              <div class="form-group">
                                                  <label class="control-label">Mailing Address</label>
                                                  <input type="email" id="mailadd" class="form-control"/>
                                              </div>
                                          </div>
                                          <div class="col-md-1 col-lg-2">
                                            <div class="form-group">
                                              <label class="control-label">Region</label>
                                              <input type="text" id="region" class="form-control"/>
                                            </div>
                                          </div>
                                          <div class="col-md-1 col-lg-3">
                                              <div class="form-group">
                                                  <label class="control-label">City</label>
                                                  <input type="text" id="city" class="form-control"/>
                                              </div>
                                          </div>
                                          <div class="col-md-3 col-lg-3">
                                            <div class="form-group">
                                              <label class="control-label">Municipality</label>
                                              <input type="text" id="municipality" class="form-control"/>
                                            </div>
                                          </div>
                                          <div class="col-md-3 col-lg-2">
                                              <div class="form-group">
                                                  <label class="control-label">Zip Code</label>
                                                  <input type="text" id="zipcode" inputmode="numeric" min="4" max="10" class="form-control"/>
                                              </div>
                                          </div>
                                          <div class="col-md-3 col-lg-2">
                                              <div class="form-group">
                                                  <label class="control-label">Street Name</label>
                                                  <input type="text" id="streetname" class="form-control"/>
                                              </div>
                                          </div>
                                          <div class="col-md-3 col-lg-2">
                                              <div class="form-group">
                                                  <label class="control-label">Contact Number</label>
                                                  <input type="tel" id="contact" class="form-control"/>
                                              </div>
                                          </div>
                                          <div class="col-md-3 col-lg-2">
                                              <div class="form-group">
                                                  <label class="control-label">Father's Name</label>
                                                  <input type="text" id="fathername" class="form-control"/>
                                              </div>
                                          </div>
                                          <div class="col-md-3 col-lg-2">
                                              <div class="form-group">
                                                  <label class="control-label">Mother's Name</label>
                                                  <input type="text" id="mothername" class="form-control"/>
                                              </div>
                                          </div>
                                          <div class="col-sm-1 col-sm-1">
                                              <div class="form-group">
                                                  <label class="control-label">Gender</label>
                                                  <select name="gender" id="gender" class="form-control">
                                                      <option value="0">Sex..</option>
                                                      <option value="female">Female</option>
                                                      <option value="male">Male</option>
                                                      <option value="other">Other</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-1 col-lg-1">
                                              <div class="form-group">
                                                  <label class="control-label">Age</label>
                                                  <input type="text" inputmode="numeric" id="age" class="form-control"/>
                                              </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  
                      <div class="container">
                        <div class="form-group">

                            <div class="row justify-content-center">
                                <div class="col-2 text-center" >
                                    <input type="button" class="btn btn-outline-secondary text-dark px-5 shadow-lg mb-1 bg-body rounded" data-bs-dismiss="modal"  value="Cancel">
                                </div>
                                <div class="col-2 text-center ">
                                    <input type="button" class="btn btn-outline-secondary text-dark px-5 shadow-lg mb-1 bg-body rounded" id="btn-submit" value="Submit">
                                </div>
                            </div>
                          
                          <div class="text-center">
                              <a href="./public/idcard.html" class="text-decoration-underline" id="request">Requests</a>
                          </div>
                        </div>
                      </div>

                </div>
                
            </div>
            </div>
        </div>

</body>
<script src="jquery.js"></script>
<script src="login.js"></script>
</html>