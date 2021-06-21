<?php

    require_once "database/config.php";
   
    // mysqli_select_db($conn,'travelinfo');
    $username = $_POST['uname'];
    $email = $_POST['uemail'];
    $phoneno = $_POST['uphone'];
    $comments = $_POST['ucomment'];

    $sqry = " INSERT INTO userinform (name, email, mobile, comments) VALUES ('$username','$email','$phoneno','$comments')";
    mysqli_query($conn,$sqry);
     header('location:index.php');


?>