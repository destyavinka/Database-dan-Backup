<?php

include 'config.php';

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $db;
    $username = strtolower($data["username"]);
    $password = mysqli_escape_string($db, $data["password"]);
    $password2 = mysqli_escape_string($db, $data["password2"]);
    $nama = mysqli_escape_string($db, $_POST["nama"]);
    $role = mysqli_escape_string($db, $_POST["role"]);

    $result = mysqli_query($db, "SELECT username FROM tb_user 
                                    WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('username sudah digunakan');
        </script>
        ";
        return false;
    }
    if ($password != $password2) {
        echo "
        <script>
            alert('password tidak sesuai');
        </script>
        ";
    } else {
        $password = md5($password);
        $saved = mysqli_query($db, "INSERT INTO tb_user (username,nama,password,role) VALUES ('$username','$nama','$password','$role')");
        return mysqli_affected_rows($db);
    }
}
