<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['login']    = true;
        $_SESSION['username'] = $username;
        header("Location: /dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">

        <h2>Login</h2>
        <p>Aplikasi Manajemen Keuangan</p>

        <?php if (isset($error)) { ?>
            <div class="error"><?= $error; ?></div>
        <?php } ?>

        <form method="POST">

            <div class="form-group" style="text-align: left;">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username">
            </div>

            <div class="form-group" style="text-align: left;">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password">
            </div>

            <button name="login" type="submit" class="btn btn-biru" style="width: 100%; padding: 10px;">
                Login
            </button>

        </form>

    </div>
</div>

</body>
</html>