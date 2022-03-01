<html>

<head>
    <title> Issued Books </title>

    <link rel="stylesheet" href="style.css">

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>
<body>
    <div class="parent">
        <div class="header">Issued book</div>
        <div class="child">
            <form action="" method="post">
                <div class="inp">
                    <label>BOOK ID : </label>
                    <input type="number" name="id" placeholder="Enter book ID" />
                </div>
                <br>
                <div>
                    <label>STUDENT ID : </label>
                    <input type="number" name="s_id" placeholder="Enter student id" />
                </div>
                <br>
                <div>
                    <label>ISSUE DATE : </label>
                    <input type="date" name="issuedate" placeholder="Issue date" />
                </div>
                <br>
                <div>
                    <label>RETURN DATE : </label>
                    <input type="date" name="returndate" placeholder="Return date" />
                </div>
                <br>
                <div class="inp">
                    <label></label>
                    <input type="submit" name="submit" value="Add Book" id="submit">
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
            $s_id = $_POST['s_id'];
            $issue_date = $_POST['issuedate'];
            $return_date = $_POST['returndate'];
            $fine= 0;
            $status = 0;
            

                $sql = "INSERT INTO issuedbooks VALUES($id, $s_id,'$issue_date', '$return_date',$fine, $status)";

                $query = mysqli_query($conn, $sql);
                if ($query) {
                    echo "<script> alert('inserted successfully') </script>";
                } else {
                    echo mysqli_error($conn);
                }
        }
    }


    ?> 

</body>

</html>