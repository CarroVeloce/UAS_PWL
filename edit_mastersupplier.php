<!DOCTYPE html>
<html>

<head>
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
            background: linear-gradient(to bottom, #007bff, #6f42c1);
        }

        form {
            width: 400px;
            padding: 20px;
            margin-bottom: 80px;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease forwards;
            text-align: center;
            position: relative;

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
        input[type="number"],
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
        input[type="number"]:hover,
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

        .square {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.05);
            pointer-events: none;
            animation: animateSquares 15s linear infinite;
        }

        .square:nth-child(1) {
            width: 50px;
            height: 50px;
            top: 10%;
            left: 10%;
            animation-duration: 15s;
        }

        .square:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 70%;
            left: 70%;
            animation-duration: 12s;
        }

        .square:nth-child(3) {
            width: 70px;
            height: 70px;
            top: 40%;
            left: 40%;
            animation-duration: 10s;
        }

        .square:nth-child(4) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 80%;
            animation-duration: 17s;
        }

        .square:nth-child(5) {
            width: 90px;
            height: 90px;
            top: 20%;
            left: 20%;
            animation-duration: 14s;
        }

        .square:nth-child(6) {
            width: 120px;
            height: 120px;
            top: 50%;
            left: 50%;
            animation-duration: 11s;
        }

        @keyframes animateSquares {
            0% {
                transform: translateY(100vh);
            }

            100% {
                transform: translateY(-100vh);
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
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        
    </div>
    <div class="container" >
        <?php

        if (isset($_GET["idsupplier"])) {
            $idsupplier = $_GET["idsupplier"];
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "uas_pwl";

            $conn = mysqli_connect($host, $username, $password, $database);

            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM datasuppler WHERE idsupplier = $idsupplier";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
            } else {
                echo "Data barang tidak ditemukan.";
                exit;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $new_namasupplier = $_POST['new_namasupplier'];
                $new_alamatsupplier = $_POST['new_alamatsupplier'];
                $new_tlpsupplier = $_POST['new_tlpsupplier'];
                $new_jenisbarang = $_POST['new_jenisbarang'];
            
                if (empty($new_namasupplier) || empty($new_jenisbarang) || empty($new_alamatsupplier) || empty($new_tlpsupplier)) {
                    echo "Semua kolom harus diisi. Silakan isi semua data.";
                } else if (!is_numeric($new_tlpsupplier)) {
                    echo "Harap masukkan angka untuk tlpsupplier dan Harga.";
                } else {
            
                    $update_sql = "UPDATE datasuppler SET namasupplier = '$new_namasupplier', alamatsupplier = '$new_alamatsupplier', tlpsupplier = '$new_tlpsupplier', jenisbarang ='$new_jenisbarang' WHERE idsupplier = $idsupplier";
            
                    if (mysqli_query($conn, $update_sql)) {
                        echo "Data barang berhasil diperbarui. <a href='master_supplier.php'> Kembali</a>";
                        exit;
                    } else {
                        echo "Gagal memperbarui data: " . mysqli_error($conn);
                    }
                }
            }
            
            mysqli_close($conn);
        }
        ?>
         
        <form method="post">
        <h2>Form Edit Barang</h2>
            <label for="new_namasupplier">Nama Barang:</label>
            <input type="text" name="new_namasupplier" value="<?php echo $row['namasupplier']; ?>"><br>

            <label for="new_alamatsupplier">alamatsupplier:</label>
            <input type="text" name="new_alamatsupplier" value="<?php echo $row['alamatsupplier']; ?>"><br>

            <label for="new_tlpsupplier">tlpsupplier:</label>
            <input type="number" name="new_tlpsupplier" value="<?php echo $row['tlpsupplier']; ?>"><br>

            <label for="new_jenisbarang">Jenis Barang:</label>
            <input type="text" name="new_jenisbarang" value="<?php echo $row['jenisbarang']; ?>"><br>

            <input type="submit" value="Simpan Perubahan">
        </form>
    </div>
</body>

</html>