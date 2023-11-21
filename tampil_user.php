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
        <title>pemograman3.com</title>
</head>
<body>
    <h2>pemograman 3 2023</h2>
    <br/>
    <a href="tambah_user.php">+ TAMBAH USER</a>
    <br/>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Password</th>
            <th>level</th>
            <th>status</th>
            <th>OPSI</th>
        </tr>

<?php
include 'koneksi.php';
$no = 1;
$data = mysqli_query($koneksi,"select * from user");
while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $d['id_user']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['password']; ?></td>
        <td><?php echo $d['level']; ?></td>
        <td><?php echo $d['status']; ?></td>
        <td>
        <a href="edit_user.php= <?php echo $d['id_user']; ?>">EDIT</a>
        <a href="hapus_user.php= <?php echo $d['id_user']; ?>">HAPUS</a> 
</tr>
</td>
<?php
}
?>

</table>
</body>
</html>
