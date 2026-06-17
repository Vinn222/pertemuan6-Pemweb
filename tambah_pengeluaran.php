<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $tanggal    = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah     = $_POST['jumlah'];

    mysqli_query(
        $conn,
        "INSERT INTO pengeluaran
        (tanggal,keterangan,jumlah)
        VALUES
        ('$tanggal','$keterangan','$jumlah')"
    );

    header("Location: pengeluaran.php");
}
?>

<form method="POST">

    Tanggal<br>
    <input type="date" name="tanggal"><br><br>

    Keterangan<br>
    <input type="text" name="keterangan"><br><br>

    Jumlah<br>
    <input type="number" name="jumlah"><br><br>

    <button name="simpan">
        Simpan
    </button>

</form>