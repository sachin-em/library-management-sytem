<html>

<head>
    <title> Student Registraton </title>

    <style>


        div.parent {
            margin: auto;
            border: 1px solid rgb(0, 0, 0);
            width: 70%;
            padding: auto;
        }

        div.child {
            margin: auto;
            width: 50%;
            padding: 30px;
        }

        div.header {
            position: relative;
            padding-top: 20px;
            text-align: center;
            font-size: 20px;
            color: white;
            background-color: rgb(0, 0, 0);
            border-radius: 5px;
            height: 40px;
            width: 100%;
            padding: auto;
        }



        label {
            display: inline-block;
            width: 150px;
            text-align: right;

        }

        input {
            border-radius: 10px;
            border: none;
            background-color: rgb(240, 241, 240);
            padding-top: 20px;
            padding-bottom: 20px;
            width: 70%;
            height: 37px;
        }

        select {
            border-radius: 10px;
            border: none;
            background-color: rgb(240, 241, 240);
            width: 70%;
            height: 37px;
        }

        input:hover {
            border: 2px solid rgb(0, 0, 0);
        }

        #submit {
            padding-top: 9px;
            background-color: rgb(62, 165, 79);
            color: white;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="parent">
        <div class="header">Register</div>
        <div class="child">
            <form action="/form/submit" method="post">
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
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $dep = $_POST['dep'];
        }
        
        
        
        $sql = "INSERT INTO student VALUES($id,$name, $dep, $email, $pass)";
    ?>

</body>

</html>