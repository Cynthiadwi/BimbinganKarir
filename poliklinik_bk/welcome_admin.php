<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
    exit();
}

$username = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>body {
    font-family: Arial, sans-serif;
    display: flex;
}

.navbar {
    width: 200px;
    background-color: #333;
    color: white;
    padding: 15px;
    height: 100vh;
    position: fixed;
}

.navbar a {
    display: block;
    color: white;
    padding: 10px;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #575757;
}

.container {
    margin-left: 220px;
    padding: 20px;
    width: calc(100% - 220px);
}
</style>
    
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<div class="container mt-4">
    <h2>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Anda telah berhasil login.</p>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
