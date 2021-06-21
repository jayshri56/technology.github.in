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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!-- <link rel="stylesheet" typ href="css/sign.css">  -->
     <!-- <link rel="stylesheet" type="text/css"  href="css/sign.css"> -->
     <link rel="stylesheet" type="text/css"  href="css/login.css">
     <link rel="stylesheet" type="text/css"  href="css/footer.css">
    <title>login</title>
</head>
<body>
   <?php include'menu.php';?>
   <?php
       require_once "database/config.php";
       if(isset($_POST['submit'])){
        $username =mysqli_real_escape_string($conn, $_POST['uemail']);
        $password = mysqli_real_escape_string($conn,$_POST['upwd']);
        $emailserch =" SELECT * FROM users WHERE email= '$username' ";
        $sql = mysqli_query($conn,$emailserch); 
        $email_cont = mysqli_num_rows($sql);
        if($email_cont)
        {
            $emailpass = mysqli_fetch_assoc($sql);

            $dpass =$emailpass['passwords'];
            $_SESSION['email']= $emailpass['email'];

            $passdecode = password_verify($password,$dpass);
            if( $passdecode)
            { ?>
            <script>
            alert("login Successfully");
            </script>
                
                <?php
                header('location:services.php');
            }
            else{ ?>
            <script>
            alert("password Incorrect");
            </script>
                
          <?php  }
        }else{ ?>
        <script>
        alert(" Invalid email");
        </script>
       <?php }
    }
    
    ?>
    <div class="container-fluid bg">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-3 col-12 ">
                <div class="login_form">
                     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?> " method="post"" class="form-container">
               <div class="form-group ">
                    <label for="uemail" >Username:</label>
                    <input type="email" class="form-control" id="email" name="uemail" required aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="upwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="upwd" pattern=[a-zA-Z0-9@#$%^&\]+ {6-8} required placeholder="Password">
                </div>
               
                <button type="submit" class="btn btn-success" name="submit">Login</button>
                <p class="text-center"> Dont have an account?<a href=" signUp.php">SignUp Here</a></p>
            </form>
                </div>

            </div>
        </div>
     </div>
     <div class="mt-auto"></div>

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
    
