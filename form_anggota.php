<?php
// NIM      : 250302061
// NAMA     : SALSABILA APSARINI ARDININGRUM
// PERTEMUAN: 10
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pendaftaran Anggota</title>
</head>
<body>
<h2>Form Pendaftaran Anggota Perpustakaan</h2>
<form action="proses_anggota.php" method="POST">
    <label for="no_anggota">No Anggota</label><br>
    <input type="text" name="no_anggota" id="no_anggota" required><br><br>  

    <label for="nama_lengkap">Nama Lengkap</label><br>
    <input type="text" name="nama_lengkap" id="nama_lengkap" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="no_hp">Nomor HP</label><br>
    <input type="text" name="no_hp" id="no_hp" required><br><br>

    <label for="jenis_anggota">Jenis Anggota</label><br>
    <select name="jenis_anggota" id="jenis_anggota" required>
        <option value="">-- Pilih Jenis Anggota --</option>
        <option value="Dosen">Dosen</option>
        <option value="Mahasiswa">Mahasiswa</option>
        <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
    </select><br><br>

    <label for="alamat">Alamat</label><br>
    <textarea name="alamat" id="alamat" required></textarea><br><br>

    <button type="submit" name="daftar">Daftar</button>
</form>
</body>
</html>