<?php
include 'connection.php';
session_start();
$user_id = $_SESSION["id"];
$bid = $_GET["bid"];
$date = date("Y-m-d");
$return_date = date('Y-m-d', strtotime($date . ' + 14 days'));
$sql = "INSERT INTO issuedbooks VALUES($bid, $user_id, '$date', '$return_date',0 ,0)";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: mybooks.php"); /* Redirect browser */
    exit();
}else{
    echo "Something went wrong ". mysqli_error($conn);
}
