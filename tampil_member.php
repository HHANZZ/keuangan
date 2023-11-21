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
     <title>tampil kategori</title>
</head>
<body>
     <h2>pemograman 1 2023</h2>
     <br>
     <a href="tambah_member.php">+Tambah kategori</a>
     <br>
     <table border="1">
          <tr> 
             <th>kode member</th>
             <th>Nama member</th>
             <th>level</th>
          </tr> 
          <?php
              include 'koneksi.php';
              $no = 1;
              $data = mysqli_query($koneksi,"select * from member");
              while($d = mysqli_fetch_array($data)){
               ?>
          <tr>
               <td><?php echo $d['kode_member']; ?></td>
               <td><?php echo $d['nama_member']; ?></td>
               <td><?php echo $d['level']; ?></td>
               <td>
               <a href="edit_member.php?id=<?php echo $d['id_member']; ?>">Edit</a>
               <a href="hapus_transaksi.php?id=<?php echo $d['id_member']; ?>">Hapus</a>
              </td>
          </tr>
          <?php
              }
              ?>
     </table>
          </body>
          </html>
