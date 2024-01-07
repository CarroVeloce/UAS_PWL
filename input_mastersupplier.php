<!DOCTYPE html>
<html>

<head>
    <title>Input Barang</title>
</head>
noinduk, namasup, alamat, telepon, fax, email, tanggalmasuk, bukti FROM databarang
<body>
    <h2>Form Input Barang</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        NO BARANG: <input type="text" name="noinduk"><br><br>
        NAMA BARANG: <input type="text" name="namasup"><br><br>
        JENIS BARANG: <input type="text" name="alamat"><br><br>
        telepon: <input type="text" name="telepon"><br><br>
        fax: <input type="text" name="fax"><br><br>
        email: <input type="text" name="email"><br><br>
        TANGGAL MASUK: <input type="date" name="tanggalmasuk"><br><br>
        bukti: <input type="file" name="bukti"><br><br>
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
        $noinduk = $_POST['noinduk'];
        $namasup = $_POST['namasup'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $tanggalmasuk = $_POST['tanggalmasuk'];

        $sql = "INSERT INTO databarang (noinduk, namasup, alamat, telepon, fax, email, tanggalmasuk)
                VALUES ('$noinduk', '$namasup', '$alamat', '$telepon', '$fax', '$email', '$tanggalmasuk')";

        if (mysqli_query($conn, $sql)) {
            echo "Data berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>
