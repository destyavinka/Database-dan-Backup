<?php
$msg = "";
if (isset($_POST['extract'])) {
    $fileName = $_FILES['file']['name'];
    $fileNameArr = explode(".", $fileName);
    if ($fileNameArr[count($fileNameArr) - 1] == 'zip') {
        $fineName = $fileNameArr[0];
        $zip = new ZipArchive();
        if ($zip->open($_FILES['file']['tmp_name']) === TRUE) {
            // $rand = rand(111111111, 999999999);
            $zip->extractTo(".");
            $zip->close();
            echo "<script>alert('Project Successfully Restored!')
                document.location='restore.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong!')
                document.location='restore.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid File!')
                document.location='restore.php'</script>";
    }
}
