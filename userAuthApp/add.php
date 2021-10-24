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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                <li><h4><a href="remove.php" class="logout">Remove Book</a></h4></li>
                <li><h4><a href="update.php" class="logout">Update Book</a></h4></li>
            </ul>
        </nav>
    </div>

    <?php
        echo "<p class='user-welcome'>";
        echo "Hello " . $_SESSION['login_user'];
        echo "</p>";
    ?>

    <div class="container">
        <h3 class="login-text">Add Book Info:</h3>
        <form class="login-email" action="#" method="post">
            <div class="input-group">
                <label for="id"><h4>Enter Book ID:</h4></label>
                <br>
                <input type="text" name="id" placeholder="Book ID..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="bookName"><h4>Enter Book Name:</h4></label>
                <br>
                <input type="text" name="bookName" placeholder="Book Name..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="year"><h4>Enter Year:</h4></label>
                <br>
                <input type="text" name="year" placeholder="Year..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="genre"><h4>Enter Genre:</h4></label>
                <br>
                <input type="text" name="genre" placeholder="Genre..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="ageGroup"><h4>Enter Age Group:</h4></label>
                <br>
                <input type="text" name="ageGroup" placeholder="Age Group..." required>
            </div>
            <br>
            <br>
            <br>
            <div class="input-group">
                <button type="submit" class="btn" name="submit">Add Book Info</button>
            </div>
        </form>
        <h3 class="login-text">Add Author Info:</h3>
        <form action="#" class="login-email" method="post">
            <div class="input-group">
                <label for="author_id"><h4>Enter Author ID:</h4></label>
                <br>
                <input type="text" name="author_id" placeholder="Author ID..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="author"><h4>Enter Author:</h4></label>
                <br>
                <input type="text" name="author" placeholder="Author..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="age"><h4>Enter Author Age:</h4></label>
                <br>
                <input type="text" name="age" placeholder="Age..." required>
            </div>
            <br>
            <div class="input-group">
                <label for="authorGenre"><h4>Enter Author Genre:</h4></label>
                <br>
                <input type="text" name="authorGenre" placeholder="Author Genre..." required>
            </div>
            <br>
            <br>
            <br>
            <div class="input-group">
                <button type="submit" class="btn" name="submit-author">Add Author Info</button>
            </div>
        </form>
    </div>
    <?php
    
    if(isset($_POST['submit'])){
        mysqli_query($connect, 
        "INSERT INTO `books`(`book name`, `year`, `genre`, `age group`) 
        VALUES ('$_POST[bookName]', '$_POST[year]', '$_POST[genre]', '$_POST[ageGroup]')");     
    }
    
    if(isset($_POST['submit-author'])){
        mysqli_query($connect, 
        "INSERT INTO `authors`(`author_name`, `age`, `genre`) 
        VALUES('$_POST[author_id]', '$_POST[author]', '$_POST[age]', '$_POST[authorGenre]')");     
    }

    ?>
</body>
</html>