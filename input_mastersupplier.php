<!DOCTYPE html>
<html>

<head>
    <title>Input Barang</title>
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
        <h2>Form Input supplier</h2>
        <label for="namasupplier">NAMA TOKO:</label>
        <input type="text" id="namasupplier" name="namasupplier">

        <label for="alamatsupplier">alamatsupplier:</label>
        <input type="text" id="alamatsupplier" name="alamatsupplier">

        <label for="tlpsupplier">NOMOR TELEPON TOKO:</label>
        <input type="number" id="tlpsupplier" name="tlpsupplier">

        <div class="select-wrapper">
            <label for="jenisbarang">JENIS BARANG:</label>
            <select id="jenisbarang" name="jenisbarang[]" multiple>
                <option value="Pilihan 1">Pilihan 1</option>
                <option value="Pilihan 2">Pilihan 2</option>
                <option value="Pilihan 3">Pilihan 3</option>
                <!-- Tambahkan lebih banyak pilihan jika diperlukan -->
            </select>

        </div>

        <input type="submit" value="Submit">
        <a href="master_supplier.php"
            style="text-decoration: none; display: inline-block; margin-top: 10px; padding: 8px 16px; background-color: #007bff; color: #fff; border-radius: 3px;">Back</a>

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
        $namasupplier = $_POST['namasupplier'];
        $alamatsupplier = $_POST['alamatsupplier'];
        $tlpsupplier = $_POST['tlpsupplier'];
        $jenisbarang = implode(', ', $_POST['jenisbarang']); // Gabungkan multiple values menjadi string
       

        $sql = "INSERT INTO datasuppler (namasupplier, alamatsupplier, tlpsupplier, jenisbarang,)
        VALUES ('$namasupplier', '$alamatsupplier', '$tlpsupplier', '$jenisbarang')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
</body>

</html>
