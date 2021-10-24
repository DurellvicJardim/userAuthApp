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
        <form action="" class="register-email" method="post">
            <h3 class="register-text">Register</h3>
            <div class="input-group">
                <input type="email" required placeholder="Email" name="email">
            </div>
            <div class="input-group">
                <input type="password" required placeholder="Password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="submit">Register</button>
            </div>
            <h5 class="login-page">Already have an account? <a href="index.php">Login Here.</a></h5>
        </form>
    </div>

    <?php
        if(isset($_POST['submit'])){
            mysqli_query($connect, 
            "INSERT INTO `users`(`ID`, `email`, `password`) 
            VALUES(NULL, '$_POST[email]', '$_POST[password]')"); 
    ?>       
        <script type="text/javascript">
            alert("Registration Successful!");
        </script>
    <?php
        } 
    ?>

</body>
</html>