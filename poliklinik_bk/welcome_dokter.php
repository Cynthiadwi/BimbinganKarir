<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_dokter.php");
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
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<div class="container mt-4">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>You have successfully logged in.</p>
    <a href="logout.php">Logout</a>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
