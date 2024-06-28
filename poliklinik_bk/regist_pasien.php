<?php
// Mulai sesi dan buffer output
session_start();
ob_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poli";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses form jika data dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_ktp = $_POST['no_ktp'];
    $no_hp = $_POST['no_hp'];

    // Escape input data untuk mencegah SQL injection
    $nama = $conn->real_escape_string($nama);
    $alamat = $conn->real_escape_string($alamat);
    $no_ktp = $conn->real_escape_string($no_ktp);
    $no_hp = $conn->real_escape_string($no_hp);

    // Insert data ke tabel pasien
    $sql = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp')";

    if ($conn->query($sql) === TRUE) {
        // Registrasi berhasil, redirect ke halaman daftar_poli.php
        header("Location: daftar_poli.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
    // Flush output buffering
    ob_end_flush();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register Pasien</h1>
        <form action="regist_pasien.php" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
            
            <label for="no_ktp">No KTP:</label>
            <input type="text" id="no_ktp" name="no_ktp" required>
            
            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>
            
            <input type="submit" value="Register" >
        </form>
    </div>
</body>
</html>