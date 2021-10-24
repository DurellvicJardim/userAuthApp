<?php

include "connection.php";

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
    <title>Library</title>
</head>
<body>

    <div class="top-navbar">
        <nav>
            <ul class="nav-links">
                <li><h1 class="logo"><a href="index.php" class="logo">Library</a></h1></li>
                <li><a href="admin.php" class="admin-login"><h3>Librarian Login</h3></a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <form action="" class="login-email" method="post">
            <h3 class="login-text">Password Retrieval</h3>
            <h5>Please Enter Your Email:</h5>
            <br>
            <div class="input-group">
                <input type="email" required placeholder="Email" name="email">
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Done</button>
            </div>
            <h5 class="register-page">Don't have an account? <a href="registration.php">Register Here.</a></h5>
            <br>
            <h5 class="login-page">Return To Login? <a href="index.php">Login Here.</a></h5>
            <br>
            
            <div class="user-pass">
            <?php
                if(isset($_POST['submit'])){
                    $sql= mysqli_query($connect, 
                    "SELECT `password` 
                    FROM `users` 
                    WHERE `email`='$_POST[email]'");
                    $fetch= mysqli_fetch_assoc($sql);
                    echo "<p>"; echo "Your password is " . $fetch['password']; echo "</p>";
                }
            ?>
            </div>
        </form>
    </div>

</body>
</html>