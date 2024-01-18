<?php

if (isset($_GET['jenisbarang'])) {
    $jenisBarang = $_GET['jenisbarang'];


    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "uas_pwl";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil NAMA BARANG berdasarkan JENIS BARANG
    $query_nama_barang = "SELECT namabarang FROM databarang WHERE jenisbarang = '$jenisBarang'";
    $result_nama_barang = mysqli_query($conn, $query_nama_barang);

    $namaBarangArray = array();

    if (mysqli_num_rows($result_nama_barang) > 0) {
        // Memasukkan hasil query ke dalam array
        while ($row_nama_barang = mysqli_fetch_assoc($result_nama_barang)) {
            $namaBarangArray[] = $row_nama_barang['namabarang'];
        }
    }

    // Mengembalikan data NAMA BARANG dalam format JSON
    echo json_encode($namaBarangArray);

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>
