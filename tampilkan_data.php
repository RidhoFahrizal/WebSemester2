<?php
include 'connection.php';

$sql = "SELECT * FROM mahasiswa";
$result = pg_query($dbconn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Daftar Siswa</h2>

<table>
    <tr>
        <th>NRP</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
    </tr>
    <?php
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["nrp"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["umur"]) . " tahun</td>";
            echo "<td>" . htmlspecialchars($row["jenis_kelamin"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["alamat"]) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data ditemukan</td></tr>";
    }
    pg_close($dbconn);
    ?>
</table>

</body>
</html>
