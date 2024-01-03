<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Existing CSS styles here */

        /* New styles for sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        /* Additional styles for table */
        table {
            width: 80%; /* Lebar tabel */
            margin: 20px auto; /* Posisi tengah */
            border: 1px solid #ccc; /* Garis tepi */
            border-radius: 5px; /* Sudut bulat */
            overflow: hidden; /* Mengatur overflow tabel */
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td img {
            max-width: 100px;
            height: auto;
        }
        h2 {
            text-align: center; /* Membuat teks menjadi pusat */
            margin-top: 20px; /* Menambahkan margin di atas */
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
    <h2>ADMIN</h2>
        <a href="index.html">Home</a>
        <a href="master_barang.php">Master Barang</a>
        <a href="master_supplier.php">Master Supplier</a>
        <a href="#master-distributor">Master Distributor</a>
    </div>

    <!-- Main Content -->
    <div class="container" style="margin-left: 250px;">
        <h2>Data Barang</h2>
        <table>
            <thead>
                <tr>
                    <th>NO BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>JENIS BARANG</th>
                    <th>SUPPLIER</th>
                    <th>STOK</th>
                    <th>HARGA</th>
                    <th>TANGGAL MASUK</th>
                    <th>GAMBAR</th>
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

            $sql = "SELECT nobarang, namabarang, jenisbarang, supplier, stok, harga, tanggalmasuk, gambar FROM databarang";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nobarang'] . "</td>";
                    echo "<td>" . $row['namabarang'] . "</td>";
                    echo "<td>" . $row['jenisbarang'] . "</td>";
                    echo "<td>" . $row['supplier'] . "</td>";
                    echo "<td>" . $row['stok'] . "</td>";
                    echo "<td>" . $row['harga'] . "</td>";
                    echo "<td>" . $row['tanggalmasuk'] . "</td>";
                    echo "<td><img src='" . $row['gambar'] . "' width='100'></td>";
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
