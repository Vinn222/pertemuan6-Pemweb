<?php
session_start();
if (!isset($_COOKIE['login']) || $_COOKIE['login'] !== "true") {
    header("Location: /index.php");
    exit;
}

include "koneksi.php";

$masuk  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) total FROM pemasukan"));
$keluar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) total FROM pengeluaran"));

$totalMasuk  = $masuk['total']  ?? 0;
$totalKeluar = $keluar['total'] ?? 0;
$saldo       = $totalMasuk - $totalKeluar;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="navbar-inner">
        <span class="navbar-brand">Manajemen Keuangan</span>
        <div class="navbar-links">
            <a href="dashboard.php" class="aktif">Dashboard</a>
            <a href="pemasukan.php">Pemasukan</a>
            <a href="pengeluaran.php">Pengeluaran</a>
            <a href="logout.php" class="keluar">Logout</a>
        </div>
    </div>
</nav>

<div class="container">

    <h2>Dashboard</h2>
    <p style="margin-bottom: 20px; color: #666; font-size: 0.9rem;">
        Selamat datang, <?php echo htmlspecialchars($_COOKIE['username'] ?? 'Admin'); ?></strong>
    </p>

    <div class="stat-row">
        <div class="stat-box stat-biru">
            <p>Total Pemasukan</p>
            <h3>Rp <?= number_format($totalMasuk, 0, ',', '.'); ?></h3>
        </div>
        <div class="stat-box stat-merah">
            <p>Total Pengeluaran</p>
            <h3>Rp <?= number_format($totalKeluar, 0, ',', '.'); ?></h3>
        </div>
        <div class="stat-box stat-hijau">
            <p>Saldo</p>
            <h3>Rp <?= number_format($saldo, 0, ',', '.'); ?></h3>
        </div>
    </div>

    <a href="pemasukan.php" class="btn btn-biru">Data Pemasukan</a>
    &nbsp;
    <a href="pengeluaran.php" class="btn btn-hijau">Data Pengeluaran</a>

</div>

</body>
</html>