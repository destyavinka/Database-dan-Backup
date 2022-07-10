<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama']);
unset($_SESSION['role']);

session_destroy();
echo "<script>alert('Anda telah keluar dari halaman Administarsi');document.location='login.php'</script>";