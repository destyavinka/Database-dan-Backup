<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Ubah Password</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/dist/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="ganti_password.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Silahkan Mengganti Password Anda!</h1>
            <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
            <div class="form-floating">
                <input type="password" class="form-control" name="pass_lama" placeholder="Masukkan Password Lama Anda!">
                <label for="floatingPassword">Password Lama</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="pass_baru" placeholder="Masukkan Password Barud Anda!">
                <label for="floatingPassword">Password Baru</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="konfirmasi_pass" placeholder="Konfirmasi Password Anda!">
                <label for="floatingPassword">Re-Type Password Baru</label>
            </div>

            <button class="btn btn-primary" type="submit">Ubah</button>
            <button class="btn btn-danger" type="reset">Reset</button>
            <p class="mt-5 mb-3 text-muted"><a href="">Sistem Administrasi Pabrik</a>
                2021-<?= date('Y') ?></p>
        </form>
    </main>



</body>

</html>