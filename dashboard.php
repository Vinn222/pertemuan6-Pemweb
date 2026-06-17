<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

include "koneksi.php";

$masuk = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT SUM(jumlah) total FROM pemasukan"
    )
);

$keluar = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT SUM(jumlah) total FROM pengeluaran"
    )
);

$totalMasuk = $masuk['total'] ?? 0;
$totalKeluar = $keluar['total'] ?? 0;

$saldo = $totalMasuk - $totalKeluar;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>

    <h2>Dashboard</h2>

    <p>Selamat Datang <?= $_SESSION['username']; ?></p>

    <h3>Total Pemasukan :
        Rp <?= number_format($totalMasuk, 0, ",", "."); ?>
    </h3>

    <h3>Total Pengeluaran :
        Rp <?= number_format($totalKeluar, 0, ",", "."); ?>
    </h3>

    <h3>Saldo :
        Rp <?= number_format($saldo, 0, ",", "."); ?>
    </h3>

    <hr>

    <a href="pemasukan.php">Data Pemasukan</a><br><br>

    <a href="pengeluaran.php">Data Pengeluaran</a><br><br>

    <a href="logout.php">Logout</a>

</body>

</html>