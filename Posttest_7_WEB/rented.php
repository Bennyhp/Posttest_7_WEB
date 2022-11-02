<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Film</title>
    <link rel="stylesheet" href="stylesheet/style.css">
</head>

<body>
    <nav>
        <div class="nav_container">
            <ul class="nav_items">
                <li><a href="landingPage.php">Home</a></li>
                <li><a href="film.php">Film List</a></li>
                <li><a href="rented.php">Rented List</a></li>
                <li class="nav_right"><a href="logout.php">Logout</a></li>
                <li class="nav_right"><a href="#"><?= $_SESSION['username'] ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="btn_class">
        <div class="btn_add"><a href="renting.php">Add</a></div>
    </div>
    <table class="table_class">
        <thead>
            <tr>
                <th>Renters Name</th>
                <th>Email</th>
                <th>Rented Title/s</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "config.php";
            $query2 = mysqli_query($db, "SELECT * FROM rented");
            $data = mysqli_fetch_assoc($query2);
            $query = mysqli_query($db,  "SELECT renters.name, renters.email, films.title
                FROM rented 
                INNER JOIN renters ON renters.id_renters=rented.id_renters 
                INNER JOIN films ON films.id_films=rented.id_films
                ");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td class="Delete">
                        <a href="delete.php?id=<?= $data['id_rented'] ?>">Delete</a>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>