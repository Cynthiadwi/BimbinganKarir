<?php
include_once("../includes/koneksi.php");

function getAllPatients() {
    global $conn;
    $query = "SELECT * FROM pasien";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getPatientById($id) {
    global $conn;
    $query = "SELECT * FROM pasien WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function addPatient($nama, $alamat, $no_ktp, $no_hp) {
    global $conn;
    $query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp')";
    return mysqli_query($conn, $query);
}

function updatePatient($id, $nama, $alamat, $no_ktp, $no_hp) {
    global $conn;
    $query = "UPDATE pasien SET nama = '$nama', alamat = '$alamat', no_ktp = '$no_ktp', no_hp = '$no_hp' WHERE id = $id";
    return mysqli_query($conn, $query);
}

function deletePatient($id) {
    global $conn;
    $query = "DELETE FROM pasien WHERE id = $id";
    return mysqli_query($conn, $query);
}
?>
