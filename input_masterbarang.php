<!DOCTYPE html>
<html>

<head>
    <title>Input Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label,
        input,
        select {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            color: #155724;
        }

        .error {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            color: #721c24;
        }
    </style>
</head>

<body>
    <h2>Form Input Barang</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label for="nobarang">NO BARANG:</label>
        <input type="text" id="nobarang" name="nobarang">

        <label for="namabarang">NAMA BARANG:</label>
        <input type="text" id="namabarang" name="namabarang">

        <label for="jenisbarang">JENIS BARANG:</label>
        <input type="text" id="jenisbarang" name="jenisbarang">

        <label for="supplier">SUPPLIER:</label>
        <input type="text" id="supplier" name="supplier">

        <label for="stok">STOK:</label>
        <input type="text" id="stok" name="stok">

        <label for="harga">HARGA:</label>
        <input type="text" id="harga" name="harga">

        <label for="tanggalmasuk">TANGGAL MASUK:</label>
        <input type="date" id="tanggalmasuk" name="tanggalmasuk">

        <label for="gambar">GAMBAR:</label>
        <input type="file" id="gambar" name="gambar">

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
