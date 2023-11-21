<!DOCTYPE html>
<html>
<head>
    <title>pemograman3.com</title>
</head>

<?php
//koneksi database
session_start();
include 'koneksi.php';

//menangkap data yang di kirim dari form
if (!empty($_POST['save'])){

    $ID = $_POST['id_user'];
    $Nama = $_POST['Nama'];
    $Password = $_POST['Password'];
    $level = $_POST['level'];
    $status = $_POST['Status'];


    //menginput data ke database
    $a=mysqli_query($koneksi,"insert into user values('','$Nama','$Password','$level','$status','$ID')");

    
     //mengalihkan halaman kembali
    if($a){
        header("location:tampil_user.php");
    }else{
        echo mysqli_error();
    }
}  
?>




<body>
    <h2>pemograman3 2023</h2>
    <br/>
    <a href="http://localhost/keuangan/tampil_user.php">KEMBALI</a>
    <br/>
    <br/>
    <h3>TAMBAH DATA USER</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
             <td>Password :</td>
             <td><input type="text" name="Password"></td>
        </tr>
        <tr>
            <td>level : </td>
            <td><select name="level">
                <option value="">---pilih</option>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">Supervisor</option>
                <option value="4">Manager</option>
            </select>
            </td>
</tr>

<tr>
    <td>status : </td>
    <td><select name="status">
        <option value="">--pilih</option>
        <option value="0">tidak aktif</option>
        <option value="1">Aktif</option>
</select>
</td>
</tr>
<tr>
        <td class="tombol_submit"><input type="submit" name="save"></td>
</tr>
</table>
</form>
</body>
</html>

