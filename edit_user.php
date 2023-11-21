<?php
include 'koneksi.php';


$servername = "localhost";
$username = "username";  // Ganti dengan username MySQL Anda
$password = "password";  // Ganti dengan password MySQL Anda
$dbname = "nama_database";  // Ganti dengan nama database Anda
$tableName = "nama_tabel";  // Ganti dengan nama tabel Anda
$idToEdit = 1;  // Ganti dengan ID atau kriteria unik untuk baris yang ingin diedit

// Buat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah tabel yang akan diedit barisnya ada
$sql_check = "SHOW TABLES LIKE '$tableName'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Tabel ada, lakukan proses pengeditan baris
    $newData = [
        'nama_kolom1' => 'nilai_baru1',  // Ganti dengan nama kolom dan nilai baru
        'nama_kolom2' => 'nilai_baru2',
        // ... tambahkan kolom dan nilai baru sesuai kebutuhan
    ];

    $updateQuery = "UPDATE $tableName SET ";
    foreach ($newData as $colName => $colValue) {
        $updateQuery .= "$colName = '$colValue', ";
    }
    $updateQuery = rtrim($updateQuery, ", ");  // Hapus koma terakhir
    $updateQuery .= " WHERE id = $idToEdit";  // Ganti "id" dengan nama kolom kunci unik

    if ($conn->query($updateQuery) === TRUE) {
        echo "Baris berhasil diedit.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Tabel tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
