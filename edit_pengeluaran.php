<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM pengeluaran
        WHERE id='$id'"
    )
);

if (isset($_POST['update'])) {

    $tanggal    = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah     = $_POST['jumlah'];

    mysqli_query(
        $conn,
        "UPDATE pengeluaran SET
        tanggal='$tanggal',
        keterangan='$keterangan',
        jumlah='$jumlah'
        WHERE id='$id'"
    );

    header("Location: pengeluaran.php");
}
?>

<form method="POST">

    Tanggal<br>
    <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>"><br><br>

    Keterangan<br>
    <input type="text" name="keterangan" value="<?= $data['keterangan']; ?>"><br><br>

    Jumlah<br>
    <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>"><br><br>

    <button name="update">
        Update
    </button>

</form>