<?php
include 'connection.php';
session_start();
$user_id = $_SESSION["id"];
$bid = $_GET["bid"];
$sql = "DELETE FROM issuedbooks WHERE book_id=$bid AND user_id=$user_id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: mybooks.php"); /* Redirect browser */
    exit();
}else{
    echo "Something went wrong ". mysqli_error($conn);
}
