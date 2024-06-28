<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])){
    header("Location: welcome_admin.php");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
<div class="d-flex">
    <div class="bg-dark text-white" id="sidebar-container">
        <div class="logo">
            <h4 class="text-light font-weight-bold">Poliklinik BK</h4>
        </div>
        <div class="menu">
            <a href="index.php" class="d-block text-light p-3"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="admin_dokter.php" class="d-block text-light p-3"><i class="fas fa-user-md"></i> Dokter</a>
            <a href="admin_pasien.php" class="d-block text-light p-3"><i class="fas fa-user-injured"></i> Pasien</a>
            <a href="admin_obat.php" class="d-block text-light p-3"><i class="fas fa-pills"></i> Obat</a>
            <a href="admin_poli.php" class="d-block text-light p-3"><i class="fas fa-hospital"></i> Poli</a>
            <a href="logout.php" class="d-block text-light p-3"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
    <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-4">

