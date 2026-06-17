<?php
include "koneksi.php";

$data = mysqli_query(
    $conn,
    "SELECT * FROM pemasukan"
);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pemasukan</title>
</head>

<body>

    <h2>Data Pemasukan</h2>

    <a href="tambah_pemasukan.php">
        Tambah Data
    </a>

    <table border="1" cellpadding="10">

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

                <td>
                    <?= $no++; ?>
                </td>

                <td>
                    <?= $row['tanggal']; ?>
                </td>

                <td>
                    <?= $row['keterangan']; ?>
                </td>

                <td>
                    <?= $row['jumlah']; ?>
                </td>

                <td>

                    <a href="edit_pemasukan.php?id=<?= $row['id']; ?>">
                        Edit
                    </a>

                    |

                    <a href="hapus_pemasukan.php?id=<?= $row['id']; ?>">
                        Hapus
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

    <br>

    <a href="dashboard.php">Kembali</a>

</body>

</html>