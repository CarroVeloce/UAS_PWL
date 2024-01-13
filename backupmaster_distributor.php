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
    echo "Data berhasil diekspor ke $file_name";
} else {
    echo "Gagal mengekspor data ke $file_name";
}

// Tutup koneksi
$conn->close();
?>
