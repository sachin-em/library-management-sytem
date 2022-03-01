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
    <div class="header">BOOKS DETAILS</div>
    <br>
    <br>
    <form action="" method="post">
        <table>
            <tr>
                <td><input type="text" placeholder="serch by name of books" name="bookname" width=100%></td>
                <td><input type="submit" name="search" value="SEARCH"></td>
            </tr>
        </table>
    </form>
    <?php
    include 'connection.php';

    session_start();
    $user_id = $_SESSION["id"];

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if (!(isset($_POST['bookname']))) {
        // Attempt select query execution
        $sql = "SELECT * FROM books";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<br><br><br>";
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>NAME</th>";
                echo "<th>AUTHOR</th>";
                echo "<th>CATEGORY</th>";
                echo "<th>THUMBNAIL</th>";
                echo "<th>DESCRIPTION</th>";
                echo "<th>RENT</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['thumbnail'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td><a style='color:#090' href='rent_book.php?bid=" . $row['id'] . "'>Rent Book</a> </td>";
                    echo "</tr>";
                }

                echo "</table>";
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    } else {
        if (isset($_POST['bookname'])) {

            $bkname = $_POST['bookname'];
            $sql = "select * from books where name like '%$bkname%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<br><br><br>";
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>NAME</th>";
                echo "<th>AUTHOR</th>";
                echo "<th>CATEGORY</th>";
                echo "<th>THUMBNAIL</th>";
                echo "<th>DESCRIPTION</th>";
                echo "<th>RENT</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['thumbnail'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td><a style='color:#090' href='rent_book.php?bid=" . $row['id'] . "'>Rent Book</a> </td>";
                    echo "</tr>";
                }

                echo "</table>";
                mysqli_free_result($result);
            } else {
                echo "<script>alert('error occured')</script>";
            }
        }
    }

    // Close connection
    mysqli_close($conn);
    ?>

</body>

</html>