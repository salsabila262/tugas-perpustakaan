<?php
require_once "koneksi.php";

$sql = "SELECT * FROM anggota";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background-color: #aa6517;
            color: white;
            padding: 12px 10px;
        }

        td {
            padding: 12px 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f6fa;
        }

        tr:hover {
            background-color: #e8f1fa;
        }

        .detail {
            background-color: #1769aa;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
        }

        .hapus {
            background-color: #dc3545;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
        }

        .detail:hover {
            background-color: #0d4f85;
        }

        .hapus:hover {
            background-color: #b02a37;
        }
    </style>
</head>

<body>

    <h2>Data Anggota</h2>

    <table>
        <tr>
            <th>No</th>
            <th>No Anggota</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Jenis Anggota</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($query && mysqli_num_rows($query) > 0) {
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($data['no_anggota']); ?></td>
            <td><?= htmlspecialchars($data['nama_lengkap']); ?></td>
            <td><?= htmlspecialchars($data['email']); ?></td>
            <td><?= htmlspecialchars($data['no_hp']); ?></td>
            <td><?= htmlspecialchars($data['jenis_anggota']); ?></td>
            <td><?= htmlspecialchars($data['alamat']); ?></td>

            <td>
                <a class="detail"
                   href="detail_anggota.php?no_anggota=<?= urlencode($data['no_anggota']); ?>">
                   Detail
                </a>

                <a class="hapus"
                   href="hapus_anggota.php?no_anggota=<?= urlencode($data['no_anggota']); ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>

        <?php
            }
        } else {
        ?>

        <tr>
            <td colspan="8">Belum ada data anggota.</td>
        </tr>

        <?php } ?>

    </table>

</body>
</html>

<?php
mysqli_close($koneksi);
?>