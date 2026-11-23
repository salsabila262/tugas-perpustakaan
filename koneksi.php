<?php
// NIM      : 250302061
// NAMA     : SALSABILA APSARINI ARDININGRUM
// PERTEMUAN: 10

$host = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan10";
$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");

if (basename($_SERVER['PHP_SELF']) == "koneksi.php") {
    $query = "SELECT * FROM anggota";
    $result = mysqli_query($koneksi, $query);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
</head>
<body>
<?php
if (isset($_GET['status']) && $_GET['status'] == 'berhasil') {
    echo "<script>alert('Data berhasil didaftarkan!');</script>";
}
?>
<h2>Data Pendaftaran Anggota</h2>
<?php
if (basename($_SERVER['PHP_SELF']) == "koneksi.php") {
    if (!$result) {
        echo "Gagal mengambil data: " . mysqli_error($koneksi);
    } elseif (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
?>
<p>
No Anggota: <?= htmlspecialchars($data['no_anggota']) ?><br>
Nama Lengkap: <?= htmlspecialchars($data['nama_lengkap']) ?><br>
Email: <?= htmlspecialchars($data['email']) ?><br>
Nomor HP: <?= htmlspecialchars($data['no_hp']) ?><br>
Jenis Anggota: <?= htmlspecialchars($data['jenis_anggota']) ?><br>
Alamat: <?= htmlspecialchars($data['alamat']) ?>
</p>
<hr>
<?php
        }
    } else {
        echo "Belum ada data pendaftaran."; 
    }
}
?>
<br>
<a href="form_anggota.php">Kembali ke Form Pendaftaran</a>
</body>
</html>
<?php
if (basename($_SERVER['PHP_SELF']) == "koneksi.php" && isset($result)) {
    mysqli_free_result($result);
}
?>