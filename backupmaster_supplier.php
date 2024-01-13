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

// Ambil data dari tabel
$sql = "SELECT * FROM datasuppler";
$result = mysqli_query($conn, $sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $record = array(
            "idsupplier" => $row['idsupplier'],
            "namasupplier" => $row['namasupplier'],
            "alamatsupplier" => $row['alamatsupplier'],
            "tlpsupplier" => $row['tlpsupplier'],
            "jenisbarang" => $row['jenisbarang']
        );
        $data[] = $record;
    }
}

// Konversi data ke format JSON
$json_data = json_encode($data, JSON_PRETTY_PRINT);

// Tentukan nama file JSON dan path folder
$folder_path = 'backupjson/';
$file_name = $folder_path . 'data_supplier.json';

// Pastikan folder sudah ada atau buat folder jika belum ada
if (!is_dir($folder_path)) {
    mkdir($folder_path, 0777, true);
}

// Simpan data ke file JSON
file_put_contents($file_name, $json_data);

// Tampilkan pesan sukses atau gagal
if (file_exists($file_name)) {
    echo "Data berhasil diekspor ke $file_name";
} else {
    echo "Gagal mengekspor data";
}

// Tutup koneksi
$conn->close();
?>