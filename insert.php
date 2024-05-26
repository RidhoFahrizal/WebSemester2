<?php

// Include file koneksi
include "connection.php";

// Proses data dari form disini
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nrp = $_POST["nrp"];
    $nama = pg_escape_string($dbconn, $_POST["nama"]);
    $jenis_kelamin = pg_escape_string($dbconn, $_POST["jenis_kelamin"]);
    $agama = pg_escape_string($dbconn, $_POST["agama"]);
    $umur = (int)$_POST["umur"];
    $alamat = pg_escape_string($dbconn, $_POST["alamat"]);

    // Query untuk menyisipkan data ke dalam tabel mahasiswa
    $query = "INSERT INTO mahasiswa (NRP, NAMA, jenis_kelamin, agama, umur, alamat) 
             VALUES ('$nrp', '$nama', '$jenis_kelamin', '$agama', $umur, '$alamat')";

    // Eksekusi query
    $result = pg_query($dbconn, $query);
    if (!$result) {
        echo "Gagal menyisipkan data: " . pg_last_error($dbconn) . "<br>";
    } else {
        echo "Data berhasil disisipkan.";
    }

    // Tutup koneksi
    pg_close($dbconn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
</head>
<body>
<h2>Formulir Pendaftaran Mahasiswa</h2>
<form action="insert.php" method="POST">
    <label for="nrp">NRP:</label><br>
    <input type="text" id="nrp" name="nrp" required><br><br>

    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" required><br><br>

    <label for="jenis_kelamin">Jenis Kelamin:</label><br>
    <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
    <label for="pria">Pria</label>
    <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" required>
    <label for="wanita">Wanita</label><br><br>

    <label for="agama">Agama:</label><br>
    <input type="text" id="agama" name="agama" required><br><br>

    <label for="umur">Umur:</label><br>
    <input type="number" id="umur" name="umur" required><br><br>

    <label for="alamat">Alamat:</label><br>
    <textarea id="alamat" name="alamat" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
