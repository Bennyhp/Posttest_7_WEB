<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>Rent Film</title>
</head>

<body>
    <nav>
        <div class="nav_container">
            <ul class="nav_items">
                <li><a href="landingPage.php">Home</a></li>
                <li><a href="film.php">Film List</a></li>
                <li><a href="rented.php">Rented List</a></li>
                <li class="nav_right"><a href="logout.php">Logout</a></li>
                <li class="nav_right"><a href="#"><?=$_SESSION['username']?></a></li>
            </ul>
        </div>
    </nav>
    <div class="main_contents">
        <div class="section" id="section">
            <div class="text">
                <h1>About Website</h1>
                <p>
                    Website where you can rent any movie for a cheap price
                </p>
            </div>
        </div>
    </div>
    </div>
    <footer>
        
    </footer>
</body>

</html>