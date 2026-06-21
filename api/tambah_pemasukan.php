<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: /index.php");
    exit;
}

include "koneksi.php";

if (isset($_POST['simpan'])) {
    $tanggal    = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah     = $_POST['jumlah'];

    mysqli_query($conn, "INSERT INTO pemasukan (tanggal, keterangan, jumlah)
                         VALUES ('$tanggal', '$keterangan', '$jumlah')");

    header("Location: pemasukan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemasukan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="navbar-inner">
        <span class="navbar-brand">Manajemen Keuangan</span>
        <div class="navbar-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="pemasukan.php" class="aktif">Pemasukan</a>
            <a href="pengeluaran.php">Pengeluaran</a>
            <a href="logout.php" class="keluar">Logout</a>
        </div>
    </div>
</nav>

<div class="container">

    <h2>Tambah Pemasukan</h2>

    <form method="POST" style="max-width: 450px;">

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" placeholder="Contoh: Gaji bulan Juni" required>
        </div>

        <div class="form-group">
            <label>Jumlah (Rp)</label>
            <input type="number" name="jumlah" placeholder="Contoh: 5000000" required>
        </div>

        <button name="simpan" type="submit" class="btn btn-biru">Simpan</button>
        &nbsp;
        <a href="pemasukan.php" class="btn btn-abu">Batal</a>

    </form>

</div>

</body>
</html>