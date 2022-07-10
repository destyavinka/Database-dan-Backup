<?php
include 'config.php';
?>
<?php

if (isset($_GET['id'])) {

    $result = mysqli_query($db, "DELETE FROM tb_product WHERE product_id=" . $_GET['id']);
    if ($result == true)
        echo "sucess";
    header("Location:table.php");
}

?>