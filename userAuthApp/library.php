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
                <li><h1 class="logo"><a href="library.php" class="logo">Library</a></h1></li>
                <li><h3><a href="logout.php" class="logout">Logout</a></h3></li>
            </ul>
        </nav>
    </div>

    <?php
        echo "<p class='user-welcome'>";
        echo "Hello " . $_SESSION['login_user'];
        echo "</p>";
    ?>

    <div class="search-container">
        <form class="search-form" method="post" name="search-form">
                <input type="text" name="searchbar" class="search-bar" placeholder="Search Books..." required>
                <button type="submit" name="search" class="search-btn">Search</button>
        </form>
    </div>

    <div <?php if(isset($_POST['bookNameSort'])){echo 'class="hidden"';}
        elseif(isset($_POST['authorNameSort'])){echo 'class="hidden"';}
        elseif(isset($_POST['genreSort'])){echo 'class="hidden"';}?>
    >
        <?php
            if(isset($_POST['search'])){
                $search= mysqli_query($connect, "SELECT `book name`, `year`, `genre`, `age group` 
                FROM `books` 
                WHERE `book name` LIKE '%$_POST[searchbar]%'");
                
                if(mysqli_num_rows($search)===0){
                    ?>
                    <script>alert('Book not found!')
                    window.location="library.php";
                    </script>
                    <?php
                }else{
                    $command= "SELECT `book name`, `year`, `genre`, `age group`, `author_name` 
                    FROM `books` 
                    INNER JOIN `authors` 
                    ON books.author_id = authors.author_id 
                    WHERE books.`book name` LIKE '$_POST[searchbar]%'";
                    $result= mysqli_query($connect, $command);
                        echo "<div>";
                            echo "<div class='table-container'>";
                                echo "<table class='table'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>"; echo"Author"; echo"</th>";
                                        echo "<th>"; echo"Book Name"; echo"</th>";
                                        echo "<th>"; echo"Year"; echo"</th>";
                                        echo "<th>"; echo"Genre"; echo"</th>";
                                        echo "<th>"; echo"Age Group"; echo"</th>";
                                    echo "</tr>";
                                    echo "</head>";

                                while($row= mysqli_fetch_assoc($result))
                                {   
                                    echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>"; echo $row['author_name']; echo"</td>";
                                        echo "<td>"; echo $row['book name']; echo "</td>";
                                        echo "<td>"; echo $row['year']; echo "</td>";
                                        echo "<td>"; echo $row['genre']; echo "</td>";
                                        echo "<td>"; echo $row['age group']; echo "</td>";
                                    echo "</tr>";
                                    echo "<tbody>";
                                }
                                echo "</table>";
                            echo "</div>";
                        echo "</div>";
                }
            }else{
                $command= "SELECT `book name`, `year`, `genre`, `age group`, `author_name` 
                FROM `books` 
                INNER JOIN `authors` 
                ON books.author_id = authors.author_id 
                WHERE books.`book name` LIKE '$_POST[searchbar]%'";
                $result= mysqli_query($connect, $command);
                        echo "<div>";
                            echo "<div class='table-container'>";
                                echo "<table class='table'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>"; echo"Author"; echo"</th>";
                                        echo "<th>"; echo"Book Name"; echo"</th>";
                                        echo "<th>"; echo"Year"; echo"</th>";
                                        echo "<th>"; echo"Genre"; echo"</th>";
                                        echo "<th>"; echo"Age Group"; echo"</th>";
                                    echo "</tr>";
                                    echo "</head>";

                                while($row= mysqli_fetch_assoc($result))
                                {   
                                    echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>"; echo $row['author_name']; echo"</td>";
                                        echo "<td>"; echo $row['book name']; echo "</td>";
                                        echo "<td>"; echo $row['year']; echo "</td>";
                                        echo "<td>"; echo $row['genre']; echo "</td>";
                                        echo "<td>"; echo $row['age group']; echo "</td>";
                                    echo "</tr>";
                                    echo "<tbody>";
                                }
                                echo "</table>";
                            echo "</div>";
                        echo "</div>";
            }
        ?>
    </div>

    <form method="post">
        <div class="sort-buttons">
            <h1 class="sort-text">Sort by :</h1>
            <div class="button-area">
                <button class="srt-btn" name="bookNameSort">Book</button>
            </div>
            <div class="button-area">
                <button class="srt-btn" name="authorNameSort">Author</button>
            </div>
            <div class="button-area">
                <button class="srt-btn" name="genreSort">Genre</button>
            </div>
        </div>
    </form>

    <?php
            if(isset($_POST['bookNameSort'])){
                $result= mysqli_query($connect, "SELECT `book name`, `year`, `genre`, `age group`, `author_name` 
                FROM `books` 
                INNER JOIN `authors` ON books.author_id = authors.author_id 
                ORDER BY `book name` ASC");

                echo "<div>";
                echo "<div class='table-container'>";
                    echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>"; echo"Author"; echo"</th>";
                            echo "<th>"; echo"Book Name"; echo"</th>";
                            echo "<th>"; echo"Year"; echo"</th>";
                            echo "<th>"; echo"Genre"; echo"</th>";
                            echo "<th>"; echo"Age Group"; echo"</th>";
                        echo "</tr>";
                        echo "</head>";

                    while($row= mysqli_fetch_assoc($result))
                    {   
                        echo "<tbody>";
                        echo "<tr>";
                            echo "<td>"; echo $row['author_name']; echo"</td>";
                            echo "<td>"; echo $row['book name']; echo "</td>";
                            echo "<td>"; echo $row['year']; echo "</td>";
                            echo "<td>"; echo $row['genre']; echo "</td>";
                            echo "<td>"; echo $row['age group']; echo "</td>";
                        echo "</tr>";
                        echo "<tbody>";
                    }
                    echo "</table>";
                echo "</div>";
                echo "</div>";
            }elseif(isset($_POST['authorNameSort'])){
                $result= mysqli_query($connect, "SELECT `book name`, `year`, `genre`, `age group`, `author_name` 
                FROM `books` 
                INNER JOIN `authors` ON books.author_id = authors.author_id 
                ORDER BY `author_name` ASC");

                echo "<div>";
                echo "<div class='table-container'>";
                    echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>"; echo"Author"; echo"</th>";
                            echo "<th>"; echo"Book Name"; echo"</th>";
                            echo "<th>"; echo"Year"; echo"</th>";
                            echo "<th>"; echo"Genre"; echo"</th>";
                            echo "<th>"; echo"Age Group"; echo"</th>";
                        echo "</tr>";
                        echo "</head>";

                    while($row= mysqli_fetch_assoc($result))
                    {   
                        echo "<tbody>";
                        echo "<tr>";
                            echo "<td>"; echo $row['author_name']; echo"</td>";
                            echo "<td>"; echo $row['book name']; echo "</td>";
                            echo "<td>"; echo $row['year']; echo "</td>";
                            echo "<td>"; echo $row['genre']; echo "</td>";
                            echo "<td>"; echo $row['age group']; echo "</td>";
                        echo "</tr>";
                        echo "<tbody>";
                    }
                    echo "</table>";
                echo "</div>";
                echo "</div>";
            }elseif(isset($_POST['genreSort'])){
                $result= mysqli_query($connect, "SELECT `book name`, `year`, `genre`, `age group`, `author_name` 
                FROM `books` 
                INNER JOIN `authors` ON books.author_id = authors.author_id 
                ORDER BY `genre` ASC");

                echo "<div>";
                echo "<div class='table-container'>";
                    echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>"; echo"Author"; echo"</th>";
                            echo "<th>"; echo"Book Name"; echo"</th>";
                            echo "<th>"; echo"Year"; echo"</th>";
                            echo "<th>"; echo"Genre"; echo"</th>";
                            echo "<th>"; echo"Age Group"; echo"</th>";
                        echo "</tr>";
                        echo "</head>";

                    while($row= mysqli_fetch_assoc($result))
                    {   
                        echo "<tbody>";
                        echo "<tr>";
                            echo "<td>"; echo $row['author_name']; echo"</td>";
                            echo "<td>"; echo $row['book name']; echo "</td>";
                            echo "<td>"; echo $row['year']; echo "</td>";
                            echo "<td>"; echo $row['genre']; echo "</td>";
                            echo "<td>"; echo $row['age group']; echo "</td>";
                        echo "</tr>";
                        echo "<tbody>";
                    }
                    echo "</table>";
                echo "</div>";
                echo "</div>";
            }
    ?>

</body>
</html>