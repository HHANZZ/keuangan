<?php
session_start();


if (isset($_SESSION["nama"])) {
    header("Location: index.php");
    exit;
}


include 'koneksi.php';
if (isset($_POST['save'])) {
    $username = $_POST['nama'];
    $password = md5($_POST['password']);

    if ($username == '' || $password == '') {
        $err = "Username dan Password tidak boleh kosong";
    } else {
        $query = "SELECT * FROM user WHERE nama = '$username'";
        $result = mysqli_query($koneksi, $query);
 

        if (mysqli_num_rows($result) == 0) {
            $err = "Username dan Password tidak boleh kosong";
        } else {
            $d = mysqli_fetch_array($result);

            if ($d['password'] != $password) {
                $err = "Akun <b>'$username'</b> tidak ditemukan";
            } else {
                if ($d['status'] != 1) {
                    $err = "Status tidak aktif";
                } else {
                    // Set session
                    $_SESSION['nama'] = $username;
                    $_SESSION['level'] = $d['level'];
                    $_SESSION['status'] = $d['status'];

                    if ($_SESSION['level'] == 1 && $_SESSION['status'] == 1) {
                        // Login berhasil dengan level admin dan status aktif, arahkan ke halaman lain
                        header("location: index.php");
                        exit();
                    } else if ($_SESSION['level'] == 2 && $_SESSION['status'] == 1) {
                        // Login berhasil dengan level staff dan status aktif, arahkan ke halaman lain
                        header("location: tampil_transaksi.php");
                        exit();// Berhenti eksekusi skrip setelah mengalihkan header
                    }
                }
            }
                // Login berhasil, arahkan ke halaman lain
                // header('Location: index.php');
                // exit(); // Berhenti eksekusi skrip setelah mengalihkan header
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


    <div>
    <div>
        <div>
            <h3>LOGIN</h3>

            <?php
            if (isset($msg)) :
            ?>
                <div>
                    <ul>
                        <li>
                            <?= $msg; ?>
                        </li>
                    </ul>
                </div>
            <?php
            endif;
            ?>

            <form method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="nama" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="submit" name="save" value="Submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>