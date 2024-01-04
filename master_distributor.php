<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
   p {
            font-size: 16px;
        }

        table,
        th,
        td,
        a {
            font-family: 'Arial', sans-serif;
            font-size: 15px;
            color: #333;
        }

        /* New styles for sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background: linear-gradient(to bottom, #007bff, #6f42c1);
            color: #fff;
            padding-top: 20px;
            /* Padding top untuk sidebar */
        }

        .sidebar a {
            padding: 10px;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: linear-gradient(to left, #007bff, #6f42c1);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            position: relative;
            width: 80%;
            margin-top: 150px;
            padding-left: 270px;
            background-color: whitesmoke;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #333;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            border-top: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .container h2 {
            margin-bottom: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        @keyframes fadeInTable {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container table {
            opacity: 0;
            animation: fadeInTable 0.5s ease forwards;
        }
        .profile-container {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px;
            padding-left: 1500px;
            background-color: #007bff;
            color: #fff;
            box-shadow: 0 9px 7px rgba(0, 0, 0, 0.1);
        }


        .action-buttons {
            white-space: nowrap;
            /* Mencegah pemisahan baris */
        }

        .button-add,
        .button-edit {
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-right: 5px;
        }

        .button-add {
            position: absolute;
            top: 42px;
            right: 0;
            background-color: #007bff;
            color: #fff;
            padding: 10px 10px;
            margin-right: 20px;
            border-radius: 5px;
            align-items: center;
        }

        .button-add i {
            margin-right: 5px;
        }


        .button-edit {
            background-color: #007bff;
            color: #fff;
        }

        .button-edit:hover {
            background-color: darken(#007bff, 10%);
        }

        .sidebar a.active {
        background: linear-gradient(to left, #007bff, #6f42c1);
        /* Ganti gaya tab yang aktif di sini */
    }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>ADMIN</h2>
        <a href="index.html">Home</a>
        <a href="master_barang.php">Master Barang</a>
        <a href="master_supplier.php" class="active">Master Supplier</a>
        <a href="#master-distributor">Master Distributor</a>
    </div>

    <!-- Main Content -->
    <div class="container" style="margin-left: 250px;">
        <h2>Data Supplier</h2>
       <table>
        <thead>
                <tr>
                    <th>NAMA TOKO</th>
                    <th>ALAMAT</th>
                    <th>TELEPON TOKO</th>
                    <th>JENIS BARANG</th>
                    <th>NAMA BARANG</th>
                </tr>
            </thead>
   

    <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "uas_pwl";

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $sql = "SELECT namatoko, alamat, notlptoko, jenisbarang, namabarang FROM databarang";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['namatoko'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['tlpsupplier'] . "</td>";
                echo "<td>" . $row['jenisbarang'] . "</td>";
                echo "<td>" . $row['namabarang'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data mahasiswa.</td></tr>";
        }

        mysqli_close($conn);
        ?>  
        
    </table>
    </div>
</body>
</html>
