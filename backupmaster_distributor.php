<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Export</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f8ff; /* Ganti warna latar belakang sesuai keinginan */
        }

        .message-box {
            position: relative;
            padding: 20px;
            border: 2px solid #008000; /* Warna hijau */
            border-radius: 10px;
            background-color: #d0f0c0; /* Warna latar belakang hijau muda */
            text-align: center;
        }

        .close-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "uas_pwl";

// Buat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Gunakan prepared statement untuk menghindari SQL injection
$sql = "SELECT * FROM datadistributor";
$result = mysqli_query($conn, $sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $record = array(
            "idtoko" => $row['idtoko'],
            "namatoko" => $row['namatoko'],
            "alamat" => $row['alamat'],
            "notlptoko" => $row['notlptoko'],
            "jenisbarang" => $row['jenisbarang'],
            "namabarang" => $row['namabarang']
        );
        $data[] = $record;
    }
}

// Konversi data ke format JSON
$json_data = json_encode($data, JSON_PRETTY_PRINT);

// Tentukan nama file JSON dan path folder
$folder_path = 'backupjson/';
$file_name = $folder_path . 'data_distributor.json';

// Pastikan folder sudah ada atau buat folder jika belum ada
if (!is_dir($folder_path)) {
    mkdir($folder_path, 0777, true);
}

// Simpan data ke file JSON
if (file_put_contents($file_name, $json_data) !== false) {
    echo '<div class="message-box" style="color: #008000;">';
    echo 'Data berhasil diekspor ke ' . $file_name;
    echo '<div class="close-button" onclick="window.location.href=\'master_distributor.php\'">x</div>';
    echo '</div>';
} else {
    echo '<div class="message-box" style="color: #ff0000;">Gagal mengekspor data ke ' . $file_name;
    echo '<div class="close-button" onclick="window.location.href=\'halaman_utama.php\'">x</div>';
    echo '</div>';
}

// Tutup koneksi
$conn->close();
?>

</body>
</html>
