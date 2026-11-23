<?php
// NIM      : 250302061
// NAMA     : SALSABILA APSARINI ARDININGRUM
// PERTEMUAN: 10

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['daftar'])) {
    header("Location: form_anggota.php");
    exit;
}

$no_anggota    = trim($_POST['no_anggota'] ?? '');
$nama_lengkap  = trim($_POST['nama_lengkap'] ?? '');
$email         = trim($_POST['email'] ?? '');
$no_hp         = trim($_POST['no_hp'] ?? '');
$jenis_anggota = trim($_POST['jenis_anggota'] ?? '');
$alamat        = trim($_POST['alamat'] ?? '');

if (
    empty($no_anggota) ||
    empty($nama_lengkap) ||
    empty($email) ||
    empty($no_hp) ||
    empty($jenis_anggota) ||
    empty($alamat)
) {
    die("Semua data wajib diisi!");
}

if (!ctype_digit($no_anggota)) {
    die("No Anggota harus berupa angka!");
}

if (!ctype_digit($no_hp)) {
    die("Nomor HP harus berupa angka!");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid!");
}

$query = "INSERT INTO anggota
 (no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat)
 VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);

if (!$stmt) {
    die("Query gagal: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssss",
    $no_anggota,
    $nama_lengkap,
    $email,
    $no_hp,
    $jenis_anggota,
    $alamat
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    
    header("Location: koneksi.php?status=berhasil");
    exit;
} else {
    echo "Pendaftaran gagal: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>