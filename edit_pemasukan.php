<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

include "koneksi.php";

$id   = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pemasukan WHERE id='$id'"));

if (isset($_POST['update'])) {
    $tanggal    = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah     = $_POST['jumlah'];

    mysqli_query($conn, "UPDATE pemasukan SET tanggal='$tanggal', keterangan='$keterangan',
                         jumlah='$jumlah' WHERE id='$id'");

    header("Location: pemasukan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemasukan</title>
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

    <h2>Edit Pemasukan</h2>

    <form method="POST" style="max-width: 450px;">

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']); ?>" required>
        </div>

        <div class="form-group">
            <label>Jumlah (Rp)</label>
            <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required>
        </div>

        <button name="update" type="submit" class="btn btn-hijau">Update</button>
        &nbsp;
        <a href="pemasukan.php" class="btn btn-abu">Batal</a>

    </form>

</div>

</body>
</html>