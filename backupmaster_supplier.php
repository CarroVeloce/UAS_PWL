<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        .butun {
            display: flex;
            text-align: center;
            justify-content: space-between;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            background-color: #007bff;
            text-decoration: none;
            width: 50px;
            height: 25px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="butun">
        <button onclick="exportData()">Export data</button>
        <a href="master_supplier.php">Exit</a>
    </div>
    <?php
    $folder_path = 'backupjson/';
    $file_name = $folder_path . 'data_supplier.json';

    if (file_exists($file_name)) {
        $json_data = file_get_contents($file_name);
        $data = json_decode($json_data, true);

        if ($data !== null) {
            echo '<table>';
            echo '<tr>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Telepon Supplier</th>
                <th>Jenis Barang</th>
              </tr>';
            foreach ($data as $row) {
                echo '<tr>';
                echo '<td>' . $row['idsupplier'] . '</td>';
                echo '<td>' . $row['namasupplier'] . '</td>';
                echo '<td>' . $row['alamatsupplier'] . '</td>';
                echo '<td>' . $row['tlpsupplier'] . '</td>';
                echo '<td>' . $row['jenisbarang'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }
    ?>

    <script>
        function exportData() {
            <?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "uas_pwl";

            // Buat koneksi
            $conn = mysqli_connect($host, $username, $password, $database);

            // Periksa koneksi
            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Ambil data dari tabel
            $sql = "SELECT * FROM datasuppler";
            $result = mysqli_query($conn, $sql);

            $data = array();

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $record = array(
                        "idsupplier" => $row['idsupplier'],
                        "namasupplier" => $row['namasupplier'],
                        "alamatsupplier" => $row['alamatsupplier'],
                        "tlpsupplier" => $row['tlpsupplier'],
                        "jenisbarang" => $row['jenisbarang']
                    );
                    $data[] = $record;
                }
            }

            // Konversi data ke format JSON
            $json_data = json_encode($data, JSON_PRETTY_PRINT);

            // Tentukan nama file JSON dan path folder
            $folder_path = 'backupjson/';
            $file_name = $folder_path . 'data_supplier.json';

            // Pastikan folder sudah ada atau buat folder jika belum ada
            if (!is_dir($folder_path)) {
                mkdir($folder_path, 0777, true);
            }

            // Simpan data ke file JSON
            if (file_put_contents($file_name, $json_data) !== false) {
                echo '<div class="message-box" style="color: #008000;">';
                echo 'Data berhasil diekspor ke ' . $file_name;
                echo '<div class="close-button" onclick="window.location.href=\'master_supplier.php\'">x</div>';
                echo '</div>';
            }
            ?>
        }
    </script>

</body>

</html>
