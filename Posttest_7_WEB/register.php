<?php
require "config.php";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['confirm'];
    $query = mysqli_query($db, "SELECT * FROM accounts WHERE username='$username'");
    if (mysqli_fetch_assoc($query)) {
        echo "<script>
            alert('Username already taken');
        </script>";
    } else {
        if ($password == $konfirmasi) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = mysqli_query($db, "INSERT INTO accounts (username, email, password) VALUES ('$username', '$email', '$password')");
            if ($query) {
                echo "<script>
                alert('Registration Successful');
                document.location.href='index.php';
            </script>";
            } else {
                echo "<script>
                alert('Registrasi Failed');
            </script>";
            }
        } else {
            echo "<script>
                alert('Password and Confirm Password are different');
            </script>";
        }
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
    <title>Register</title>
</head>

<body>
    <div class="container_login_regis">
        <div class="form_login_regis">
            <h2>Registration</h2>
            <form action="" method="post">

                <label for="email">Email</label><br>
                <input type="email" name="email" class="input" placeholder="Email"><br><br>

                <label for="username">Username</label><br>
                <input type="text" name="username" class="input" placeholder="Username"><br><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" class="input" placeholder="Password"><br><br>

                <label for="konfirmasi">Confirm Password</label><br>
                <input type="password" name="confirm" class="input" placeholder="Confim Password"><br><br>

                <input type="submit" name="submit" class="submit" value="Registration"><br><br>
            </form>

            <p class="acc_check">Already Have Account?
                <a href="index.php">Login</a>
            </p>

        </div>
    </div>
</body>

</html>