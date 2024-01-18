<div class="error-message">
<div class="capcay-container">
<img src="capcay.php" alt="CAPTCHA Image">
<?php
        session_start();
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
                    header("Location: dashbord.php");
                    exit();
                } else {
                    echo "<p class='error-message'>Login gagal. Periksa kembali username dan password Anda.</p>";
                }

                $conn->close();
            }
        }
        ?>
</div>
</div>
<!DOCTYPE html>
<html>

<head>
    <title>ADMIN</title>
    <style>
         .capcay-container {
            margin-right: 50px;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
            animation: slideDown 0.5s ease forwards;
            font-family: 'Arial', sans-serif;
            /* Ganti font untuk h2 */
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
</head>

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
    <div class="login-container">
        <h2>ADMIN</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            
            <input type="text" name="capcay" placeholder="Masukkan kode CAPTCHA">
            <input type="submit" value="Login">
        </form>

        <div class="box">
            <p>Jika anda belum memiliki akun</p>
            <a href="Regis.php"><button>Registrasi</button></a>
        </div>
    </div>

</body>

</html>