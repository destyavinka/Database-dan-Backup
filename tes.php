<?php
$zip = new ZipArchive;
if ($zip->open('unzipper.zip') === TRUE) {
    $zip->extractTo('.');
    $zip->close();
    echo "<script>alert('Project Successfully Restored!')
                document.location='restore.php'</script>";
} else {
    echo "<script>alert('Something Went Wrong!')
                document.location='restore.php'</script>";
}
?>