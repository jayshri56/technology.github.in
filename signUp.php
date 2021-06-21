<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;1,400&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/login.css"> 
   <link rel="stylesheet" href="css/footer.css"> 
    <title>SignIn</title>
</head>

<body>
    <?php include'menu.php';?>
    <?php
    require_once "database/config.php";
      if(isset($_POST['submit'])){
          $username =mysqli_real_escape_string($conn, $_POST['uemail']);
          $password = mysqli_real_escape_string($conn,$_POST['upwd']);
          $cpassword = mysqli_real_escape_string($conn,$_POST['ucpwd']);
          $gender =mysqli_real_escape_string($conn, $_POST['ugender']);
          $city = mysqli_real_escape_string($conn,$_POST['ucity']);
          $state =mysqli_real_escape_string($conn, $_POST['sstate']);
            
          $pass = password_hash($password,PASSWORD_BCRYPT);
          $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

          $emailqry = " SELECT * FROM users WHERE email= '$username' ";
          $sqry = mysqli_query($conn,$emailqry);
          $emailcont = mysqli_num_rows($sqry);
          if($emailcont>0){ ?>
              <script>
            alert ("Email already exits");

              </script>
              <?php 
          }else
          {
              if($password === $cpassword)
              {
                 $isql = "INSERT INTO users ( email, passwords, cpassword, genders, citys, states)
                 VALUES ('$username','$pass','$cpass','$gender','$city','$state')";
                 $sql = mysqli_query($conn,$isql);
                 if($sql){ ?>
                 <script>
                        alert("Register Successfully");
                 </script>
                    
                    <?php
                    }else{ ?>
                    <script>
                          alert("Not Register");

                    </script>
                            <?php
                        }
                }else{ ?>
                <script>
                  
                    alert("password not match");
                </script>
                  <?php
              }
          }

      }
    
    
    ?>
    



    <div class="container-fluid bg ">
    <section class="row justify-content-center">
        <div>
                <h2 class="text-white">Registration:</h1>
        </div>

            <div class="col-sm-6 col-md-3 col-12">
            <div class="login_form">
            <form action=" <?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                <div class="form-group ">
                            <label class="control-label col-sm-2" for="uemail" >Username:</label>
                            <div class="col-12">
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="uemail" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-2" for="upwd">Password:</label>
                            <div class="col-12">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="upwd" pattern=[a-zA-Z0-9@#$%^&\]+ {6-8} required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-2" for="ucpwd">Confirm_Password:</label>
                            <div class="col-12">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter  password"
                                    name="ucpwd" pattern=[a-zA-Z0-9@#$%^&\]+ {6-8} required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-2" for="gender">Gender:</label>
                            <div class="col-12">
                                <label class="radio-inline">
                                    <input type="radio" name="ugender" checked>Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ugender">Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="city">City:</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id=city placeholder=" " name="ucity">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="inputState" class="control-label col-12">State:</label>
                            <select id="inputState" class="control-label col-12" name="sstate">
                                <option selected>
                                    <--Select-->
                                </option>
                                <option>Maharashtra</option>
                                <option>Gujrat</option>
                                <option>Madhapradesh</option>
                                <option>Keral</option>
                            </select>
                        </div>
                        <!-- <div class="form-group col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class=form-check-label" for="gridCheck">Check me out</label>

                            </div>
                        </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="submit">Register</button>
                        </div>
                        <p class="text-center">Have a account?<a href="login.php">Log In</a></p>
                
                </form>
            </div>
            </div>
            </section>

    </div>

    <div class="subnavigation-container">
        <div class="container">
            <nav class="navbar p-a-0">
                <ul class="nav navbar-nav col-subnav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signUp.php">Features</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">ContactUS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">AboutUs</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="m-t-3"></div>

    <footer class="mainfooter" role="contentinfo">
        <div class="footer-top p-y-2">
            <div class="container-fluid">

            </div>
        </div>
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Address</h4>
                            <address>
                                <ul class="list-unstyled">
                                    <li>
                                        City Hall<br>
                                        212 Street<br>
                                        Mumbai<br>
                                        735<br>
                                    </li>
                                    <li>
                                        Phone: 0253-25111626
                                    </li>
                                </ul>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Popular Services</h4>
                            <ul class="list-unstyled">
                                <li><a href="#"></a></li>
                                <li><a href="#">Payment Center</a></li>
                                <li><a href="#">Contact Directory</a></li>
                                <li><a href="#">Forms</a></li>
                                <li><a href="#">News and Updates</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Website Information</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Website Tutorial</a></li>
                                <li><a href="#">Accessibility</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Webmaster</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Popular Departments</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Parks and Recreation</a></li>
                                <li><a href="#">Public Works</a></li>
                                <li><a href="#">Police Department</a></li>
                                <li><a href="#">Fire</a></li>
                                <li><a href="#">Mayor and City Council</a></li>
                                <li>
                                    <a href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Footer Bottom-->
                        <p class="text-center">&copy; Copyright 2020 - WWW.WebInfotech@gmail.com All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>