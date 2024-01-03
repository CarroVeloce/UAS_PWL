<html>
<head>
    <title>Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .box{
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color:#007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:  #0056b3;
        }
        button{
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover{
            background-color: #0056b3;
        }
        .error-message,
        .success-message {
            text-align: center;
            margin-top: 10px;
            padding: 5px;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }

       
        .message-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
    </style>
<body>
    <h2>Registrasi</h2>
    <form method="post">
        <input type="text" name="nama" placeholder="Nama"><br><br>
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" value="Daftar">
    </form>

    <div class="box">
        <p>Jika anda sudah memiliki akun</p>
        <a href="login.php"><button>Login</button></a>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "uas_pwl";

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
        $nama = $_POST['nama'] ?? '';
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!empty($nama) && !empty($username) && !empty($email) && !empty($password)) {
            $sql = "INSERT INTO user (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password')";
        
            if ($conn->query($sql) === TRUE) {
                echo "<div class='success-message'>Registrasi berhasil</div>";
            } else {
                if (strpos($conn->error, "Duplicate entry") !== false) {
                    echo "<div class='error-message'>Username atau Email sudah terdaftar</div>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            echo "<div class='error-message'>Semua field harus diisi</div>";
        }
        
        $conn->close();
    }
    ?>
</body>
</html>


    
