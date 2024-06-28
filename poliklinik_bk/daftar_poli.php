<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: regist_pasien.php");
    exit();
}

try {
    // Koneksi ke database
    $pdo = new PDO('mysql:host=localhost;dbname=poli', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil data poli dan jadwal untuk dropdown
    $poli_stmt = $pdo->query('SELECT id, nama_poli FROM poli');
    $poli_options = $poli_stmt->fetchAll(PDO::FETCH_ASSOC);

    $jadwal_stmt = $pdo->query('SELECT id, waktu FROM jadwal');
    $jadwal_options = $jadwal_stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pastikan semua elemen form diisi
        $no_rekam_medis = isset($_POST['no_rekam_medis']) ? $_POST['no_rekam_medis'] : '';
        $poli_id = isset($_POST['poli_id']) ? $_POST['poli_id'] : '';
        $jadwal_id = isset($_POST['jadwal_id']) ? $_POST['jadwal_id'] : '';
        $keluhan = isset($_POST['keluhan']) ? $_POST['keluhan'] : '';

        if ($no_rekam_medis && $poli_id && $jadwal_id && $keluhan) {
            // Insert data ke tabel daftar_poli
            $stmt = $pdo->prepare('INSERT INTO daftar_poli (no_rekam_medis, poli_id, jadwal_id, keluhan) VALUES (:no_rekam_medis, :poli_id, :jadwal_id, :keluhan)');
            $stmt->execute([
                ':no_rekam_medis' => $no_rekam_medis,
                ':poli_id' => $poli_id,
                ':jadwal_id' => $jadwal_id,
                ':keluhan' => $keluhan
            ]);

            echo "Pendaftaran poli berhasil!";
        } else {
            echo "Mohon isi semua field.";
        }
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Poli</title>
</head>
<body>
    <h2>Pendaftaran Poli</h2>
    <form action="daftar_poli.php" method="post">
        <label for="no_rekam_medis">No Rekam Medis:</label>
        <input type="text" id="no_rekam_medis" name="no_rekam_medis" required><br><br>
        
        <label for="poli_id">Pilih Poli:</label>
        <select id="poli_id" name="poli_id" required>
            <?php foreach ($poli_options as $poli): ?>
                <option value="<?php echo htmlspecialchars($poli['id']); ?>"><?php echo htmlspecialchars($poli['nama_poli']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="jadwal_id">Pilih Jadwal:</label>
        <select id="jadwal_id" name="jadwal_id" required>
            <?php foreach ($jadwal_options as $jadwal): ?>
                <option value="<?php echo htmlspecialchars($jadwal['id']); ?>"><?php echo htmlspecialchars($jadwal['waktu']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="keluhan">Keluhan:</label>
        <textarea id="keluhan" name="keluhan" required></textarea><br><br>
        
        <input type="submit" value="Daftar">
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>
