<?php
include 'connection.php';
session_start();
$user_id = $_SESSION["id"];
$bid = $_GET["bid"];
$fine = $_GET['fine'];

?>

<html>
<head>
    <link rel="stylesheet" src="style.css">
</head>
<form action="" method="post">
    <input name="paid" style="background-color: #222; border-radius: 4px; border-style: none; box-sizing: border-box; color: #fff; cursor: pointer; display: inline-block; font-family: 'Farfetch Basis','Helvetica Neue',Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.5; margin:auto; max-width: none; min-height: 44px; min-width: 10px; outline: none; overflow: hidden; padding: 9px 20px 8px; position: relative; text-align: center; text-transform: none; user-select: none; -webkit-user-select: none; touch-action: manipulation; width: 40%;" type="submit" value="Pay Rs. <?= $fine ?>">
</form>
</html>

<?php
if (isset($_POST['paid']))
{
    $sql = "SELECT * FROM issuedbooks WHERE book_id=$bid AND user_id=$user_id";
    $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result);
    $result = mysqli_fetch_row($result);
    $result = $result[3];
    $return_date = date('Y-m-d', strtotime($result . ' + 14 days'));
    
    //echo $return_date;
$sql = "UPDATE issuedbooks SET return_date = '$return_date' WHERE book_id = $bid AND user_id = $user_id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: mybooks.php"); /* Redirect browser */
    exit();
}else{
    echo "Something went wrong ". mysqli_error($conn);
}
}
?>