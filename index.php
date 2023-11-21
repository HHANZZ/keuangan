<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("Location: login.php");
    exit;
}

$level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME </title>
</head>
<body>
   <h1>HOME</h1>  
<br><br>

<?php 
if ($level !=2) {
?>
<h3></h1><a href="tambah_barang.php">BARANG</a></h3>
<h3></h1><a href="tambah_kategori.php">KATEGORI</a></h3>
<h3></h1><a href="tambah_member.php">MEMBER</a></h3>
<h3></h1><a href="tambah_transaksi.php">TRANSAKSI</a></h3>
<?php }?>
<h3></h1><a href="tambah_penjualan.php">PENJUALAN</a></h3>
<?php 
if ($level == 1) {
?>
<h3></h1><a href="tambah_user.php">USER</a></h3>
<?php }?>
<h3></h1><a href="view_report.php">VIEW REPORT</a></h3><br><br><br>

<form action="logout.php">
    <input type="submit" class="button" name="select" value="LOGOUT" />
</form>

</body>
</html>