<?php
require "koneksi.php";

//panggil koneksi data base
$pass = md5($_POST['password']);
$username = mysqli_escape_string($db, $_POST['username']);
$password = mysqli_escape_string($db, $pass);
$role = mysqli_escape_string($db, $_POST['role']);

$cek_user = mysqli_query($db, "SELECT * FROM tb_user WHERE username = '$username' and role ='$role'");
$user_valid = mysqli_fetch_array($cek_user);

if ($user_valid) {
    if ($password == $user_valid['password']) {
        session_start();

        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['role'] = $user_valid['role'];

        if ($role == "admin") {
            header('location:index.php');
        } else {
            header('location:karyawan.php');
        }
    }
    echo "<script>alert('Password tidak Sesuai!!')
    document.location='login.php'</script>";
} else {
    echo "<script>alert('Username tidak terdaftar!!')
    document.location='login.php'</script>";
}
