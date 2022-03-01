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
        <div class="header">Register</div>
        <div class="child">
            <form action="" method="post">
                <div class="inp">
                    <label>ID : </label>
                    <input type="number" name="id" placeholder="Enter your college ID" />
                </div>
                <br>
                <div>
                    <label>NAME : </label>
                    <input type="text" name="name" placeholder="Enter your Name" />
                </div>
                <br>
                <div class="inp">
                    <label>DEPARTMENT : </label>
                    <select name="dep" id="select">
                        <option value="MCA" selected>MCA</option>
                        <option value="CSE">CSE</option>
                        <option value="EEE">EEE</option>
                        <option value="ECE">ECE</option>
                        <option value="Mech">Mech</option>
                        <option value="Civil">Civil</option>
                    </select>
                </div>
                <br>
                <div class="inp">
                    <label>EMAIL : </label>
                    <input type="email" name="email" placeholder="example@gmail.com" required />
                </div>
                <br>
                <br>
                <div class="inp">
                    <label>PASSWORD : </label>
                    <input type="password" name="password" placeholder="Enter your password" required />
                </div>
                <br>
                <div class="inp">
                    <label>CONFIRM PASSWORD : </label>
                    <input type="password" name="reppassword" placeholder="Re-type your password" required />
                </div>
                <br>
                <div class="inp">
                    <label></label>
                    <input type="submit" name="submit" value="Register" id="submit">
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
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $reppass = $_POST['reppassword'];
            $dep = $_POST['dep'];


            if ($reppass == $pass) {
                $sql = "INSERT INTO student VALUES($id,'$name', '$dep', '$email', '$pass')";

                $query = mysqli_query($conn, $sql);
                if ($query) {
                    echo "<script> alert('inserted successfully') </script>";
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                echo "<script> alert('Password and retype password are different') </script>";
            }
        }
    }


    ?>

</body>

</html>