<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<?php
    //Koneksi ke database
    include 'koneksi.php';
    //Menangkap data yang dikirim dari form
    if(!empty($_POST['save'])){
        $kode = $_POST['kode_member'];
        $nama = $_POST['nama_member'];
        $level = $_POST['level'];   
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into member values('','$kode','$nama','$level')");
        if($a){
            //mengalihkan ke halaman kembali
            header("location:tampil_member.php");
        }else{
            echo mysqli_error($koneksi);
        }
    }
?>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="tampil_member.php">Kembali</a>
    <br>
    <h3>TAMBAH DATA MEMBER</h3>
    <form method="POST">
        <table>
            
            <tr>
                <td>Kode Member </td>
                <td><input type="number" name="kode_member"></td>
            </tr>
            <tr>
                <td>Nama </td>
                <td><input type="text" name="nama_member"></td>
            </tr>
        <tr>
            <td>level : </td>
            <td><select name="level">
                <option value="">---pilih</option>
                <option value="1">PLATINUM</option>
                <option value="2">SILVER</option>
                <option value="3">GOLD</option>
            </select>
            </td>
        </tr>
        <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>