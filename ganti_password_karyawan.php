<?php

include "koneksi.php";

$password_lama = md5($_POST['pass_lama']);

$username = $_POST['username'];
$tampil = mysqli_query($db, "SELECT * FROM tb_user WHERE
                                username = '$username' and password =
                                '$password_lama'");
$data = mysqli_fetch_array($tampil);
if ($data) {
    $password_baru = &$_POST['pass_baru'];
    $konfirmasi_password = $_POST['konfirmasi_pass'];

    if ($password_baru == $konfirmasi_password) {
        $pass_ok = md5($konfirmasi_password);
        $ubah = mysqli_query($db, "UPDATE tb_user set password = '$pass_ok'
                                    WHERE id = '$data[id]'");
        if ($ubah) {
            echo "<script>alert('Password anda Berhasil diubah!')
            document.location='karyawan.php'</script>";
        }
    }
} else {
    echo "<script>alert('Maaf Password anda tidak sesuai/tidak terdaftar!')
    document.location='karyawan.php'</script>";
}
