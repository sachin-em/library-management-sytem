<?php
    $database = "lms";
    $username = "root";
    $password = "";
    $servername = "localhost";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        
        echo "Failed" . " ".mysqli_connect_error();
    }
    //echo "<script> alert('Connected Successfully') </script>";
        
    
?>