<?php
// Mengambil data dari Environment Variables Vercel yang sudah Anda isi tadi
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$db   = getenv('DB_NAME');

// Menghubungkan ke MySQL Aiven dengan Port khusus
$conn = mysqli_connect($host, $user, $pass, $db, $port);
$koneksi = $conn;

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>