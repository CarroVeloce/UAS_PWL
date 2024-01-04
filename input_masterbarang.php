<!DOCTYPE html>
<html>

<head>
    <title>Input Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }
        
        form {
            width: 400px;
            padding: 20px;
            border-radius: 15px;
            /* Lebih rounded */
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            /* Efek 3D */
            animation: fadeIn 0.5s ease forwards;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
            animation: slideDown 0.5s ease forwards;
            font-family: 'Arial', sans-serif;
            /* Ganti font untuk h2 */
        }

        /* Input yang lebih rounded */
        input[type="text"],
        input[type="date"],
        input[type="file"] {
            width: calc(100% - 40px);
            margin: 5px 20px;
            text-align: left;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            /* Lebih rounded */
            transition: border-color 0.3s ease;
            font-family: 'Arial', sans-serif;
            /* Ganti font untuk input */
            font-size: 16px;
            /* Sesuaikan ukuran font */
        }

        /* Efek hover */
        input[type="text"]:hover,
        input[type="date"]:hover,
        input[type="file"]:hover {
            border-color: #007bff;
        }

        /* Style untuk tombol submit */
        input[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: calc(100% - 40px);
            margin: 5px 20px;
            text-align: center;
            font-family: 'Arial', sans-serif;
            /* Ganti font untuk tombol */
            font-size: 16px;
            /* Sesuaikan ukuran font */
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .moving-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #007bff, #6f42c1);
            /* Gradient warna yang diinginkan */
            z-index: -2;
            /* Z-index diperkecil agar berada di bawah animasi circle */
            animation: animateBackground 15s linear infinite;
            /* Animasi berulang */
        }

        @keyframes animateBackground {
            from {
                background-position: 0 0;
                /* Awal animasi */
            }

            to {
                background-position: 0 100%;
                /* Akhir animasi */
            }
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
            pointer-events: none;
            animation: animateCircles 15s linear infinite;
        }

        .circle:nth-child(1) {
            width: 50px;
            height: 50px;
            left: 10%;
            animation-duration: 15s;
        }

        .circle:nth-child(2) {
            width: 80px;
            height: 80px;
            left: 70%;
            animation-duration: 12s;
        }

        .circle:nth-child(3) {
            width: 70px;
            height: 70px;
            left: 40%;
            animation-duration: 10s;
        }

        .circle:nth-child(4) {
            width: 60px;
            height: 60px;
            left: 80%;
            animation-duration: 17s;
        }

        .circle:nth-child(5) {
            width: 90px;
            height: 90px;
            left: 20%;
            animation-duration: 14s;
        }

        .circle:nth-child(6) {
            width: 120px;
            height: 120px;
            left: 50%;
            animation-duration: 11s;
        }

        @keyframes animateCircles {
            0% {
                transform: translateY(100vh);
                /* Muncul dari bawah layar */
            }

            100% {
                transform: translateY(-100vh);
                /* Menghilang di atas layar */
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

       
    </style>
</head>

<body>
    <div class="moving-background"></div>
    <div class="floating-shapes">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <!-- Tambahkan bentuk lain sesuai kebutuhan -->
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <h2>Form Input Barang</h2>
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
        <a href="master_barang.php" style="text-decoration: none; display: inline-block; margin-top: 10px; padding: 8px 16px; background-color: #007bff; color: #fff; border-radius: 3px;">Back</a>
        
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
            echo "";

            if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
                $target_dir = "gambarproduk/"; // Direktori untuk menyimpan file gambar produk
                $target_file = $target_dir . basename($_FILES["gambar"]["name"]); // Path lengkap file gambar
    
                // Move file yang diunggah ke lokasi yang diinginkan
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    // echo "File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . "";
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