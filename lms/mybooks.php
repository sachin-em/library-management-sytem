<html>

<head>
    <title>
    </title>
    <link rel="stylesheet" href="style.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>



    <style>
        table,
        td,
        tr th {
            border: 1px solid black;
        }

        table {
            border-collapse: separate;
            border-spacing: 3px;
            width: 80%;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        th,
        td {
            text-align: center;
        }

        div.header {
            margin-top: 10px;
            margin-left: 10%;
            width: 80%;
        }

        input {
            margin: 0;
            height: 100% !important;
            display: inline-block;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="header">DETAILS</div>
    <br>
    <?php
    include 'connection.php';
    session_start();
    $idu = $_SESSION['id'];

    $date = date("Y-m-d");


    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    // Attempt select query execution

    $sql = "SELECT * FROM issuedbooks where user_id=$idu";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {

            echo "<table>";
            echo "<tr>";
            echo "<th>BOOK ID</th>";
            echo "<th>BOOK NAME</th>";
            echo "<th>USER ID</th>";
            echo "<th>ISSUE DATE</th>";
            echo "<th>RETURN DATE</th>";
            echo "<th>FINE</th>";
            echo "<th>STATUS</th>";

            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                $t = $row['book_id'];
                $return_date = $row['return_date'];
                $sq = "SELECT name FROM books where id=$t";
                if ($results = mysqli_query($conn, $sq)) {
                    if (mysqli_num_rows($results) > 0) {
                        while ($row1 = mysqli_fetch_array($results)) {
                            echo "<tr>";
                            echo "<td>" . $row['book_id'] . "</td>";
                            echo "<td>" . $row1['name'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['issue_date'] . "</td>";
                            echo "<td>" . $row['return_date'] . "</td>";

                            //fine calculation
                            $diff = strtotime($date) - strtotime($row['return_date']);
                            $days = floor(($diff/86400));
                            $fine = 0;
                            if ($days >= 1) {
                                $fine = $days * 10;
                                echo "<td>" . $fine . "</td>";
                                echo "<td><a style='color:#d><a s090' href='renew_book.php?bid=" . $row['book_id'] . "&fine=" . $fine ."'>Renew Book</a> </td>";
                            }else{
                                echo "<td>" . $fine . "</td>";
                                echo "<td><a style='color:#d><a s090' href='return_book.php?bid=" . $row['book_id'] ."'>Return Book</a> </td>";
                            }

                            


                            echo "</tr>";
                        }
                    }
                }
            }

            echo "</table>";
            mysqli_free_result($result);
        } else {
            header("Location: view-book.php");
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    // Close connection
    mysqli_close($conn);
    ?>

</body>

</html>