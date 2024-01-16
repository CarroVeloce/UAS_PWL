<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "uas_pwl";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// Ambil data dari database
$sql = "SELECT namabarang, stok FROM databarang";
$result = mysqli_query($conn, $sql);

//variabel untuk menyimpan data grafik
$labels = array();
$data = array();


// Proses hasil query untuk digunakan dalam grafik
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['namabarang'];
        $data[] = (int) $row['stok'];
    }
}

// Konversi data ke dalam format JSON agar bisa digunakan dalam skrip JavaScript
$labels_json = json_encode($labels);
$data_json = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        }

        .sidebar a {
            padding: 25px 20px;
            display: block;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s ease, border-radius 0.3s ease;
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
            max-width: 1080px;
            max-height: 600px;
            margin-left: 400px;
            background-color: whitesmoke;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #333;
        }


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
        }

            
        .box-box {
            display: flex;
            justify-content: center; /* Align items to the right */
            margin-top: 20px; /* Add some space between the charts and the boxes */
        }

        .user-box {
            width: 200px; /* Set a specific width for each user-box */
            height: 115px;
            display: flex;
            flex-direction: column; /* Align items vertically */
            justify-content: center; /* Center items vertically */
            align-items: center; /* Center items horizontally */
            background-color: #007bff;
            color: #fff;
            text-align: center;
            font-size: 12px;
            border-radius: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-left: 20px; /* Add margin to create space between user-box elements */
        }

        .user-box i {
            margin-bottom: 10px; /* Add space between the icon and the text */
        }

    </style>
</head>

<body>
    <div class="sidebar">
        <h2>ADMIN</h2>
        <a href="index.php" class="active"><i class="fas fa-home"></i> Dashbord</a>
        <a href="master_barang.php"><i class="fas fa-box"></i> Master Barang</a>
        <a href="master_supplier.php"><i class="fas fa-users"></i> Master Supplier</a>
        <a href="master_distributor.php"><i class="fas fa-store"></i> Master Distributor</a>
        <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>
    <?php
        //Ambil data jumlah distributor dari database
        $sqlDis = "SELECT COUNT(*) as totalDistributor FROM datadistributor";
        $resultDis = mysqli_query($conn, $sqlDis);
        $rowDis = mysqli_fetch_assoc($resultDis);
        $totalDistributor = $rowDis['totalDistributor'];
        //Ambil data jumlah supplier dari database
        $sqlSup = "SELECT COUNT(*) as totalSupplier FROM datasuppler";
        $resultSup = mysqli_query($conn, $sqlSup);
        $rowSup = mysqli_fetch_assoc($resultSup);
        $totalSupplier = $rowSup['totalSupplier'];
        // Ambil data jumlah user dari database
        $sqlUser = "SELECT COUNT(*) as totalUsers FROM user";
        $resultUser = mysqli_query($conn, $sqlUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $totalUsers = $rowUser['totalUsers'];
        
        // Ambil data jumlah stok barang dari database
        $totalStokQuery = mysqli_query($conn, "SELECT SUM(stok) as total_stok FROM databarang");
        $totalStok = mysqli_fetch_assoc($totalStokQuery)['total_stok'];
        ?>
       
    <div class="container">
        <h2>Statistik Stok Barang</h2>
        <canvas id="barangChart" width="300" height="150"></canvas>
        
    </div>
    <div class="box-box">
    <div class="user-box">
        <i class="fas fa-users fa-3x"></i> <!-- Ganti dengan ikon "users" -->
        <h2>Jumlah Pegawai: <?php echo $totalUsers; ?></h2>
    </div>

    <div class="user-box">
        <i class="fas fa-cubes fa-3x"></i> <!-- Ganti dengan ikon "cubes" -->
        <h2>Jumlah Barang: <?php echo $totalStok; ?></h2>
    </div>

    <div class="user-box">
        <i class="fas fa-truck fa-3x"></i> <!-- Ganti dengan ikon "truck" -->
        <h2>Jumlah Supplier: <?php echo $totalSupplier; ?></h2>
    </div>

    <div class="user-box">
        <i class="fas fa-warehouse fa-3x"></i> <!-- Ganti dengan ikon "warehouse" -->
        <h2>Jumlah Distributor: <?php echo $totalDistributor; ?></h2>
    </div>
</div>
    <script>
        var labels = <?php echo $labels_json; ?>;
        var data = <?php echo $data_json; ?>;

        var ctx = document.getElementById('barangChart').getContext('2d');
        var barangChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Stok',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>