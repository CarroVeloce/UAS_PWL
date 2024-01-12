<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Admin Dashboard</title>

    <style>
        /* body {
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        h1,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            color: #007bff;
        } */

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

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background: linear-gradient(to bottom, #007bff, #6f42c1);
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 25px 20px;
            display: block;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s ease, border-radius 0.3s ease, padding 0.3s ease;
        }

        .sidebar a.active {     
            background: linear-gradient(to left, #6f42c1, #6f42c1);
            border-radius: 15px;
            margin-left: 15px;
            margin-right: 15px;
        }
        
        
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.5); 
            border-radius: 15px;
            margin-left: 15px;
            margin-right: 15px;
            padding: 25px 20px; 
            color: #333;
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
            background: linear-gradient(to right, #007bff, #6f42c1);
            color: #fff;
            box-shadow: 0 9px 7px rgba(0, 0, 0, 0.1);
        }


        .action-buttons {
            white-space: nowrap;
        }


        .button-edit {
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        
        }

        .button-add {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            position: absolute;
            top: 42px;
            right: 0;
            background-color: #007bff;
            color: #fff;
            padding: 10px 10px;
            margin-right: 20px;
            margin-top: 60px;
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
    </style>
</head>
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }

</script>

<body>
    <div class="profile-container">
        <H4>N.CORP</H4>
    </div>
    <div class="sidebar">
        <h2>ADMIN</h2>
        <a href="index.php"><i class="fas fa-home"></i> Dashbord</a>
        <a href="master_barang.php" class="active"><i class="fas fa-box"></i> Master Barang</a>
        <a href="master_supplier.php"><i class="fas fa-users"></i> Master Supplier</a>
        <a href="master_distributor.php"><i class="fas fa-store"></i> Master Distributor</a>
        <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>


    <div class="container" style="margin-left: 250px;">
        <a href="input_masterbarang.php" class="button-add"><i class="fas fa-plus"></i> Tambah</a>
        <h2>Daftar Barang</h2>
        <table>
            <form method="GET" action="" style="margin-bottom: 20px;">
                <input type="text" name="search" placeholder="Cari berdasarkan No. Barang atau Nama Barang"
                    style="padding: 8px;">
                <button type="submit"
                    style="padding: 10px 12px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; margin-left: 5px; margin-bottom: 20px; "><i
                        class="fas fa-search"></i> Cari</button>
            </form>
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

            $kurs_usd_to_idr = 15050;

            if (isset($_POST['delete_nobarang'])) {
                $delete_nobarang = mysqli_real_escape_string($conn, $_POST['delete_nobarang']);
                $sql = "DELETE FROM databarang WHERE nobarang = '$delete_nobarang'";

                if (mysqli_query($conn, $sql)) {
                    echo "";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }

            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT nobarang, namabarang, jenisbarang, supplier, stok, harga, tanggalmasuk, gambar FROM databarang WHERE nobarang LIKE '%$search%' OR namabarang LIKE '%$search%' OR jenisbarang LIKE '%$search%'";
            } else {
                $sql = "SELECT nobarang, namabarang, jenisbarang, supplier, stok, harga, tanggalmasuk, gambar FROM databarang";
            }

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nobarang'] . "</td>";
                    echo "<td>" . $row['namabarang'] . "</td>";
                    echo "<td>" . $row['jenisbarang'] . "</td>";
                    echo "<td>" . $row['supplier'] . "</td>";
                    echo "<td>" . $row['stok'] . "</td>";
                    echo "<td>" . 'Rp ' . number_format($row['harga'] * $kurs_usd_to_idr, 0, ',', '.') . "</td>";
                    echo "<td>" . $row['tanggalmasuk'] . "</td>";
                    echo "<td><img src='" . $row['gambar'] . "' width='100'></td>";
                    echo "<td><a href='edit_masterbarang.php?nobarang=" . $row['nobarang'] . "' class='button-edit'><i class='fas fa-edit'></i></a>";
                    echo "<td>
                                    <form method='post' onsubmit='return confirmDelete();'> <!-- Tambahkan onsubmit event -->
                                        <input type='hidden' name='delete_nobarang' value='" . $row['nobarang'] . "'>
                                        <button type='submit' style='background-color: #dc3545; color: #fff; border: none; padding: 10px 10px; border-radius: 4px; '>
                                            <i class='fas fa-trash-alt'></i>
                                        </button>
                                    </form>
                                </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada data barang.</td></tr>";
            }


            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>

</html>