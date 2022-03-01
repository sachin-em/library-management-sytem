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
        <div class="header">Add Book</div>
        <div class="child">
            <form action="" method="post">
                <div class="inp">
                    <label>BOOK ID : </label>
                    <input type="number" name="id" placeholder="Enter book ID" />
                </div>
                <br>
                <div>
                    <label>NAME : </label>
                    <input type="text" name="name" placeholder="Enter book Name" />
                </div>
                <br>
                <div class="inp">
                    <label>Category : </label>
                    <select name="category" id="select">
                        <option value="Mystery" selected>Mystery</option>
                        <option value="Horror">Horror</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Romance">Romance</option>
                    </select>
                </div>
                <div>
                    <label>AUTHOR : </label>
                    <input type="text" name="author" placeholder="Name of the Author" />
                </div>
                <br>
                
                <div class="inp">
                    <label>THUMBNAIL : </label>
                    <input type="file" name="file" required />
                </div>
                <br>
                <br>
                <div class="inp">
                    <label>DESCRIPTION : </label>
                    <textarea name="description" placeholder="Enter description" style="width: 70%; height:200px"> </textarea>
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
            $name = $_POST['name'];
            $author = $_POST['author'];
            $thumbnail = $_POST['file'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            

                $sql = "INSERT INTO books VALUES($id,'$name', '$author', '$category', '$thumbnail', '$description')";

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