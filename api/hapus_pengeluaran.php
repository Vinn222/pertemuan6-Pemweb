<?php
if (!isset($_COOKIE['login']) || $_COOKIE['login'] !== "true") {
    header("Location: /index.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM pengeluaran WHERE id='$id'");

header("Location: pengeluaran.php");
exit;
?>