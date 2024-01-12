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
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
        }

        input,
        select {
            width: calc(100% - 40px);
            margin: 5px 20px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
        }

        input:hover,
        select:hover {
            border-color: #007bff;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
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
            z-index: -2;
            animation: animateBackground 15s linear infinite;
        }

        @keyframes animateBackground {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 0 100%;
            }
        }

        .select-wrapper {
            position: relative;
            display: inline-block;
        }

        .select-wrapper select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            cursor: pointer;
        }

        .select-wrapper::after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .select-wrapper:hover select {
            border-color: #007bff;
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
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <h2>Form Input Distributor</h2>
        <label for="namatoko">NAMA TOKO:</label>
        <input type="text" id="namatoko" name="namatoko">

        <label for="alamat">ALAMAT:</label>
        <input type="text" id="alamat" name="alamat">

        <label for="notlptoko">NOMOR TELEPON TOKO:</label>
        <input type="number" id="notlptoko" name="notlptoko">

        <div class="select-wrapper">
            <label for="jenisbarang">JENIS BARANG:</label>
            <select id="jenisbarang" name="jenisbarang">
                <?php
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "uas_pwl";
                // Koneksi ke database
                $conn = mysqli_connect($host, $username, $password, $database);

                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                // Query untuk mengambil data 'JENIS BARANG' dari tabel 'databarang'
                $query_jenisbarang = "SELECT DISTINCT jenisbarang FROM databarang";
                $result_jenisbarang = mysqli_query($conn, $query_jenisbarang);

                if (mysqli_num_rows($result_jenisbarang) > 0) {
                    // Menampilkan pilihan 'JENIS BARANG' dari tabel 'databarang'
                    while ($row_jenisbarang = mysqli_fetch_assoc($result_jenisbarang)) {
                        echo "<option value='" . $row_jenisbarang['jenisbarang'] . "'>" . $row_jenisbarang['jenisbarang'] . "</option>";
                    }
                }

                // Tutup koneksi ke database
                mysqli_close($conn);
                ?>
            </select>
            <label for="namabarang">NAMA BARANG:</label>
            <select id="namabarang" name="namabarang[]" multiple="multiple">
                <!-- Opsi NAMA BARANG akan diisi secara dinamis setelah memilih JENIS BARANG -->
            </select>
        </div>

        <script>
            document.getElementById('jenisbarang').addEventListener('change', function () {
                // Mendapatkan nilai JENIS BARANG yang dipilih
                var selectedJenisBarang = this.value;

                // Membuat request ke server dengan AJAX untuk mengambil data NAMA BARANG
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // Menghapus opsi sebelumnya sebelum menambahkan yang baru
                        document.getElementById('namabarang').innerHTML = '';

                        // Mendapatkan data NAMA BARANG dari respons server
                        var namaBarang = JSON.parse(this.responseText);

                        // Menambahkan opsi NAMA BARANG sesuai dengan JENIS BARANG yang dipilih
                        namaBarang.forEach(function (item) {
                            var option = document.createElement('option');
                            option.value = item;
                            option.textContent = item;
                            document.getElementById('namabarang').appendChild(option);
                        });
                    }
                };

                // Mengirim request ke server untuk mendapatkan NAMA BARANG sesuai JENIS BARANG
                xhr.open('GET', 'get_nama_barang.php?jenisbarang=' + selectedJenisBarang, true);
                xhr.send();
            });
        </script>
        <input type="submit" value="Submit">
        <a href="master_distributor.php"
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


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namatoko = $_POST['namatoko'];
        $alamat = $_POST['alamat'];
        $notlptoko = $_POST['notlptoko'];
        $jenisbarang = $_POST['jenisbarang'];
        $namabarang = isset($_POST['namabarang']) ? implode(", ", $_POST['namabarang']) : '';

        $sql = "INSERT INTO datadistributor (namatoko, alamat, notlptoko, jenisbarang, namabarang)
        VALUES ('$namatoko', '$alamat', '$notlptoko', '$jenisbarang', '$namabarang')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
</body>

</html>