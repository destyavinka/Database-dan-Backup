<?php

include('config.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $role = mysqli_real_escape_string($db, $_POST['role']);

    mysqli_query($db, "UPDATE tb_user SET username='$username', nama='$nama', `role` = '$role' WHERE id=$id");


    header("Location:user.php");
}


if (isset($_GET['id']) && $_GET['id'] > 0) {

    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM tb_user WHERE id=" . $_GET['id']);

    $row = mysqli_fetch_array($result);

    if ($row) {

        $id = $row['id'];
        $username = $row['username'];
        $nama = $row['nama'];
        $role = $row['role'];
    } else {
        echo "No results!";
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
    <title>Edit Account</title>

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
            <h1 class="h3 mb-3 fw-normal">Silahkan Edit Account Anda</h1>

            <div class="form-floating">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
                <label for="floatingInput"></label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-label-group">
                <select class=" form-control" name="role" value="<?php echo $role; ?>">
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                </select>
            </div>
            <br>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Ubah</button>
            <p class="mt-5 mb-3 text-muted">&copy; Sastro Moekti Oetomo 2021-<?= date('Y') ?></p>
        </form>
    </main>



</body>

</html>