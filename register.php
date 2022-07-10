<?php

require 'koneksi.php';

if (isset($_POST["register"])) {

    if (register($_POST) > 0) {
        header('location:user.php');
        echo "
            <script>
                alert('registrasi akun berhasil');
            </script>
        ";
    } else {
        echo mysqli_error($db);
    }
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
    <title>Daftar</title>

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
        <form method="post">
            <h1 class="h3 mb-3 fw-normal">Silahkan Daftar</h1>

            <div class="form-floating">
                <input type="text" class="form-control" autocomplete="off" name="username" placeholder="Masukkan Username Anda!">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" autocomplete="off" name="nama" placeholder="Masukkan nama Anda!">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda!">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password2" placeholder="tulis Ulang Password Anda!">
                <label for="floatingPassword">Re-type password</label>
            </div>
            <div class="form-label-group">
                <select class=" form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                </select>
            </div>
            <br>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Daftar</button>
            <p class="mt-5 mb-3 text-muted">&copy; Sistem Administrasi Pabrik 2021-<?= date('Y') ?></p>
        </form>
    </main>



</body>

</html>