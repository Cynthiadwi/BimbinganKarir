<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_admin.php");
    exit();
}
include_once("../includes/koneksi.php");
include_once("../crud/pasien_crud.php");

$patients = getAllPatients();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        addPatient($_POST['nama'], $_POST['alamat'], $_POST['no_ktp'], $_POST['no_hp']);
        header("Location: admin_pasien.php");
    } elseif (isset($_POST['update'])) {
        updatePatient($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['no_ktp'], $_POST['no_hp']);
        header("Location: admin_pasien.php");
    } elseif (isset($_POST['delete'])) {
        deletePatient($_POST['id']);
        header("Location: admin_pasien.php");
    }
}

include_once("../includes/header.php");
include_once("../includes/navbar.php");
?>

<div class="container mt-4">
    <h2>Manajemen Pasien</h2>
    <p>Halaman ini untuk CRUD data pasien.</p>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No KTP</th>
                <th>No HP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($patients)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['no_ktp']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td>
                        <form action="admin_pasien.php" method="post" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="admin_edit_pasien.php" method="get" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Tambah Pasien</h2>
    <form action="admin_pasien.php" method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_ktp">No KTP</label>
            <input type="text" name="no_ktp" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <button type="submit" name="add" class="btn btn-success">Tambah Pasien</button>
    </form>
</div>

<?php include_once("../includes/footer.php"); ?>
