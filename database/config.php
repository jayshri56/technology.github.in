<?php
define("HOST" ,"localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB","infotech");
$conn = mysqli_connect(HOST,USER,PASSWORD,DB) or die("failed to connect db");

    // if($conn)
    // {
    //     echo " done";
    // }else{
    //     echo "rejected";
    // }


?>