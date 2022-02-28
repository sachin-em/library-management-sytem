<?php
    $database = "lms";
    $username = "root";
    $password = "";
    $servername = "localhost";

    $conn = mysqli_connect($servername, $username, $password);

    if($conn){
        echo "<script> alert('Connected Successfully') </script>";
    }else{
        echo "Failed" . " ".mysqli_connect_error();
    }
?>