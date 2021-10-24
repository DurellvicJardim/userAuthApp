<?php
session_start();
include_once "connection.php";

if(isset($_POST['login'])){
    $sql= "SELECT `ID`, `email`, `password` 
    FROM `admin` 
    WHERE `email`= '$_POST[email]' AND `password`= '$_POST[password]'";

    $result= mysqli_query($connect, $sql);

    if(mysqli_num_rows($result)===1){
        $_SESSION['login_user'] = $_POST['email'];
        header('location:adminlibrary.php');
    }else{
        ?>
        <script type="text/javascript">
            alert("Incorrect Login Credentials");
        </script>
        <?php
    }
}
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
            </ul>
        </nav>
    </div>

    <div class="container">
        <form action="" class="login-email" method="post">
            <h3 class="login-text">Admin Login</h3>
            <div class="input-group">
                <input type="email" required placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" required placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login">Login</button>
            </div>
            <h5 class="login-page">Not an Admin? <a href="index.php">Login Here.</a></h5>
            <br>
            <h5 class="forgot-pass">Forgot Password? <a href="passforgot.php">Click Here.</a></h5>
        </form>
    </div>
    
</body>
</html>