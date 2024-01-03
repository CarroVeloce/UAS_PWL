<!DOCTYPE html>
<html>

<head>
    <title>ADMIN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container form input[type="text"],
        .login-container form input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .login-container form input[type="submit"] {
            padding: 10px;
            border-radius: 3px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .login-container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .box {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
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
    </style>
</head>

<body>
    <div class="login-container">
        <h2>ADMIN</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <img src="capcay.php" alt="CAPTCHA Image">
            <input type="text" name="capcay" placeholder="Masukkan kode CAPTCHA">
            <input type="submit" value="Login">
        </form>

        <div class="box">
            <p>Jika anda belum memiliki akun</p>
            <a href="Regis.php"><button>Registrasi</button></a>
        </div>
        <?php
       session_start();
//ini buat masukin capcay nya ke login
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $login_captcha = $_POST['capcay'] ?? '';
           $captcha_session = $_SESSION["code"] ?? '';
           
           if ($login_captcha !== $captcha_session) {
               echo "<p class='error-message'>CAPTCHA tidak valid.</p>";
           } else {
               $host = "localhost";
               $username = "root";
               $password = "";
               $database = "uas_pwl";

               $conn = mysqli_connect($host, $username, $password, $database);

               if (!$conn) {
                   die("Koneksi gagal: " . mysqli_connect_error());
               }

               $login_username = $_POST['username'] ?? '';
               $login_password = $_POST['password'] ?? '';

               $sql = "SELECT * FROM user WHERE username='$login_username' AND password='$login_password'";
               $result = $conn->query($sql);

               if ($result->num_rows > 0) {
                   header("Location: index.html");
                   exit();
               } else {
                   echo "<p class='error-message'>Login gagal. Periksa kembali username dan password Anda.</p>";
               }

               $conn->close();
        }
    }
        ?>
    </div>

</body>

</html>