<?php
session_start();
include "koneksi.php";


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'"
    );

    if (mysqli_num_rows($query) > 0) {

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h2>Login</h2>

    <?php
    if (isset($error)) {
        echo $error;
    }
    ?>

    <form method="POST">

        <label>Username</label><br>
        <input type="text" name="username"><br><br>

        <label>Password</label><br>
        <input type="password" name="password"><br><br>

        <button name="login">Login</button>

    </form>

</body>

</html>