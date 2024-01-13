<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            background: rgba(255, 255, 255, 0.5); /* Putih dengan tingkat transparansi 0.5 (50%) */
            border-radius: 15px;
            margin-left: 15px;
            margin-right: 15px;
            padding: 25px 20px; /* Menambahkan padding yang sama dengan kondisi default */
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

        .button-add,
        .button-edit {
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .button-add {
            position: absolute;
            top: 42px;
            right: 0;
            background-color: #007bff;
            color: #fff;
            margin-top: 60px;
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
            margin-left:px ;
        }

        .button-edit:hover {
            background-color: darken(#007bff, 10%);
        }
    </style>
     <script>
        function printTable() {
            var printContents = document.querySelector('.container table').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = '<table>' + printContents + '</table>';
            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
    <script>
    function printTable() {
        var printContents = document.querySelector('.container table').outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
</head>

<body>
    <div class="profile-container">
        <H4>N.CORP</H4>
    </div>
    <div class="sidebar">
        <h2>ADMIN</h2>
        <a href="index.php"><i class="fas fa-home"></i> Dashbord</a>
        <a href="master_barang.php"><i class="fas fa-box"></i> Master Barang</a>
        <a href="master_supplier.php"><i class="fas fa-users"></i> Master Supplier</a>
        <a href="master_distributor.php" class="active"><i class="fas fa-store"></i> Master Distributor</a>
        <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>

    <div class="container" style="margin-left: 250px;">
        <a href="input_masterdistributor.php" class="button-add"><i class="fas fa-plus"></i> Tambah</a>
        <h2>Daftar Distributor</h2>
        <button onclick="printTable()"
            style="margin: 10px; padding: 10px 15px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            <i class="fas fa-print"></i> Print
        </button>
        <table>
            <form method="GET" action="" style="margin-bottom: 20px;">
                <input type="text" name="search" placeholder="Cari berdasarkan Nama Toko" style="padding: 8px;">
                <button type="submit"
                    style="padding: 10px 12px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; margin-left: 5px; margin-bottom: 20px; "><i
                        class="fas fa-search"></i> Cari</button>
            </form>
            <thead>
                <tr>
                    <!-- <th>ID TOKO</th> -->
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

            if (isset($_POST['delete_namatoko'])) {
                $delete_namatoko = mysqli_real_escape_string($conn, $_POST['delete_namatoko']);
                $sql = "DELETE FROM datadistributor WHERE namatoko = '$delete_namatoko'";

                if (mysqli_query($conn, $sql)) {
                    echo "";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }

            // Pagination
            $itemsPerPage = 5; // Adjust this value as needed
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $itemsPerPage;

            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT idtoko, namatoko, alamat, notlptoko, jenisbarang, namabarang 
                        FROM datadistributor 
                        WHERE namatoko LIKE '%$search%'
                        LIMIT $itemsPerPage OFFSET $offset";
            } else {
                $sql = "SELECT idtoko, namatoko, alamat, notlptoko, jenisbarang, namabarang 
                        FROM datadistributor 
                        LIMIT $itemsPerPage OFFSET $offset";
            }

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    // echo "<td>" . $row['idtoko'] . "</td>";
                    echo "<td>" . $row['namatoko'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['notlptoko'] . "</td>";
                    echo "<td>" . $row['jenisbarang'] . "</td>";
                    echo "<td>" . $row['namabarang'] . "</td>";
                    echo "<td><a href='edit_masterdistributor.php?idtoko=" . $row['idtoko'] . "' class='button-edit'><i class='fas fa-edit'></i></a>";
                    echo "<td>
                            <form method='post' onsubmit='return confirmDelete();'>
                                <input type='hidden' name='delete_namatoko' value='" . $row['namatoko'] . "'>
                                <button type='submit' style='background-color: #dc3545; color: #fff; border: none; padding: 10px 10px; border-radius: 4px;'>
                                    <i class='fas fa-trash-alt'></i>
                                </button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Distributor.</td></tr>";
            }

            // Pagination links
            $sqlTotalItems = "SELECT COUNT(*) FROM datadistributor";
            $resultTotalItems = mysqli_query($conn, $sqlTotalItems);
            $totalItems = mysqli_fetch_row($resultTotalItems)[0];
            $totalPages = ceil($totalItems / $itemsPerPage);

            echo "<div style='margin-top: 20px;'>";
            echo "<span>Halaman $page dari $totalPages</span>";

            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo "<span style='padding: 5px; background-color: #007bff; color: #fff; border-radius: 5px; margin-left: 5px;'>$i</span>";
                } else {
                    echo "<a href='master_distributor.php?page=$i' style='padding: 5px; background-color: #ddd; color: #333; border-radius: 5px; margin-left: 5px;'>$i</a>";
                }
            }

            echo "</div>";

            mysqli_close($conn);
            ?>

        </table>
    </div>
</body>

</html>
