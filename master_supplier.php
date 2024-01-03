<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
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
        }

        /* Additional styles for table */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
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
            text-align: center;
            /* Membuat teks menjadi pusat */
            margin-top: 100px;
            /* Menambahkan margin di atas */
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
        <h2>Data Supplier</h2>
       <table>
        <thead>
                <tr>
                    <th>NO INDUK</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>TELEPON</th>
                    <th>FAX</th>
                    <th>EMAIL</th>
                    <th>TANGGAL MASUK</th>
                    <th>BUKTI</th> 
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

        $sql = "SELECT noinduk, namasup, alamat, telepon, fax, email, tanggalmasuk, bukti FROM databarang";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['noinduk'] . "</td>";
                echo "<td>" . $row['namasup'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['telepon'] . "</td>";
                echo "<td>" . $row['fax'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['tanggalmasuk'] . "</td>";
                echo "<td><img src='" . $row['bukti'] . "' width='100'></td>"; 
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
