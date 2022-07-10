<?php

include 'config.php';

if (isset($_POST["import"])) {
    if ($_FILES["database"]["name"] != '') {
        $array = explode(".", $_FILES["database"]["name"]);
        $extension = end($array);
        if ($extension == 'sql') {
            // $db = mysqli_connect("localhost", "tima5_skd", "skd", "tima5_skd");
            $output = '';
            $count = 0;
            $file_data = file($_FILES["database"]["tmp_name"]);
            foreach ($file_data as $row) {
                $start_character = substr(trim($row), 0, 2);
                if (
                    $start_character != '--' || $start_character != '/*' ||
                    $start_character != '//' || $row != ''
                ) {
                    $output = $output . $row;
                    $end_character = substr(trim($row), -1, 1);
                    if ($end_character == ';') {
                        if (!mysqli_query($db, $output)) {
                            $count++;
                        }
                        $output = '';
                    }
                }
            }
            if ($count > 0) {
                echo "<script>alert('Database Error!')
                    document.location='restore.php'</script>";
            } else {
                echo "<script>alert('Database Successfully Imported!')
                    document.location='restore.php'</script>";
            }
        } else {
            echo "<script>alert('Invalid File')
                document.location='restore.php'</script>";
        }
    } else {
        echo "<script>alert('Please Select SQL File')
                document.location='restore.php'</script>";
    }
}
