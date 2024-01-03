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
    </table>

<?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "uas_pwl";

            $conn = mysqli_connect($host, $username, $password, $database);

            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
?>