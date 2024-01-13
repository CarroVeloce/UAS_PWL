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
            transition: border-color 0.3s ease;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
        }

        input[type="text"]:hover,
        input[type="date"]:hover,
        input[type="number"]:hover,
        input[type="file"]:hover {
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
            width: calc(100% - 40px);
            margin: 5px 20px;
            text-align: center;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
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
        <h2>Form Input Supplier</h2>
        <label for="namasupplier">NAMA SUPPLIER:</label>
        <input type="text" id="namasupplier" name="namasupplier">

        <label for="alamatsupplier">ALAMAT SUPPLIER:</label>
        <input type="text" id="alamatsupplier" name="alamatsupplier">

        <label for="tlpsupplier">NOMOR TELEPON SUPPLIER:</label>
        <input type="number" id="tlpsupplier" name="tlpsupplier">

        <div class="select-wrapper">
            <label for="jenisbarang">JENIS BARANG:</label>
            <select id="jenisbarang" name="jenisbarang[]" multiple>
                <option value="CPU">CPU</option>
                <option value="GPU">GPU</option>
                <option value="RAM">RAM</option>
                <option value="SSD">SSD</option>
                <option value="SSD">HDD</option>
                <option value="SSD">MOBO</option>
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
        $jenisbarang = implode(', ', $_POST['jenisbarang']); 
       
        $jenisbarang = implode(', ', $_POST['jenisbarang']);


        $sql = "INSERT INTO datasuppler (namasupplier, alamatsupplier, tlpsupplier, jenisbarang)
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