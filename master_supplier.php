<!DOCTYPE html>
<html>
<style>
        body {
            font-family: tahoma, arial;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background: #fff;
        }

        th, td {
            font-size: 13px;
            border: 1px solid #DEDEDE;
            padding: 3px 5px;
            color: #303030;
        }

        th {
            background: #303030;
            font-size: 12px;
            border-color: #BOBOBO;
            color: #FFFFFF;
        }

        .subtotal td {
            background: #F8F8F8;
        }

        .right {
            text-align: right;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
<body>
    <div class="container">

    <h2>Data Barang</h2>
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