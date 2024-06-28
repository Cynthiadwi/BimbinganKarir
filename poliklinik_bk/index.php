<?php
session_start();
include_once("koneksi.php");

// if (!isset($_SESSION['username'])) {
//     header("Location: welcome_admin.php");
//     exit();
// }
// $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Temu Janji Pasien - Dokter</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }

        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #77aaff 3px solid;
        }

        header h1 {
            text-align: center;
            text-transform: uppercase;
            margin: 0;
        }

        header p {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .login-options {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .option {
            background: #fff;
            padding: 20px;
            width: 45%;
            text-align: center;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .option img {
            width: 100px;
            height: 100px;
        }

        .option h2 {
            margin: 10px 0;
        }

        .option p {
            color: #777;
        }

        .testimonials {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .testimonials h2 {
            text-align: center;
        }

        .testimonial {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border-left: 5px solid #77aaff;
        }

        .testimonial p {
            margin: 0;
        }

        .login-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .login-container h2 {
            text-align: center;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container label {
            margin: 10px 0 5px;
        }

        .login-container input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        .login-container button {
            padding: 10px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .login-container button:hover {
            background: #555;
        }

        .d-flex {
            display: flex;
        }

        #sidebar-container {
            min-height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: #fff;
        }

        #sidebar-container .logo {
            padding: 10px;
            background-color: #343a40;
        }

        #sidebar-container .menu a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        #sidebar-container .menu a:hover {
            background-color: #007bff;
            text-decoration: none;
        }

        .navbar {
            padding: 10px;
            background-color: #343a40;
            color: #fff;
        }

        .navbar a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #007bff;
        }

        .small-box {
            position: relative;
            display: block;
            margin-bottom: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        .small-box .inner {
            padding: 10px;
        }

        .small-box h3 {
            font-size: 38px;
            font-weight: bold;
            margin: 0 0 10px 0;
            white-space: nowrap;
            padding: 0;
        }

        .small-box p {
            font-size: 15px;
        }

        .small-box .icon {
            top: -10px;
            right: 10px;
            z-index: 0;
            font-size: 90px;
            position: absolute;
            transition: all 0.3s linear;
        }

        .small-box:hover .icon {
            font-size: 95px;
        }
    </style>
</head>
<body>
<div class="d-flex">
   
        <div class="container mt-4">
            <header>
                <h1>Sistem Temu Janji Pasien - Dokter</h1>
                <p>Bimbingan Karir 2023 Bidang Web</p>
            </header>
            
            <div class="login-options">
                <div class="option">
                    <a href="regist_pasien.php">
                        <img src="path/to/patient-icon.png" alt="Login Sebagai Pasien">
                        <h2>Login Sebagai Pasien</h2>
                        <p>Apabila Anda adalah seorang Pasien, silakan Login terlebih dahulu untuk melakukan pendaftaran sebagai Pasien!</p>
                    </a>
                </div>
                <div class="option">
                    <a href="login_dokter.php">
                        <img src="path/to/doctor-icon.png" alt="Login Sebagai Dokter">
                        <h2>Login Sebagai Dokter</h2>
                        <p>Apabila Anda adalah seorang Dokter, silakan Login terlebih dahulu untuk melakukan pendaftaran sebagai Dokter!</p>
                    </a>
                </div>
            </div>
            <section class="testimonials">
                <h2>Testimoni Pasien</h2>
                <div class="testimonial">
                    <p>"Pelayanan di sini sangat cepat dan efisien. Dokter selalu memberikan perhatian penuh terhadap pasiennya. Saya sangat puas dengan layanan yang diberikan." - Andi, Semarang</p>
                </div>
                <div class="testimonial">
                    <p>"Aku selalu puas melakukan konsultasi melalui sistem ini. Aku bisa mengatur janji dengan mudah dan mendapatkan layanan terbaik dari dokter yang profesional." - Siti, Surabaya</p>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
