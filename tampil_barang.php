<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['level'] == 2 && $_SESSION['status'] == 1) {
    // Login berhasil dengan level staff dan status aktif, arahkan ke halaman lain
    header("location: tampil_transaksi.php");
    exit(); // Berhenti eksekusi skrip setelah mengalihkan header
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tampil Barang</title>
</head>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="tambah_barang.php">+ Tambah Barang</a>
    <br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Qty</th>
            <th>Id Kategori</th>
        </tr>
        <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"Select * from barang");
            while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_barang'];?></td>
            <td><?php echo $d['kode_barang'];?></td>
            <td><?php echo $d['qty'];?></td>
            <td><?php echo $d['kategori_id'];?></td>
            <td>
            <a href="edit_barang.php?id=<?php echo $d['id_barang']; ?>">Edit</a>
            <a href="hapus_barang.php?id=<?php echo $d['id_barang']; ?>">Hapus</a>                
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>
