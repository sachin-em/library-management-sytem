<html>

<head>
    <title> Student Registraton </title>

    <link rel="stylesheet" href="style.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <div class="parent">
        <div class="header">Log In</div>
        <div class="child">
            <form action="" method="post">
                <div class="inp">
                    <label>ID : </label>
                    <input type="number" name="id" placeholder="Enter your college ID" required />
                </div>
                <br>
                <div>
                    <label>PASSWORD : </label>
                    <input type="password" name="password" placeholder="Enter your Password" required />
                </div>

                <br>
                <div class="inp">
                    <label></label>
                    <input type="submit" name="submit" value="LOG IN" id="submit">
                </div>

                <br>
            </form>
        </div>

    </div>

    <?php
    include 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $pass = $_POST['password'];


            $sql = "SELECT * FROM student WHERE id=$id AND Password='$pass'";

            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    echo "Login Success ".$row['Name'];
                }
            }else{
                echo "Incorrect username or password";
            }
        }
    }


    ?>

</body>

</html>