<?php
// NIM      : 250302061
// NAMA     : SALSABILA APSARINI ARDININGRUM
// PERTEMUAN: 10

?>

<?php
require_once "koneksi.php";
$versi_server = mysqli_get_server_info($koneksi);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tes Koneksi Database</title>
</head>
<body>
<h1>Tes Koneksi Database</h1>
<p>Koneksi ke MySQL berhasil.</p>
<table>
<tr>
    <td>Host</td>
    <td>: <?php echo htmlspecialchars($host); ?></td>
</tr>
<tr>
    <td>Database</td>
    <td>: <?php echo htmlspecialchars($database); ?></td>
</tr>
<tr>
    <td>Versi server</td>
    <td>: <?php echo htmlspecialchars($versi_server); ?></td>
</tr>
</table>
</body>
</html>
<?php
mysqli_close($koneksi);
?>