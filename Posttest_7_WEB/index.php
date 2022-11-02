<?php
require "config.php";
session_start();

if(isset($_SESSION['username'])){
    header('Location:landingPage.php');
}

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $query = mysqli_query($db, "SELECT * FROM accounts WHERE username='$user' OR email='$user'");
    $result = mysqli_fetch_assoc($query);
    $username = $result['username'];
    $_SESSION['username'] = $username;
    if (password_verify($password, $result['password'])) {
        echo "<script>
            alert('Selamat Datang $username');
            document.location.href='landingPage.php';
            </script>";
    } else {
        echo "<script>
        alert('Username Or Password Wrong');
        document.location.href='index.php';
        </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container_login_regis">
        <div class="form_login_regis">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="user" placeholder="Email atau Username" class="input"><br><br>
                <input type="password" name="password" placeholder="Password" class="input"><br><br>

                <input type="submit" name="submit" value="Login" class="submit"><br><br>
            </form>

            <p class="acc_check">Don't Have Account Yet?
                <a href="register.php">Register</a>
            </p>
        </div>
    </div>
</body>

</html>