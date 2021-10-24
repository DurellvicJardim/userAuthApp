<?php
session_start();
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/stylesheet1.css">
    <link rel="stylesheet" type="text/css" href="styles/stylesheet2.css">
    <link rel="stylesheet" type="text/css" href="styles/stylesheet3.css">
    <title>Library</title>
</head>
<body>
    <div class="top-navbar">
        <nav>
            <ul class="nav-links">
                <li><h1 class="logo"><a href="adminlibrary.php" class="logo">Library</a></h1></li>
                <li><h3><a href="logout.php" class="logout">Logout</a></h3></li>
                <li><h4><a href="add.php" class="logout">Add Book</a></h4></li>
                <li><h4><a href="remove.php" class="logout">Remove Book</a></h4></li>
            </ul>
        </nav>
    </div>

    <?php
        echo "<p class='user-welcome'>";
        echo "Hello " . $_SESSION['login_user'];
        echo "</p>";
    ?>

    <div class="container">
        <h3 class="login-text">Udpate Book Info:</h3>
        <form class="login-email" action="#" method="post">
            <div class="input-group">
                <label for="id"><h4>Enter Book ID:</h4></label>
                <br>
                <input type="text" name="id" placeholder="Book ID..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="bookName"><h4>Update Book Name:</h4></label>
                <br>
                <input type="text" name="bookName" placeholder="Book Name..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="year"><h4>Update Year:</h4></label>
                <br>
                <input type="text" name="year" placeholder="Year..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="genre"><h4>Update Genre:</h4></label>
                <br>
                <input type="text" name="genre" placeholder="Genre..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="ageGroup"><h4>Update Age Group:</h4></label>
                <br>
                <input type="text" name="ageGroup" placeholder="Age Group..." required>
            </div>
            <br>
            <br>
            <br>
            <div class="input-group">
                <button type="submit" class="btn" name="submit">Update Book Info</button>
            </div>
        </form>
        <h3 class="login-text">Update Author Info:</h3>
        <form action="#" class="login-email" method="post">
            <div class="input-group">
                <label for="author_id"><h4>Enter Author ID:</h4></label>
                <br>
                <input type="text" name="author_id" placeholder="Author ID..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="author"><h4>Update Author:</h4></label>
                <br>
                <input type="text" name="author" placeholder="Author..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="age"><h4>Update Author Age:</h4></label>
                <br>
                <input type="text" name="age" placeholder="Age..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="authorGenre"><h4>Update Author Genre:</h4></label>
                <br>
                <input type="text" name="authorGenre" placeholder="Author Genre..." required>
            </div>
            <br>
            <br>
            <br>
            <div class="input-group">
                <button type="submit" class="btn" name="submit-author">Update Author Info</button>
            </div>
        </form>
    </div>
    <?php
        //book details
        $bookName = $_POST['bookName'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $ageGroup = $_POST['ageGroup'];

        //author details
        $author = $_POST['author'];
        $age = $_POST['age'];
        $authorGenre = $_POST['authorGenre'];

        //update queries
        if(isset($_POST['submit'])){
            mysqli_query($connect,
            "UPDATE `books` SET `book name`= '$bookName',`year`='$year',`genre`='$genre',`age group`='$ageGroup' WHERE `book_id`='$_POST[id]'");
        }

        if(isset($_POST['submit-author'])){
            mysqli_query($connect,
            "UPDATE `authors` SET `author_name`='$author',`age`='$age',`author_genre`='$authorGenre' WHERE `author_id`='$_POST[author_id]'");
        }
    ?>
</body>
</html>