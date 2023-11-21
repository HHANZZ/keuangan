<?php
include 'Koneksi.php';

$servername = "localhost";
$username = "username";  // Ganti dengan username MySQL Anda
$password = "password";  // Ganti dengan password MySQL Anda
$dbname = "keuangan";  // Ganti dengan nama database Anda
$tableName = "user";  // Ganti dengan nama tabel Anda
$idToDelete = 1;  // Ganti dengan ID atau kriteria unik untuk baris yang ingin dihapus

// Buat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah tabel yang akan dihapus barisnya ada
$sql_check = "SHOW TABLES LIKE '$tableName'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Tabel ada, lakukan proses penghapusan baris
    $sql_delete_row = "DELETE FROM $tableName WHERE ID = $idToDelete";  // Ganti "id" dengan nama kolom kunci unik
    if ($conn->query($sql_delete_row) === TRUE) {
        echo "Baris berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Tabel tidak ditemukan.";
}

// Tutup koneksi
$conn->close();

?>