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

    mysqli_query($conn, "INSERT INTO pengeluaran (tanggal, keterangan, jumlah)
                         VALUES ('$tanggal', '$keterangan', '$jumlah')");

    header("Location: pengeluaran.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="navbar-inner">
        <span class="navbar-brand">Manajemen Keuangan</span>
        <div class="navbar-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="pemasukan.php">Pemasukan</a>
            <a href="pengeluaran.php" class="aktif">Pengeluaran</a>
            <a href="logout.php" class="keluar">Logout</a>
        </div>
    </div>
</nav>

<div class="container">

    <h2>Tambah Pengeluaran</h2>

    <form method="POST" style="max-width: 450px;">

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" placeholder="Contoh: Beli bahan makanan" required>
        </div>

        <div class="form-group">
            <label>Jumlah (Rp)</label>
            <input type="number" name="jumlah" placeholder="Contoh: 200000" required>
        </div>

        <button name="simpan" type="submit" class="btn btn-biru">Simpan</button>
        &nbsp;
        <a href="pengeluaran.php" class="btn btn-abu">Batal</a>

    </form>

</div>

</body>
</html>