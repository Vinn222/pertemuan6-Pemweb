<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pengeluaran WHERE id='$id'");

header("Location: pengeluaran.php");