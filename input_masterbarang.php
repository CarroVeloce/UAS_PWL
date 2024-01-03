<!DOCTYPE html>
<html>

<head>
    <title>Input Barang</title>
</head>

<body>
    <h2>Form Input Barang</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        NO BARANG: <input type="text" name="nobarang"><br><br>
        NAMA BARANG: <input type="text" name="namabarang"><br><br>
        JENIS BARANG: <input type="text" name="jenisbarang"><br><br>
        SUPPLIER: <input type="text" name="supplier"><br><br>
        STOK: <input type="text" name="stok"><br><br>
        HARGA: <input type="text" name="harga"><br><br>
        TANGGAL MASUK: <input type="date" name="tanggalmasuk"><br><br>
        GAMBAR: <input type="file" name="gambar"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "uas_pwl";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Form handling untuk insert data ke dalam tabel databarang
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nobarang = $_POST['nobarang'];
        $namabarang = $_POST['namabarang'];
        $jenisbarang = $_POST['jenisbarang'];
        $supplier = $_POST['supplier'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $tanggalmasuk = $_POST['tanggalmasuk'];

        $sql = "INSERT INTO databarang (nobarang, namabarang, jenisbarang, supplier, stok, harga, tanggalmasuk)
                VALUES ('$nobarang', '$namabarang', '$jenisbarang', '$supplier', '$stok', '$harga', '$tanggalmasuk')";

        if (mysqli_query($conn, $sql)) {
            echo "Data berhasil ditambahkan.";
            
            if(isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
                $target_dir = "gambarproduk/"; // Direktori untuk menyimpan file gambar produk
                $target_file = $target_dir . basename($_FILES["gambar"]["name"]); // Path lengkap file gambar

                // Move file yang diunggah ke lokasi yang diinginkan
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    echo "File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil diunggah.";
                    // Lakukan query INSERT dengan menambahkan $target_file ke dalam database
                    $sql_gambar = "UPDATE databarang SET gambar='$target_file' WHERE nobarang='$nobarang'";
                    mysqli_query($conn, $sql_gambar);
                } else {
                    echo "Maaf, terjadi kesalahan saat mengunggah file.";
                }
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>
