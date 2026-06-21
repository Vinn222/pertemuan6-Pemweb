<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: /index.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM pemasukan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemasukan</title>
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

    <h2>Data Pemasukan</h2>

    <a href="tambah_pemasukan.php" class="btn btn-biru">+ Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['keterangan']; ?></td>
            <td>Rp <?= number_format($row['jumlah'], 0, ',', '.'); ?></td>
            <td>
                <a href="edit_pemasukan.php?id=<?= $row['id']; ?>" class="btn btn-hijau">Edit</a>
                <a href="hapus_pemasukan.php?id=<?= $row['id']; ?>" class="btn btn-merah"
                   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a href="dashboard.php" class="btn btn-abu">Kembali</a>

</div>

</body>
</html>