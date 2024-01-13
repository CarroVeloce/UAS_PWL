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

        .moving-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #007bff, #6f42c1); 
            z-index: -2;
            animation: animateBackground 15s linear infinite;
        }

        @keyframes animateBackground {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 0 100%;
            }
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
            pointer-events: none;
            animation: animateCircles 15s linear infinite;
        }

        .circle:nth-child(1) {
            width: 50px;
            height: 50px;
            left: 10%;
            animation-duration: 15s;
        }

        .circle:nth-child(2) {
            width: 80px;
            height: 80px;
            left: 70%;
            animation-duration: 12s;
        }

        .circle:nth-child(3) {
            width: 70px;
            height: 70px;
            left: 40%;
            animation-duration: 10s;
        }

        .circle:nth-child(4) {
            width: 60px;
            height: 60px;
            left: 80%;
            animation-duration: 17s;
        }

        .circle:nth-child(5) {
            width: 90px;
            height: 90px;
            left: 20%;
            animation-duration: 14s;
        }

        .circle:nth-child(6) {
            width: 120px;
            height: 120px;
            left: 50%;
            animation-duration: 11s;
        }

        @keyframes animateCircles {
            0% {
                transform: translateY(100vh);
            }

            100% {
                transform: translateY(-100vh);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }


        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
            opacity: 0;
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
<body>
    <div class="moving-background"></div>
    <div class="floating-shapes">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
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


    
